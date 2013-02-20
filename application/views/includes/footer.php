<?php if($section == 'home' || $section == "master" || $section == 'reports' || $section == "admin"): ?>
	<script src="<?php echo base_url('theme/js/jquery.min.js'); ?>"></script>
    <!-- smart resize event -->
    <script src="<?php echo base_url('theme/js/jquery.debouncedresize.min.js'); ?>"></script>
    <!-- hidden elements width/height -->
    <script src="<?php echo base_url('theme/js/jquery.actual.min.js'); ?>"></script>
    <!-- js cookie plugin -->
    <script src="<?php echo base_url('theme/js/jquery_cookie.min.js'); ?>"></script>
    <!-- main bootstrap js -->
    <script src="<?php echo base_url('theme/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- tooltips -->
    <script src="<?php echo base_url('theme/lib/qtip2/jquery.qtip.min.js'); ?>"></script>
    <!-- jBreadcrumbs -->
    <script src="<?php echo base_url('theme/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js'); ?>"></script>
    <!-- fix for ios orientation change -->
    <script src="<?php echo base_url('theme/js/ios-orientationchange-fix.js'); ?>"></script>
    <!-- scrollbar -->
    <script src="<?php echo base_url('theme/lib/antiscroll/antiscroll.js'); ?>"></script>
    <script src="<?php echo base_url('theme/lib/antiscroll/jquery-mousewheel.js'); ?>"></script>
    <!-- lightbox -->
    <script src="<?php echo base_url('theme/lib/colorbox/jquery.colorbox.min.js'); ?>"></script>
    <!-- mobile nav -->
    <script src="<?php echo base_url('theme/js/selectNav.js'); ?>"></script>
    <!-- common functions -->
    <script src="<?php echo base_url('theme/js/gebo_common.js'); ?>"></script>
    
    <!-- bootstrap plugins -->
    <script src="<?php echo base_url('theme/js/bootstrap.plugins.min.js'); ?>"></script>
    <!-- autosize textareas -->
    <script src="<?php echo base_url('theme/js/forms/jquery.autosize.min.js'); ?>"></script>
    <!-- enhanced select -->
    <script src="<?php echo base_url('theme/lib/chosen/chosen.jquery.min.js'); ?>"></script>
    <!-- user profile functions -->
    <script src="<?php echo base_url('theme/js/gebo_user_profile.js'); ?>"></script> 
    
    <!-- jQuery UI -->
    <script src="<?php echo base_url('theme/lib/jquery-ui/jquery-ui-1.8.23.custom.min.js'); ?>"></script>
    <!-- touch events for jQuery UI -->
    <script src="<?php echo base_url('theme/js/forms/jquery.ui.touch-punch.min.js'); ?>"></script>
    <!-- calendar -->
    <script src="<?php echo base_url('theme/lib/fullcalendar/fullcalendar.min.js'); ?>"></script>
    <script src="<?php echo base_url('theme/lib/fullcalendar/gcal.js'); ?>"></script>
    
    <!-- calendar functions -->
    <script src="<?php echo base_url('theme/js/gebo_calendar.js'); ?>"></script>
	
    <!-- extended form elements -->
    <script src="<?php echo base_url('theme/lib/jquery-ui/jquery-ui-1.8.23.custom.min.js'); ?>"></script>
    <!-- touch events for jquery ui-->
    <script src="<?php echo base_url('theme/js/forms/jquery.ui.touch-punch.min.js'); ?>"></script>
    <!-- masked inputs -->
    <script src="<?php echo base_url('theme/js/forms/jquery.inputmask.min.js'); ?>"></script>
    <!-- autosize textareas -->
    <script src="<?php echo base_url('theme/js/forms/jquery.autosize.min.js'); ?>"></script>
    <!-- textarea limiter/counter -->
    <script src="<?php echo base_url('theme/js/forms/jquery.counter.min.js'); ?>"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('theme/lib/datepicker/bootstrap-datepicker.min.js'); ?>"></script>
    <!-- timepicker -->
    <script src="<?php echo base_url('theme/lib/datepicker/bootstrap-timepicker.min.js'); ?>"></script>
    <!-- tag handler -->
    <script src="<?php echo base_url('theme/lib/tag_handler/jquery.taghandler.min.js'); ?>"></script>
    <!-- input spinners -->
    <script src="<?php echo base_url('theme/js/forms/jquery.spinners.min.js'); ?>"></script>
    <!-- styled form elements -->
    <script src="<?php echo base_url('theme/lib/uniform/jquery.uniform.min.js'); ?>"></script>
    <!-- animated progressbars -->
    <script src="<?php echo base_url('theme/js/forms/jquery.progressbar.anim.js'); ?>"></script>
    <!-- multiselect -->
    <script src="<?php echo base_url('theme/lib/multi-select/js/jquery.multi-select.js'); ?>"></script>
    <script src="<?php echo base_url('theme/lib/multi-select/js/jquery.quicksearch.js'); ?>"></script>
    <!-- enhanced select (chosen) -->
    <script src="<?php echo base_url('theme/lib/chosen/chosen.jquery.min.js'); ?>"></script>
    <!-- TinyMce WYSIWG editor -->
    <script src="<?php echo base_url('theme/lib/tiny_mce/jquery.tinymce.js'); ?>"></script>
    <!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
    <script type="text/javascript" src="<?php echo base_url('theme/lib/plupload/js/plupload.full.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('theme/lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js'); ?>"></script>
    <!-- colorpicker -->
    <script src="<?php echo base_url('theme/lib/colorpicker/bootstrap-colorpicker.js'); ?>"></script>
    <!-- password strength checker -->
    <script src="<?php echo base_url('theme/lib/complexify/jquery.complexify.min.js'); ?>"></script>
    <!-- form functions -->
    <script src="<?php echo base_url('theme/js/gebo_forms.js'); ?>"></script>    
    
    <script type="text/javascript" src="<?php echo base_url('js/utility.js'); ?>"></script>
    
    <script>
        $(document).ready(function() {
            //* show all elements & remove preloader
            setTimeout('$("html").removeClass("js")',1000);
        });
    </script>

