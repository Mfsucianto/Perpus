<?php
include 'library/koneksi.php';
include_once "library/inc.library.php";

$id     	= $_POST['_id'];
$action 	= $_POST['action'];
$userid		= $_POST['_userid'];
$isi		= $_POST['_isi'];

if ($action == 'login') {
    login($_POST,$conn);
}else if ($action=='InsertBooking'){
	InsertBooking($conn,$_POST);
}else if ($action=='cekQty'){
	cekQty($conn,$userid);
}else if ($action=='hapusListTmp'){
	hapusListTmp($conn,$_POST);
}else if ($action=='batalPinjam'){
	batalPinjam($conn,$userid);
}else if ($action=='simpanKeranjang'){
	simpanKeranjang($conn,$userid);
}else if ($action=='SimpanRegister'){
	SimpanRegister($conn,$_POST);
}
  

	function login($post,$conn){
		session_start();
		//print_r($post);
		$x = 0;
		$sql = "SELECT kdanggota,nmanggota,tgl_daftar FROM anggota WHERE email='".$post['_userid']."' and  password=MD5('".$post['_password']."')";
		
		$query = mysqli_query($conn,$sql);
		$r = mysqli_fetch_array($query);
		$loginQty = mysqli_num_rows($query);
		if ($loginQty >=1) {
			$x = 1;
			$_SESSION['userid'] = $r['kdanggota'];
			$_SESSION['vName'] 	= $r['nmanggota'];
			$_SESSION['tgl_daftar'] 	= $r['tgl_daftar'];
			$_SESSION['email'] 	= $post['_userid'];

		}

		echo $x;

	}


	function InsertBooking(mysqli $conn,$post){
		$x = 0;
		

		$sql = "SELECT id FROM tmp_keranjang WHERE kdbuku='".$post['_id']."' AND kdanggota='".$post['_userid']."'";
		$query = mysqli_query($conn,$sql);
		$r = mysqli_fetch_array($query);
		$cekQty = mysqli_num_rows($query);

		if ($cekQty >=1) {
			$x = 2;

		}else{
			$sql = "INSERT INTO tmp_keranjang (kdbuku,qty,kdanggota,dCreated) values 
				('".$post['_id']."',1,'".$post['_userid']."',CURRENT_TIMESTAMP) ";
			//echo $sql;
			//exit();
			try {
			mysqli_query($conn,$sql);
				
				
				$x = 1;
			}catch(Exception $e) {
				$x = 0;
				die($e);
			}

		}
		
		echo $x;
		
	}

	function cekQty(mysqli $conn,$userid){
		$sql = "SELECT COALESCE(SUM(qty),0) AS qty FROM tmp_keranjang WHERE  kdanggota='".$userid."' ";
	    $query = mysqli_query($conn,$sql);
	    $r = mysqli_fetch_array($query);
	    $qty = $r['qty'];

		echo $qty;
	}

	function hapusListTmp(mysqli $conn,$post){
		$id = $post['id'];

	   $sql = "DELETE FROM tmp_keranjang WHERE id='".$id."'";
	   try {
			mysqli_query($conn,$sql);
				
				
				$x = 1;
			}catch(Exception $e) {
				$x = 0;
				die($e);
			}

		echo $x;
	}

	function batalPinjam(mysqli $conn,$userid){
		$sql = "DELETE FROM tmp_keranjang WHERE kdanggota='".$userid."'";
	   try {
		mysqli_query($conn,$sql);
			
			
			$x = 1;
		}catch(Exception $e) {
			$x = 0;
			die($e);
		}

		echo $x;
	}


	function simpanKeranjang(mysqli $conn,$userid){
		$x = 0;
		$tgl 		= date('Y-m-d');
		
		$kode 		= buatKode('t_pinjam',date('Ym'),'','no_pinjam',$conn);
		$query_simp = array();
		$query_stok = array();

		$sql = "INSERT into t_pinjam (no_pinjam,tglpesan,kdanggota) VALUES ('".$kode."','".$tgl."','".$userid."')";

	
		try {
			mysqli_query($conn,$sql);
			$sql = "SELECT kdbuku FROM tmp_keranjang WHERE kdanggota='".$userid."'";
			$result = mysqli_query($conn,$sql);
			while ($row = mysqli_fetch_array($result)){
				$kode_buku = $row['kdbuku'];
				

			$query_simp[] = "INSERT INTO t_pinjam_detail (no_pinjam,kdbuku,nQty) values ('".$kode."','".$kode_buku."',1)";
			$query_stok[] = "UPDATE buku SET stok=stok-1 WHERE kdbuku = '".$kode_buku."'";

			}
			
			$x = 1;
		}catch(Exception $e) {
			$x = 0;
			die($e);
		}


		foreach ($query_simp as $key => $sql) {
		 	try {
				mysqli_query($conn,$sql);
				$x = 1;
			}catch(Exception $e) {
				$x = 0;
				die($e);
			}
		 }

		foreach ($query_stok as $key => $sql) {
		 	try {
				mysqli_query($conn,$sql);
				$x = 1;
			}catch(Exception $e) {
				$x = 0;
				die($e);
			}
		 }

		//hapus data tampung
	 	$sql = "DELETE FROM tmp_keranjang WHERE kdanggota='".$userid."'";
	 	mysqli_query($conn,$sql);
		
		
		echo $x;
		
	}

	function SimpanRegister($conn,$post){
		$x = 0;


		if ($post['kdanggota']==''){
			$email = $post['email'];
			$sql   = "SELECT COUNT(kdanggota) AS jum FROM anggota WHERE email='".$email."'";
			$query = mysqli_query($conn,$sql);
		    $r = mysqli_fetch_array($query);
		    $qty = $r['jum'];

		    if ($qty > 0){
		    	echo $x = 2;
		    	exit();
		    }else{
		    	$kode = buatKode('anggota','A','','kdanggota',$conn);
		    	$pass = $post['password'];
		    	$sql = "INSERT into anggota (kdanggota,nmanggota,alamat,notelp,email,password,jkel,tgl_daftar)
		    			value ('".$kode."','".$post['nmanggota']."','".$post['alamat']."','".$post['notelp']."','".$post['email']."',md5('".$pass."'),'".$post['jkel']."',CURRENT_TIMESTAMP) ";

		    	try {
					mysqli_query($conn,$sql);
						$x = 1;
						session_start();
						$_SESSION['userid'] = $kode;
						$_SESSION['vName'] 	= $post['nmanggota'];
						$_SESSION['foto'] 		='';
						
						$_SESSION['email'] 	= $post['email'];
					}catch(Exception $e) {
						$x = 0;
						die($e);
					}


				echo $x;
		    } 
		}else{

			if ($post['password']==''){
				$pass = ' ';
			}else{
				$pass = ", password=md5('".$post['password']."')";
			}

			$sql = "UPDATE anggota SET nmanggota='".$post['nmanggota']."',alamat='".$post['alamat']."',
					notelp='".$post['notelp']."',email='".$post['email']."',jkel='".$post['jkel']."' {$pass}  
					WHERE  kdanggota='".$post['kdanggota']."'";

			
			try {
				mysqli_query($conn,$sql);
				$x = 1;
			} catch (Exception $e) {
				$x = 0;
				die($e);
			}

			echo $x;
		}
		

	}

	

?>
