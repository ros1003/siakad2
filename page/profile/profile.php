<?php

	$id = $_SESSION['username'];

	$sql = $koneksi->query("select * from tb_mahasiswa inner join tb_jurusan
                            on tb_mahasiswa.kode_jurusan = tb_jurusan.kode_jurusan and nim='$id'");
    $data=$sql->fetch_assoc();

    $sql2 = $koneksi->query("select * from tb_dosen where kode_dosen='$id'");


	$data2=$sql2->fetch_assoc();

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
                            Profile
                        </div>
                        <div class="panel-body">

                            	<table>
                            		<tr>
                                        <?php if ($_SESSION['mahasiswa']) {?>

                            			<td rowspan="10"><img src="img/<?php echo $data['foto']; ?>" width="150" height="175" style="border-radius: 50%; border: 2px solid gray;"> </td>

                                        <?php } ?>

                                        <?php if ($_SESSION['dosen']) {?>
                                        <td rowspan="6"><img src="img/dosen/<?php echo $data2['foto']; ?>" width="150" height="175" style="border-radius: 50%; border: 2px solid gray;"> </td>
                                          <?php } ?>
                            		</tr>

                            		 <?php if ($_SESSION['dosen']) {?>
                                    <tr>

                                        <td><span class="style2"> Kode Dosen </span></td>
                                        <td><span class="style2"> :</span></td>
                                        <td><span class="style2"> <?php echo $data2['kode_dosen']; ?></span></td>
                                    </tr>
                                     <?php } ?>

                                     <?php if ($_SESSION['mahasiswa']) {?>
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
                                    <?php } ?>

                                     <?php if ($_SESSION['dosen']) {?>
                                    <tr>

                                        <td><span class="style2"> Nama </span></td>
                                        <td><span class="style2"> :</span></td>
                                        <td><span class="style2"> <?php echo $data2['nama_dosen']; ?></span></td>
                                    </tr>
                                     <?php } ?>


                                     <?php if ($_SESSION['mahasiswa']) {?>
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
                                     <?php } ?>

                                     <?php if ($_SESSION['dosen']) {?>
                                    <tr>
                                        <td><span class="style2"> Alamat </span></td>
                                        <td><span class="style2"> :</span></td>
                                        <td><span class="style2"> <?php echo $data2['alamat']; ?></span></td>
                                    </tr>
                                     <?php } ?>


                                     <?php if ($_SESSION['mahasiswa']) {?>
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
                                    <?php } ?>

                                    <?php if ($_SESSION['dosen']) {?>
                                    <tr>
                                        <td><span class="style2"> Email </span></td>
                                        <td><span class="style2"> :</span></td>
                                        <td><span class="style2"> <?php echo $data2['email']; ?></span></td>
                                    </tr>
                                     <?php } ?>

                                    <?php if ($_SESSION['mahasiswa']) {?>
                            		<tr>
                            			<td><span class="style2"> Telepon </span></td>
                            			<td><span class="style2"> :</span></td>
                            			<td><span class="style2"> <?php echo $data['telpon']; ?></span></td>
                            		</tr>
                                    <?php } ?>

                                    <?php if ($_SESSION['dosen']) {?>
                                    <tr>
                                        <td><span class="style2"> Telepon </span></td>
                                        <td><span class="style2"> :</span></td>
                                        <td><span class="style2"> <?php echo $data2['telpon']; ?></span></td>
                                    </tr>
                                    <?php } ?>
                            	</table>

                        </div>
                        <div class="panel-footer">

                           <a href="?page=profile&aksi=ubahpass&id=<?php echo $id; ?>" class="btn btn-success" >Ubah Password</a>

<?php if ($_SESSION['mahasiswa']) {?>
                           <a href="?page=profile&aksi=ubahsmester&id=<?php echo $id; ?>" class="btn btn-success" >Ubah Smester</a>
	<?php } ?>												 


                           <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                        </div>
                    </div>
                </div>
