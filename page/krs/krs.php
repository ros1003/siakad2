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
          Kartu Rencana Studi Yang Telah Diambil
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
                    <!-- Advanced Tables -->
                    
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Matkul</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>SKS</th>
                                            <th>Dosen</th>
                                            <th>Kelas</th>
                                            <th>Tanggal Jam</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 

                                        $smester = $_GET['smester'];
                                    	$nim = $_SESSION['username'];
                                    	$no=1;

                                    	if ($_SESSION['mahasiswa']) {
                                    		
                                    	
                                    	$sql = $koneksi->query("SELECT * from tb_krs , tb_matkul, tb_dosen, tb_jadwal, tb_ruang   
                                                                            WHERE   tb_matkul.kode_mk = tb_krs.kode_mk
                                                                            AND     tb_dosen.kode_dosen = tb_jadwal.kode_dosen
                                                                            AND     tb_matkul.kode_mk = tb_jadwal.kode_mk
                                                                            AND     tb_jadwal.kode_ruang = tb_ruang.kode_ruang
                                                                            AND tb_krs.nim='$nim'
                                                                            AND tb_matkul.smester='$smester'");
                                                    
                                    	}else{	

                                    	$sql = $koneksi->query("select * from tb_krs  
                                                                inner join tb_mahasiswa 
                                                                on tb_mahasiswa.nim=tb_krs.nim 
                                                                
                                                                inner join tb_matkul
                                                                on tb_matkul.kode_mk=tb_krs.kode_mk
                                                                
                                                                inner join tb_jurusan                                                                
                                                                on tb_jurusan.kode_jurusan=tb_krs.kode_jurusan");
                                    	}
                                    	while ($data=$sql->fetch_assoc()) {
                                    		
                                    	

                                     ?>

                                        <tr class="odd gradeX">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['kode_mk']; ?></td>
                                            <td><?php echo $data['nama_mk']; ?></td>
                                            <td align="right"><?php echo $data['sks']; ?></td>
                                            <td><?php echo $data['nama_dosen']; ?></td>
                                            <td><?php echo $data['nama_ruang']; ?></td>
                                             <td><?php echo date('d F Y', strtotime( $data['tanggal'])).', &nbsp;'.date('G:i', strtotime($data['jam_mulai'])).'-'.date('G:i', strtotime($data['jam_selesai'])).'&nbsp; Wib'; ?></td>


                                            <td>
                                            	

                                            	<a onclick="return confirm('Yakin Akan Mengahapus Data Ini...???')" href="?page=krs&aksi=hapus&id=<?php echo $data['kode']; ?>" class=" btn btn-danger" ><i class="fa fa-trash"></i> Hapus</a>

                                            	
                                            </td>
                                        </tr>

                                        <?php

                                            $jml_krs = $jml_krs+$data['sks'];
                                                 
                                            }

                                         ?>
                                    </tbody> 

                                    <tr>
                                        <th  style="text-align: center; font-size: 17px; " colspan="3">Total SKS</th>
                                        <td  style="font-size: 15px; text-align: right;"><b><?php echo $jml_krs ; ?></b></td>
                                        <td colspan="4"></td> 
                                    </tr>

                                </table> 
                              </div>   

                                 <a href="./cetak/cetak_krs.php?id=<?php echo $nim; ?>&smester=<?php echo $smester; ?>" class="btn btn-default" style="margin-top: 10px;" target="blank" ><i class="fa fa-print"></i> Cetak KRS</a> 

                                  <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" style="margin-top: 10px;" /> 