<?php

include 'header.php'; 

error_reporting(E_ALL & ~E_NOTICE);


//Belirli veriyi seçme işlemi
$menusor=$db->prepare("SELECT * FROM menu");
$menusor->execute();


?>

    <!-- Content Wrapper. Contains page content -->

   

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
          

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">menuler<small> &emsp;

              <?php 

               if (@$_GET['durum']=="ok") {?>

              <b style="color:green;">İŞLEM BAŞARILI</b>

              <?php } elseif (@$_GET['durum']=="no") {?>

              <b style="color:red;">İŞLEM BAŞARISIZ</b>

              <?php } else{ ?> 
                <b style="color:orange;">İŞLEM DURUMU</b>
             <?php }

              ?>



            </small></h3>

            <div align="right">
              <a href="menu-ekle.php"><button class="btn btn-success btn-xs"> Yeni menu Ekle</button></a>

            </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                
                <tr>
                  <th>sıra</th>
                  <th>Fotograf Ad</th>
                  <th>Resim url</th>
                  <th>Durum</th>
                  <th>Düzenle</th>
                  <th>Sil</th>

                </tr>
             
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($menucek=$menusor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                   <td><?php echo $menucek['menu_sira'] ?></td> 
                   <td><?php echo $menucek['menu_ad'] ?></td>
                   <td><img width="200" src="../../<?php echo $menucek['menu_resimyol'] ?>"></td>
                    
                   
                      <td><center><?php 
                     

                  if ($menucek['menu_durum']==1) {?>

                  <button class="btn btn-success btn-xs">Aktif</button>

                <?php } else {?>

                <button class="btn btn-danger btn-xs">Pasif</button>

                 <?php } ?>
             
              </center>  </td>


          <td><center><a href="menu-duzenle.php?menu_id=<?php echo $menucek['menu_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
            <td><center><a href="../msettings/islem.php?menu_id=<?php echo $menucek['menu_id']; ?>&menusil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>

          </tr>

   <?php } ?>



        </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
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
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
