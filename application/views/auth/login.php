<div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-6 col-md-offset-3 ht-5">

    
<div class="panel panel-default">
    <div class=" text-center">
        <h3>LOGIN</h3>
    </div>
             
       <div id="infoMessage"><?php echo $message;?></div>

        <?php echo form_open("auth/login",array("class"=>"form-horizontal",'id'=>"login-form"));?>

        <div class="form-group control-group">
            <label for="name" class="col-sm-2 control-label">Email Id</label>
                <div class="col-sm-8">
                    <input type="email" id="identity" name="identity" class="form-control" placeholder="Email Id" >
                    <p class="help-block"></p>
                </div>
        </div>
        
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-8">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>
        </div>
        <div class="form-group control-group">
            <div class="checkbox">
                <label class="checkbox col-sm-2 control-label" > </label>
                <div class="col-sm-8">
                  <input type="checkbox" id="remember"  name="remember" value="remember-me">Remember me
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
                <button class="btn btn-sm btn-success" type="submit">Sign in</button>
              
            </div>
        </div>
       
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
            </div>
        </div>	
     <?php echo form_close();?>

   </div>    

</div>  

