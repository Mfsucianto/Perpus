      <?php
          $kdjenis = $_GET['jenis'];
          $sql = "SELECT nmjenis FROM jenis WHERE kdjenis='".$kdjenis."'";
          $query = mysqli_query($conn,$sql);
          $row = mysqli_fetch_array($query);
          $nmjenis = $row['nmjenis'];

      ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
        <section class="content">

          <div class="row">
		  
            
            <div class="col-md-12">
              <!-- Box Comment -->
              <div class="box box-widget">
                
                <div class='box-body'>
                  <!--<img class="img-responsive pad" src="dist/img/photo2.png" alt="Photo">-->
                  <?php //include 'demo7.html'; ?>
                  
                </div><!-- /.box-body -->
                
                
              </div><!-- /.box -->
            </div><!-- /.col -->

            <div class="col-md-12">
              <div class="box box-info box-solid" style="background-color: aliceblue;">
                <div class="box-header with-border">
                  <h3 class="box-title">Jenis Buku <?php echo $nmjenis; ?></h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!--Bodyy-==================================-->
                    <?php
                        
                        $baris = 8;
                        $hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
                        $pageSql = "SELECT kdbuku FROM buku WHERE kdjenis='".$kdjenis."' order by kdbuku DESC";
                        $query = mysqli_query($conn,$pageSql);
                        $jml   = mysqli_num_rows($query);
                        $maks  = ceil($jml/$baris);
                        $mulai  = $baris * ($hal-1);

                        $sql = "SELECT kdbuku,judul,stok,image FROM buku WHERE kdjenis='".$kdjenis."' ORDER BY kdbuku DESC LIMIT $mulai, $baris";
                        $result = mysqli_query($conn,$sql);
                        while ($data = mysqli_fetch_array($result)){
                            $kdbuku = $data['kdbuku'];
                            $stok = $data['stok'];

                          ?>
                                <div class="col-md-3">
                                  <div class="box box-widget widget-user">

                                   

                                    <div class="widget-user-header " >
                                        <span ><?php echo $data['judul']; ?></span>
                                        <span class="pull-right badge bg-aqua">Stok : <?php echo $data['stok']; ?></span>
                                        <img id='imgbuku' class="img-responsive pad" src="images/buku/<?php echo $data['image']; ?>" alt="Photo">
                                    </div>

                                   

                                    <div class="box-footer">

                                      <ul class="nav nav-stacked">
                                      
                                        <li style="height: 75px;"><a href="#"></a></li>
                                      </ul>
                                    </div>
                                      <div class="box-footer btn-group">
                                      <?php
                                          if ($stok > 0){
                                              echo ' <button type="submit" onclick="booking(\''.$kdbuku.'\',\''.$userid.'\')" class="btn bg-orange pull-right">Booking</button>';
                                          }
                                      ?>
                                       
                                        <button type="submit" onclick="detail('<?php echo $kdbuku; ?>')" class="btn btn-info pull-right">Detail</button>
                                      </div>
                                  </div>
                                </div>


                          <?php
                        }
                    ?>
                    
                     
                    

                </div><!-- /.box-body -->

                <div class="box-footer clearfix">
                      <ul class='pagination pagination-sm no-margin pull-right'>
                      <li><a href="?action=2&jenis=<?php echo $kdjenis; ?>&hal=1">&laquo;</a></li>
                        <?php
                      for ($h = 1;$h<=$maks;$h++) {
                          echo " <li><a href='?action=2&jenis=".$kdjenis."&hal=$h'>$h</a></li>";
                      }
                      ?>
                      <li><a href="?action=2&jenis=<?php echo $kdjenis; ?>&hal=<?php echo $maks; ?>">&raquo;</a></li>
                      </ul>
                    </div>


              </div><!-- /.box -->
            </div><!-- /.col -->

            

          </div><!-- /.row -->
          </div>

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
</script>