<div id="infoMessage"><?php echo $message;?></div>
    <div class="container">
     <?php echo form_open("auth/login");?>
	  <label for="name">User Name</label>
	     <input type="text" id="identity" name="identity" class="form-control" placeholder="Enter Name">
	     <label for="name">Password</label>
        <input type="password"  id="password" name="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" id="remember"  value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg  btn-block" type="submit" id="submit" name="submit">Sign in</button>
     <?php echo form_close();?>
<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
    </div>
	