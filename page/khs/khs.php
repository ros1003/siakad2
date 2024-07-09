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
          Kartu Hasil Studi
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
                                <label>Jenjang</label>
                                 <input class="form-control" name="smester" value="<?php echo 'Strata Satu (S1)' ?>" readonly />
                            </div>
                      </div>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->

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
                                            <th>Nilai</th>
                                            <th>Bobot</th>
                                            <th>Mutu</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                   <?php

                            $no = 1;

                            $nilai = $koneksi->query("select * from tb_nilai, tb_matkul
                                                    WHERE tb_nilai.kode_mk=tb_matkul.kode_mk
                                                    AND    tb_nilai.nim='$nim'
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
                                <td><?php echo $data['kode_mk'] ?></td>
                                <td><?php echo $data['nama_mk'] ?></td>
                                <td align="right"><?php echo $data['sks'] ?></td>
                                <td><?php echo $data['smester'] ?></td>
                                <td><?php echo $grade ?></td>
                                <td><?php echo $mutu; ?></td>
                                <td><?php echo $total; ?></td>
                            </tr>

                          <?php

                            $jml_krs = $jml_krs+$data['sks'];

                            $jml_mutu = $jml_mutu+$total;

                            $ipk = $jml_mutu / $jml_krs;

                            }

                            ?>
                        </tbody>
                             <tr>
                                <th  style="text-align: right; font-size: 17px; " colspan="3">Total SKS</th>
                                <td  style="font-size: px; text-align: right;"><b><?php echo $jml_krs ; ?></b></td>
                                <td colspan="4"></td>
                            </tr>

                            <tr>
                                <th  style="text-align: right; font-size: 17px; " colspan="3">Total Mutu</th>
                                <td  style="font-size: px; text-align: right;"><b><?php echo $jml_mutu ; ?></b></td>
                                <td colspan="4"></td>
                            </tr>

                            <tr>
                                <th  style="text-align: right; font-size: 17px; " colspan="3">IPK </th>
                                <td  style="text-align: right;"><b><?php echo round( $ipk, 2 ); ?></b></td>
                                <td colspan="4"></td>
                            </tr>

                            </table>
                        </div>

                                 <a href="./cetak/cetak_khs.php?id=<?php echo $nim; ?>&smester=<?php echo $smester; ?>" class="btn btn-default" style="margin-top: 10px;" target="blank" ><i class="fa fa-print"></i> Cetak KHS</a>

                                  <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" style="margin-top: 10px;" />
