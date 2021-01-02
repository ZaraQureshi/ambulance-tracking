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
	
				<button class="btn btn-primary"><a href="hospital_create" style="color:white;">create</a></button>
				<table class="table table-hover" style="text-align: center;">
					<thead>
						<tr>
						
						<th scope="col">Name</th>
						<th scope="col">Longitude</th>
						<th scope="col">Latitude</th>
						<th scope="col">Created_at</th>
						<th scope="col">Action</th>
						</tr>
					</thead>
					@foreach($hosp as $h)
					<tbody>
						<tr>
						
						<td>{{$h->h_name}}</td>
						<td>{{$h->h_latitude}}</td>
						<td>{{$h->h_longitude}}</td>
						<td>{{$h->created_at}}</td>
						<td><button class="btn btn-danger"><a href="hospital_delete/{{$h->id}}" style="color:white;">Delete</a></button> <button class="btn btn-primary"><a href="hosp_edit/{{$h->id}}" style="color:white;">Edit</a></button></td>
						
						</tr>
						
					</tbody>
					@endforeach
				</table>
			</div>
		</div>
	</div>