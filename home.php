<?php 


	
	$sql = $koneksi->query("select * from tb_mahasiswa");
	while($data=$sql->fetch_assoc()){
       $jml_mhs=$sql->num_rows; 
		
		
	}


    $sql2 = $koneksi->query("select * from tb_dosen");
    while($data2=$sql2->fetch_assoc()){
       $jml_dosen=$sql2->num_rows; 

}

 $sql3 = $koneksi->query("select * from tb_matkul");
    while($data3=$sql3->fetch_assoc()){
       $jml_matkul=$sql3->num_rows; 

}


$sql4 = $koneksi->query("select * from tb_mahasiswa where kode_jurusan ='PAI'");
$sql5 = $koneksi->query("select * from tb_mahasiswa where kode_jurusan ='HES'");
$TI=$sql4->num_rows;
$SI=$sql5->num_rows;

$nim = $_SESSION['username'];
 $nilai = $koneksi->query("select * from tb_nilai, tb_matkul
                                                    WHERE tb_nilai.kode_mk=tb_matkul.kode_mk
                                                    AND    tb_nilai.nim='$nim'
                                                     order by tb_matkul.kode_mk asc");
                            while ($data=$nilai->fetch_assoc()) {

                                $sks= $data['sks'];   

                            $grade = $data['grade'];
                            
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
                            $mutu_hasil = $sks * $mutu; 



                                 $jml_krs = $jml_krs+$data['sks'];

                                $jml_mutu = $jml_mutu+$mutu_hasil;

                                $ipk = $jml_mutu / $jml_krs;

                        }

?>

<marquee>Selamat Datang di Sistem Informasi Akademik Al Musdariyah</marquee>


<div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Halaman Utama</h2>   
                        <h5>Sistem Informasi Akademik</h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
           <?php if ($_SESSION['admin'] ) {?>       
                <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="glyphicon glyphicon-user"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $jml_mhs; ?></p>
                    <p class="text-muted"> Jumlah Mahasiswa</p>
                </div>
             </div>
		     </div>

		        <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="glyphicon glyphicon-user"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $jml_dosen; ?></p>
                    <p class="text-muted">Jumlah Dosen</p>
                </div>
             </div>
		     </div>

		        <div class="col-md-4 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="glyphicon glyphicon-list-alt"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo $jml_matkul; ?></p>
                    <p class="text-muted">Jumlah Mata Kuliah</p>
                </div>
             </div>
		     </div>
             </div>
              <?php } ?> 

             <?php if ($_SESSION['mahasiswa'] ) {?>  

              <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-6">           
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="glyphicon glyphicon-list-alt"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo  $jml_krs; ?></p>
                    <p class="text-muted">Jumlah SKS Yang Telah Ditempuh </p>
                </div>
             </div>
             </div>
             

             
                <div class="col-md-5 col-sm-6 col-xs-6">           
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="glyphicon glyphicon-list-alt"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text"><?php echo round($ipk,2); ?></p>
                    <p class="text-muted">Index Prestasi Kumulatif</p>
                </div>
             </div>
             </div>
		     </div>


            
             <?php } ?> 


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Jumlah", { role: "style" } ],
        ["Pendidikan Agama ISlam", <?php echo $TI; ?>, "blue"],
        ["Hukum Ekonomi Syariah", <?php echo $SI; ?>, "red"],
       
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Jumlah Mahasiswa Berdasarkan Jurusan",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
</div>	




  
