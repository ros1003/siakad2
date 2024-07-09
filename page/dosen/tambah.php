<?php 

		$sql = $koneksi->query("select kode_dosen from tb_dosen order by kode_dosen desc");

		$data = $sql->fetch_assoc();

		$kode_dosen = $data['kode_dosen'];

		$urut = substr($kode_dosen, 1, 3);
		$tambah = (int) $urut+1;
		

		if(strlen($tambah) == 1){
			$format="D"."00".$tambah;
		}else if(strlen($tambah) == 2){
			$format="D"."0".$tambah;
		}else{
			$format="D".$tambah;
		}


 ?>
<div class="row">
   <div class="col-md-8">	
	<div class="panel panel-primary">
	    <div class="panel-heading">
	      Tambah Data Dosen
	    </div>
			<div class="panel-body">
			    <div class="row">
			        <div class="col-md-12">
			            
			            <form role="form" method="POST" enctype="multipart/form-data">

			                <div class="form-group">
			                    <label>Kode Dosen :</label>
			                    <input class="form-control" name="kode" value="<?php echo $format; ?>" readonly  />
			                </div>

			                 <div class="form-group">
			                    <label>Nama :</label>
			                    <input class="form-control" name="nama" placeholder="Input Nama" />
			                </div>

			                <div class="form-group">
			                    <label>Password :</label>
			                    <input class="form-control" type="password" name="pass" placeholder="Input Password" />
			                </div>

			                <div class="form-group">
			                    <label>Email :</label>
			                    <input class="form-control" name="email" placeholder="Input email" />
			                </div>

			                <div class="form-group">
			                    <label>Telphone :</label>
			                    <input class="form-control" name="telpon" placeholder="Input Telpon" />
			                </div>


			                <div class="form-group">
                                <label>Alamat :</label>
                                <textarea class="form-control" rows="3" name="alamat"></textarea>
                            </div>

                           

			                <div class="form-group">
			                    <label>Foto :</label>
			                    <input type="file" name="foto" />
			                </div>

			                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />  

                        </div>
			
			            </form>    


<?php 
	if (isset($_POST['simpan'])) {
		
	
	$kode  = $_POST['kode'];
	$nama  = $_POST['nama'];
	$alamat  = $_POST['alamat'];
	$email  = $_POST['email'];
	$telpon  = $_POST['telpon'];
	$pass = $_POST['pass'];

	$foto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	$upload =move_uploaded_file($lokasi, "img/dosen/".$foto);

	if ($upload) {
		
		$koneksi->query("insert into tb_dosen (kode_dosen, nama_dosen, telpon, email,  alamat, foto)values('$kode', '$nama', '$telpon', '$email',  '$alamat',  '$foto')");

		$koneksi->query("insert into tb_user set user_id='$kode', nama='$nama', pass='$pass', level='dosen', foto='$foto'");

			?>
		        
		           <script>
					    setTimeout(function() {
					        swal({
					            title: "Selamat!",
					            text: "Data Berhasil Disimpan!",
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
