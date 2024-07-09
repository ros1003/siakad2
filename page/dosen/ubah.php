<?php 

	$kode = $_GET['id'];

	$sql = $koneksi->query("select * from tb_dosen where kode_dosen='$kode'");
	$tampil = $sql->fetch_assoc();

 ?>

<div class="row">
   <div class="col-md-12">	
	<div class="panel panel-primary">
	    <div class="panel-heading">
	      Ubah Data Mahasiswa
	    </div>
			<div class="panel-body">
			    <div class="row">
			        <div class="col-md-6">
			            
			            <form role="form" method="POST" enctype="multipart/form-data">

			                <div class="form-group">
			                    <label>Kode Dosen :</label>
			                    <input class="form-control" name="kode" value="<?php echo $tampil['kode_dosen']; ?>" readonly />
			                </div>

			                 <div class="form-group">
			                    <label>Nama :</label>
			                    <input class="form-control" name="nama" value="<?php echo $tampil['nama']; ?>" />
			                </div>

			    			<div class="form-group">
			                    <label>Email :</label>
			                    <input class="form-control" name="email" value="<?php echo $tampil['email']; ?>" />
			                </div>

			                <div class="form-group">
			                    <label>Telphone :</label>
			                    <input class="form-control" name="telpon"value="<?php echo $tampil['telpon']; ?>" />
			                </div>

			                
			                <div class="form-group">
                                <label>Alamat :</label>
                                <textarea class="form-control" rows="3" name="alamat"><?php echo $tampil['alamat']; ?></textarea>
                            </div>
                       
			    
			                <div class="form-group">
			                    <label>Foto :</label>
			                    <img src="img/dosen/<?php echo $tampil['foto'] ?>" width="75" height="75">
			                </div>

			                <div class="form-group">
			                    <label>Ganti Foto :</label>
			                    <input type="file" name="foto" />
			                </div>


			                <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />

			              </div>
			            </form>    


<?php 
	if (isset($_POST['simpan'])) {
		
	
	
	
	$nama  = $_POST['nama'];
	$alamat  = $_POST['alamat'];
	$email  = $_POST['email'];
	$telpon  = $_POST['telpon'];
	$pass = $_POST['pass'];

	$foto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	

	if(!empty($lokasi)) {
		move_uploaded_file($lokasi, "img/dosen/".$foto);

		$koneksi->query("UPDATE  tb_dosen SET  nama_dosen='$nama',  alamat='$alamat',  email='$email', telpon='$telpon', foto='$foto' where kode_dosen='$kode'");

		$koneksi->query("update tb_user set nama='$nama', foto='$foto' where user_id='$kode'");

			?>
		       <script>
				    setTimeout(function() {
				        swal({
				            title: "Selamat!",
				            text: "Data Berhasil Diubah!",
				            type: "success"
				        }, function() {
				            window.location = "?page=dosen";
				        });
				    }, 300);
				</script>
	      <?php  
	}else{

		$koneksi->query("UPDATE  tb_dosen SET  nama_dosen='$nama',  alamat='$alamat', email='$email', telpon='$telpon'  where kode_dosen='$kode'");

		$koneksi->query("update tb_user set nama='$nama' where user_id='$kode'");

			?>
		         <script>
				    setTimeout(function() {
				        swal({
				            title: "Selamat!",
				            text: "Data Berhasil Diubah!",
				            type: "success"
				        }, function() {
				            window.location = "?page=dosen";
				        });
				    }, 300);
				</script>
	      <?php  

	}



	}

 ?>
