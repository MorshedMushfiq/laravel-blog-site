@include('admin.layouts.head')
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
							<img class="img-fluid" src="{{asset('asset/admin/img/logo-white.png')}}" alt="Logo">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								@if(Session::has('success'))
								<p class='alert alert-success'>{{session::get('success')}} <button class='close' data-dismiss='alert'>&times;</button> </p>
								@endif

								@if(Session::has('error'))
								<p class='alert alert-danger'>{{session::get('error')}} <button class='close' data-dismiss='alert'>&times;</button> </p>
								@endif
								
								<!-- Form -->
								<form action="{{route('login.account')}}" method='POST'>
									@csrf
									<div class="form-group">
										<input class="form-control" name='email' type="text" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="form-control" name='password' type="text" placeholder="Password">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								  
								<!-- Social Login -->
								<div class="social-login">
									<span>Login with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div>
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Don’t have an account? <a href="{{route('register.dashboard')}}">Register</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
@include('admin/layouts/script')