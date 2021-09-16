<?php
error_reporting(E_ALL & ~E_NOTICE); 
 include 'header.php';
 include 'fonksiyon.php'; 


$hakkimizdasor=$db->prepare("SELECT * FROM hakkimizda WHERE hakkimizda_id=:id");
$hakkimizdasor->execute(array(
 
  'id' => 0
));

$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

?>

             

    <!-- Main content -->
    <section class="content">

      
            <div class="col-md-8"><small>

               <?php 

              if (@$_GET['hakkimizda']=="ok") {?>

                <button type="button" class="btn btn-block btn-success btn-xs">İŞLEM BAŞARILI</button> <br>

              

              <?php } elseif (@$_GET['hakkimizda']=="no") {?>

              <button type="button" class="btn btn-block btn-danger btn-xs">İŞLEM BAŞARISIZ</button><br>

              <?php } else{ ?> 
                 <button type="button" class="btn btn-block btn-warning btn-xs">İŞLEM DURUMU</button> <br>
             <?php }

              ?>


            </small>
            <!-- general form elements -->
            
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">"Hakkımızda" Ayarları </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../msettings/islem.php" method="post" class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Hakkımızda Başlık<span class="required">*</span></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"  name="hakkimizda_baslik" value="<?php echo $hakkimizdacek['hakkimizda_baslik'] ?>" required="required" id="inputEmail3" placeholder="Başlık">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Hakkımızda İçerik<span class="required">*</span> </label>
                    <div class="col-sm-10">
                      <textarea class="ckeditor" id="editor1" name="hakkimizda_icerik"  ><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></textarea>
                     
                    </div>
                     <script  type="text/javascript">


                                CKEDITOR.replace('editor1',{
                                  
                                      filebrowserBrowseUrl: '/ckfinder/ckfinder.html',

                                      filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?Type=Images',

                                      filebrowserFlashBrowseUrl: '/ckfinder/ckfinder.html?Type=Flash',

                                      filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                                      filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                                      filebrowserFlashUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                                      forcePasteAsPlainText: true

                                    });

                                    </script>
                      <!-- ck editör bitiş> -->

                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Hakkımızda Vizyon <span class="required">*</span> </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="hakkimizda_vizyon" value="<?php echo $hakkimizdacek['hakkimizda_vizyon'] ?>"  required="required"id="inputEmail3" placeholder="Vizyon">
                    </div>
                 </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Hakkımızda Misyon <span class="required">*</span> </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control"name="hakkimizda_misyon" value="<?php echo $hakkimizdacek['hakkimizda_misyon'] ?>"  required="required" id="inputEmail3" placeholder="Misyon">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Hakkımızda Video <span class="required">*</span> </label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control" name="hakkimizda_video" value="<?php echo $hakkimizdacek['hakkimizda_video'] ?>"  required="required" id="inputEmail3" placeholder="Youtube url: watch?v =......& arasındaki kodu alınız.Ex: watch?v=A1b2c4B& için A1b2c4B">
                    </div>
                  </div>
                  



                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="hakkimizdakaydet" class="btn btn-success float-right">Güncelle</button>
                
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
