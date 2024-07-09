<?php 

	$id = $_GET['id'];

	$ambil = $koneksi->query("select * from tb_jadwal where id='$id'");
	$tampil=$ambil->fetch_assoc();
 ?>
<div class="row">
    <div class="col-md-8">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Ubah Jadwal
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="POST">

                        	<div class="form-group">
                                <label>Mata Kuliah :</label>
                                <select class="form-control" name="matkul">
                                    <option>-Pilih Mata Kuliah-</option>
                                    <?php 
                                    	$sql = $koneksi->query("select * from tb_matkul");
                                    	while ($data=$sql->fetch_assoc()) {
                                    	$pilih2=($data['kode_mk']==$tampil['kode_mk']?"selected":"");		
                                    		echo "

                                    			<option value='$data[kode_mk]' $pilih2>$data[nama_mk]</option>

                                    		";
                                    	}
                                     ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Ruang :</label>
                                <select class="form-control" name="ruang">
                                    <option>-Pilih Ruang-</option>
                                    <?php 
                                    	$sql = $koneksi->query("select * from tb_ruang");
                                    	while ($data=$sql->fetch_assoc()) {
                                    	$pilih1=($data['kode_ruang']==$tampil['kode_ruang']?"selected":"");		
                                    		echo "

                                    			<option value='$data[kode_ruang]' $pilih1>$data[nama_ruang]</option>

                                    		";
                                    	}
                                     ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Dosen :</label>
                                <select class="form-control" name="dosen">
                                    <option>-Pilih Dosen-</option>
                                    <?php 
                                    	$sql = $koneksi->query("select * from tb_dosen");	
                                    	while ($data=$sql->fetch_assoc()) {
                                    	$pilih=($data['kode_dosen']==$tampil['kode_dosen']?"selected":"");		
                                    		echo "

                                    			<option value='$data[kode_dosen]' $pilih>$data[nama_dosen]</option>

                                    		";
                                    	}
                                     ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tanggal :</label>
                                <input type="date" class="form-control" name="tanggal" value="<?php echo $tampil['tanggal']; ?>" />
                            </div>

                             <div class="form-group">
                                <label>Jam Mulai :</label>
                                <input type="time" class="form-control" name="jam_m" value="<?php echo $tampil['jam_mulai']; ?>" />
                            </div>

                             <div class="form-group">
                                <label>Jam Selesai :</label>
                                <input type="time" class="form-control" name="jam_s" value="<?php echo $tampil['jam_selesai']; ?>" />
                            </div>

                             <input type="submit" name="ubah" value="ubah" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                        </form>

<?php 

	if (isset($_POST['ubah'])) {
		
		$matkul = $_POST['matkul'];
		$ruang = $_POST['ruang'];
		$dosen = $_POST['dosen'];
		$tanggal = $_POST['tanggal'];
		$jam_m = $_POST['jam_m'];
		$jam_s = $_POST['jam_s'];


		$simpan = $koneksi->query("update  tb_jadwal set kode_mk='$matkul', kode_ruang='$ruang', tanggal='$tanggal', jam_mulai='$jam_m', jam_selesai='$jam_s', kode_dosen='$dosen' where id = '$id' ");


		if ($simpan) {
			echo "

					<script>
					    setTimeout(function() {
					        swal({
					            title: 'Selamat!',
					            text: 'Data Berhasil Diubah!',
					            type: 'success'
					        }, function() {
					            window.location = '?page=jadwal';
					        });
					    }, 300);
					</script>

			";
		}

	}

 ?>
                            