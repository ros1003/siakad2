<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             Data Mata Kuliah
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        	<th>No</th>
                                        	<th>Kode Mata Kuliah</th>
                                            <th>Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Smester</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 

                                    	$no=1;

                                    	$sql = $koneksi->query("select * from  tb_matkul order by kode_mk asc");
                                    	while ($data=$sql->fetch_assoc()) {
                                    		
                                    	

                                     ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['kode_mk']; ?></td>
                                            <td><?php echo $data['nama_mk']; ?></td>
                                            <td><?php echo $data['sks']; ?></td>
                                            <td><?php echo $data['smester']; ?></td>
                                           
                                            <td>
                                            	<a href="?page=matkul&aksi=ubah&id=<?php echo $data['kode_mk']; ?>" class=" btn btn-info" ><i class="fa fa-edit"></i> Ubah</a>

                                            	<a onclick="return confirm('Yakin Akan Mengahapus Data Ini...???')" href="?page=matkul&aksi=hapus&id=<?php echo $data['kode_mk']; ?>" class=" btn btn-danger" ><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>

                                        <?php } ?>

                                     </tbody>

                               </table>  

                               </div>   

                                 <a href="?page=matkul&aksi=tambah" class=" btn btn-success" style="margin-top: 8px;" ><i class="fa fa-plus"></i> Tambah Data</a>           