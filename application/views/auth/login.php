<div class="col-xs-12 col-sm-4 col-sm-offset-4 col-md-6 col-md-offset-3 ht-5">

    <div class="page-header">
        <h1>Login</h1>
    </div>
    
    <form role="form" class="form-horizontal"  action="" method="post">          
        <div id="infoMessage"><?php echo $message;?></div>

        <?php echo form_open("auth/login");?>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">User Name</label>
                <div class="col-sm-8">
                    <input type="text" id="identity" name="identity" class="form-control" placeholder="User name" required>
                </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-8">
                <input type="password"  id="password" name="password" class="form-control" placeholder="Password" required>
            </div>
        </div>
        <div class="col-sm-offset-2 col-sm-8">
        <div class="checkbox">
            <label class="checkbox">
              <input type="checkbox" id="remember"  value="remember-me"> Remember me
            </label>
        </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button class="btn btn-lg btn-block" type="submit" id="submit" name="submit">Sign in</button>
                <?php echo form_close();?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
            </div>
        </div>	
    
    </form>
       

</div>  