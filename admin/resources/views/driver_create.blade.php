@include('navigation-dropdown')

	<div class="row">
		<div class="col-md-2">
			@include('sidebar')
		</div>
		
		<div class="col-md-10">
			<div class="container-fluid">

				<form method="POST" action="driver_submit">
					@csrf
					<div class="form-group">
						<label >Name</label>
						<input type="text" class="form-control" id="name" name="name"value="" required>
					</div>
					<div class="form-group">
						<label >Lat</label>
						<input type="text" class="form-control" id="name" name="lat"value="" required>
					</div>
					<div class="form-group">
						<label >Long</label>
						<input type="text" class="form-control" id="name" name="long"value="" required>
					</div>
					<div class="form-group">
						<label >Password</label>
						<input type="password" class="form-control" id="name" name="password"value="" required>
					</div>
					<div class="form-group">
						<label >Contact</label>
						<input type="text" class="form-control" id="name" name="contact"value="" required>
					</div>
					<div class="form-group">
						<label >Email</label>
						<input type="text" class="form-control" id="name" name="email"value="" required>
					</div>

					<button type="submit" name="profileSubmit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>