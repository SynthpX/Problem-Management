
            <!--maincontent-->
        </div>
    </div><span id="export"></span>
</body>
<!--jquery-->
<!--semantic-->
<script src="<?php echo base_url('assets/dist/semantic.min.js'); ?>"></script>
<!--semantic-->
<script src="<?php echo base_url('assets/plugins/cookie/js.cookie.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/nicescrool/jquery.nicescroll.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/dashboard-ku.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datedropper/datedropper.min.js'); ?>"></script>
<script> 
$(document).ready(function() {
    $('.datedrop').dateDropper();
} );

$('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  })
;
</script>
</html>