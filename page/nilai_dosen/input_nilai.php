<?php

	$kode_mk = $_GET['kode_mk'];
	$nim = $_GET['id'];
	$dosen = $_GET['dosen'];
	$krs = $_GET['krs'];
	$sql = $koneksi->query("select * from tb_mahasiswa, tb_matkul, tb_dosen
							where tb_mahasiswa.nim = '$nim'
							and  tb_matkul.kode_mk='$kode_mk'
							and  tb_dosen.kode_dosen = '$dosen'");

	$tampil = $sql->fetch_assoc();



 ?>



<div class="row">
    <div class="col-md-8">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Input Nilai Mahasiswa
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="POST">

                        	<div class="form-group">
                                <label>Nim :</label>
                                <input type="text" class="form-control" name="nim" value="<?php echo $tampil['nim']; ?>" readonly />
                            </div>

                            <div class="form-group">
                                <label>Nim :</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $tampil['nama']; ?>" readonly />
                            </div>

                            <div class="form-group">
                                <label>Kode Mata Kuliah :</label>
                                <input type="text" class="form-control" name="kode_mk" value="<?php echo $tampil['kode_mk']; ?>" readonly />
                            </div>

                             <div class="form-group">
                                <label>Nama Mata Kuliah :</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $tampil['nama_mk'];?>" readonly />
                            </div>

                            <div class="form-group">
                                <label>SKS :</label>
                                <input type="number" class="form-control" name="sks"  value="<?php echo $tampil['sks'];?>" readonly />
                            </div>

                            <div class="form-group">
                                <label>Kode Dosen :</label>
                                <input type="text" class="form-control" name="kode_dosen"  value="<?php echo $tampil['kode_dosen'];?>" readonly />
                            </div>

                             <div class="form-group">
                                <label>Kode Dosen :</label>
                                <input type="text" class="form-control" name="nama_dosen"  value="<?php echo $tampil['nama_dosen'];?>" readonly />
                            </div>


                            <div class="form-group">
                                <label>Smester Yang Ditempuh :</label>
                                <input type="number" class="form-control" name="smester"  value="<?php echo $tampil['smester'];?>" readonly />
                            </div>

                            <div class="form-group">
                                <label>Tugas :</label>
                                <input type="number" class="form-control" name="tugas"   />
                            </div>

                            <div class="form-group">
                                <label>UTS :</label>
                                <input type="number" class="form-control" name="uts"   />
                            </div>

                            <div class="form-group">
                                <label>UAS :</label>
                                <input type="number" class="form-control" name="uas"   />
                            </div>





                             <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                        </form>

<?php

	if (isset($_POST['simpan'])) {

		$nim = $_POST['nim'];
		$kode_mk = $_POST['kode_mk'];
		$kode_dosen = $_POST['kode_dosen'];
		$smester = $_POST['smester'];
		$tugas = $_POST['tugas'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];




		$simpan = $koneksi->query("insert into tb_nilai (nim, kode_mk, kode_dosen, smester, tugas, uts, uas)
									values('$nim', '$kode_mk', '$kode_dosen', '$smester', '$tugas', '$uts', '$uas')");

		$update = $koneksi->query("update tb_krs set status_nilai=0 where kode='$krs'");


		if ($simpan) {
			echo "

					<script>
					    setTimeout(function() {
					        swal({
					            title: 'Selamat!',
					            text: 'Data Berhasil Disimpan!',
					            type: 'success'
					        }, function() {
					            window.location = '?page=nilai_d&aksi=lihat_mhs&kode_mk=$kode_mk&dosen=$dosen';
					        });
					    }, 300);
					</script>

			";
		}

	}

 ?>
