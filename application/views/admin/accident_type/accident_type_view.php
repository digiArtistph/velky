<div class="toolbar">
                	<div class="titlebar">
                	  <h1>Accident Types</h1></div>
                    <div class="actionbutton"><a href="<?php echo base_url("master/accident_type/section/addaccident_type"); ?>">Add New Accident Type</a></div>
                    <div class="extrabar"></div>
                </div>                
<div class="runninglist">
                	
                    <table>
                    	<thead>
                        	<tr> 
                                <th>Accident Type</th>     
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
					<?php if(isset($accidenttype)): ?>
                        	<?php foreach($accidenttype as $atype): ?>
                        	<tr>
                            	<td><?php echo $atype->name; ?></td>
                            	<td><a href="<?php echo base_url("master/accident_type/section/editaccident_type/$atype->at_id"); ?>">Edit</a> | <a href="<?php echo base_url("master/accident_type/section/deleteaccident_type/$atype->at_id"); ?>">Delete</a></td>
                            </tr>                            
							<?php endforeach; ?>
					<?php endif; ?>

                        </tbody>
                    </table>
<div class="clearthis"></div>
                    <div><?php echo $pagination; ?></div>
                    <!--<div class="bulkaction">
                    	<select name="bulkaction">
                        	<option value="">Bulk action</option>
                    		<option value="deleteselected">Delete selected</option>
                            <option value="deleteall">Delete all</option>
                    	</select>
					</div>
                    <div class="applybutton">
                    	<a href="#">Apply</a>
                    </div>-->
                </div>