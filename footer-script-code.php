<script type="text/javascript">
  (function() {
    var adlogica_org_id = "<?php echo $adsavvy_org_id ?>";
    var adlogica_app_id = "<?php echo $adsavvy_proj_id ?>";
    var adlogica_tracker = document.createElement("script");
    adlogica_tracker.type = "text/javascript"; 
    adlogica_tracker.async = true; 
    adlogica_tracker.defer = true;
    adlogica_tracker.src = ("https:" == document.location.protocol ? "https" : "http") + "://js.savvyads.com/"+adlogica_org_id+'/'+adlogica_app_id+"/adlogica_tracker.js";
    document.body.appendChild(adlogica_tracker);
  })();
</script>