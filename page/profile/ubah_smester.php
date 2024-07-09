<?php

	$nim = $_GET['id']; 

	$sql = $koneksi->query("select * from tb_mahasiswa where nim = '$nim'");

	$tampil = $sql->fetch_assoc();

?>
 

<div class="row">
   <div class="col-md-12">	
	<div class="panel panel-primary">
	    <div class="panel-heading">
	      Ubah Data Mahasiswa
	    </div>
			<div class="panel-body">
			    <div class="row">
			        <div class="col-md-6">
			            
			            <form role="form" method="POST" enctype="multipart/form-data">


			            	<div class="form-group">
                                <label>Smester :</label>
                                <select class="form-control" name="smester">

                                <option>-Pilih Smester-</option>
                                <option value="1" <?php if( $tampil['smester']=='1'){echo "selected"; } ?>>1</option>
                                <option value="2" <?php if( $tampil['smester']=='2'){echo "selected"; } ?>>2</option>
                                <option value="3" <?php if( $tampil['smester']=='3'){echo "selected"; } ?>>3</option>
                                <option value="4" <?php if( $tampil['smester']=='4'){echo "selected"; } ?>>4</option>
                                <option value="5" <?php if( $tampil['smester']=='5'){echo "selected"; } ?>>5</option>
                                <option value="6" <?php if( $tampil['smester']=='6'){echo "selected"; } ?>>6</option>
                                <option value="7" <?php if( $tampil['smester']=='7'){echo "selected"; } ?>>7</option>
                                <option value="8" <?php if( $tampil['smester']=='8'){echo "selected"; } ?>>8</option>
                                </select>
                            </div>
                             <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
			                <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                           </form> 

<?php 

	if (isset($_POST['simpan'])) {
		$smester= $_POST['smester'];

		$sql = $koneksi->query("update tb_mahasiswa set smester='$smester' where nim='$nim'");

		$ubah_stts = $koneksi->query("update tb_mahasiswa set status_krs=1 where nim='$nim'");



		?>
		       <script>
				    setTimeout(function() {
				        swal({
				            title: "Selamat!",
				            text: "Ubah Smester Berhasil !",
				            type: "success"
				        }, function() {
				            window.location = "?page=profile";
				        });
				    }, 300);
				</script>
	      <?php  
	}

 ?>



