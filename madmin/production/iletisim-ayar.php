<?php
 include 'header.php'; 

?>
             

    <!-- Main content -->
    <section class="content">

      
            <div class="col-md-8"><small>

               <?php 

              if (@$_GET['iletisimayar']=="ok") {?>

                <button type="button" class="btn btn-block btn-success btn-xs">İŞLEM BAŞARILI</button> <br>

              

              <?php } elseif (@$_GET['iletisimayar']=="no") {?>

              <button type="button" class="btn btn-block btn-danger btn-xs">İŞLEM BAŞARISIZ</button><br>

              <?php }else{ ?> 
                 <button type="button" class="btn btn-block btn-warning btn-xs">İŞLEM DURUMU</button> <br>
             <?php }

              ?>


            </small>
            <!-- general form elements -->
            
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">İletişim Ayarları </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../msettings/islem.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                 <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tel <span class="required">*</span> </label>
                    <div class="col-sm-10">
                      <input type="text"  name="iletisim_telefon" value="<?php echo $ayarcek['iletisim_telefon'] ?>" required="required" class="form-control" placeholder="Telefon Numarası ">
                    </div>
                 </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Gsm <span class="required">*</span> </label>
                    <div class="col-sm-10">
                      <input type="text" name="iletisim_telefon2" value="<?php echo $ayarcek['iletisim_telefon2'] ?>" required="required" class="form-control" id="inputEmail3" placeholder="Gsm Numarası">
                    </div>
                  </div>
                 
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Adres <span class="required">*</span> </label>
                    <div class="col-sm-10">
                      <input type="text" name="iletisim_adres" value="<?php echo $ayarcek['iletisim_adres'] ?>" class="form-control" required="required" id="inputEmail3" placeholder="Adres">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Mesai <span class="required">*</span> </label>
                    <div class="col-sm-10">
                      <input type="text" name="iletisim_mesai" value="<?php echo $ayarcek['iletisim_mesai'] ?>" required="required" class="form-control" id="inputEmail3" placeholder="Mesai">
                    </div>
                  </div>

                  <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="iletisimkaydet" class="btn btn-success float-right">Güncelle</button>
                
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->

          </div>
      
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
