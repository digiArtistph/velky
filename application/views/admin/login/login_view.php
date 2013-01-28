<div class="login_box">
			<?php echo form_open(base_url() . 'admin/loginad/validate_admin_login', array('id' => 'login_form')); ?>

				<div class="top_b">Sign in to VELKY System</div>    
				<div class="alert alert-info alert-login">
					Clear username and password field to see validation.
				</div>
				<div class="cnt_b">
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span><input type="text" id="username" name="username" placeholder="Username" />
						</div>
					</div>
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password" name="password" />
						</div>
					</div>
					<div class="formRow clearfix">
						<label class="checkbox"><input type="checkbox" /> Remember me</label>
					</div>
				</div>
				<div class="btm_b clearfix">
					<button class="btn btn-inverse pull-right" type="submit">Sign In</button>
					<!--<span class="link_reg"><a href="#reg_form">Not registered? Sign up here</a></span>-->
				</div>  
			</form>
			
			
			<!--<div class="links_b links_btm clearfix">
				<span class="linkform"><a href="#pass_form">Forgot password?</a></span>
				<span class="linkform" style="display:none">Never mind, <a href="#login_form">send me back to the sign-in screen</a></span>
			</div>-->
		</div>
        <script src="<?php echo base_url('theme/js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('theme/js/jquery.actual.min.js'); ?>"></script>
        <script src="<?php echo base_url('theme/lib/validation/jquery.validate.min.js'); ?>"></script>
		<script src="<?php echo base_url('theme/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script>
            $(document).ready(function(){
                
				//* boxes animation
				form_wrapper = $('.login_box');
				function boxHeight() {
					form_wrapper.animate({ marginTop : ( - ( form_wrapper.height() / 2) - 24) },400);	
				};
				form_wrapper.css({ marginTop : ( - ( form_wrapper.height() / 2) - 24) });
                $('.linkform a,.link_reg a').on('click',function(e){
					var target	= $(this).attr('href'),
						target_height = $(target).actual('height');
					$(form_wrapper).css({
						'height'		: form_wrapper.height()
					});	
					$(form_wrapper.find('form:visible')).fadeOut(400,function(){
						form_wrapper.stop().animate({
                            height	 : target_height,
							marginTop: ( - (target_height/2) - 24)
                        },500,function(){
                            $(target).fadeIn(400);
                            $('.links_btm .linkform').toggle();
							$(form_wrapper).css({
								'height'		: ''
							});	
                        });
					});
					e.preventDefault();
				});
				
				//* validation
				$('#login_form').validate({
					onkeyup: false,
					errorClass: 'error',
					validClass: 'valid',
					rules: {
						username: { required: true, minlength: 3 },
						password: { required: true, minlength: 3 }
					},
					highlight: function(element) {
						$(element).closest('div').addClass("f_error");
						setTimeout(function() {
							boxHeight()
						}, 200)
					},
					unhighlight: function(element) {
						$(element).closest('div').removeClass("f_error");
						setTimeout(function() {
							boxHeight()
						}, 200)
					},
					errorPlacement: function(error, element) {
						$(element).closest('div').append(error);
					}
				});
            });
        </script>
