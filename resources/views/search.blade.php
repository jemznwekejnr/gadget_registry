@include("layouts.app-title")
<!--**********************************
   Content body start
***********************************-->
<div class="content-body" style="margin-top: -50px; margin-left: 0px; background-image: url('assets/images/bgimages.jpeg'); background-size: cover; background-repeat: no-repeat;">
   <!-- row -->	
<div class="page-titles" style="padding-top: 20px;">
	<ol class="breadcrumb">
		<li><h5 class="bc-title"><img src="{{ asset('assets/images/jarvis-logo.png') }}" width="150px"></h5></li>
	</ol>
	<a href="{{ url('login') }}" class="btn btn-sm btn-rounded btn-primary float-right">Login</a>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12 col-sm-12 col-md-12 wid-100">
			<div class="row">
				<!--Start-->
				<div class="col-xl-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Before you buy, search here to make sure this device is not a stolen item.</h4>
						</div>
						<div class="card-body">
							<div class="basic-form">
								<form action="submitsearch" method="post" id="submitsearch">
									@csrf
									<div class="row">
										<div class="col-xl-3 col-md-3">
											<div class="mb-3">
												<select name="type" class="form-control input-rounded" id="type" required>
													<option value="" selected disabled>Select Type</option>
													@foreach($types as $type)
													<option value="{{ $type->id }}">{{ $type->type }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-xl-4 col-md-4">
											<div class="mb-3">
												<select name="manufacturer" class="form-control input-rounded" id="manufacturer" required>
													<option value="" selected disabled>Select Manufacturer</option>
													@foreach($manufacturers as $manufacturer)
													<option value="{{ $manufacturer->id }}">{{ $manufacturer->manufacturer }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-xl-4 col-md-4">
											<div class="mb-3">
												<input type="text" class="form-control input-rounded" name="serialno" id="serialno" placeholder="Serial No">
											</div>
										</div>
										<div class="col-xl-1 col-md-1 text-right float-right">
											<div class="mb-6">
												<button type="submit" id="button" class="btn btn-primary btn-sm btn-rounded">Search</button>
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
				<div id="results">
					
				</div>

<!--**********************************
   Content body end
***********************************-->
@include("layouts.app-footer")