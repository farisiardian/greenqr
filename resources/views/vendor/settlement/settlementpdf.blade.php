<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Settlement </title>
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<style>
	.table2{
		width:100%;
		border:solid 1px #384aeb;
		padding:10px;
		color:#000
	}
	.th{
		padding:10px;
		background-color:#9AA3F5;
		color:#000;
		border-bottom:solid 1px #384aeb
	}
	.thh{
		padding:5px;
		background-color:#9AA3F5;
		color:#000;
		border-bottom:solid 1px #384aeb;
		font-size:12px;
		text-align:center
	}
	.t{
		padding:10px;
		text-align:right;
		background-color:#9AA3F5;
		color:#000;
		border-bottom:solid 1px #384aeb
	}
	.td{
		padding: 10px;
		color:#000
	}
	.tdt{
		padding: 5px;
		color:#000
	}
	.tdd{
		padding:10px ;
		color:#000;
		text-align:right;
	}
	.borderless{
		width:100%;
		border:none;
		color:#000;
		padding:10px
	}
	.total{
		padding:20px 10px;
		font-size:20px;
		color:#000;
		
	}
	.subtotal{
		text-align:right;
		font-size:25px;
		padding: 20px 10px;
		color:#384aeb;
		font-weight:600
	}
	p{
		color:#000
	}
	
</style>

<body>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div>
					<table class="borderless">
						<tr>
							<td style="padding:10px 20px">
								<img src="http://206.189.144.207/img/Logo3.png" width="150"/>
							</td>
							<td style="text-align:right;padding:10px 20px">
								<h5 class="card-title ms-2" style="color:#384aeb">Income Statement</h5>
							</td>
						</tr>
						
					</table>
						
					<hr style="border-color:#384aeb">
					<!--<h5 class="card-title ms-2">Settlement Invoice of {{$vendor->name}} At {{$selected_month->format('F')}} {{$selected_month->year}}</h5>-->
                    <table class="borderless">
						<tr>
							<td style="padding-right:10px;text-align:top;">
								<p class="card-title ms-2" style="font-weight:600">{{isset($vendor) ? $vendor->name : ''}}</p>
								<p class="card-title ms-2" style="font-size:14px">{{isset($vendor) ? $vendor->address : ''}}</p>
								<p class="card-title ms-2" style="font-size:14px">{{$vendor->city}} {{$vendor->state}} {{$vendor->postalcode}}</p>
								<p class="card-title ms-2" style="font-size:14px;color:white">sdfjsdkjf</p>
								
							</td>
							<td>
								<p class="card-title ms-2" style="font-weight:600">Statement for {{ $selected_month->format('F Y') }}</p>
								<p class="card-title ms-2">Name in Bank Acount: </p>
								<p class="card-title ms-2">Bank Account: {{$vendor->accnumber}}</p>
								<p class="card-title ms-2">Bank Name: {{$vendor->bankname}}</p>
								
							</td>
						</tr>
					</table>
				
					<table class="table2">
						<thead>
							<tr>
								<th class="th">Summary of Payout Released</th>
								<th class="t">Amount (MYR)</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="td">Products' Price Paid by Buyer</td>
								<td class="tdd">RM {{isset($orderTotal) ? $orderTotal->totalPayment : ''}}</td>
							</tr>
							<tr>
								<td class="td">Shipping Fee Paid by Buyer</td>
								<td class="tdd">RM {{isset($orderTotal) ? $orderTotal->shipping : ''}}</td>
							</tr>
							<tr>
								<td class="td">Actual Shipping Fee</td>
								<td class="tdd">- RM {{isset($orderTotal) ? $orderTotal->shipping : ''}}</td>
							</tr>
							<!--tr>
								<td class="td">Reverse Shipping Fee</td>
								<td class="tdd">- 8.90</td>
							</tr-->
							<tr>
								<td class="td">Refund Amount to Buyer</td>
								<td class="tdd">- RM {{isset($orderTotal) ? $orderTotal->total_return : ''}}</td>
							</tr>
							<tr>
								<td class="td">Promo Code Paid By Seller</td>
								<td class="tdd">- 0.00</td>
							</tr>
							<!--tr>
								<td class="td">Transaction Fee (Incl. SST)</td>
								<td class="tdd">- 120.20</td>
							</tr-->
							<tr>
								<td class="total">Total Payout Released</td>
								<td class="subtotal">RM {{$total}}</td>
							</tr>
						</tbody>
					</table>
					
					
					<p class="pl-2">Details of Payout Released</p>
					<table class="table2">
						<thead>
							<tr>
								<th class="thh">Payout Released On</th>
								<th class="thh">Products' Price Paid by Buyer</th>
								<th class="thh">Shipping Fee Paid by Buyer</th>
								<th class="thh">Actual Shipping Fee</th>
								<!--th class="thh">Reverse Shipping Fee</th-->
								<th class="thh">Refund Amount to Buyer</th>
								<th class="thh">Promo Code Paid By Seller</th>
								<!--th class="thh">Transaction Fee (Incl. SST)</th-->
								<th class="thh">Total Payout Released (MYR)</th>
							</tr>
						</thead>
						<tbody>
							@php 
								$totalPayment = 0;
								$shipping = 0;
								$totalReturn = 0;
							@endphp

							@foreach($orders as $order)
								@php 
									$totalPayment += $order->totalPayment;
									$shipping += $order->shipping;
									$totalReturn += $order->total_return;
									$totalall = $totalPayment + $shipping + $totalReturn;
								@endphp
								<tr>
									<td class="tdt">{{$order->created_at}}</td>
									<td class="tdt">{{$order->totalPayment}}</td>
									<td class="tdt">{{$order->shipping}}</td>
									<td class="tdt">{{$order->shipping}}</td>
									<!--td class="tdt">0.00</td-->
									<td class="tdt">{{$order->total_return}}</td>
									<td class="tdt">-0.00</td>
									<!--td class="tdt">-33.40</td-->
									<td class="tdt">{{$totalall}}</td>
								</tr>
							@endforeach

							<!--tr>
								<td class="tdt">2023-02-02</td>
								<td class="tdt">1400,20</td>
								<td class="tdt">129.90</td>
								<td class="tdt">-129.90</td>
								<td class="tdt">0.00</td>
								<td class="tdt">0.00</td>
								<td class="tdt">-9.80</td>
								<td class="tdt">-33.40</td>
								<td class="tdt">1350.80</td>
							</tr>
							<tr>
								<td class="tdt">2023-02-02</td>
								<td class="tdt">1400,20</td>
								<td class="tdt">129.90</td>
								<td class="tdt">-129.90</td>
								<td class="tdt">0.00</td>
								<td class="tdt">0.00</td>
								<td class="tdt">-9.80</td>
								<td class="tdt">-33.40</td>
								<td class="tdt">1350.80</td>
							</tr-->							
						</tbody>
					</table>
					
					
					<div class="pl-2 mt-2">
						<p>For more enquiries, please contact our <a href="#">support</a></p>
					</div>
					
				</div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
</body>
<!-- Content wrapper -->
</html>
