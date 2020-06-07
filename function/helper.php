<?php
	
	define("BASE_URL", "http://localhost/weshop/");
	
	$arrayStatusPesanan[0] = "Menunggu Pembayaran";
	$arrayStatusPesanan[1] = "Pembayaran Sedang Di Validasi";
	$arrayStatusPesanan[2] = "Lunas";
	$arrayStatusPesanan[3] = "Pembayaran Di Tolak";

	function rupiah($nilai = 0){
		$srtring = "Rp," . number_format($nilai);
		return $srtring;
	}

	function kategori($kategori_id = false){
		global $koneksi;
		
		$string = "<div id='menu-kategori'>";
			
			$string .= "<ul>";
				
					$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");
					
					while($row=mysqli_fetch_assoc($query)){
						$kategori = strtolower($row['kategori']);
						if($kategori_id == $row['kategori_id']){
							$string .= "<li><a href='".BASE_URL."$row[kategori_id]/$kategori.html' class='active'>$row[kategori]</a></li>";
						}else{
							$string .= "<li><a href='".BASE_URL."$row[kategori_id]/$kategori.html'>$row[kategori]</a></li>";
						}
					}
			
			$string .= "</ul>";
		
		$string .= "</div>";		
		
		return $string;
	}