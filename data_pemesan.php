<div id="frame-data-pengiriman">

	<h3>Alamat Pengiriman Barang</h3>
	
	<div id="frame-form-pengiriman">
	
		<form action="<?php echo BASE_URL."proses_pemesanan.php"; ?>" method="POST">
		
			<div class="element-form">
				<label>Nama Penerima</label>
				<span><input type="text" name="nama_penerima" /></span>
			</div>		

			<div class="element-form">
				<label>Nomor Telepon</label>
				<span><input type="text" name="nomor_telepon" /></span>
			</div>		
			
			<div class="element-form">
				<label>Alamat Pengiriman</label>
				<span><textarea name="alamat"></textarea></span>
			</div>			
			
			<div class="element-form">
				<label>Kota</label>
				<span>
					<select name="kota">
						<?php
							$query = mysqli_query($koneksi, "SELECT * FROM kota");
							
							while($row=mysqli_fetch_assoc($query)){
								echo "<option value='$row[kota_id]'>$row[kota] </option>";
							}
						?>
					</select>
				</span>
			</div>			

			<div class="element-form">
				<span><input type="submit" value="submit" /></span>
			</div>			
			
		</form>
	</div>
</div>