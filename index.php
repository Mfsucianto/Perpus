<?php
include 'ses.php';
$userid = $_SESSION['userid'];

include 'library/koneksi.php';
include 'header.php';

$action = $_GET['action'];
switch ($action) {
	 case '1':
		include 'list_barang.php';
		break;
	case '2':
		include 'jenis_buku.php';
		break;
	case '3':
		include 'keranjang_buku.php';
		break;
	case '4':
		include 'transaksi_tampil.php';
		break;
	case '5':
		include 'transaksi_detail.php';
		break;
	case '6':
		include 'detail_buku.php';
		break;
	case '7':
		include 'peraturan.php';
		break;
	case '8':
		include 'profile.php';
		break;
	 default:
		include 'body.php';
		break;
}

include 'footer.php';

?>

<script type="text/javascript">
	$(document).ready(function() {

	});
function InsertBooking(id,userid){
	 $.post('update.php', {
            action:'InsertBooking', _id:id,_userid:userid}, function(data) {
            if (data == 1) {                                                                       
                alert("Buku Berhasil di pesan");
                cekQty(userid);
                return false;
            } else if (data==2) {
               alert("Buku sudah ada di keranjang pemesanan!");
               return false;
            }else {
               alert("proses gagal!");
               return false;
            }
            
        }); 
}

function cekQty(userid){
	 $.post('update.php', {
            action:'cekQty', _userid:userid}, function(data) {
            $('#total_keranjang').html(data);
            
        }); 
}



</script>