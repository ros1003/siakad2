<?php 

	$id = $_GET['id'];

	$sql = $koneksi->query("delete from tb_matkul where kode_mk='$id'");

	?>

		<script>
		    setTimeout(function() {
		        sweetAlert({
		            title: 'OKE!',
		            text: 'Data Berhasil Dihapus!',
		            type: 'error'
		        }, function() {
		            window.location = '?page=matkul';
		        });
		    }, 300);
		</script>

	<?php

 ?>