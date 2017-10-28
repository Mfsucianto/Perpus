      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small></small>
          </h1>
		  
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">List Transaksi Peminjaman</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="col-md-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title fa fa-opencart">List Transaksi Peminjaman</h3>
                 
                </div><!-- /.box-header -->
                <div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        
                        <th>No Peminjaman</th>
                        <th>Tgl Pesan</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        
                        <th>View</th>
                       
                      </tr>
                    </thead>
					<tbody>
						<?php
							include 'library/koneksi.php';
							$no=0;
							$userid = $_SESSION['userid'];
							$sql = "SELECT a.no_pinjam,a.tglpesan,a.tglpinjam,a.tglkembali,a.ket,
                      CASE
                    WHEN a.status=0 THEN 'New'
                    WHEN a.status=1 THEN 'Confirm By Admin'
                    WHEN a.status=2 THEN 'Proses'
                    WHEN a.status=3 THEN 'Finish'
                    WHEN a.status=4 THEN 'Canceled'
                 END AS sts
                      FROM t_pinjam AS a
                WHERE  a.kdanggota='".$userid."' order by a.tglpesan DESC";

							$result = mysqli_query($conn,$sql);
							while ($data = mysqli_fetch_array($result)){
								$no = $no + 1;
                if ($data[tglkembali=='0000-00-00']){
                    $tglkembali =  '-';
                  }else{
                    $tglkembali =  date('d-m-Y',strtotime($data[tglkembali])); 
                  }

                if ($data[tglpinjam=='0000-00-00']){
                    $tglpinjam =  '-';
                  }else{
                    $tglpinjam =  date('d-m-Y',strtotime($data[tglpinjam])); 
                  }


                $id = $data['no_pinjam'];
								$saldo = $data['stok'] - $data['booking'];
								$html = "<tr>";
								$html .= "<td>".$no."</td>";
								
                $html .= "<td>".$data['no_pinjam']."</td>";
                $html .= "<td>".date('d-m-Y',strtotime($data['tglpesan']))."</td>";
                $html .= "<td>".$tglpinjam."</td>";
                $html .= "<td>".$tglkembali."</td>";
                $html .= "<td>".$data['sts']."</td>";
                $html .= "<td align='center' >
                        <a  href='index.php?action=5&id=".$id."'><i class='fa fa-eye'></i></a>
                </td>";
								$html .= "</tr>";
								echo $html;
								
								
							}
								
						?>
						  
						
                    <tbody>
                      
                   
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