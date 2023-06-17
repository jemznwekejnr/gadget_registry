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
							<div class="row g-3">
								<div class="col-sm-12">
									<h3 class="card-title">Registered Device Properties</h3>
								</div>
								
							</div>
						</div>
						<div class="card-body">
							<div class="basic-form">
								<div class="row g-3">
					 	<div class="col-sm-4">
					 	<center>


					 		<!--image upload starts here--->
	                	<div class="fileinput fileinput-new text-center" data-provides="fileinput">
	                    <div class="fileinput-new border-gray" style="margin-top: 15px;">
	                      <img src="@if(!is_null($gadgets[0]->picture)) {{ asset($gadgets[0]->picture) }} @else {{ asset('assets/images/default-avatar.png') }} @endif" width="250px" alt="...">
	                    </div>
	                    <div style="margin-top: 15px;">
	                    <h4><b>{{ app\Http\Controllers\Controller::manufacturername($gadgets[0]->manufacturer) }}</b> {{ $gadgets[0]->model }}</h4>
	                    </div>
	                  </div><br /><br />

	                  <a href="{{ asset($gadgets[0]->ownersproof) }}" target="_blank" class="btn btn-secondary btn-sm btn-round">View Proof of Ownership</a><br /><br />

	                  @if($gadgets[0]->status == 'In Use')
	                  <button type="button" class="btn btn-success btn-sm btn-round" style="margin-top: 20px;">{{ $gadgets[0]->status }}</button>
	                  @elseif($gadgets[0]->status == 'Sold')
	                  <button type="button" class="btn btn-info btn-sm btn-round" style="margin-top: 20px;">{{ $gadgets[0]->status }}</button>
	                  @elseif($gadgets[0]->status == 'Damaged')
	                  <button type="button" class="btn btn-warning btn-sm btn-round" style="margin-top: 20px;">{{ $gadgets[0]->status }}</button>
	                  @else
	                  <button type="button" class="btn btn-danger btn-sm btn-round" style="margin-top: 20px;">{{ $gadgets[0]->status }}</button>
	                  @endif
						</center>
					 	</div>
					 	<div class="col-sm-8" style="padding-left: 50px;">
					 	<div style="border-top: solid 2px; margin: 20px 0px;"></div>
					 	<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Device Owner</label>
								<p id="fname">{{ app\Http\Controllers\Controller::username($gadgets[0]->owner) }}</p>
							</div>
						</div><br />
					 	<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Type</label>
								<p id="fname">{{ app\Http\Controllers\Controller::typename($gadgets[0]->type) }}</p>
							</div>
						</div><br />
						<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Manufacturer</label>
								<p id="email">{{ app\Http\Controllers\Controller::manufacturername($gadgets[0]->manufacturer) }}</p>
							</div>
						</div><br />
						<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Model</label>
								<p id="phone">{{ $gadgets[0]->model }}</p>
							</div>
						</div><br />
						<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Year</label>
								<p id="onames">{{ $gadgets[0]->year }}</p>
							</div>
						</div><br />
						<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Serial No</label>
								<p id="doe">{{ $gadgets[0]->serialno }}</p>
							</div>
						</div><br />
						<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Date of Purchase</label>
								<p id="doe">{{ $gadgets[0]->purchasedate }}</p>
							</div>
						</div><br />
						<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Status</label>
								<p id="sname">{{ $gadgets[0]->status }}</p>
							</div>
						</div>
						<br />
						<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Registered By</label>
								<p id="department">{{ app\Http\Controllers\Controller::username($gadgets[0]->created_by) }}</p>
							</div>
						</div><br />
						<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Registered On</label>
								<p id="department">{{ $gadgets[0]->created_at }}</p>
							</div>
						</div><br />
						@if(!empty($gadgets[0]->updated_by))
						<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Last Updated By</label>
								<p id="department">{{ app\Http\Controllers\Controller::username($gadgets[0]->updated_by) }}</p>
							</div>
						</div><br />
						<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Last Updated On</label>
								<p id="phone">{{ $gadgets[0]->updated_at }}</p>
							</div>
						</div><br />
						@endif
					 	<div style="border-top: solid 2px; margin: 20px 0px;"></div>
					 	<div class="row">
					 	<div class="col-sm-9"></div>
					 	<div class="col-sm-3" style="text-align: right;">
							<a href="{{ url('/gadgets/edit/'.$gadgets[0]->id) }}" class="btn btn-primary btn-sm">Edit</a>
							<a href="{{ $gadgets[0]->id }}" class="btn btn-danger btn-sm" id="deletegadget">Delete</a>
							<img src="{{ asset('assets/images/processing.gif') }}" width="50px;" id="processing" class="processing" style="display: none;">
						</div>
						</div>
					 </div>
							</div>
						</div>
					</div>
				</div>
				<!--End-->
<!--**********************************
   Content body end
***********************************-->
@include("layouts.app-footer")
@include("gadgets.process")


