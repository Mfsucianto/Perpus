      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small></small>
          </h1>
		  
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">List Keranjang Buku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="col-md-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title fa fa-opencart">List Keranjang Buku</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        
                        <th>Kode</th>
                        <th>ISBN</th>
                        <th>Judul</th>
                        <th></th>
                       
                      </tr>
                    </thead>
					<tbody>
						<?php
							include 'library/koneksi.php';
							$no=0;
							$userid = $_SESSION['userid'];
							$sql = "SELECT a.id,a.kdbuku,b.isbn,b.judul FROM tmp_keranjang AS a
                      INNER JOIN buku AS b ON b.kdbuku=a.kdbuku  
                      WHERE kdanggota='".$userid."'  ORDER BY a.id ASC";
							$result = mysqli_query($conn,$sql);
							while ($data = mysqli_fetch_array($result)){
								$no = $no + 1;
                $id = $data['id'];
								$saldo = $data['stok'] - $data['booking'];
								$html = "<tr>";
								$html .= "<td>".$no."</td>";
								
                $html .= "<td>".$data['kdbuku']."</td>";
                $html .= "<td>".$data['isbn']."</td>";
                $html .= "<td>".$data['judul']."</td>";
                $html .= "<td align='center' >
                        <a  href='#' onClick='hapus(\"".$id."\")' ><i class='fa fa-trash-o'></i></a>
                </td>";
								$html .= "</tr>";
								echo $html;
								
								
							}
								
						?>
						  
						
                    <tbody>
                      
                   
                  </table>
                </div><!-- /.box-body -->

                <div class="box-footer clearfix">
                     <button type="button" onclick="simpan('<?php echo $userid; ?>')" class="btn btn-info">Simpan</button>
                     <button type="button" onclick="batal('<?php echo $userid; ?>')" class="btn btn-warning">Batal</button>
                </div>
              </div><!-- /.box -->
            </div><!-- /.col -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <script type="text/javascript">


          function hapus(id){
            var jwb = confirm("Hapus data ini ?");
            if (jwb==1){
              hapusData(id);
            }
          }

          function hapusData(id){
            $.post('update.php', {
                      action:'hapusListTmp', id:id}, function(data) {
                      if (data > 0) {
                          alert('Data berhasil dihapus');
                          location.replace('index.php?action=3');
                      } else {
                          alert('Data gagal dihapus');
                          return false;
                      }
                      
                  }); 
          }

          function batal(userid){
              var jwb = confirm("Batalkan peminjaman ini ?");
                if (jwb==1){
                    $.post('update.php', {
                        action:'batalPinjam', _userid:userid}, function(data) {
                        if (data > 0) {
                            alert('Transaksi berhasil dibatalkan');
                            location.replace('index.php');
                        } else {
                            alert('Data gagal dihapus');
                            return false;
                        }
                        
                    }); 
                  
                }

          }

          function cekPinjam(userid){
               $.post('update.php', {
                        action:'cekQty', _userid:userid}, function(data) {
                        $('#total_keranjang').html(data);
                        
                    }); 
            }


          function cekPinjam(userid) {
            return $.ajax({
              type: 'POST', 
              url: 'update.php',
              data: 'action=cekQty&_userid='+userid,
              async:false
            }).responseText
          }  

          function simpan(userid){
              var qtyPinjam = cekPinjam(userid);
              if (qtyPinjam < 1){
                   alert ("Tidak ada buku yang dipinjam");
                   return false;
              }
              
              var jwb = confirm("Simpan Peminjaman ini ..?");
              if (jwb==1){
                  $.post('update.php', {
                        action:'simpanKeranjang', _userid:userid}, function(data) {
                         if (data > 0) {
                            alert('Data berhasil disimpan');
                            location.replace('index.php?action=4');
                        } else {
                            alert('Data gagal disimpan');
                            return false;
                        }
                        
                    }); 
              }
               
              

          }
      </script>