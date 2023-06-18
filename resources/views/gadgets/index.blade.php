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

				<div class="row">
				<!--Start-->
				<div class="col-xl-3 col-lg-3">
					<div class="card alert alert-info">
						<div class="card-header">
							<h4 class="card-title" style="font-size: 24px;">{{ $total }}</h4>
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 48 48">
<linearGradient id="Om5yvFr6YrdlC0q2Vet0Ha_WWogVNJDSfZ5_gr1" x1="-7.018" x2="39.387" y1="9.308" y2="33.533" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fac017"></stop><stop offset=".909" stop-color="#e1ab2d"></stop></linearGradient><path fill="url(#Om5yvFr6YrdlC0q2Vet0Ha_WWogVNJDSfZ5_gr1)" d="M44.5,41h-41C2.119,41,1,39.881,1,38.5v-31C1,6.119,2.119,5,3.5,5h11.597	c1.519,0,2.955,0.69,3.904,1.877L21.5,10h23c1.381,0,2.5,1.119,2.5,2.5v26C47,39.881,45.881,41,44.5,41z"></path><linearGradient id="Om5yvFr6YrdlC0q2Vet0Hb_WWogVNJDSfZ5_gr2" x1="5.851" x2="18.601" y1="9.254" y2="27.39" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fbfef3"></stop><stop offset=".909" stop-color="#e2e4e3"></stop></linearGradient><path fill="url(#Om5yvFr6YrdlC0q2Vet0Hb_WWogVNJDSfZ5_gr2)" d="M2,25h20V11H4c-1.105,0-2,0.895-2,2V25z"></path><linearGradient id="Om5yvFr6YrdlC0q2Vet0Hc_WWogVNJDSfZ5_gr3" x1="2" x2="22" y1="19" y2="19" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fbfef3"></stop><stop offset=".909" stop-color="#e2e4e3"></stop></linearGradient><path fill="url(#Om5yvFr6YrdlC0q2Vet0Hc_WWogVNJDSfZ5_gr3)" d="M2,26h20V12H4c-1.105,0-2,0.895-2,2V26z"></path><linearGradient id="Om5yvFr6YrdlC0q2Vet0Hd_WWogVNJDSfZ5_gr4" x1="16.865" x2="44.965" y1="39.287" y2="39.792" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#e3a917"></stop><stop offset=".464" stop-color="#d79c1e"></stop></linearGradient><path fill="url(#Om5yvFr6YrdlC0q2Vet0Hd_WWogVNJDSfZ5_gr4)" d="M1,37.875V38.5C1,39.881,2.119,41,3.5,41h41c1.381,0,2.5-1.119,2.5-2.5v-0.625H1z"></path><linearGradient id="Om5yvFr6YrdlC0q2Vet0He_WWogVNJDSfZ5_gr5" x1="-4.879" x2="35.968" y1="12.764" y2="30.778" gradientUnits="userSpaceOnUse"><stop offset=".34" stop-color="#ffefb2"></stop><stop offset=".485" stop-color="#ffedad"></stop><stop offset=".652" stop-color="#ffe99f"></stop><stop offset=".828" stop-color="#fee289"></stop><stop offset="1" stop-color="#fed86b"></stop></linearGradient><path fill="url(#Om5yvFr6YrdlC0q2Vet0He_WWogVNJDSfZ5_gr5)" d="M44.5,11h-23l-1.237,0.824C19.114,12.591,17.763,13,16.381,13H3.5C2.119,13,1,14.119,1,15.5	v22C1,38.881,2.119,40,3.5,40h41c1.381,0,2.5-1.119,2.5-2.5v-24C47,12.119,45.881,11,44.5,11z"></path><radialGradient id="Om5yvFr6YrdlC0q2Vet0Hf" cx="37.836" cy="49.317" r="53.875" gradientUnits="userSpaceOnUse"><stop offset=".199" stop-color="#fec832"></stop><stop offset=".601" stop-color="#fcd667"></stop><stop offset=".68" stop-color="#fdda75"></stop><stop offset=".886" stop-color="#fee496"></stop><stop offset="1" stop-color="#ffe8a2"></stop></radialGradient><path fill="url(#undefined)" d="M44.5,40h-41C2.119,40,1,38.881,1,37.5v-21C1,15.119,2.119,14,3.5,14h13.256	c1.382,0,2.733-0.409,3.883-1.176L21.875,12H44.5c1.381,0,2.5,1.119,2.5,2.5v23C47,38.881,45.881,40,44.5,40z"></path>
</svg>
						</div>
						<div class="card-body">
							All Time Registered Device
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-lg-3">
					<div class="card alert alert-success">
						<div class="card-header">
							<h4 class="card-title" style="font-size: 24px;">{{ $inuse }}</h4>
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 48 48">
<linearGradient id="HoiJCu43QtshzIrYCxOfCa_VFaz7MkjAiu0_gr1" x1="21.241" x2="3.541" y1="39.241" y2="21.541" gradientUnits="userSpaceOnUse"><stop offset=".108" stop-color="#0d7044"></stop><stop offset=".433" stop-color="#11945a"></stop></linearGradient><path fill="url(#HoiJCu43QtshzIrYCxOfCa_VFaz7MkjAiu0_gr1)" d="M16.599,41.42L1.58,26.401c-0.774-0.774-0.774-2.028,0-2.802l4.019-4.019	c0.774-0.774,2.028-0.774,2.802,0L23.42,34.599c0.774,0.774,0.774,2.028,0,2.802l-4.019,4.019	C18.627,42.193,17.373,42.193,16.599,41.42z"></path><linearGradient id="HoiJCu43QtshzIrYCxOfCb_VFaz7MkjAiu0_gr2" x1="-15.77" x2="26.403" y1="43.228" y2="43.228" gradientTransform="rotate(134.999 21.287 38.873)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#2ac782"></stop><stop offset="1" stop-color="#21b876"></stop></linearGradient><path fill="url(#HoiJCu43QtshzIrYCxOfCb_VFaz7MkjAiu0_gr2)" d="M12.58,34.599L39.599,7.58c0.774-0.774,2.028-0.774,2.802,0l4.019,4.019	c0.774,0.774,0.774,2.028,0,2.802L19.401,41.42c-0.774,0.774-2.028,0.774-2.802,0l-4.019-4.019	C11.807,36.627,11.807,35.373,12.58,34.599z"></path>
</svg>
						</div>
						<div class="card-body">
							Currently in Use
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-lg-3">
					<div class="card alert alert-danger">
						<div class="card-header">
							<h4 class="card-title" style="font-size: 24px;">{{ $stolen }}</h4>
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 48 48">
<linearGradient id="hbE9Evnj3wAjjA2RX0We2a_OZuepOQd0omj_gr1" x1="7.534" x2="27.557" y1="7.534" y2="27.557" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#f44f5a"></stop><stop offset=".443" stop-color="#ee3d4a"></stop><stop offset="1" stop-color="#e52030"></stop></linearGradient><path fill="url(#hbE9Evnj3wAjjA2RX0We2a_OZuepOQd0omj_gr1)" d="M42.42,12.401c0.774-0.774,0.774-2.028,0-2.802L38.401,5.58c-0.774-0.774-2.028-0.774-2.802,0	L24,17.179L12.401,5.58c-0.774-0.774-2.028-0.774-2.802,0L5.58,9.599c-0.774,0.774-0.774,2.028,0,2.802L17.179,24L5.58,35.599	c-0.774,0.774-0.774,2.028,0,2.802l4.019,4.019c0.774,0.774,2.028,0.774,2.802,0L42.42,12.401z"></path><linearGradient id="hbE9Evnj3wAjjA2RX0We2b_OZuepOQd0omj_gr2" x1="27.373" x2="40.507" y1="27.373" y2="40.507" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#a8142e"></stop><stop offset=".179" stop-color="#ba1632"></stop><stop offset=".243" stop-color="#c21734"></stop></linearGradient><path fill="url(#hbE9Evnj3wAjjA2RX0We2b_OZuepOQd0omj_gr2)" d="M24,30.821L35.599,42.42c0.774,0.774,2.028,0.774,2.802,0l4.019-4.019	c0.774-0.774,0.774-2.028,0-2.802L30.821,24L24,30.821z"></path>
</svg>
						</div>
						<div class="card-body">
							Misplaced/Stolen Device
						</div>
					</div>
				</div>

				<div class="col-xl-3 col-lg-3">
					<div class="card alert alert-warning">
						<div class="card-header">
							<h4 class="card-title" style="font-size: 24px;">{{ $sold }}</h4>
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 48 48">
<linearGradient id="nyvBozV7VK1PdF3LtMmOna_pre7LivdxKxJ_gr1" x1="18.405" x2="33.814" y1="10.91" y2="43.484" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#32bdef"></stop><stop offset="1" stop-color="#1ea2e4"></stop></linearGradient><path fill="url(#nyvBozV7VK1PdF3LtMmOna_pre7LivdxKxJ_gr1)" d="M39,10l-2.835,31.181C36.072,42.211,35.208,43,34.174,43H13.826	c-1.034,0-1.898-0.789-1.992-1.819L9,10H39z"></path><path fill="#0176d0" d="M32,7c0-1.105-0.895-2-2-2H18c-1.105,0-2,0.895-2,2c0,0,0,0.634,0,1h16C32,7.634,32,7,32,7z"></path><path fill="#007ad9" d="M7,9.886L7,9.886C7,9.363,7.358,8.912,7.868,8.8C10.173,8.293,16.763,7,24,7s13.827,1.293,16.132,1.8	C40.642,8.912,41,9.363,41,9.886v0C41,10.501,40.501,11,39.886,11H8.114C7.499,11,7,10.501,7,9.886z"></path>
</svg>
						</div>
						<div class="card-body">
							Sold/Damaged Deviced
						</div>
					</div>
				</div>
				<!--End-->
			</div>

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