      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
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
                  <h3 class="box-title">Koleksi Terbaru</h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!--Bodyy-==================================-->
                    <?php  
                        $sql = "SELECT kdbuku,judul,stok,image FROM buku ORDER BY kdbuku DESC LIMIT 8";
                        $result = mysqli_query($conn,$sql);
                        while ($data = mysqli_fetch_array($result)){
                            $kdbuku = $data['kdbuku'];
                            $stok = $data['stok'];
                            $judul = substr($data['judul'],0, 25);
                            if ($stok <= 0 ){
                                $infstok = "tidak tersedia";
                            }else{
                              $infstok = $stok;
                            }

                          ?>
                                <div class="col-md-3">
                                  <div class="box box-widget widget-user">

                                   

                                    <div class="widget-user-header " >
                                        <span ><?php echo $judul; ?></span>
                                        <span class="pull-right badge bg-aqua">Stok : <?php echo $infstok; ?></span>
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

    function detail(id){
        location.replace('index.php?action=6&id='+id);
    }
</script>