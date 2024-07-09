<?php 
		
		$kode = $_GET['id'];
		$sql = $koneksi->query("select * from tb_matkul where kode_mk='$kode' ");

		$data = $sql->fetch_assoc();

		

 ?>

<div class="row">
    <div class="col-md-8">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                Ubah Mata Kuliah
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="POST">

                        	
                            <div class="form-group">
                                <label>Kode Mata Kuliah :</label>
                                <input type="text" class="form-control" name="kode" value="<?php echo $data['kode_mk']; ?>" readonly />
                            </div>

                             <div class="form-group">
                                <label>Nama Mata Kuliah :</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_mk']; ?>" />
                            </div>

                             <div class="form-group">
                                <label>SKS :</label>
                                <input type="number" class="form-control" name="sks" value="<?php echo $data['sks']; ?>"/>
                            </div>

                            <div class="form-group">
                                <label>Smester :</label>
                                <select class="form-control" name="smester">

                                <option>-Pilih Smester-</option>
                                <option value="1" <?php if( $data['smester']=='1'){echo "selected"; } ?>>1</option>
                                <option value="2" <?php if( $data['smester']=='2'){echo "selected"; } ?>>2</option>
                                <option value="3" <?php if( $data['smester']=='3'){echo "selected"; } ?>>3</option>
                                <option value="4" <?php if( $data['smester']=='4'){echo "selected"; } ?>>4</option>
                                <option value="5" <?php if( $data['smester']=='5'){echo "selected"; } ?>>5</option>
                                <option value="6" <?php if( $data['smester']=='6'){echo "selected"; } ?>>6</option>
                                <option value="7" <?php if( $data['smester']=='7'){echo "selected"; } ?>>7</option>
                                <option value="8" <?php if( $data['smester']=='8'){echo "selected"; } ?>>8</option>
                                </select>
                            </div>

                             <input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                        </form>

<?php 

	if (isset($_POST['ubah'])) {
		
		
		$nama = $_POST['nama'];
		$sks = $_POST['sks'];
		$smester = $_POST['smester'];
		


		$ubah = $koneksi->query("update tb_matkul set  nama_mk='$nama', sks='$sks', smester='$smester' where kode_mk='$kode' ");


		if ($ubah) {
			echo "

					<script>
					    setTimeout(function() {
					        swal({
					            title: 'Selamat!',
					            text: 'Data Berhasil Diubah!',
					            type: 'success'
					        }, function() {
					            window.location = '?page=matkul';
					        });
					    }, 300);
					</script>

			";
		}

	}

 ?>
                            