<?php 

	$id = $_GET['id'];

	$sql = $koneksi->query("delete from tb_jadwal where id='$id'");

	?>

		<script>
		    setTimeout(function() {
		        sweetAlert({
		            title: 'OKE!',
		            text: 'Data Berhasil Dihapus!',
		            type: 'error'
		        }, function() {
		            window.location = '?page=jadwal';
		        });
		    }, 300);
		</script>

	<?php

 ?>