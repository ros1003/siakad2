<?php 

	$id = $_GET['id'];

	$sql = $koneksi->query("delete from tb_jurusan where id='$id'");

	?>

		<script>
		    setTimeout(function() {
		        sweetAlert({
		            title: 'OKE!',
		            text: 'Data Berhasil Dihapus!',
		            type: 'error'
		        }, function() {
		            window.location = '?page=jurusan';
		        });
		    }, 300);
		</script>

	<?php

 ?>