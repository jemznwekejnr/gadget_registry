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
		<li><h5 class="bc-title">Gadgets</h5></li>
		<li class="breadcrumb-item"><a href="javascript:void(0)">
			<svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			Device </a>
		</li>
		<li class="breadcrumb-item active"><a href="javascript:void(0)">All Device</a></li>
	</ol>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12 col-sm-12 col-md-12 wid-100">
			<div class="row">

				<div class="col-xl-12 col-md-12 col-lg-12">
				<div class="card">
					<div class="card-body pt-0">
						<!-- Nav tabs -->
						<div class="custom-tab-1">
							<!-- Content -->
							<div class="tab-content">
								<div class="tab-pane fade show active" id="home1" role="tabpanel">
									<div class="pt-4">
										<h4>Showing All Registered Device</h4>
										<div class="row">
											<!--Table-->
											<div class="col-xl-6 col-md-6 active-p">
												<div class="card">
													<div class="card-body p-0">
														<div class="table-responsive active-projects">
														<div class="tbl-caption">
															<!--<h4 class="heading mb-0">Table Showing All Registered Device</h4>-->
														</div>
															<table id="example" class="table example table-striped">
																<thead>
																	<tr>
																		<th>SN</th>
																		<th>Category</th>
																		<th>Manufacturer</th>
																		<th>Model</th>
																		<th>Year</th>
																		<th>Serial No</th>
																		<th>Purchase Date</th>
																		<th>Owner</th>
																		<th>Status</th>
																		<th>Created At</th>
																		<th>Action</th>
																	</tr>
																</thead>
																<tbody>
																	@isset($gadgets)
																	@php $x=1 @endphp
																	@foreach($gadgets as $gadget)
																	<tr>
																		<td>{{ $x++ }}</td>
																		<td>{{ app\Http\Controllers\Controller::typename($gadget->type) }}</td>
																		<td>{{ app\Http\Controllers\Controller::manufacturername($gadget->manufacturer) }}</td>
																		<td>{{ $gadget->model }}</td>
																		<td>{{ $gadget->year }}</td>
																		<td>{{ $gadget->serialno }}</td>
																		<td>{{ $gadget->purchasedate }}</td>
																		<td>{{ app\Http\Controllers\Controller::username($gadget->owner) }}</td>
																		<td>@if($gadget->status == 'In Use')
													                  <button type="button" class="btn btn-success btn-round btn-sm" style="margin-top: 20px;">{{ $gadget->status }}</button>
													                  @elseif($gadget->status == 'Sold')
													                  <button type="button" class="btn btn-info btn-round btn-sm" style="margin-top: 20px;">{{ $gadget->status }}</button>
													                  @elseif($gadget->status == 'Damaged')
													                  <button type="button" class="btn btn-warning btn-round btn-sm" style="margin-top: 20px;">{{ $gadget->status }}</button>
													                  @else
													                  <button type="button" class="btn btn-danger btn-round btn-sm" style="margin-top: 20px;">{{ $gadget->status }}</button>
													                  @endif
													               </td>
																		<td>{{ $gadget->created_at }}</td>
																		<td>
																			
																			<a href="{{ url('/gadgets/profile/'.$gadget->id) }}" class="editgadget" id="{{ $gadget->type }}"><svg title="Click to edit row" class="vouchericon" id="editrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Z"/></svg></a>

																			<a href="{{ $gadget->id }}" class="deletegadget" id="{{ $gadget->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg></a>

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
@include("gadgets.process")