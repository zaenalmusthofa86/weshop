<?php
    include("../../function/koneksi.php");   
    include("../../function/helper.php");   
     
    $kategori = $_POST['kategori'];
    $status = $_POST['status'];
    $button = $_POST['button'];
	
	mysqli_query($koneksi, "INSERT INTO kategori (kategori, status) VALUES('$kategori', '$status')");
		
	header("location:" .BASE_URL."index.php?page=my_profile&module=kategori&action=list");