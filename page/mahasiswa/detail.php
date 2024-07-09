<?php 

	$nim = $_GET['id'];

	$sql = $koneksi->query("select * from tb_mahasiswa inner join tb_jurusan
                            on tb_mahasiswa.kode_jurusan = tb_jurusan.kode_jurusan and nim='$nim'");	

	$data=$sql->fetch_assoc();

 ?>	

 <style type="text/css" media="screen">
 	.style2 {
    color: black;
    font-weight: bold;
    margin-left:20px ;
    font-family: "comic sans ms", cursive; 
}
 </style>

				 <div class="col-md-9 col-sm-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Detail Mahasiswa
                        </div>
                        <div class="panel-body">
                            
                            	<table>
                            		<tr>
                            			
                            			<td rowspan="10"><img src="img/<?php echo $data['foto']; ?>" width="150" height="175"> </td>
                            		</tr>
                            		
						             <tr>
                            			<td><span class="style2"> Nim </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['nim']; ?></span></td>
                            		</tr>

                            		<tr>
                            			<td><span class="style2"> Nama </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['nama']; ?></span></td>
                            		</tr>

                            		<tr>
                            			<td><span class="style2"> Tempat / Tanggal lahir </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['tempat_lahir'].','.date('d F Y', strtotime( $data['tanggal_lahir'])); ?></span></td>
                            		</tr>

                            		<tr>
                            			<td><span class="style2"> Alamat </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['alamat']; ?></span></td>
                            		</tr>

                            		<tr>
                            			<td><span class="style2"> Jurusan </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['nama_jurusan']; ?></span></td>
                            		</tr>

                            		<tr>
                            			<td><span class="style2"> Jenis Kelamin </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> 
                            			<?php  

                            				if ($data['jenis_kelamin']=="L"){
                            					echo "Laki-laki";
                            				}else{
                            					echo"Perempuan";
                            				} 

                            			?>
                            			
                            			</span></td>
                            		</tr>

                            		<tr>
                            			<td><span class="style2"> Email </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['email']; ?></span></td>
                            		</tr>

                            		<tr>
                            			<td><span class="style2"> Telepon </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['telpon']; ?></span></td>
                            		</tr>
                            	</table>
                            
                        </div>
                        <div class="panel-footer">
                           <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                           <a href="./cetak/ktm.php?id=<?php echo $nim; ?>" class="btn btn-default" target="blank" ><i class="fa fa-print"></i> Cetak KTM</a>
                        </div>
                    </div>
                </div>