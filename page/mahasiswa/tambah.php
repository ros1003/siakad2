<div class="row">
   <div class="col-md-12">	
	<div class="panel panel-primary">
	    <div class="panel-heading">
	      Tambah Data Mahasiswa
	    </div>
			<div class="panel-body">
			    <div class="row">
			        <div class="col-md-6">
			            
			            <form role="form" method="POST" enctype="multipart/form-data">

			                <div class="form-group">
			                    <label>Nim :</label>
			                    <input class="form-control" name="nim" placeholder="Input NIM" />
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
			                    <label>Tempat Lahir :</label>
			                    <input class="form-control" name="tempat" placeholder="Input Tempat lahir" />
			                </div>

			                <div class="form-group">
			                    <label>Tanggal Lahir :</label>
			                    <input class="form-control" type="date" name="tgl"  />
			                </div>

			                <div class="form-group">
                                <label>Alamat :</label>
                                <textarea class="form-control" rows="3" name="alamat"></textarea>
                            </div>

                        </div>
			    
			        <div class="col-md-6">    
			        	<div class="form-group">
                                <label>Smester :</label>
                                <select class="form-control" name="smester">

                                <option>-Pilih Smester-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
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
                                    		echo "

                                    			<option value='$data[kode_jurusan]'>$data[nama_jurusan]</option>

                                    		";
                                    	}
                                     ?>
                                </select>
                            </div>

			                <div class="form-group">
			                	<label>Jenis Kelamin :</label>

                                <div>
                                 <input type="radio" name="jk"  value="L"/> Laki-laki &nbsp &nbsp &nbsp
                                 <input type="radio" name="jk"  value="P"/> Perempuan
                                </div>
                            </div>

                            <div class="form-group">
			                    <label>Email :</label>
			                    <input class="form-control" name="email" placeholder="Input email" />
			                </div>

			                <div class="form-group">
			                    <label>Telphone :</label>
			                    <input class="form-control" name="telpon" placeholder="Input telpon" />
			                </div>


			                <div class="form-group">
			                    <label>Foto :</label>
			                    <input type="file" name="foto" />
			                </div>

			                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />

			            </form>    


<?php 
	if (isset($_POST['simpan'])) {
		
	
	$nim  = $_POST['nim'];
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
	$upload =move_uploaded_file($lokasi, "img/".$foto);

	if ($upload) {
		
		$koneksi->query("insert into tb_mahasiswa (nim, nama, tempat_lahir, tanggal_lahir, alamat, kode_jurusan, smester, jenis_kelamin, email, telpon, foto, status_krs)values('$nim', '$nama', '$tempat', '$tgl', '$alamat', '$jurusan', '$smester', '$jk', '$email', '$telpon', '$foto', 1)");

		$koneksi->query("insert into tb_user set user_id='$nim', nama='$nama', pass='$pass', level='mahasiswa', foto='$foto'");

			?>
		        
		           <script>
					    setTimeout(function() {
					        swal({
					            title: "Selamat!",
					            text: "Data Berhasil Disimpan!",
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
