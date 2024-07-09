<?php

	$ambil = $koneksi->query("select * from tb_mahasiswa where nim='$_GET[id]'");

	$data = $ambil->fetch_assoc();

	$foto=$data['foto'];

	if (file_exists("img/$foto")) {
		unlink("img/$foto");
	}

	$koneksi->query("delete from tb_mahasiswa where nim='$_GET[id]'");

	$koneksi->query("delete from tb_user where user_id='$_GET[id]'");



?>


<script>
    setTimeout(function() {
        sweetAlert({
            title: 'OKE!',
            text: 'Data Berhasil Dihapus!',
            type: 'error'
        }, function() {
            window.location = '?page=mahasiswa';
        });
    }, 300);
</script>