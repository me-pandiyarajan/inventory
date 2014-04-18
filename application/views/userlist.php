<div id="fieldsty"  >
<div class="container-fluid">

    <table class="table table-striped stydashboard" >

        <thead>
       
            
            <tr>
         <?php  foreach($tablehead as $table_head):?>	   
		   <th><?php echo $table_head;?></th>
         <?php endforeach; ?>
            </tr>
			

        </thead>

        <tbody role="alert" aria-live="polite" aria-relevant="all">
			    <?php
			foreach($data as $datas):
                       ?> 
				<tr class="odd"> 
						
				<td class="align-center "><?php echo $datas->username;?></td>
				<td class="align-center"><?php echo $datas->password;?></td>
				<?php 
				if($visiblity == 1 )
				{
				echo'<td class="align-center"><a class="btn" type="button" href="">
                          Edit
                        </a></td>  <td class="align-center"><a class="btn" type="button" href="">
                          Delete
                        </a></td>';
					}
					?>
					</tr>	
	
				<?php endforeach; ?>  
			</tbody>
						
    </table>

</div></div>