<div class="row">
    <div class="col-md-8">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Tambah Jadwal
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
                                    		echo "

                                    			<option value='$data[kode_mk]'>$data[nama_mk] || $data[smester]</option>

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
                                    		echo "

                                    			<option value='$data[kode_ruang]'>$data[nama_ruang]</option>

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
                                    		echo "

                                    			<option value='$data[kode_dosen]'>$data[nama_dosen]</option>

                                    		";
                                    	}
                                     ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Tanggal :</label>
                                <input type="date" class="form-control" name="tanggal" />
                            </div>

                             <div class="form-group">
                                <label>Jam Mulai :</label>
                                <input type="time" class="form-control" name="jam_m" />
                            </div>

                             <div class="form-group">
                                <label>Jam Selesai :</label>
                                <input type="time" class="form-control" name="jam_s" />
                            </div>

                             <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                        </form>

<?php

	if (isset($_POST['simpan'])) {

		$matkul = $_POST['matkul'];
		$ruang = $_POST['ruang'];
		$dosen = $_POST['dosen'];
		$tanggal = $_POST['tanggal'];
		$jam_m = $_POST['jam_m'];
		$jam_s = $_POST['jam_s'];


		$simpan = $koneksi->query("insert into tb_jadwal (kode_mk, kode_ruang, tanggal, jam_mulai, jam_selesai, kode_dosen)
									values('$matkul', '$ruang', '$tanggal', '$jam_m', '$jam_s', '$dosen')");


		if ($simpan) {
			echo "

					<script>
					    setTimeout(function() {
					        swal({
					            title: 'Selamat!',
					            text: 'Data Berhasil Disimpan!',
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
