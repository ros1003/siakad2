<?php 

	$nim = $_SESSION['username'];

	$sql = $koneksi->query("SELECT * from  tb_mahasiswa , tb_jurusan  
							WHERE  tb_mahasiswa.kode_jurusan = tb_jurusan.kode_jurusan
							
							AND tb_mahasiswa.nim='$nim'");
	$data=$sql->fetch_assoc();


 ?>


 <div class="row">
   <div class="col-md-12">	
	<div class="panel panel-primary">
	    <div class="panel-heading">
	      Kartu Rencana Studi Anda
	    </div>
			<div class="panel-body">
			    <div class="row">
			        <div class="col-md-6">
			            
			            <form role="form" method="POST" enctype="multipart/form-data">

			                <div class="form-group">
			                    <label>Nim :</label>
			                    <input class="form-control" name="nim" value="<?php echo $data['nim']; ?> " readonly />

			                </div>

			                 <div class="form-group">
			                    <label>Nama :</label>
			                    <input class="form-control" name="nama" value="<?php echo $data['nama']; ?>" readonly/>
			                </div>

			                
                      </div>   

                      <div class="col-md-6">
                                
                            <div class="form-group">
                                <label>Jurusan :</label>
                                <select class="form-control" name="jurusan" readonly>

                                
                                
                                    <?php 

                                    	$sql1 = $koneksi->query("select * from tb_jurusan");
                                    	while($j=$sql1->fetch_assoc()){
                                    		$pilih=($j['kode_jurusan']==$data['kode_jurusan']?"selected":"");
                                    		echo "

                                    			<option value='$j[kode_jurusan]' $pilih>$j[nama_jurusan]</option>

                                    		";
                                    	}
                                     ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Smester yang Akan Ditempuh :</label>
               					 <input class="form-control" name="smester" value="<?php echo $data['smester']; ?>" readonly />
                            </div>
					  </div> 

					<div class="row">
		                <div class="col-md-12">
		                     <!--    Hover Rows  -->
		                    <div class="panel panel-default">
		                        <div class="panel-heading">
		                            Data Mata Kuliah Yang Akan Ditempuh
		                        </div>
		                        <div class="panel-body">
		                            <div class="table-responsive">
		                                <table class="table table-hover">
		                                    <thead>
		                                        <tr>
		                                        	<th>Pilih</th>
		                                            <th>No</th>
		                                            <th>Kode Matkul</th>
		                                            <th>Mata Kuliah</th>
		                                           
		                                            <th>SKS</th>
		                                            <th>Dosen</th>
		                                            <th>Ruang</th>
		                                            <th>Jadwal</th>
		                                            
		                                        </tr>
		                                    </thead>
		                                    <tbody>

		                                    <?php 

		                                    	$smester = $data['smester'];
		                                    	$no=1;

		                                    	$mk = $koneksi->query("SELECT * from tb_matkul , tb_dosen , tb_jadwal, tb_mahasiswa,tb_ruang    
																	WHERE  tb_matkul.kode_mk = tb_jadwal.kode_mk
																	AND tb_jadwal.kode_dosen = tb_dosen.kode_dosen
																	AND tb_jadwal.kode_ruang = tb_ruang.kode_ruang
																	AND tb_mahasiswa.status_krs=1
																	AND tb_mahasiswa.nim='$nim'
																	AND tb_matkul.smester='$smester'");

		                                    	while ($tampil=$mk->fetch_assoc()) {

		                                     ?>
		                                        <tr>

		                                        	<td><input type="checkbox" name="pilih[]" value="<?php echo $tampil['kode_mk']; ?>"></td>

		                                        	 <td><?php echo $no++; ?></td>

		                                        	 <td> 
			                                            <div class="form-group">
				                    
										                    <input class="form-control" name="kd_mk" value="<?php echo $tampil['kode_mk']; ?> " readonly style="width: 75px;" />

										                </div>   
									                </td>

		                                            <td><?php echo $tampil['nama_mk']; ?></td>
		                                            <td><?php echo $tampil['sks']; ?></td>
		                                            <td><?php echo $tampil['nama_dosen']; ?></td> 
		                                            <td><?php echo $tampil['nama_ruang']; ?></td> 
		                                            <td><?php echo date('d F Y', strtotime( $tampil['tanggal'])).', &nbsp;'.date('G:i ', strtotime($tampil['jam_mulai'])).'-'.date('G:i', strtotime( $tampil['jam_selesai'])).'&nbsp; WIB'; ?> 
			                                        </td> 
									                
			                                         
			                                        
		                                        </tr>

		                                      <?php } ?>  
		                                    </tbody> 
		                                 </table>

		                              </div>

		                          </div>             
		                          <input type="submit" name="simpan" value="Tambah" class="btn btn-primary" >

					</form>	  


				<a href="?page=krs&aksi=lihat&smester=<?php echo $smester;?>" class="btn btn-success" style="margin-left: 20px;">Lihat KRS</a>

<?php 


	if (isset($_POST['simpan'])) {

		$nim = $_POST['nim'];
		$jurusan = $_POST['jurusan'];

		$jumlah = count($_POST['pilih']);

		for ($i=0; $i < $jumlah ; $i++) { 
			$pilih= $_POST['pilih'][$i];

		$simpan = $koneksi->query("insert into tb_krs(kode_mk, nim, kode_jurusan, status_nilai)values('$pilih','$nim','$jurusan', 1)");
		$update = $koneksi->query("update tb_mahasiswa set status_krs=0 where nim='$nim'");
		
		if ($simpan) {
			?>

				<script>
					    setTimeout(function() {
					        swal({
					            title: "Selamat!",
					            text: "KRS Berhasil Ditambahkan!",
					            type: "success"
					        }, function() {
					            window.location = "?page=krs";
					        });
					    }, 300);
					</script>

			<?php
		}

		}
	}


 ?>


									                
		                                          
		                                            
		                                            
			                                            
				                    
									                

									                
		                                            
		                                             

									                 