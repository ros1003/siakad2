<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                 Daftar Mata Kuliah Diajar
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                            	<th>No</th>
                            	<th>Kode Matkul</th>
                                <th>Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Smester</th>
                                <th>Kode Dosen</th>
                                <th>Dosen</th>
                                <th>Kelas</th>
                                <th>Jadwal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                          $dosen = $_GET['dosen'];
                        	$no=1;

                        	$mk = $koneksi->query("SELECT * from tb_jadwal, tb_dosen, tb_matkul, tb_ruang
                                                  where  tb_dosen.kode_dosen=tb_jadwal.kode_dosen
                                                  and    tb_jadwal.kode_mk=tb_matkul.kode_mk
                                                  and    tb_jadwal.kode_ruang=tb_ruang.kode_ruang
                                                  and    tb_jadwal.kode_dosen='$dosen'");
                        	while ($data=$mk->fetch_assoc()) {



                         ?>

                            <tr class="odd gradeX">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['kode_mk']; ?></td>
                                <td><?php echo $data['nama_mk']; ?></td>
                                <td><?php echo $data['sks']; ?></td>
                                <td><?php echo $data['smester']; ?></td>
                                <td><?php echo $data['kode_dosen']; ?></td>
                                <td><?php echo $data['nama_dosen']; ?></td>
                                <td><?php echo $data['nama_ruang']; ?></td>
                                <td><?php echo date('d F Y', strtotime( $data['tanggal'])).', &nbsp;'.date('G:i ', strtotime($data['jam_mulai'])).'-'.date('G:i', strtotime( $data['jam_selesai'])).'&nbsp; WIB'; ?> </td>

                                <td>
                                	<a href="?page=nilai_d&aksi=lihat_mhs&kode_mk=<?php echo $data['kode_mk']; ?>&dosen=<?php echo $data['kode_dosen']; ?> &krs=<?php echo $data['kode']; ?>" class=" btn btn-info" ><i class="fa fa-edit"></i> Nilai Mahasiswa</a>

                                </td>
                            </tr>

                            <?php } ?>

                         </tbody>

                   </table>
           </div>
       </div>
   </div>
</div>

</div>
