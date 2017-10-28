      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small></small>
          </h1>
		  
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">List Buku</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="col-md-12">
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">List Buku</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Act</th>
                        <th>Kode</th>
                        <th>ISBN</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Stok</th>
                        <th>View</th>
                       
                      </tr>
                    </thead>
					<tbody>
						<?php
							include 'library/koneksi.php';
							$no=0;
							
							$sql = "SELECT * FROM buku order by judul ASC";
							$result = mysqli_query($conn,$sql);
							while ($data = mysqli_fetch_array($result)){
								$no = $no + 1;
								$saldo = $data['stok'] - $data['booking'];

                $stok = $data['stok'];
                if ($stok <= 0 ){
                    $infstok = "-";
                }else{
                  $infstok = intval($stok);
                }

								$html = "<tr>";
								$html .= "<td>".$no."</td>";
								$html .= "<td></td>";
                $html .= "<td>".$data['kdbuku']."</td>";
                $html .= "<td>".$data['isbn']."</td>";
                $html .= "<td>".$data['judul']."</td>";
								$html .= "<td>".$data['penulis']."</td>";
								$html .= "<td>".$infstok."</td>";
                $html .= "<td align='center' >
                        <a  href='index.php?action=6&id=".$data['kdbuku']."'><i class='fa fa-eye'></i></a>
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