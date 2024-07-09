<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Dosen
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                        	<th>Kode Dosen</th>
                                            <th>Nama</th>
                                            <th>Telpon</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 

                                    	$no=1;

                                    	$sql = $koneksi->query("select * from  tb_dosen");
                                    	while ($data=$sql->fetch_assoc()) {
                                    		
                                    	

                                     ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['kode_dosen']; ?></td>
                                            <td><?php echo $data['nama_dosen']; ?></td>
                                            <td><?php echo $data['telpon']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['alamat']; ?></td>
                                             <td><img src="img/dosen/<?php echo $data['foto']; ?>" alt="" width="75" height="75"> </td>
                                           
                                            <td>
                                            	<a href="?page=dosen&aksi=ubah&id=<?php echo $data['kode_dosen']; ?>" class=" btn btn-info" ><i class="fa fa-edit"></i> Ubah</a>

                                            	<a onclick="return confirm('Yakin Akan Mengahapus Data Ini...???')" href="?page=dosen&aksi=hapus&id=<?php echo $data['kode_dosen']; ?>" class=" btn btn-danger" ><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>

                                        <?php } ?>

                                     </tbody>

                               </table>  

                               </div>   

                                 <a href="?page=dosen&aksi=tambah" class=" btn btn-success" style="margin-top: 8px;" ><i class="fa fa-plus"></i> Tambah Data</a>           