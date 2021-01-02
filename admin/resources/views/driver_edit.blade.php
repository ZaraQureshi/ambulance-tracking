@include('navigation-dropdown')

	<div class="row">
		<div class="col-md-2">
			@include('sidebar')
		</div>
		
		<div class="col-md-10">
			<div class="container-fluid">

				<form method="POST" action="{{route('driver.update',[$driverArr->id])}}">
					@csrf
					<div class="form-group">
						<label >Name</label>
						<input type="text" class="form-control" id="name" name="name"value="{{$driverArr->d_name}}" required>
					</div>
					<div class="form-group">
						<label >Lat</label>
						<input type="text" class="form-control" id="name" name="lat"value="{{$driverArr->d_latitude}}" required>
					</div>
					<div class="form-group">
						<label >Long</label>
						<input type="text" class="form-control" id="name" name="long"value="{{$driverArr->d_longitude}}" required>
					</div>
					
					<div class="form-group">
						<label >Contact</label>
						<input type="text" class="form-control" id="name" name="contact"value="{{$driverArr->d_contact}}" required>
					</div>
					<div class="form-group">
						<label >Email</label>
						<input type="text" class="form-control" id="name" name="email"value="{{$driverArr->d_email}}" required>
					</div>

					<button type="submit" name="profileSubmit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>