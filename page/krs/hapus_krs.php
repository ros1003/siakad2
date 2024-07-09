<?php 

	$id = $_GET['id'];

	$sql = $koneksi->query("delete from tb_krs where kode='$id'");

	?>
		<script>
		    setTimeout(function() {
		        sweetAlert({
		            title: 'OKE!',
		            text: 'Data Berhasil Dihapus!',
		            type: 'error'
		        }, function() {
		            window.location = '?page=krs&aksi=lihat';
		        });
		    }, 300);
		</script>
		

	<?php

 ?>