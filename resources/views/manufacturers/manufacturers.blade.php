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
		<li><h5 class="bc-title">Device</h5></li>
		<li class="breadcrumb-item"><a href="javascript:void(0)">
			<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			Manufacturers </a>
		</li>
		<li class="breadcrumb-item active"><a href="javascript:void(0)">Device Manufacturers</a></li>
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
							<h4 class="card-title">Regisger New Manufacturer</h4>
						</div>
						<div class="card-body">
							<div class="basic-form">
								<form action="manufacturer/store" method="post" id="submitmanufacturer">
									@csrf
									<div class="row">
										<div class="col-xl-4 col-md-4">
											<div class="mb-3">
												<input type="hidden" name="manufacturerid" value="">
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
												<input type="hidden" name="typeid" value="">
												<input type="text" class="form-control input-rounded" name="manufacturer" id="manufacturer" placeholder="Enter Manufacturer">
											</div>
										</div>
										<div class="col-xl-4 col-md-4 float-right text-right">
											<div class="mb-6">
												<button type="submit" id="button" class="btn btn-primary btn-sm btn-rounded">Submit</button>
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

				<div class="col-xl-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="card-body pt-0">
						<!-- Nav tabs -->
						<div class="custom-tab-1">
							<ul class="nav nav-tabs">
								<li class="nav-item">
									<a class="nav-link active" data-bs-toggle="tab" href="#home1"><i class="la la-line-chart me-2"></i> Gadget Types </a>
								</li>
							</ul>
							<!-- Content -->
							<div class="tab-content">
								<div class="tab-pane fade show active" id="home1" role="tabpanel">
									<div class="pt-4">
										<h4>Showing Registered Manufacturers of Devices</h4>
										<div class="row">
											<!--Table-->
											<div class="col-xl-6 col-md-6 active-p">
												<div class="card">
													<div class="card-body p-0">
														<div class="table-responsive active-projects">
														<div class="tbl-caption">
															<h4 class="heading mb-0">Table Showing All Manufacturers</h4>
														</div>
															<table id="example" class="table example table-striped">
																<thead>
																	<tr>
																		<th>SN</th>
																		<th>Types</th>
																		<th>Manufacturer</th>
																		<th>Total</th>
																		<th>Created At</th>
																		<th></th>
																	</tr>
																</thead>
																<tbody>
																	@isset($manufacturers)
																	@php $x=1 @endphp
																	@foreach($manufacturers as $manufacturer)
																	<tr>
																		<td>{{ $x++ }}</td>
																		<td>{{ $manufacturer->type }}</td>
																		<td>{{ $manufacturer->manufacturer }}</td>
																		<td>{{ app\Http\Controllers\Controller::totaltype($manufacturer->id) }}</td>
																		<td>{{ $manufacturer->created_at }}</td>
																		<td>
																			
																			<a href="{{ $manufacturer->id }}" class="manufacturertype" id="{{ $manufacturer->type }}"><svg title="Click to edit row" class="vouchericon" id="editrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Z"/></svg></a>

																			<a href="{{ $manufacturer->id }}" class="manufacturertype" id="{{ $manufacturer->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg></a>

																		</td>
																	</tr>
																	@endforeach
																	@endisset
																</tbody>
																
															</table>
														</div>
													</div>
												</div>
											</div>
											<!--End of Table-->


										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--End of Tabs-->
	
		</div>
	</div>

<!--**********************************
   Content body end
***********************************-->
@include("layouts.app-footer")
@include("process.dashboard")