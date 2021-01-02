@include('navigation-dropdown')

	<div class="row">
		<div class="col-md-2">
			@include('sidebar')
		</div>
		
		<div class="col-md-10">
			<div class="container-fluid">
				<form method="POST" action="{{route('hospital.update',[$hosp->id])}}">
					@csrf
					<div class="form-group">
						<label >Name</label>
						<input type="text" class="form-control" id="name" name="name"value="{{$hosp->h_name}}" required>
					</div>
					<div class="form-group">
						<label >Lat</label>
						<input type="text" class="form-control" id="name" name="lat"value="{{$hosp->h_latitude}}" required>
					</div>
					<div class="form-group">
						<label >Long</label>
						<input type="text" class="form-control" id="name" name="long"value="{{$hosp->h_longitude}}" required>
					</div>
					<button type="submit" name="profileSubmit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>