<?php
session_start();

unset ($_SESSION['userid']); 
unset ($_SESSION['vName']); 
unset ($_SESSION['foto']); 
unset ($_SESSION['tgl_daftar']); 
unset ($_SESSION['email']);


echo"<script>
		location.replace('index.php')</script>";
exit;
?>