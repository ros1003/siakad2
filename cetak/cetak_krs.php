<?php
  error_reporting(0);
$koneksi = new mysqli  ("localhost","root","","siakad2");
    $content = '

    <style type="text/css">

	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px; background-color: #cccccc;}
	.tabel td{padding: 8px 5px;}
	 img{width:125px; height:130px;}
	 td{font-size:10px;}
	 th{font-size:10px;}

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
	<td rowspan="6"><img src="../assets/img/logo.png" width="100" height="75"/></td>
	<td style="text-align: center;">SEKOLAH TINGGI AGAMA ISLAM (STAI)</td>
</tr>
<tr>

</tr>
<tr style="text-align: center;">
	<td style="font-size: 10px; text-align: center;">AL MUSDARIYAH</td>
</tr>

<tr>
	<td style="font-size: 10px; text-align: center;">Jalan Kamarung</td>
</tr>
<tr>
	<td style="font-size: 10px; text-align: center;">Telp: 021-87717489 / 021-87717490</td>
</tr>
<tr>
	<td style="font-size: 10px; text-align: center;">Email : staialmus@gmail.com / Website : hhtp//www.staialmus.ac.id</td>
</tr>
<br>
<hr>



</table>


<h5 style="text-align:center;">Kartu Rencana Studi</h5>';

	$nim = $_GET['id'];
	$sql1 = $koneksi->query("SELECT * from  tb_mahasiswa , tb_jurusan
							WHERE  tb_mahasiswa.kode_jurusan = tb_jurusan.kode_jurusan

							AND tb_mahasiswa.nim='$nim'");
	$tampil=$sql1->fetch_assoc();



$content .= '
<table>

	<tr>
	  <td  width="30"></td>
	  <td>Nim</td>
	  <td>:</td>
	  <td width="500">'.$tampil['nim'].'</td>

	  <td >Jurusan</td>
	  <td>:</td>
	  <td>'.$tampil['nama_jurusan'].'</td>


	</tr>

	<tr>

	  <td  width="30"></td>
	  <td>Nama</td>
	  <td>:</td>
	  <td width="500">'.$tampil['nama'].'</td>

	  <td>Smester</td>
	  <td>:</td>
	  <td>'.$tampil['smester'].'</td>

	</tr>

</table><br>

<table border="1" class="tabel" align="center">


		<tr>
			<th rowspan="2" align="center">No</th>
            <th rowspan="2" align="center">Kode Matkul</th>
            <th rowspan="2" align="center">Nama Mata Kuliah</th>
            <th rowspan="2" align="center">SKS</th>
            <th rowspan="2" align="center">Dosen</th>
            <th rowspan="2" align="center">Kelas</th>
            <th rowspan="2" align="center">Tanggal Jam</th>
            <th colspan="2" align="center">Tanggal <br> Paraf  Pengawas Ujian</th>
		</tr>
		<tr>
			<th>Mid Smester</th>
			<th>Smester</th>
		</tr>
';

$tgl4 = date("d M Y");

$smester = $_GET['smester'];
$nim = $_GET['id'];



$no=1;
$sql = $koneksi->query("SELECT * from tb_krs , tb_matkul, tb_dosen, tb_jadwal, tb_ruang
						WHERE   tb_matkul.kode_mk = tb_krs.kode_mk
						AND    	tb_dosen.kode_dosen = tb_jadwal.kode_dosen
						AND 	tb_matkul.kode_mk = tb_jadwal.kode_mk
						AND 	tb_jadwal.kode_ruang = tb_ruang.kode_ruang
						AND 	tb_krs.nim='$nim'
						AND 	tb_matkul.smester='$smester'");
while ($data=$sql->fetch_assoc()) {

$content .= '

        	<tr>
		        <td>'.$no++.'</td>
		        <td> '.$data['kode_mk'].'</td>
		        <td>'. $data['nama_mk'].'</td>
		        <td align="right">'.$data['sks'].'</td>
		        <td>'.$data['nama_dosen'].'</td>
		        <td>'.$data['nama_ruang'].'</td>
		        <td>'.date('d F Y', strtotime( $data['tanggal'])).', &nbsp;'.date('G:i', strtotime($data['jam_mulai'])).'-'.date('G:i', strtotime($data['jam_selesai'])).'&nbsp; WIB</td>
		        <td></td>
		        <td></td>
		    </tr>

        ';

         $jml_krs = $jml_krs+$data['sks'];
        }

        $content .= '

	        <tr>
		        <th style="text-align: center; " colspan="3">Total SKS</th>
		        <td align="right"><b> '.$jml_krs.' </b></td>
		        <td colspan="5"></td>
		    </tr>';

$content .= '

</table>

<br>

    <a style="text-decoration: none; color: black; margin-left: 30px; font-size: 10px;">Menyetujui</a>  <a style="text-decoration: none; color: black; margin-left: 500px; font-size: 10px;">Jakarta, '.$tgl4.'</a><br>
    <a style="text-decoration: none; color: black; margin-left: 30px; font-size: 10px;">Kepala Jurusan</a><a style="text-decoration: none; color: black; margin-left: 483px; font-size: 10px;">Mahasiswa YBS,</a><br><br><br><br>
     <a style="text-decoration: none; color: black; margin-left: 30px; font-size: 10px;">Dedi Munawar M.Kom</a> <a style="text-decoration: none; color: black; margin-left: 450px; font-size: 10px;">'.$tampil['nama'].'</a>

</page>';

    require_once('../assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L','A5','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('krs_mahasiswa.pdf');
?>
