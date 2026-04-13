        <footer class="main-footer">
          <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
          </div>
          <strong>Copyright &copy; 2024 <a href="#">&nbsp;</a>.</strong> All rights
          reserved.
        </footer>
        <div class="control-sidebar-bg"></div>
    </div>

    <script src="<?php echo base_url(); ?>assets/backend/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!--DATATABLES-->
    <?php if ($nopage==1011||$nopage==1021||$nopage==1031||$nopage==1041||$nopage==1051) { ?>
      <script src="<?php echo base_url(); ?>assets/backend/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/backend/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <?php } ?>

    <!--DATE PICKER-->
    <?php if ($nopage==1042||$nopage==1043) { ?>
    <script src="<?php echo base_url(); ?>assets/backend/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <?php } ?>
    
    <!-- MORRIS CHARTS -->
    <?php if ($nopage==1001) { ?>
    <script src="<?php echo base_url(); ?>assets/backend/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/morris.js/morris.min.js"></script>
    <?php } ?>

    <script src="<?php echo base_url(); ?>assets/backend/jquery-slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/backend/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/adminlte.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/js/demo.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    
    <?php if ($nopage==1001) { ?>
      <script type="text/javascript">
        $(function () {
          "use strict";
          // LINE CHART
          var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
              {y: '2024-01', item1: 0},
              {y: '2024-02', item1: 0},
              {y: '2024-03', item1: 0},
              {y: '2024-04', item1: 0},
              {y: '2024-05', item1: 3},
              {y: '2024-06', item1: 0},
              {y: '2024-07', item1: 0},
              {y: '2024-08', item1: 0},
              {y: '2024-09', item1: 0},
              {y: '2024-10', item1: 0},
              {y: '2024-11', item1: 0},
              {y: '2024-12', item1: 0}
            ],
            
            xkey: 'y',
            ykeys: ['item1'],
            labels: ['Item 1'],
            lineColors: ['#3c8dbc'],
            hideHover: 'auto'
          });
        });
      </script>
    <?php } ?> 

    <!--DATATABLES-->
    <?php if ($nopage==1011) { ?>
      <script type="text/javascript">
        $(function () {
          $('#tabelorder').DataTable({
            "paging"      : true,
            "lengthChange": true,
            "searching"   : true,
            "ordering"    : true,
            "info"        : true,
            "autoWidth"   : true,
            "columnDefs": [{ 
              "targets": [ 9 ],
              "orderable": false,
            }],
          });
        });
      </script>
    <?php } ?> 

    <?php if ($nopage==1021) { ?>
      <script type="text/javascript">
        $(function () {
          $('#tabeljmobil').DataTable({
            "paging"      : true,
            "lengthChange": true,
            "searching"   : true,
            "ordering"    : true,
            "info"        : true,
            "autoWidth"   : true,
            "columnDefs": [{ 
              "targets": [ 0,1,2 ],
              "orderable": false,
            }]
          });
        });
      </script>
    <?php } ?> 

    <?php if ($nopage==1031) { ?>
      <script type="text/javascript">
        $(function () {
          $('#tabelarmada').DataTable({
            "paging"      : true,
            "lengthChange": true,
            "searching"   : true,
            "ordering"    : true,
            "info"        : true,
            "autoWidth"   : true,
            "columnDefs": [{ 
              "targets": [ 0,1,2,3,4 ],
              "orderable": false,
            }]
          });
        });
      </script>
    <?php } ?>

    <?php if ($nopage==1041) { ?>
      <script type="text/javascript">
        $(function () {
          $('#tabelpesan').DataTable({
            "paging"      : true,
            "lengthChange": true,
            "searching"   : true,
            "ordering"    : true,
            "info"        : true,
            "autoWidth"   : true,
            "columnDefs": [{ 
              "targets": [ 0,1,2,3,4 ],
              "orderable": false,
            }]
          });
        });
      </script>
    <?php } ?>

    <?php if ($nopage==1051) { ?>
      <script type="text/javascript">
        $(function () {
          $('#tabelpengguna').DataTable({
            "paging"      : true,
            "lengthChange": true,
            "searching"   : true,
            "ordering"    : true,
            "info"        : true,
            "autoWidth"   : true,
            "columnDefs": [{ 
              "targets": [ 0,1,2,3 ],
              "orderable": false,
            }]
          });
        });
      </script>
    <?php } ?>

    


    <!--DATE PICKER-->
    <?php if ($nopage==1042||$nopage==1043) { ?>
      <script type="text/javascript">
        $('#tglpenilaian').datepicker ({
          format: 'yyyy-mm-dd',
          autoclose: true
        });
      </script>
    <?php } ?>  
  </body>
</html>