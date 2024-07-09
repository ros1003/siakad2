<?php
  error_reporting(0);
$koneksi = new mysqli  ("localhost","root","","siakad2");
    $content = '

    <style type="text/css">

	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px; background-color: #cccccc;}
	.tabel td{padding: 8px 5px;}
	 img{width:125px; height:130px;}
	 td{font-size:12px;}
	 th{font-size:12px;}

	 .style2 {
    color: black;
    font-weight: bold;
    margin-left:20px ;

}
	</style>


';
    $content .= '
<page>


<table align="center">
<tr>
	<td rowspan="6"><img src="../assets/img/logo.png" width="125" height="125"/></td>
	<td style="font-size: 12px;">SEKOLAH TINGGI AGAMA ISLAM AL MUSDARIYAH</td>
</tr>
<tr>

</tr>
<tr style="text-align: center;">
	<td style="font-size: 12px; text-align: center;"></td>
</tr>

<tr>
	<td style="font-size: 12px; text-align: center;">Jalan Kamarung</td>
</tr>
<tr>
	<td style="font-size: 12px; text-align: center;">Telp: 021-87717489 / 021-87717490</td>
</tr>
<tr>
	<td style="font-size: 12px; text-align: center;">Email : staialmust@gmail.com / Website : hhtp//www.staialmus.ac.id</td>
</tr>
<br>
<hr>



</table>


<h4 style="text-align:center;"><u>Kartu Hasil Studi</u></h4>';

	$nim = $_GET['id'];
	$sql1 = $koneksi->query("SELECT * from  tb_mahasiswa , tb_jurusan
							WHERE  tb_mahasiswa.kode_jurusan = tb_jurusan.kode_jurusan

							AND tb_mahasiswa.nim='$nim'");
	$tampil=$sql1->fetch_assoc();



$content .= '
<table>

	<tr>
	  <td  width="90"></td>
	  <td>Nim</td>
	  <td>:</td>
	  <td width="350">'.$tampil['nim'].'</td>

	  <td >Jurusan</td>
	  <td>:</td>
	  <td>'.$tampil['nama_jurusan'].'</td>


	</tr>

	<tr>

	  <td  width="90"></td>
	  <td>Nama</td>
	  <td>:</td>
	  <td width="350">'.$tampil['nama'].'</td>

	  <td>Jenjang</td>
	  <td>:</td>
	  <td>Strata Satu (S1)</td>

	</tr>

</table><br>

<table border="1" class="tabel"  align="center">


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
';

$tgl4 = date("d M Y");

$smester = $_GET['smester'];
$nim = $_GET['id'];
$no=1;


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

$content .= '

        	<tr>
                <td> '.$no++.' </td>
                <td> '.$data['kode_mk'].' </td>
                <td>'.$data['nama_mk'].'</td>
                <td align="right"> '.$data['sks'].'</td>
                <td>'.$data['smester'].'</td>
                <td>'.$grade.'</td>
                <td> '.$mutu.'</td>
                <td> '.$total.'</td>
            </tr>

        ';

         $jml_krs = $jml_krs+$data['sks'];

        $jml_mutu = $jml_mutu+$total;

        $ipk = $jml_mutu / $jml_krs;
        }

        $content .= '

	        <tr>
		        <th style="text-align: center; " colspan="3">Total SKS</th>
		        <td align="right"><b> '.$jml_krs.' </b></td>
		        <td colspan="5"></td>
		    </tr>
		     <tr>
		        <th style="text-align: center; " colspan="3">Total Mutu</th>
		        <td align="right"><b> '.$jml_mutu.' </b></td>
		        <td colspan="5"></td>
		    </tr>
		    <tr>
		        <th style="text-align: center; " colspan="3">IPK</th>
		        <td align="right"><b> '.round($ipk,2).' </b></td>
		        <td colspan="5"></td>
		    </tr>';

$content .= '

</table>

<br>

      <a style="text-decoration: none; color: black; margin-left: 510px; font-size: 12px;">Cimahi, '.$tgl4.'</a><br>
      <a style="text-decoration: none; color: black; margin-left: 510px; font-size: 12px;">Disetujui,</a><br>
      <a style="text-decoration: none; color: black; margin-left: 510px; font-size: 12px;">Wk.1</a><br><br><br><br><br><br>
      <a style="text-decoration: none; color: black; margin-left: 510px; font-size: 12px;">Zaky Alamsyah S.H.M.H</a>

</page>';

    require_once('../assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('krs_mahasiswa.pdf');
?>
