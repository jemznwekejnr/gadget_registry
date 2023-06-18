@include("layouts.app-title")
@include("layouts.app-header")
@include("layouts.app-sidebar")
!--**********************************
   Content body start
***********************************-->
<div class="content-body" style="margin-top: -17px;">
   <!-- row -->	
<div class="page-titles">
	<ol class="breadcrumb">
		<li><h5 class="bc-title">Dashboard</h5></li>
		<li class="breadcrumb-item"><a href="javascript:void(0)">
			<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			Home </a>
		</li>
		<li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
	</ol>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-9 col-sm-9 col-md-9 wid-100">


			<div class="row">
				<!--Start-->
				<div class="col-xl-12 col-lg-12">
					<div class="card">
						<div class="card-header">
						<div class="col-xl-12">
							<div class="row">
								<div class="col-xl-11">
									<h4 class="card-title">Searched History</h4>
								</div>
								<div class="col-xl-1">
									
								</div>
							</div>
						</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table-stripped table" id="example">
									<thead>
										<tr>
										  <th>SN</th>
										  <th>Search Level</th>
								        <th>Serial No/IMEI</th>
								        <th>Device Category</th>
								        <th>Manufacturer</th>
								        <th>Model</th>
								        <th>Year of Manufacture</th>
								        <th>Registration Date</th>
								        <th>Device Status</th>
								        <th>Search Location</th>
								        <th>Search Date</th>
								        <th>Device Owner</th>
								        <th>Search Status</th>
								        <th>Action</th>
										</tr>
									</thead>
									<tbody>
										@php $x=1 @endphp
										@foreach($historys as $history)
										<tr>
										  <td>{{ $x++ }}</td>
										  <td>{{ $history->searchlevel }}</td>
								        <td>{{ $history->serialno }}</td>
								        <td>{{ $history->type }}</td>
								        <td>{{ $history->manufacturer }}</td>
								        <td>{{ $history->model }}</td>
								        <td>{{ $history->manufactureyear }}</td>
								        <td>{{ $history->registrationyear }}</td>
								        <td>{{ $history->devicestatus }}</td>
								        <td>{{ $history->searchlocation }}</td>
								        <td>{{ $history->created_at }}</td>
								        <td>@if($history->searchstatus == 'Found'){{ app\Http\Controllers\Controller::username($history->owner) }}@endif</td>
								        <td>
								        	@if($history->searchstatus == 'Found')
								        	<button type="button" class="btn btn-danger btn-sm">{{ $history->searchstatus }}</button>
								        @else
								     		<button type="button" class="btn btn-primary btn-sm">{{ $history->searchstatus }}</button>
								     		@endif
								     		</td>
								        <td>@if($history->searchstatus == 'Found')<a href="{{ url('profile/'.$history->deviceid) }}">View Device</a>@endif</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!--End-->
			</div>



		</div>
				<div id="results">
					
				</div>

<!--**********************************
   Content body end
***********************************-->
@include("layouts.app-footer")