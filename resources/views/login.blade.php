@extends('template')
@section('main')
<div class="login-container">
<div class="container-fluid as-full">
  <div class="row as-full d-flex justify-content-center">
    <div class="col-5 align-self-center" >
      <div class="card">
  <div class="card-body">
    <h5 class="card-title"><i class="fa fa-utensils"></i> Login Admin</h5>
    <form>
  <div class="form-group">
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"><i class="iconinput fa fa-user"></i>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"><i class="iconinput fa fa-keyboard"></i>
  </div>
  <button type="submit" class="col-md-12 btn btn-primary">Login</button>
</form>
  </div>
</div>
      
    </div>
    
  </div>
</div>
</div>
@endsection