<?php elseif($section == "accident"): ?>

	<script src="<?php echo base_url('theme/js/jquery.min.js'); ?>"></script>
    <!-- smart resize event -->
    <script src="<?php echo base_url('theme/js/jquery.debouncedresize.min.js'); ?>"></script>
    <!-- hidden elements width/height -->
    <script src="<?php echo base_url('theme/js/jquery.actual.min.js'); ?>"></script>
    <!-- js cookie plugin -->
    <script src="<?php echo base_url('theme/js/jquery_cookie.min.js'); ?>"></script>
    <!-- main bootstrap js -->
    <script src="<?php echo base_url('theme/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <!-- bootstrap plugins -->
    <script src="<?php echo base_url('theme/js/bootstrap.plugins.min.js'); ?>"></script>
    <!-- tooltips -->
    <script src="<?php echo base_url('theme/lib/qtip2/jquery.qtip.min.js'); ?>"></script>
    <!-- jBreadcrumbs -->
    <script src="<?php echo base_url('theme/lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js'); ?>"></script>
    <!-- sticky messages -->
    <script src="<?php echo base_url('theme/lib/sticky/sticky.min.js'); ?>"></script>
    <!-- fix for ios orientation change -->
    <script src="<?php echo base_url('theme/js/ios-orientationchange-fix.js'); ?>"></script>
    <!-- scrollbar -->
    <script src="<?php echo base_url('theme/lib/antiscroll/antiscroll.js'); ?>"></script>
    <script src="<?php echo base_url('theme/lib/antiscroll/jquery-mousewheel.js'); ?>"></script>
    <!-- lightbox -->
    <script src="<?php echo base_url('theme/lib/colorbox/jquery.colorbox.min.js'); ?>"></script>
    <!-- mobile nav -->
    <script src="<?php echo base_url('theme/js/selectNav.js'); ?>"></script>
    <!-- common functions -->
    <script src="<?php echo base_url('theme/js/gebo_common.js'); ?>"></script>

    <script src="<?php echo base_url('theme/lib/jquery-ui/jquery-ui-1.8.23.custom.min.js'); ?>"></script>
    <!-- touch events for jquery ui-->
    <script src="<?php echo base_url('theme/js/forms/jquery.ui.touch-punch.min.js'); ?>"></script>
    <!-- masked inputs -->
    <script src="<?php echo base_url('theme/js/forms/jquery.inputmask.min.js'); ?>"></script>
    <!-- autosize textareas -->
    <script src="<?php echo base_url('theme/js/forms/jquery.autosize.min.js'); ?>"></script>
    <!-- textarea limiter/counter -->
    <script src="<?php echo base_url('theme/js/forms/jquery.counter.min.js'); ?>"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('theme/lib/datepicker/bootstrap-datepicker.min.js'); ?>"></script>
    <!-- timepicker -->
    <script src="<?php echo base_url('theme/lib/datepicker/bootstrap-timepicker.min.js'); ?>"></script>
    <!-- tag handler -->
    <script src="<?php echo base_url('theme/lib/tag_handler/jquery.taghandler.min.js'); ?>"></script>
    <!-- input spinners -->
    <script src="<?php echo base_url('theme/js/forms/jquery.spinners.min.js'); ?>"></script>
    <!-- styled form elements -->
    <script src="<?php echo base_url('theme/lib/uniform/jquery.uniform.min.js'); ?>"></script>
    <!-- animated progressbars -->
    <script src="<?php echo base_url('theme/js/forms/jquery.progressbar.anim.js'); ?>"></script>
    <!-- multiselect -->
    <script src="<?php echo base_url('theme/lib/multi-select/js/jquery.multi-select.js'); ?>"></script>
    <script src="<?php echo base_url('theme/lib/multi-select/js/jquery.quicksearch.js'); ?>"></script>
    <!-- enhanced select (chosen) -->
    <script src="<?php echo base_url('theme/lib/chosen/chosen.jquery.min.js'); ?>"></script>
    <!-- TinyMce WYSIWG editor -->
    <script src="<?php echo base_url('theme/lib/tiny_mce/jquery.tinymce.js'); ?>"></script>
    <!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
    <script type="text/javascript" src="<?php echo base_url('theme/lib/plupload/js/plupload.full.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('theme/lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js'); ?>"></script>
    <!-- colorpicker -->
    <script src="<?php echo base_url('theme/lib/colorpicker/bootstrap-colorpicker.js'); ?>"></script>
    <!-- password strength checker -->
    <script src="<?php echo base_url('theme/lib/complexify/jquery.complexify.min.js'); ?>"></script>
    <!-- form functions -->
    <script src="<?php echo base_url('theme/js/gebo_forms.js'); ?>"></script>

	<script type="text/javascript" src="<?php echo base_url('js/utility.js'); ?>"></script>
    
    <script>
        $(document).ready(function() {
            //* show all elements & remove preloader
            setTimeout('$("html").removeClass("js")',1000);
        });
    </script>

<?php endif; ?>