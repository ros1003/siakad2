<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Mahasiswa
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Jurusan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 

                                    	$no=1;

                                    	$sql = $koneksi->query("select * from tb_mahasiswa inner join tb_jurusan
                                    							on tb_mahasiswa.kode_jurusan = tb_jurusan.kode_jurusan");
                                    	while ($data=$sql->fetch_assoc()) {
                                    		
                                    	

                                     ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nim']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td>
                                            	<?php 

                                            		if ($data['jenis_kelamin']=="L") {
                                            			echo "Laki-laki";
                                            		}else{
                                            			echo "Perempuan";
                                            		}

                                            	 ?>
                                            </td>
                                            <td><?php echo $data['alamat']; ?></td>
                                            <td><?php echo $data['nama_jurusan']; ?></td>

                                            <td>
                                            	<a href="?page=mahasiswa&aksi=ubah&id=<?php echo $data['nim']; ?>" class=" btn btn-info" ><i class="fa fa-edit"></i> Ubah</a>

                                            	<a onclick="return confirm('Yakin Akan Mengahapus Data Ini...???')" href="?page=mahasiswa&aksi=hapus&id=<?php echo $data['nim']; ?>" class=" btn btn-danger" ><i class="fa fa-trash"></i> Hapus</a>

                                            	<a href="?page=mahasiswa&aksi=detail&id=<?php echo $data['nim']; ?>" class=" btn btn-success" ><i class="glyphicon glyphicon-list-alt"></i> Detail</a>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                    </tbody> 


                                </table> 
                              </div>   

                                 <a href="?page=mahasiswa&aksi=tambah" class=" btn btn-primary" style="margin-top: 8px;" ><i class="fa fa-plus"></i> Tambah Data</a>     