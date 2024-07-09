<?php

	$ambil = $koneksi->query("select * from tb_dosen where kode_dosen='$_GET[id]'");

	$data = $ambil->fetch_assoc();

	$foto=$data['foto'];

	if (file_exists("img/dosen/$foto")) {
		unlink("img/dosen/$foto");
	}

	$koneksi->query("delete from tb_dosen where kode_dosen='$_GET[id]'");

	$koneksi->query("delete from tb_user where user_id='$_GET[id]'");



?>


<script>
    setTimeout(function() {
        sweetAlert({
            title: 'OKE!',
            text: 'Data Berhasil Dihapus!',
            type: 'error'
        }, function() {
            window.location = '?page=dosen';
        });
    }, 300);
</script>