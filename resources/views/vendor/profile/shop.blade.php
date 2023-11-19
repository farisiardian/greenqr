@extends('layouts.admin')

@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Account Settings /</span> Shop Address
        </h4>
        <div class="row">
            <div class="col-md-12">
                @include('vendor.profile.tabbar')
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Shop Details</h5>
                    </div>
                    <div class="card-body">
{{--                        <form action="/v_profile" method="POST">--}}
                        <form action="{{route('v_profile.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label for="tagline" class="form-label">Shop Tagline</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="tagline" autofocus class="form-control" name="tagline" aria-describedby="taglines" value="{{isset($shop) ? $shop->tagline : ''}}">

                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label for="summary" class="form-label">Short Summary of Shop</label>
                                    <div class="input-group input-group-merge">
                                        <textarea type="text" rows="5" id="summary" class="form-control" name="summary" aria-describedby="summary" autofocus >{{str_replace('<br />', '', nl2br(e(isset($shop) ? $shop->summary : '')))}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Save</button>
                        </form>
                    </div>
                </div>
				  <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Operating Hours</h5>
                            </div>
                            <div class="card-body">
				  <div class="row ">
 <table>
  @if(!empty($operatingHours))
    <tr>
      <td><strong>Monday:</strong></td>
      <td>{{ \Carbon\Carbon::parse($operatingHours->monday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->monday_to ?? '')->format('h:i A') }}</td>
    </tr>
    <tr>
      <td><strong>Tuesday:</strong></td>
      <td>{{ \Carbon\Carbon::parse($operatingHours->tuesday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->tuesday_to ?? '')->format('h:i A') }}</td>
    </tr>
    <tr>
      <td><strong>Wednesday:</strong></td>
      <td>{{ \Carbon\Carbon::parse($operatingHours->wednesday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->wednesday_to ?? '')->format('h:i A') }}</td>
    </tr>
    <tr>
      <td><strong>Thursday:</strong></td>
      <td>{{ \Carbon\Carbon::parse($operatingHours->thursday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->thursday_to ?? '')->format('h:i A') }}</td>
    </tr>
    <tr>
      <td><strong>Friday:</strong></td>
      <td>{{ \Carbon\Carbon::parse($operatingHours->friday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->friday_to ?? '')->format('h:i A') }}</td>
    </tr>
    <tr>
      <td><strong>Saturday:</strong></td>
      <td>{{ \Carbon\Carbon::parse($operatingHours->saturday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->saturday_to ?? '')->format('h:i A') }}</td>
    </tr>
    <tr>
      <td><strong>Sunday:</strong></td>
      <td>{{ \Carbon\Carbon::parse($operatingHours->sunday_from ?? '')->format('h:i A') }} - {{ \Carbon\Carbon::parse($operatingHours->sunday_to ?? '')->format('h:i A') }}</td>
    </tr>
  @else
    <tr>
      <td colspan="2"><strong>Operating hours not available</strong></td>
    </tr>
  @endif
</table>

</div>
</div>
</div>
</div>
</div><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Operating Hours</h5>
                            </div>
                            <div class="card-body">
                                 <form action="{{route('operatingHours')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="monday" id="monday">
                                            <label class="form-check-label" for="monday">Monday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="monday_from" id="monday_from" class="select2 form-select">
                                                        <option value="">From</option>
                                                        <option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
                                                        <option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="monday_to" id="monday_to" class="select2 form-select">
                                                        <option value="">To</option>
														<option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
														<option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="tuesday" id="tuesday" >
                                            <label class="form-check-label" for="tuesday">Tuesday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="tuesday_from" id="tuesday_from" class="select2 form-select">
                                                        <option value="">From</option>
														<option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
														<option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="tuesday_to" id="tuesday_to" class="select2 form-select">
                                                        <option value="">To</option>
														<option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
														<option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="wednesday" id="wednesday" >
                                            <label class="form-check-label" for="wednesday">Wednesday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="wednesday_from" id="wednesday_from" class="select2 form-select">
                                                        <option value="">From</option>
														<option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
														<option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="wednesday_to" id="wednesday_to" name="days[]" class="select2 form-select">
                                                        <option value="">To</option>
														<option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
														<option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="thursday" id="thursday" >
                                            <label class="form-check-label" for="thursday">Thursday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="thursday_from" id="thursday_from" class="select2 form-select">
                                                        <option value="">From</option>
														<option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
														<option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="thursday_to" id="thursday_to" class="select2 form-select">
                                                        <option value="">To</option>
														<option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
														<option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="friday" id="friday" >
                                            <label class="form-check-label" for="friday">Friday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="friday_from" id="friday_from" class="select2 form-select">
                                                        <option value="">From</option>
														<option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
														<option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="friday_to" id="friday_to" class="select2 form-select">
                                                        <option value="">To</option>
														<option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
														<option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="saturday" id="saturday" >
                                            <label class="form-check-label" for="saturday">Saturday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="saturday_from" id="saturday_from" class="select2 form-select">
                                                        <option value="">From</option>
														<option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
														<option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="saturday_to" id="saturday_to" class="select2 form-select">
                                                        <option value="">To</option>
														<option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
														<option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" name="days[]" value="sunday" id="sunday" >
                                            <label class="form-check-label" for="sunday">Sunday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="sunday_from" id="sunday_from" class="select2 form-select">
                                                        <option value="">From</option>
														<option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
														<option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="sunday_to" id="sunday_to" class="select2 form-select">
                                                        <option value="">To</option>
														<option value="07:30 am">07:30 am</option>
                                                        <option value="08:00 am">08:00 am</option>
														<option value="08:30 am">08:30 am</option>
                                                        <option value="09:00 am">09:00 am</option>
                                                        <option value="09:30 am">09:30 am</option>
                                                        <option value="10:00 am">10:00 am</option>
                                                        <option value="10:30 am">10:30 am</option>
                                                        <option value="11:00 am">11:00 am</option>
                                                        <option value="11:30 am">11:30 am</option>
                                                        <option value="12:00 pm">12:00 pm</option>
                                                        <option value="12:30 pm">12:30 pm</option>
                                                        <option value="01:00 pm">01:00 pm</option>
                                                        <option value="01:30 pm">01:30 pm</option>
                                                        <option value="02:00 pm">02:00 pm</option>
                                                        <option value="02:30 pm">02:30 pm</option>
                                                        <option value="03:00 pm">03:00 pm</option>
                                                        <option value="03:30 pm">03:30 pm</option>
                                                        <option value="04:00 pm">04:00 pm</option>
                                                        <option value="04:30 pm">04:30 pm</option>
                                                        <option value="05:00 pm">05:00 pm</option>
                                                        <option value="05:30 pm">05:30 pm</option>
                                                        <option value="06:00 pm">06:00 pm</option>
                                                        <option value="06:30 pm">06:30 pm</option>
                                                        <option value="07:00 pm">07:00 pm</option>
                                                        <option value="07:30 pm">07:30 pm</option>
                                                        <option value="08.00 pm">08:00 pm</option>
                                                        <option value="08:30 pm">08:30 pm</option>
                                                        <option value="09:00 pm">09:00 pm</option>
                                                        <option value="09:30 pm">09:30 pm</option>
                                                        <option value="10:00 pm">10:00 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header ">
                                <h5 class="mb-0">Delivery Hours</h5>
                            </div>
                            <div class="card-body">
                                <form id="formPrice" method="POST" onsubmit="return false">
                                    <div class="row">
                                        <div class="mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" value="" id="monday2">
                                            <label class="form-check-label" for="monday2">Monday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="deliveryFrom" id="deliveryFrom" class="select2 form-select">
                                                        <option value="">From</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="deliveryTo" id="deliveryTo" class="select2 form-select">
                                                        <option value="">To</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" value="" id="tuesday2" >
                                            <label class="form-check-label" for="tuesday2">Tuesday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="deliveryFrom1" id="deliveryFrom1" class="select2 form-select">
                                                        <option value="">From</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="deliveryTo1" id="deliveryTo1" class="select2 form-select">
                                                        <option value="">To</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" value="" id="wednesday2" >
                                            <label class="form-check-label" for="wednesday2">Wednesday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="deliveryFrom2" id="deliveryFrom2" class="select2 form-select">
                                                        <option value="">From</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="deliveryTo2" id="deliveryTo2" class="select2 form-select">
                                                        <option value="">To</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" value="" id="thursday2" >
                                            <label class="form-check-label" for="thursday2">Thursday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="deliveryFrom3" id="deliveryFrom3" class="select2 form-select">
                                                        <option value="">From</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="deliveryTo3" id="deliveryTo3" class="select2 form-select">
                                                        <option value="">To</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" value="" id="friday2" >
                                            <label class="form-check-label" for="friday2">Friday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="deliveryFrom4" id="deliveryFrom4" class="select2 form-select">
                                                        <option value="">From</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="deliveryTo4" id="deliveryTo4" class="select2 form-select">
                                                        <option value="">To</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" value="" id="saturday2" >
                                            <label class="form-check-label" for="saturday2">Saturday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="deliveryFrom5" id="deliveryFrom5" class="select2 form-select">
                                                        <option value="">From</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="deliveryTo5" id="deliveryTo5" class="select2 form-select">
                                                        <option value="">To</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" mb-3 col-md-6 form-check" style="padding-left: 50px">
                                            <input class="form-check-input" type="checkbox" value="" id="sunday2" >
                                            <label class="form-check-label" for="sunday2">Sunday</label>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <div class="row ">
                                                <div class="col-md-6">
                                                    <select name="deliveryFrom6" id="deliveryFrom6" class="select2 form-select">
                                                        <option value="">From</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="deliveryTo6" id="deliveryTo6" class="select2 form-select">
                                                        <option value="">To</option>
                                                        <option value="08am">08 am</option>
                                                        <option value="09 am">09 am</option>
                                                        <option value="10 am">10 am</option>
                                                        <option value="11 am">11 am</option>
                                                        <option value="12 pm">12 pm</option>
                                                        <option value="01 pm">01 pm</option>
                                                        <option value="02 pm">02 pm</option>
                                                        <option value="03 pm">03 pm</option>
                                                        <option value="04 pm">04 pm</option>
                                                        <option value="05 pm">05 pm</option>
                                                        <option value="06 pm">06 pm</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
