<?php

$kode_mk = $_GET['kode_mk'];
$nim = $_GET['nim'];
$dosen = $_GET['dosen'];

 ?>

<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Input Nilai Mahsiswa
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Smester</th>
                                            <th>Jurusan</th>
                                            <th>Matkul</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                        $dosen = $_SESSION['username'];
                                        $no=1;


                                       $sql = $koneksi->query("select * from tb_mahasiswa , tb_jurusan, tb_krs, tb_matkul
                                                                WHERE tb_mahasiswa.kode_jurusan = tb_jurusan.kode_jurusan
                                                                AND tb_mahasiswa.nim=tb_krs.nim
                                                                AND tb_matkul.kode_mk=tb_krs.kode_mk
                                                                AND tb_krs.kode_mk = '$kode_mk'
                                                                AND tb_krs.status_nilai=1
																	                             ");

                                    	while ($data=$sql->fetch_assoc()) {



                                     ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nim']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                   							            <td><?php echo $data['smester']; ?></td>
                                            <td><?php echo $data['nama_jurusan']; ?></td>
                                             <td><?php echo $data['nama_mk']; ?></td>

                                            <td>

                                            	<a href="?page=nilai_d&aksi=nilai&id=<?php echo $data['nim']; ?>&smester=<?php echo $data['smester'];?>&krs=<?php echo $data['kode'] ?>&kode_mk=<?php echo $kode_mk;  ?>&dosen=<?php echo $dosen; ?>" class=" btn btn-success" ><i class="fa fa-edit"></i> Masukan Nilai</a>

                                            </td>
                                        </tr>

                                        <?php } ?>
                                    </tbody>


                                </table>
                              </div>


  <br> <br> <br>

  <?php



      $sql_rekap = $koneksi->query("SELECT * from  tb_matkul  where kode_mk='$kode_mk'");
      $data_rekap=$sql_rekap->fetch_assoc();

      $sql_dosen = $koneksi->query("SELECT * from  tb_dosen  where kode_dosen='$dosen'");
      $data_dosen=$sql_dosen->fetch_assoc();
   ?>


   <div class="row">
     <div class="col-md-12">
      <div class="panel panel-primary">
          <div class="panel-heading">
            Rekap Nilai
          </div>
              <div class="panel-body">
                  <div class="row">
                      <div class="col-md-6">

                          <form role="form" method="POST" enctype="multipart/form-data">

                              <div class="form-group">
                                  <label>Mata Kuliah :</label>
                                  <input class="form-control" name="nim" value="<?php echo $data_rekap['nama_mk']; ?> " readonly />

                              </div>

                               <div class="form-group">
                                  <label>SKS :</label>
                                  <input class="form-control" name="nama" value="<?php echo $data_rekap['sks']; ?>" readonly/>
                              </div>


                        </div>

                        <div class="col-md-6">

                          <div class="form-group">
                             <label>Nama Dosen</label>
                             <input class="form-control" name="nama" value="<?php echo $data_dosen['nama_dosen']; ?>" readonly/>
                         </div>
                              </div>


                        </div>
  <div class="row">
                  <div class="col-md-12">
                      <!-- Advanced Tables -->

                          <div class="panel-body">
                              <div class="table-responsive">
                                  <table  class="table table-striped table-bordered table-hover" id="dataTables-example">
                                      <thead>
                                          <tr>
                                             <th rowspan="2" style="text-align:center;">No</th>
                                              <th rowspan="2" style="text-align:center;">Nim</th>
                                              <th rowspan="2" style="text-align:center;">Nama</th>
                                              <th colspan="4" style="text-align:center;">Nilai</th>
                                              <th colspan="2" style="text-align:center;">Nilai Akhir</th>
                                              <th rowspan="2" style="text-align:center;">Total <br> Mutu X SKS</th>
                                              <th rowspan="2" style="text-align:center;">Aksi</th>

                                          </tr>

                                          <tr>

                                              <th style="text-align:center;">Tugas</th>
                                              <th style="text-align:center;">UTS</th>
                                              <th style="text-align:center;">UAS</th>
                                              <th style="text-align:center;">Jumlah</th>
                                              <th style="text-align:center;">Grade</th>
                                              <th style="text-align:center;">Mutu</th>

                                          </tr>







                                      </thead>
                                      <tbody>

                                     <?php

                              $no = 1;

                              $nilai = $koneksi->query("select * from tb_mahasiswa, tb_nilai, tb_matkul
                                                      WHERE tb_nilai.kode_mk=tb_matkul.kode_mk
                                                      and tb_mahasiswa.nim=tb_nilai.nim
                                                      and tb_matkul.kode_mk='$kode_mk'
                                                       order by tb_matkul.kode_mk asc");
                              while ($data=$nilai->fetch_assoc()) {

                              $sks= $data['sks'];




                              $mutu_hasil = $sks * $mutu;

                              $tugas = $data['tugas'];
                              $uts = $data['uts'];
                              $uas = $data['uas'];

                              $jumlah = ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);

                              if ($jumlah >= 86) {
                                  $grade = "A";
                              }

                              if ($jumlah   <= 85) {
                                  $grade = "B";
                              }

                              if ($jumlah   <= 70) {
                                  $grade = "C";
                              }

                              if ($jumlah   <= 56) {
                                  $grade = "D";
                              }

                              if ($jumlah   <= 45) {
                                  $grade = "E";
                              }

                              if ($grade == "A") {
                                      $mutu = 4;
                                  }elseif ($grade== "B") {
                                       $mutu = 3;
                                  }elseif ($grade== "C") {
                                       $mutu = 2;
                                  }elseif ($grade== "D") {
                                       $mutu = 1;
                                  }else{
                                      $mutu = 0;
                                  }

                                  $total = $sks * $mutu;
                           ?>
                              <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $data['nim'] ?></td>
                                  <td><?php echo $data['nama'] ?></td>
                                  <td align="center"><?php echo $data['tugas'] ?></td>
                                  <td align="center"><?php echo $data['uts'] ?></td>
                                  <td align="center"><?php echo $data['uas'] ?></td>
                                  <td align="center"><?php echo $jumlah ?></td>
                                  <td align="center"><?php echo $grade ?></td>
                                  <td align="center"><?php echo $mutu ?></td>
                                  <td align="center"><?php echo $total ?>

                                <td>
                                <a href="?page=nilai_d&aksi=edit&id=<?php echo $data ['id'];?>&nim=<?php echo $data['nim']; ?>&smester=<?php echo $data['smester'];?>&krs=<?php echo $data['kode'] ?>&kode_mk=<?php echo $kode_mk;  ?>&dosen=<?php echo $dosen; ?>" class="btn btn-info">Edit</a>
                                </td>

                              </tr>

                            <?php



                              }

                              ?>
                          </tbody>




                              </table>
                          </div>

                                   <a href="./cetak/rekap_nilai_dosen.php?dosen=<?php echo $dosen; ?>&matkul=<?php echo $kode_mk; ?>&nim=<?php echo $nim;?>" target="blank" class="btn btn-default" style="margin-top: 10px;" target="blank" ><i class="fa fa-print"></i> Cetak Rekap Nilai</a>

                                    <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" style="margin-top: 10px;" />
