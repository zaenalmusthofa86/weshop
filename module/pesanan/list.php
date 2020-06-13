<?php
	$search = isset($_GET["search"]) ? $_GET["search"] : false;

	$where = "";
	$search_url ="";
	if ($search) {
		$search_url = "&search=$search";
		$where = "WHERE pesanan.nama_penerima LIKE '%$search%'";
	}

?>

<div id="frame-tambah">
	<div id="left">
		<form action="<?php echo BASE_URL."index.php"; ?>" method='GET'>
			<input type="hidden" name="page" value="<?php echo $_GET["page"]; ?>" />
			<input type="hidden" name="module" value="<?php echo $_GET["module"]; ?>" />
			<input type="hidden" name="action" value="<?php echo $_GET["action"]; ?>" />
			<input type="text" name="search" value="<?php  echo $search; ?>" />
			<input type="submit" value="Search" />
		</form>
	</div>	
</div>
<br>

<?php

	$pagination = isset($_GET['pagination']) ? $_GET['pagination'] : 1;
	$data_per_halaman = 3;
	$mulai_dari = ($pagination-1) * $data_per_halaman;

	if($level == "superadmin"){
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id $where ORDER BY pesanan.tanggal_pemesanan ASC LIMIT $mulai_dari, $data_per_halaman");
	}else{
		$queryPesanan = mysqli_query($koneksi, "SELECT pesanan.*, user.nama FROM pesanan JOIN user ON pesanan.user_id=user.user_id  $where WHERE pesanan.user_id='$user_id' ORDER BY pesanan.tanggal_pemesanan ASC LIMIT $mulai_dari, $data_per_halaman");
	}
	
	if(mysqli_num_rows($queryPesanan) == 0){
		echo "<h3>Saat ini belum ada data pesanan</h3>";
	}
	else{
	
		echo "<table class='table-list'>
				<tr class='baris-title'>
					<th class='kiri'>Nomor Pesanan</th>
					<th class='kiri'>Status</th>
					<th class='kiri'>Nama</th>
					<th class='kiri'>Action</th>
				</tr>";
		
		$adminButton = "";
		while($row=mysqli_fetch_assoc($queryPesanan)){
			if($level == "superadmin"){
				$adminButton = "<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=status&pesanan_id=$row[pesanan_id]'>Update Status</a>";
			}
		
			$status = $row['status'];
			echo "<tr>
					<td class='kiri'>$row[pesanan_id]</td>
					<td class='kiri'>$arrayStatusPesanan[$status]</td>
					<td class='kiri'>$row[nama]</td>
					<td class='kiri'>
						<a class='tombol-action' href='".BASE_URL."index.php?page=my_profile&module=pesanan&action=detail&pesanan_id=$row[pesanan_id]'>Detail Pesanan</a>
						$adminButton
					</td>
				 </tr>";
		}
		
		echo "</table>";

		$queryHitungPesanan = mysqli_query($koneksi, "SELECT * FROM pesanan $where");
		pagination ($queryHitungPesanan, $data_per_halaman, $pagination, "index.php?page=my_profile&module=pesanan&action=list$search_url");
	}
	
?>