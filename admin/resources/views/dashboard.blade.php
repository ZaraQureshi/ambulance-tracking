<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/script.js') }}"></script>
@include('navigation-dropdown')  
<div class="row">
  <div class="col-md-2">
    @include('sidebar')
  </div>
  
  <div class="col-md-10">
    <div class="container-fluid">
      <div class="row no-gutters" style="width:100%">
        <div class="col-md-12">
          <div class="card text-white bg-primary " style="width: 100%;">
            <div class="card-body">
              <p class="card-text">Hello, Welcome Admin.</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row ">
        <div class="col-sm-2 ">
          
        </div>
        <div class="col-sm-4">
          <div class="card my-3" style="width:100%">
            <div class="card-header text-white bg-warning">
              Driver
            </div>
            <div class="card-body">
              <a href="driver_show">Show driver</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card my-3" style="width:100%">
            <div class="card-header text-white bg-info">
              Hospital
            </div>
            <div class="card-body">
              <a href="hospital_show">Show hospital</a>
            </div>
          </div>
        </div>
        <div class="col-sm-2 ">
          
        </div>
        
      </div>
    </div>
  </div>
</div>