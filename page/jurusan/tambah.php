<div class="row">
    <div class="col-md-8">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Tambah Jurusan
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="POST">

                        	
                            <div class="form-group">
                                <label>Kode Jurusan :</label>
                                <input type="text" class="form-control" name="kode" />
                            </div>

                             <div class="form-group">
                                <label>Nama Jurusan :</label>
                                <input type="text" class="form-control" name="nama" />
                            </div>

                            

                             <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                        </form>

<?php 

	if (isset($_POST['simpan'])) {
		
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		
		


		$simpan = $koneksi->query("insert into tb_jurusan (kode_jurusan, nama_jurusan)
									values('$kode', '$nama')");


		if ($simpan) {
			echo "

					<script>
					    setTimeout(function() {
					        swal({
					            title: 'Selamat!',
					            text: 'Data Berhasil Disimpan!',
					            type: 'success'
					        }, function() {
					            window.location = '?page=jurusan';
					        });
					    }, 300);
					</script>

			";
		}

	}

 ?>
                            