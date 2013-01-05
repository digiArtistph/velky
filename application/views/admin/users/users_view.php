<div class="row-fluid">
	<div class="span12">
      <h2 class="heading">Users</h2></div>
<a class="ext_disabled btn" href="<?php echo base_url("master/users/section/newuser"); ?>">Add New User</a>


        </div>     
    <div class="row-fluid">
    	<div class="span8">            
            <table class="table table-striped" data-provides="rowlink">
                <thead>
                    <tr>
                        <th>Email Address</th>
                        <th>Fullname</th>
                        <th>Address 1</th>
                        <!--<th>Address 2</th>
                        <th>User Type</th>  -->
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
            <?php if(isset($users)): ?>
                    <?php foreach($users as $user): ?>
                    <tr class="rowlink" >
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->fullname; ?></td>
                        <td><?php echo $user->addr1; ?></td>
                        <!--<td><?php echo $user->addr2; ?></td>
                        <td><?php echo $user->utype; ?></td>-->
                        <td><a class="ext_disabled" href="<?php echo base_url("master/users/section/edituser/$user->u_id"); ?>">Edit</a> | <a class="ext_disabled"  href="<?php echo base_url("master/users/section/deleteuser/$user->u_id"); ?>">Delete</a></td>
                    </tr>                            
                    <?php endforeach; ?>
            <?php endif; ?>

                </tbody>
            </table>
		</div>
        
	</div>
</div>
