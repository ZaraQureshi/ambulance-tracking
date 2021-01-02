@include('navigation-dropdown')

	<div class="row">
		<div class="col-md-2">
			@include('sidebar')
		</div>
		
		<div class="col-md-10">
			<div class="container-fluid">
			@if(session('msg'))
			<div class="alert alert-success" role="alert">
					{{session('msg')}}
				</div>
			@endif	
					
				
	
				<!-- <button class="btn btn-primary"><a href="driver_create" style="color:white;">create</a></button> -->
				<table class="table table-hover" style="text-align: center;">
				<thead>
					<tr>
					
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Longitude</th>
					<th scope="col">Latitude</th>
					<th scope="col">Contact</th>
					<th scope="col">Status</th>
					<th scope="col">User</th>
					
					<th scope="col">Action</th>
					</tr>
				</thead>
				@foreach($driverArr as $driver)
				<tbody>
					<tr>
					
					<td>{{$driver->d_name}}</td>
					<td>{{$driver->d_email}}</td>
					<td>{{$driver->d_latitude}}</td>
					<td>{{$driver->d_longitude}}</td>
					<td>{{$driver->d_contact}}</td>
					<td>{{$driver->status}}</td>
					<td>{{$driver->user}}</td>
					
					<td><button class="btn btn-danger"><a href="driver_delete/{{$driver->id}}" style="color:white;">Delete</a></button> <button class="btn btn-primary"><a href="driver_edit/{{$driver->id}}" style="color:white;">Edit</a></button></td>
					
					</tr>
					
				</tbody>
				@endforeach
				</table>
			</div>
		</div>
	</div>

	<!-- ///19.031309	72.8396001	 -->