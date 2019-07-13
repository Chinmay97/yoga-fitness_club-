
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right
    <div class="float-right d-sm-none d-md-block">
      Anything you want
    </div>-->
    <!-- Default to the left -->
    <!--<strong>Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  --></footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url() ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="<?php echo base_url() ?>assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="<?php echo base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url() ?>assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="<?php echo base_url() ?>assets/admin/plugins/chartjs-old/Chart.min.js"></script>


<script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/dist/js/pages/dashboard2.js"></script>
<script src="<?php echo base_url() ?>common/form-validation.js"></script>


<script>
        $("#btnVid").click(function(){
          var val1=$("#my_vid_file").val();
      //  alert(val1);
      })
</script>
<script>
        $("#btnSubmitcat").click(function(){
        //  e.preventDefault();
	var formData = new FormData($("#cat_form")[0]);
		var url ="<?php echo base_url()?>index.php/admin/Add_articles/saveArtcat";
		$.ajax({
			url: url,
			type: 'POST',
			data: formData,
			async: false,
			success: function (data, status) {
				//alert(data);
        $("#cat_select").append(data);
			},
			cache: false,
			contentType: false,
			processData: false
		});

        /*  var category_id= $(this).val();
          alert(category_id);
        $.post("<?php echo base_url()?>index.php/admin/Add_article_cat/save",
        {
          cat_name: $("#category"),
          process: 'ADD_CAT'
        },
        function(data, status){
          alert("Data: " + data + "\nStatus: " + status);
        });*/
        });
</script>
</body>
</html>
