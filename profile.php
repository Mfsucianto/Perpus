<?php
include 'library/koneksi.php';
$kdanggota = $_SESSION['userid'];
$sql = "SELECT * FROM anggota WHERE kdanggota='".$kdanggota."'";
$row = mysqli_fetch_array(mysqli_query($conn,$sql));

?>


      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <small></small>
          </h1>
      
          
        </section>

        <!-- Main content -->
        <section class="content">

      
             <!--################# isi Form ################ -->
            <div id="formAction"  class="col-md-12">
              <!-- Box Comment -->
                <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 id="judulForm" class="box-title">Profile</h3>
                </div><!-- /.box-header -->
                  
                  <div class='box-body'>
                   <form class="form-horizontal">
                  <div class="box-body">

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Kode</label>
                      <div class="col-sm-2">
                        <input type="text" id="kdanggota" name="kdanggota" value='<?php echo $row['kdanggota']; ?>' class="form-control" readonly >
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama anggota</label>
                      <div class="col-sm-5">
                        <input type="text" id="nmanggota" value='<?php echo $row['nmanggota']; ?>' name="nmanggota" class="form-control" >
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-5">
                        <textarea id='alamat' class="form-control" name='alamat'><?php echo $row['alamat']; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">No Telp</label>
                      <div class="col-sm-5">
                        <input type="text" id="notelp" name="notelp" value='<?php echo $row['notelp']; ?>' class="form-control" >
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-5">
                        <input type="text" id="email" name="email" value='<?php echo $row['email']; ?>' class="form-control" >
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
                      <div class="col-sm-2">
                        <select id='jkel' name='jkel' class="form-control">
                          <?php
                            $jkel = array('L'=>'Laki-Laki','P'=>'Perempuan');
                            foreach ($jkel as $key => $value) {
                              if ($key==$row['jkel']){
                                $sel = 'selected ';
                              }else {
                                $sel = ' ';
                              }

                              echo "<option {$sel} value='".$key."'>".$value."</option>";
                            }

                          ?>
                         
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-5">
                        <input type="password" id="password" name="password" class="form-control" >
                      </div>
                    </div>

                   
                    
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    
                    <button type="button" onclick="simpan()" class="btn btn-info ">Simpan</button>
                  </div><!-- /.box-footer -->
                </form>
                  
                    
                </div><!-- /.box -->
            </div><!-- /.col -->
          </div>
        </section><!-- /.content -->
      </div>

<script type="text/javascript">
  




function simpan(){
  var kdanggota    = $("#kdanggota").val();
  var nmanggota  = $("#nmanggota").val();
  var alamat  = $("#alamat").val();
  var notelp  = $("#notelp").val();
  var email  = $("#email").val();
  var jkel  = $("#jkel").val();
  var password  = $("#password").val();
  var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
  

  if (nmanggota==''){
    alert('Lengkapi Nama anggota');
    $("#nmanggota").focus();
    return false;
  }

  if (alamat==''){
    alert('Lengkapi Alamat');
    $("#alamat").focus();
    return false;
  }

  if (notelp==''){
    alert('Lengkapi No Telp');
    $("#notelp").focus();
    return false;
  }

  if (email==''){
    alert('Lengkapi Email');
    $("#email").focus();
    return false;
  }

  if(email.match(mailformat)){  
               
  }else {  
    alert("alamat email tidak diperbolehkan!!!");  
    $("#email").focus(); 
    return false;  
  }

   if (jkel==''){
    alert('Lengkapi Jenis Kelamin');
    $("#jkel").focus();
    return false;
  }



  var jwb=confirm('Simpan Data ini ?');

        if (jwb==1){
            $.post('update.php', {
                action:'SimpanRegister', kdanggota:kdanggota,nmanggota:nmanggota,alamat:alamat,notelp:notelp,email:email,password:password,jkel:jkel}, function(data) {
                if (data == 1) {
                    alert("Data Berhasil disimpan");                                                                       
                    location.replace('index.php?action=8')
                } else if (data ==2){
                   alert("Email Sudah Terdaftar");
                   return false;
                } else {
                   alert("Data gagal Sisimpan");
                    return false;
                }
                
            }); 
        }
}





</script> 