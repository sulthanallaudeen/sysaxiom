@extends('layout.login')
@section('content')
<!-- Form area -->
<div class="admin-form">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <!-- Widget starts -->
            <div class="widget worange">
              <!-- Widget head -->
              <div class="widget-head">
                <i class="icon-lock"></i> Login 
              </div>

              <div class="widget-content">
                <div class="padd">
                  <!-- Login form -->
                  {!! Form::open(array('url' => 'authAdmin', 'name' => 'loginForm', 'class' => 'form-horizontal'))!!}
				          <!-- Error Mesage -->
                    <!-- Email -->
					
					@if(Session::has('warning'))
					<div class="alert alert-danger">
						<h2>{{ Session::get('warning') }}</h2>
					</div>
				@endif
					
					
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputEmail">Email</label>
                      <div class="col-lg-9">
                        <input type="email" value='' class="form-control" name="email"  placeholder="Email">
						
                          
                      </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">Password</label>
                      <div class="col-lg-9">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                      </div>
                    </div>
                    <!-- Remember me checkbox and sign in button -->
                    <div class="form-group">
					<div class="col-lg-9 col-lg-offset-3">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Remember me
                        </label>
						</div>
					</div>
					</div>
                        <div class="col-lg-9 col-lg-offset-2">
							<button type="submit" class="btn btn-danger" >Sign in</button>
							<button type="reset" class="btn btn-default">Reset</button>
						</div>
                    <br />
                  {!! Form::close() !!}
				  
				</div>
                </div>
              
                
            </div>  
      </div>
    </div>
  </div> 
</div>
	
@stop