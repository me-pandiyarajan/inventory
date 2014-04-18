<h1>Add User</h1>
<p><?php echo lang('create_user_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_user");?>



   <div class="form-group">
      <label for="name">User Name</label>
      <input type="text"  id="name" name="name" placeholder="Enter User Name">
   </div>
    <div class="form-group">
      <label for="name">Last Name</label>
      <input type="text"  id="last_name" name="last_name" placeholder="Enter Last Name">
   </div>
      <div class="form-group">
      <label for="name">First Name</label>
      <input type="text"  id="first_name" name="first_name" placeholder="Enter First Name">
   </div>
    <div class="form-group">
      <label for="name">email</label>
      <input type="text"  id="email" name="email" placeholder="Enter Email">
   </div>
   
 
   
    <div class="form-group">
      <label for="name">phone</label>
      <input type="text"  id="phone" name="phone" placeholder="Enter Phone">
   </div>
  
 <?php if(!empty($options)): ?> 
  <div class="form-group">
  <label for="name">Group</label>
   <div class="dropdown">
   <select name="group" id="group">
   <?php foreach($options as $val => $option): ?>
    <option value="<?php echo $val;?>"><?php echo $option;?></option>
   <?php endforeach; ?>
   </select> 
  </div>
  </div>
  <?php endif; ?>
  
  
 
   <button type="submit" class="btn btn-default" id="">Submit</button>
<?php echo form_close();?>
