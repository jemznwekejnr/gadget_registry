<div class="card">
<div class="card-body pt-0">
<!-- Nav tabs -->
<div class="custom-tab-1">
	
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
												<td>{{ app\Http\Controllers\Controller::typename($manufacturer->type) }}</td>
												<td>{{ $manufacturer->manufacturer }}</td>
												<td>{{ app\Http\Controllers\Controller::totaltype($manufacturer->id) }}</td>
												<td>{{ $manufacturer->created_at }}</td>
												<td>
													
													<a href="{{ $manufacturer->id }}" class="editmanufacturer" id="{{ $manufacturer->type }}" title="{{ $manufacturer->manufacturer }}"><svg title="Click to edit row" class="vouchericon" id="editrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m19.3 8.925l-4.25-4.2l1.4-1.4q.575-.575 1.413-.575t1.412.575l1.4 1.4q.575.575.6 1.388t-.55 1.387L19.3 8.925ZM17.85 10.4L7.25 21H3v-4.25l10.6-10.6l4.25 4.25Z"/></svg></a>

													<a href="{{ $manufacturer->id }}" class="deletemanufacturer" id="{{ $manufacturer->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg></a>

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
<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>