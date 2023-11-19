<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ControllerError;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Laravel\Passport\Exceptions\OAuthServerException;
use Psr\Http\Message\ServerRequestInterface;
use Response;
use \Laravel\Passport\Http\Controllers\AccessTokenController as ATC;
use Hash;

class AccessTokenController extends ATC
{
    public function issueToken(ServerRequestInterface $request)
    {
        \Log::info($request->getParsedBody());
        try {
            //get username (default is :email)
            $email = $request->getParsedBody()['username'];
//            $username = $request->getParsedBody()['username'];
            $password = $request->getParsedBody()['password'];
            \Log::info($email);
            //get user
            //change to 'email' if you want
            $user = User::where('email', $email)->first();
//            $user = User::where('username', '=', $username)->first();
            \Log::info($user);

            //get exist token
            $userTokens = $user->tokens;


            //generate token
            $tokenResponse = $user->createToken('authToken')->accessToken;

            //check password
            if(!Hash::check( $password ,$user->password)){
                return redirect()->back()->withErrors(['message'=>"The user credentials were incorrect."]);

            } else{
                //revoke existing token
                foreach($userTokens as $token) {
                    $token->revoke();
                }
                //add access token to user
                $user = collect($user);
            }

            /*if(isset($data["error"])){
                throw new OAuthServerException('The user credentials were incorrect.', 6, 'invalid_credentials', 401);
            }*/


            $user->put('access_token', $tokenResponse );
            unset($user['tokens']);

            return Response::json($user);
        }
        catch (ModelNotFoundException $e) { // email notfound

            $error = new ControllerError;
            $error->phpfunctions = 'issueToken';
            $error->phpcontrollers = 'Api\AccessTokenController';
            $error->error = $e->getMessage();
            $error->line = $e->getLine();
            $error->remark = 'ModelNotFoundException catch';
            $error->save();

            return response(["msg" => "User not found","error"=>true], 500);
        }
        catch (OAuthServerException $e) { //password not correct..token not granted

            $error = new ControllerError;
            $error->phpfunctions = 'issueToken';
            $error->phpcontrollers = 'Api\AccessTokenController';
            $error->error = $e->getMessage();
            $error->line = $e->getLine();
            $error->remark = 'OAuthServerException catch';
            $error->save();
            return response(["msg" => "The user credentials were incorrect.","error"=>true], 500);
        }
        catch (Exception $e) {//other error message
            $error = new ControllerError;
            $error->phpfunctions = 'issueToken';
            $error->phpcontrollers = 'Api\AccessTokenController';
            $error->error = $e->getMessage();
            $error->line = $e->getLine();
            $error->remark = 'exception catch';
            $error->save();
//            return response(["message" => $e->getMessage()], 500);
            return response(["msg" => "The user credentials were incorrect.","error"=>true], 500);
        }
    }
}
