@include("layouts.app-title")
@include("layouts.app-header")
@include("layouts.app-sidebar")
!--**********************************
   Content body start
***********************************-->
<body>
<!--start page wrapper -->
<div class="page-wrapper"style="margin-left: 0px;">
	<div class="page-content">
		<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Device</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0" style="background-color: transparent;">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-user"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Device Profile</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
		<div class="row">
		       <div class="col-12 col-lg-12">
		          <div class="card radius-10">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<div>
							<h6 class="mb-0" id="button">Device Information</h6>
						</div>
						<img src="{{ asset('assets/images/processing.gif') }}" width="50px;" id="processing" class="processing" style="display: none;">
						<div class="dropdown ms-auto">
							<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
							</a>
							
						</div>
					</div>
				</div>
				  <div class="card-body">
				  	<div class="form-body">
					 <form class="row g-3">
					 	<div class="col-sm-4">
					 	<center>



					 	<!--image upload starts here--->
	                	<div class="fileinput fileinput-new text-center" data-provides="fileinput">
	                    <div class="fileinput-new border-gray">
	                      <img src="@if(!is_null($gadgets[0]->picture)) {{ asset($gadgets[0]->picture) }} @else {{ asset('assets/images/default-avatar.png') }} @endif" width="250px" alt="...">
	                    </div>
	                    <div class="fileinput-preview fileinput-exists avatar border-gray">
	                      <img src="@if(!is_null($gadgets[0]->picture)) {{ asset($gadgets[0]->picture) }} @else {{ asset('assets/images/default-avatar.png') }} @endif" width="250px" alt="...">
	                    </div>
	                    <div>
	                    	
	                      <!--<span class="btn btn-round btn-rose btn-file">
	                        <span class="fileinput-new">Add Photo</span>
	                        <span class="fileinput-exists">Change</span>
	                        <input type="file" name="pics" id="pics" />
	                      </span>
	                      <br />
	                      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>-->
	                    </div>
	                    <p><b>{{ $gadgets[0]->manufacturer }}</b> {{ $gadgets[0]->type }}</p>
	                  </div><br /><br />

	                  <a href="{{ $gadgets[0]->ownersproof }}" class="btn btn-info btn-round">Download Proof of Ownership</a><br /><br />

	                  @if($gadgets[0]->status == 'In Use')
	                  <button type="button" class="btn btn-success btn-round btn-md" style="margin-top: 20px;">{{ $gadgets[0]->status }}</button>
	                  @elseif($gadgets[0]->status == 'Sold')
	                  <button type="button" class="btn btn-info btn-round btn-md" style="margin-top: 20px;">{{ $gadgets[0]->status }}</button>
	                  @elseif($gadgets[0]->status == 'Damaged')
	                  <button type="button" class="btn btn-warning btn-round btn-md" style="margin-top: 20px;">{{ $gadgets[0]->status }}</button>
	                  @else
	                  <button type="button" class="btn btn-danger btn-round btn-md" style="margin-top: 20px;">{{ $gadgets[0]->status }}</button>
	                  @endif




					 		
						</center>
					 	</div>
					 	<div class="col-sm-8" style="padding-left: 50px;">
					 	<div style="border-top: solid 2px; margin: 20px 0px;"></div>
					 	<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Device Owner</label>
								<p id="fname">{{ $gadgets[0]->owner }}</p>
							</div>
						</div><br />
					 	<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Type</label>
								<p id="fname">{{ $gadgets[0]->type }}</p>
							</div>
						</div><br />
						<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Manufacturer</label>
								<p id="email">{{ $gadgets[0]->manufacturer }}</p>
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
								<p id="department">{{ $gadgets[0]->created_by }}</p>
							</div>
						</div><br />
						<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Registered On</label>
								<p id="department">{{ $gadgets[0]->created_at }}</p>
							</div>
						</div><br />
						@if(!empty($gadgets[0]->updated_at))
						<div class="row">
						 	<div class="col-sm-12">
								<label for="inputFirstName" class="form-label">Last Updated By</label>
								<p id="department">{{ $gadgets[0]->updated_by }}</p>
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
						</div>
					 </form>
					 </div>
				  </div>
			  </div>
		   </div>
		</div>
	</div>
</div>
<!--end page wrapper -->
@include("layouts.app-footer")