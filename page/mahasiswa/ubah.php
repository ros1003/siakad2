<?php 

	$nim = $_GET['id'];

	$sql = $koneksi->query("select * from tb_mahasiswa where nim='$nim'");
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
			                    <label>Nim :</label>
			                    <input class="form-control" name="nim" value="<?php echo $tampil['nim']; ?>" readonly />
			                </div>

			                 <div class="form-group">
			                    <label>Nama :</label>
			                    <input class="form-control" name="nama" value="<?php echo $tampil['nama']; ?>" />
			                </div>

			    

			                <div class="form-group">
			                    <label>Tempat Lahir :</label>
			                    <input class="form-control" name="tempat" value="<?php echo $tampil['tempat_lahir']; ?>" />
			                </div>

			                <div class="form-group">
			                    <label>Tanggal Lahir :</label>
			                    <input class="form-control" type="date" name="tgl" value="<?php echo $tampil['tanggal_lahir']; ?>" />
			                </div>

			                <div class="form-group">
                                <label>Alamat :</label>
                                <textarea class="form-control" rows="3" name="alamat"><?php echo $tampil['alamat']; ?></textarea>
                            </div>
                        </div>
			    
			        <div class="col-md-6">   

			        		<div class="form-group">
                                <label>Smester :</label>
                                <select class="form-control" name="smester">

                                <option>-Pilih Smester-</option>
                                <option value="1" <?php if( $tampil['smester']=='1'){echo "selected"; } ?>>1</option>
                                <option value="2" <?php if( $tampil['smester']=='2'){echo "selected"; } ?>>2</option>
                                <option value="3" <?php if( $tampil['smester']=='3'){echo "selected"; } ?>>3</option>
                                <option value="4" <?php if( $tampil['smester']=='4'){echo "selected"; } ?>>4</option>
                                <option value="5" <?php if( $tampil['smester']=='5'){echo "selected"; } ?>>5</option>
                                <option value="6" <?php if( $tampil['smester']=='6'){echo "selected"; } ?>>6</option>
                                <option value="7" <?php if( $tampil['smester']=='7'){echo "selected"; } ?>>7</option>
                                <option value="8" <?php if( $tampil['smester']=='8'){echo "selected"; } ?>>8</option>
                                </select>
                            </div>

			                <div class="form-group">
                                <label>Jurusan :</label>
                                <select class="form-control" name="jurusan">

                                <option>-Pilih Jurusan-</option>}
                                option
                                    <?php 

                                    	$sql = $koneksi->query("select * from tb_jurusan");
                                    	while ($data=$sql->fetch_assoc()) {
                                    		$pilih=($data['kode_jurusan']==$tampil['kode_jurusan']?"selected":"");
                                    		echo "

                                    			<option value='$data[kode_jurusan]' $pilih>$data[nama_jurusan]</option>

                                    		";
                                    	}
                                     ?>
                                </select>
                            </div>

			                <div class="form-group">
			                	<label>Jenis Kelamin :</label>

                                <div>
                                 <input type="radio" name="jk"  value="L" <?php if($tampil['jenis_kelamin']=="L"){ echo "checked"; }?>/> Laki-laki &nbsp &nbsp &nbsp
                                 <input type="radio" name="jk"  value="P" <?php if($tampil['jenis_kelamin']=="P"){ echo "checked"; }?>/> Perempuan
                                </div>
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
			                    <label>Foto :</label>
			                    <img src="img/<?php echo $tampil['foto'] ?>" width="75" height="75">
			                </div>

			                <div class="form-group">
			                    <label>Ganti Foto :</label>
			                    <input type="file" name="foto" />
			                </div>

			                <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />

			            </form>    


<?php 
	if (isset($_POST['simpan'])) {
		
	
	
	$nama  = $_POST['nama'];
	$tempat  = $_POST['tempat'];
	$tgl  = $_POST['tgl'];
	$alamat  = $_POST['alamat'];
	$jurusan  = $_POST['jurusan'];
	$smester = $_POST['smester'];
	$jk  = $_POST['jk'];
	$email  = $_POST['email'];
	$telpon  = $_POST['telpon'];
	$pass = $_POST['pass'];

	$foto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	

	if(!empty($lokasi)) {
		move_uploaded_file($lokasi, "img/".$foto);

		$koneksi->query("UPDATE  tb_mahasiswa SET  nama='$nama', tempat_lahir='$tempat', tanggal_lahir='$tgl', alamat='$alamat', kode_jurusan='$jurusan', smester='$smester', jenis_kelamin='$jk', email='$email', telpon='$telpon', foto='$foto' where nim='$nim'");

		$koneksi->query("update tb_user set nama='$nama', foto='$foto' where user_id='$nim'");

			?>
		       <script>
				    setTimeout(function() {
				        swal({
				            title: "Selamat!",
				            text: "Data Berhasil Diubah!",
				            type: "success"
				        }, function() {
				            window.location = "?page=mahasiswa";
				        });
				    }, 300);
				</script>
	      <?php  
	}else{

		$koneksi->query("UPDATE  tb_mahasiswa SET  nama='$nama', tempat_lahir='$tempat', tanggal_lahir='$tgl', alamat='$alamat', kode_jurusan='$jurusan', smester='$smester', jenis_kelamin='$jk', email='$email', telpon='$telpon'  where nim='$nim'");

		$koneksi->query("update tb_user set nama='$nama' where user_id='$nim'");

			?>
		         <script>
				    setTimeout(function() {
				        swal({
				            title: "Selamat!",
				            text: "Data Berhasil Diubah!",
				            type: "success"
				        }, function() {
				            window.location = "?page=mahasiswa";
				        });
				    }, 300);
				</script>
	      <?php  

	}



	}

 ?>
