<?php
include 'layout/header_login.php';
?>
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
                  <form class="form-horizontal" name="loginForm">
				  
				  <div ng-controller="loginControl">
                      <div ng-if="data.show" ng-bind="data.msg" style='text-align:center;font-weight:900'></div>
                      </div>
                    <!-- Email -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputEmail">Email</label>
                      <div class="col-lg-9">
                        <input type="email" value='' class="form-control" name="email" ng-model="login.email" required="required" placeholder="Email">
						<span class="errorMessage" ng-show="loginForm.email.$error.email && !loginForm.email.$pristine" class="help-inline">Email is not valid</span> 
                          <span class="errorMessage" ng-show="loginForm.email.$error.required && !loginForm.email.$pristine" class="help-inline">Email is required.</span>
                      </div>
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                      <label class="control-label col-lg-3" for="inputPassword">Password</label>
                      <div class="col-lg-9">
                        <input type="password" class="form-control" name="loginPassword" ng-model="login.loginPassword" required="required" placeholder="Password">
                        <small class="errorMessage" data-ng-show="loginForm.loginPassword.$dirty && loginForm.loginPassword.$error.required"> Password field is required.</small>
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
							<button type="submit" class="btn btn-danger" ng-click="doLogin()" data-ng-disabled="loginForm.$invalid">Sign in</button>
							<button type="reset" class="btn btn-default">Reset</button>
						</div>
                    <br />
                  </form>
				  
				</div>
                </div>
              
                <div class="widget-foot">
                  Not Registred? <a href="#">Register here</a>
                </div>
            </div>  
      </div>
    </div>
  </div> 
</div>
	
		
<?php
include 'layout/footer_login.php';
?>