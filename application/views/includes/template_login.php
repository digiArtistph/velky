<!DOCTYPE html>
<html lang="en" class="login_page">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="url" content="<?php echo base_url();?>" />
    <title><?php echo (isset($title)) ? $title : ''; ?></title>
    <?php getHeader(); ?>
</head>
    
<body>
	 <?php $this->load->view($main_content); ?>
     
     <!-- JS -->
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
</body>
</html>