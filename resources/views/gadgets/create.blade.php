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
							<h4 class="card-title">Register New Device</h4>
						</div>
						<div class="card-body">
							<div class="basic-form">
								<form action="/gadgets/store" method="post" id="submitgadget" enctype="multipart/form-data">
									@csrf
									<div class="row">
										<div class="col-xl-3 col-md-3">
											<div class="mb-3">
												<label>Device Category</label>
												<select name="type" class="form-control input-rounded" id="types" required>
													<option value="" selected disabled>Select Category</option>
													@foreach($types as $type)
													<option value="{{ $type->id }}">{{ $type->type }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-xl-4 col-md-4">
											<div class="mb-3">
												<label>Device Manufacturer</label>
												<select name="manufacturer" class="form-control input-rounded" id="manufacturers" required>
													<option value="" selected disabled>Select Manufacturer</option>
													@include('gadgets.manufacturers')
												</select>
											</div>
										</div>
										<div class="col-xl-3 col-md-3">
											<div class="mb-3">
												<label>Device Model</label>
												<input type="text" class="form-control input-rounded" name="model" id="model" placeholder="Enter Model No." required>
											</div>
										</div>
										<div class="col-xl-2 col-md-2">
											<div class="mb-3">
												<label>Year of Manufacture</label>
												<select class="form-control input-rounded" name="year" id="year" required>
													<option value="" selected disabled>Select Year</option>
													@for($i=date('Y')+1; $i >= 1990; $i--)
													<option>{{ $i }}</option>
													@endfor
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-3 col-md-3">
											<div class="mb-3">
												<label>Upload Device Image</label>
												<input type="file" class="form-control input-rounded" name="picture" id="picture" required>
											</div>
										</div>
										<div class="col-xl-4 col-md-4">
											<div class="mb-3">
												<label>Device Serial No</label>
												<input type="text" class="form-control input-rounded" name="serialno" id="serialno" placeholder="Enter Serial No or IMEI etc." required>
											</div>
										</div>
										<div class="col-xl-3 col-md-3">
											<div class="mb-3">
												<label>Upload Proof of Ownership</label>
												<input type="file" class="form-control input-rounded" name="proof" id="proof" required>
											</div>
										</div>
										<div class="col-xl-2 col-md-2">
											<div class="mb-3">
												<label>Date of Purchase</label>
												<input type="date" class="form-control input-rounded" name="purchasedate" id="purchasedate" required>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-4 col-md-4">
											<div class="mb-3">
												<label>IMEI 1</label>
												<input type="text" class="form-control input-rounded" name="imei1" id="serialno" placeholder="Enter Serial No or IMEI etc.">
											</div>
										</div>
										<div class="col-xl-4 col-md-4">
											<div class="mb-3">
												<label>IMEI 2</label>
												<input type="text" class="form-control input-rounded" name="imei2" id="serialno" placeholder="Enter Serial No or IMEI etc.">
											</div>
										</div>
										<div class="col-xl-4 col-md-4"  style="text-align: right;">
											<div class="mb-3">
												<button type="submit" id="button" class="btn btn-primary btn-md btn-rounded">Submit</button>
												<img src="{{ asset('assets/images/processing.gif') }}" width="50px;" id="processing" class="processing" style="display: none;">
											</div>
										</div>
									</div>
								</form>
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