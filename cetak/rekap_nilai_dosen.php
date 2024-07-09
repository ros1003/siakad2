<?php
  error_reporting(0);
$koneksi = new mysqli  ("localhost","root","","siakad2");
    $content = '

    <style type="text/css">

	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px; background-color: #cccccc;}
	.tabel td{padding: 8px 5px;}
	 img{width:125px; height:130px;}
	 td{font-size:14px;}
	 th{font-size:14px;}

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
	<td style="text-align: center;">SEKOLAH TINGGI AGAMA ISLAM (STAI)</td>
</tr>
<tr>

</tr>
<tr style="text-align: center;">
	<td style="font-size: 12px; text-align: center;">AL-MUSDARIYAH ISLAMIC COLLEGE OF CIMAHI</td>
</tr>

<tr>
	<td style="font-size: 12px; text-align: center;">TRANSKRIP AKADEMIK</td>
</tr>
<tr>
	<td style="font-size: 12px; text-align: center;">Academic Transcript</td>
</tr>
<tr>
	<td style="font-size: 12px; text-align: center;">Email : staialmu@gmail.com / Website : hhtp//www.staialmus.ac.id</td>
</tr>
<br>
<hr>



</table>


<h4 style="text-align:center;"><u>Rekap Nilai Mahasiswa</u></h4>';

$dosen =$_GET['dosen'];
$kode_mk=$_GET['matkul'];

$sql_rekap = $koneksi->query("SELECT * from  tb_matkul  where kode_mk='$kode_mk'");
$data_rekap=$sql_rekap->fetch_assoc();

$sql_dosen = $koneksi->query("SELECT * from  tb_dosen  where kode_dosen='$dosen'");
$data_dosen=$sql_dosen->fetch_assoc();



$content .= '
<table>

	<tr>
	  <td  width="90"></td>
	  <td>Mata Kuliah</td>
	  <td>:</td>
	  <td width="350">'.$data_rekap['nama_mk'].'</td>

	  <td >Dosen</td>
	  <td>:</td>
	  <td>'.$data_dosen['nama_dosen'].'</td>


	</tr>

	<tr>

	  <td  width="90"></td>
	  <td>SKS</td>
	  <td>:</td>
	  <td width="350">'.$data_rekap['sks'].'</td>



	</tr>

</table><br>

<table border="1" class="tabel"  align="center" >


<tr>
   <th rowspan="2" style="text-align:center;">No</th>
    <th rowspan="2" style="text-align:center;">Nim</th>
    <th rowspan="2" style="text-align:center;">Nama</th>
    <th colspan="4" style="text-align:center;">Nilai</th>
    <th colspan="2" style="text-align:center;">Nilai Akhir</th>
    <th rowspan="2" style="text-align:center;">Total <br> Mutu X SKS</th>

</tr>

<tr>

    <th style="text-align:center;">Tugas</th>
    <th style="text-align:center;">UTS</th>
    <th style="text-align:center;">UAS</th>
    <th style="text-align:center;">Jumlah</th>
    <th style="text-align:center;">Grade</th>
    <th style="text-align:center;">Mutu</th>

</tr>
';

$tgl4 = date("d M Y");

$smester = $_GET['smester'];
$nim = $_GET['id'];
$no=1;


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

$content .= '

        	<tr>
                <td> '.$no++.' </td>
                <td> '.$data['nim'].' </td>
                <td>'.$data['nama'].'</td>
                <td>'.$data['tugas'].'</td>
                <td>'.$data['uts'].'</td>
                <td>'.$data['uas'].'</td>
                <td>'.$jumlah.'</td>
                <td>'.$grade.'</td>
                <td> '.$mutu.'</td>
                <td> '.$total.'</td>
            </tr>

        ';


        }



$content .= '

</table>

<br>

      <a style="text-decoration: none; color: black; margin-left: 510px; font-size: 12px;">Cimahi, '.$tgl4.'</a><br>
      <a style="text-decoration: none; color: black; margin-left: 510px; font-size: 12px;">Disetujui,</a><br>
      <a style="text-decoration: none; color: black; margin-left: 510px; font-size: 12px;">Wakil Ketua I Bidang Akademik</a><br><br><br><br><br><br>
      <a style="text-decoration: none; color: black; margin-left: 510px; font-size: 12px;">Asep Zakky Alamsyah, S.Sy., M.E.Sy.</a>
      <a style="text-decoration: none; color: black; margin-left: 510px; font-size: 12px;">NIDN. 2119118703</a>

</page>';

    require_once('../assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('krs_mahasiswa.pdf');
?>
