<?php
    include("../../function/koneksi.php");   
    include("../../function/helper.php");  

    admin_only("user", $level); 
     
    $button = isset($_POST['button']) ? $_POST['button'] : $_GET['button'];
    $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : "";
	
    $nama = isset($_POST['nama']) ? $_POST['nama'] : false;
	$email = isset($_POST["email"]) ? $_POST['email'] : false;
	// $phone = isset($_POST["phone"]) ? $_POST['phone'] : false;
	$alamat = isset($_POST["alamat"]) ? $_POST['alamat'] : false;
	$level = isset($_POST["level"]) ? $_POST['level'] : false;
	$status = isset($_POST["status"]) ? $_POST['status'] : false;

	if($button == "Add"){
		mysqli_query($koneksi, "INSERT INTO user (user , status) VALUES('$user ', '$status')");	
	}
	else if($button == "Update") {
		mysqli_query($koneksi, "UPDATE user SET nama='$nama',
											   email='$email',
											   
											   alamat='$alamat',
											   level='$level',
											   status='$status'
											   WHERE user_id='$user_id'");
	}
	else if($button == "Delete"){
		mysqli_query($koneksi, "DELETE FROM user WHERE user_id='$user_id'");
	}

    header("location: ".BASE_URL."index.php?page=my_profile&module=user&action=list");
?>