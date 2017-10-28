      <?php
          $id = $_GET['id'];
          
          $sql = "SELECT a.kdbuku,a.isbn,a.judul,a.penulis,
                  a.kdpenerbit,b.nmpenerbit,a.sinopsis,a.stok,a.image,a.kdjenis,c.nmjenis,a.thnTerbit
                  FROM buku AS a
                  LEFT JOIN penerbit AS b ON b.kdpenerbit=a.kdpenerbit
                  LEFT JOIN jenis AS c ON c.kdjenis=a.kdjenis
                  WHERE a.kdbuku= '".$id."'";

          $query = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($query);
          $stok = $row['stok'];
          if ($stok <= 0 ){
              $infstok = "tidak tersedia";
          }else{
            $infstok = $stok;
          }

      ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small></small>
          </h1>
		  
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Detail Buku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="col-md-12">
              <div class="box box-default box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title fa fa-opencart"> Detail Buku</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
					           

                    <div class="col-md-6">
                      <!-- Box Comment -->
                      <div class="box box-widget">
                        <div class='box-header with-border'>
                          <div class='user-block'>
                            <span class='username'><a href="#"><?php echo $row['judul'] ?></a></span>
                            <span class='description'><?php echo $row['penulis']." - ".$row['thnTerbit'] ?></span>
                          </div><!-- /.user-block -->
                          
                        </div><!-- /.box-header -->
                        <div class='box-body'>
                          <img class="img-responsive pad" src="images/buku/<?php echo $row['image']; ?>" alt="Photo">
                          
                        </div><!-- /.box-body -->
                        
                        <!-- /.box-footer -->
                      </div><!-- /.box -->
                    </div><!-- /.col -->




                    <!-- ####################################################################-->

                    <div class="col-md-6">
                        <div class="box box-success box-solid">
                          <div class="box-header with-border">
                            <h3 class="box-title">Detail Buku</h3>
                          </div><!-- /.box-header -->
                          <div class="box-body">
                               <table class="table table-striped">
                                  <tr>
                                    <td>Judul</td>
                                    <td>:</td>
                                    <td><?php echo $row['judul'] ?></td>
                                  </tr>
                               

                           
                                  <tr>
                                    <td>Sinopsis</td>
                                    <td>:</td>
                                    <td><?php echo $row['sinopsis'] ?></td>
                                  </tr>
                             

                               
                                  <tr>
                                    <td>Penulis</td>
                                    <td>:</td>
                                    <td><?php echo $row['penulis'] ?></td>
                                  </tr>
                              


                                  <tr>
                                    <td>Penerbit</td>
                                    <td>:</td>
                                    <td><?php echo $row['nmpenerbit'] ?></td>
                                  </tr>

                                  <tr>
                                    <td>Tahun Terbitan</td>
                                    <td>:</td>
                                    <td><?php echo $row['thnTerbit'] ?></td>
                                  </tr>

                                  <tr>
                                    <td>Stok</td>
                                    <td>:</td>
                                    <td><span class="badge bg-blue"><?php echo $infstok ?></span></td>
                                  </tr>

                               </table>

                          </div><!-- /.box-body -->

                          <div class="box-footer btn-group">
                              <?php
                                  $kdbuku = $row['kdbuku'];
                                  if ($row['stok'] > 0){
                                      echo ' <button type="button" onclick="booking(\''.$kdbuku.'\',\''.$userid.'\')" class="btn bg-orange pull-right">Booking</button>';
                                  }
                              ?>           
                           </div>

                        </div><!-- /.box -->
                      </div><!-- /.col -->

                </div><!-- /.box-body -->

                
              </div><!-- /.box -->
            </div><!-- /.col -->



            


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     <script type="text/javascript">
    function booking(id,userid){
        if (userid==''){
            alert('Silahkan Login terlebih dahulu');
            location.replace('login.html');
        }else{
            InsertBooking(id,userid);
        }
       
    }

    function detail(id){
        location.replace('index.php?action=6&id='+id);
    }

    function komenter(id,userid){

      alert(id);
      return false;
    }
</script>