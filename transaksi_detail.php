      <?php
          $id = $_GET['id'];
          $html = '';
          $sql = "SELECT a.no_pinjam,a.kdbuku,a.nQty,b.tglpinjam,b.tglkembali,b.status,
                  c.isbn,c.judul,d.nmanggota,b.tglConfrim,b.tglpesan,b.ket,
                  CASE
                      WHEN b.status=0 THEN 'New'
                      WHEN b.status=1 THEN 'Confirm By Admin'
                      WHEN b.status=2 THEN 'Proses'
                      WHEN b.status=3 THEN 'Finish'
                      WHEN b.status=4 THEN 'Canceled'
                   END AS sts
                  FROM t_pinjam_detail AS a
                  INNER JOIN t_pinjam AS b ON b.no_pinjam = a.no_pinjam
                  INNER JOIN buku AS c ON c.kdbuku = a.kdbuku
                  left JOIN anggota AS d ON d.kdanggota= b.kdanggota
                  WHERE a.no_pinjam = '".$id."'";
                  
          $result = mysqli_query($conn,$sql);
          while ($data = mysqli_fetch_array($result)){

             
              
              $tglpesan  = date('d-m-Y',strtotime($data['tglpesan']));
              $telat  = $data['nTelat'];
              $denda  = number_format($data['nDenda']);
              if ($data['tglkembali']=='0000-00-00' || $data['tglkembali']==''){
                $tglkembali  = '-';
              }else{
                $tglkembali  = date('d-m-Y',strtotime($data['tglkembali']));
              }


              if ($data['tglpinjam']=='0000-00-00' || $data['tglpinjam']==''){
                $tglpinjam  = '-';
              }else{
                $tglpinjam  = date('d-m-Y',strtotime($data['tglpinjam']));
              }

              $status    = $data['sts'];

              $no = $no + 1;
              $html .= "
                  <tr>  
                    <td>".$no."</td>
                    <td>".$data['kdbuku']."</td>
                    <td>".$data['isbn']."</td>
                    <td>".$data['judul']."</td>
                  </tr>
              ";

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
            <li >List Transaksi Peminjaman</li>
            <li class="active">Detail Transaksi</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="col-md-12">
              <div class="box box-default box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title fa fa-opencart"> Detail Transaksi Peminjaman</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
					           <table>
                        <tbody>
                          <tr>
                            <td width='130px'>No Peminjaman</td>
                            <td width='10px'>:</td>
                            <td  width='200px'><?php echo $id ?></span></td>

                            <td width='130px'>Tgl Kembali</td>
                            <td width='10px'>:</td>
                            <td><?php echo $tglkembali ?></td>

                          </tr>
                          <tr>
                            <td>Tgl Pesan</td>
                            <td>:</td>
                            <td><?php echo $tglpesan ?></td>

                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo $status ?></td>
                           
                          </tr>
                          <tr>
                            <td>Tgl Pinjam</td>
                            <td>:</td>
                            <td><?php echo $tglpinjam ?></td>

                            <td>Ket</td>
                            <td>:</td>
                            <td><?php echo $data['ket'] ?></td>
                           
                          </tr>
                          
                         
                        </tbody>
                      </table>


                      <table class='table table-striped table-bordered' style="font-family: initial;">
                          <thead>
                            <th bgcolor='#659ec7'>No</th>
                            <th bgcolor='#659ec7' >Kode Buku</th>
                            <th bgcolor='#659ec7'>ISBN</th>
                            <th bgcolor='#659ec7' >Judul Buku</th>
                          </thead>
                          <tbody id='tbody' name='tbody'>
                              <?php  echo $html; ?>
                          </tbody>
                        </table>
                </div><!-- /.box-body -->

                
              </div><!-- /.box -->
            </div><!-- /.col -->



            


        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <script type="text/javascript">
          function view(id){
              ocation.replace('index.php?action=3');
          }
      </script>