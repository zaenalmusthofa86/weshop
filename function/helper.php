<?php
	
	define("BASE_URL", "http://localhost/weshop/");

	function rupiah($nilai = 0){
		$srtring = "Rp," . number_format($nilai);
		return $srtring;
	}