<?php 
		
		$id = $_GET['id'];
		$sql = $koneksi->query("select * from tb_jurusan where id='$id' ");

		$data = $sql->fetch_assoc();

		

 ?>

<div class="row">
    <div class="col-md-8">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Ubah Jurusan
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="POST">

                        	
                            <div class="form-group">
                                <label>Kode Jurusan :</label>
                                <input type="text" class="form-control" name="kode" value="<?php echo $data['kode_jurusan']; ?>"  />
                            </div>

                             <div class="form-group">
                                <label>Nama Jurusan :</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_jurusan']; ?>" />
                            </div>

                            

                             <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                        </form>

<?php 

	if (isset($_POST['simpan'])) {
		
		$kode = $_POST['kode'];
		$nama = $_POST['nama'];
		
		


		$simpan = $koneksi->query("update  tb_jurusan set kode_jurusan = '$kode', nama_jurusan='$nama' where id = '$id' ");


		if ($simpan) {
			echo "

					<script>
					    setTimeout(function() {
					        swal({
					            title: 'Selamat!',
					            text: 'Data Berhasil Diubah!',
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
                            