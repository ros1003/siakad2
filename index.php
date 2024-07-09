<?php
	
	error_reporting(0);
	session_start();

	$koneksi = new mysqli("localhost","root","","siakad2");

	if(@$_SESSION['admin'] || $_SESSION['mahasiswa'] || $_SESSION['dosen']){

 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Informasi Akademik</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

   <link rel="stylesheet" type="text/css" href="assets/sw/dist/sweetalert.css">

   <script type="text/javascript" src="assets/sw/dist/sweetalert.min.js"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Siakad</a>

            </div>
            			<?php
                           if($_SESSION['admin']){
                                $user_l=$_SESSION['admin'];

                           }else if($_SESSION['mahasiswa']){
                                $user_l=$_SESSION['mahasiswa'];
                           }
                           else if($_SESSION['dosen']){
                                $user_l=$_SESSION['dosen'];
                           }

                           $sql_u = $koneksi->query("select* from tb_user where id='$user_l'");
                           $data_u = $sql_u->fetch_assoc();
                        ?>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">Selamat Datang <?php echo $data_u['nama']; ?>, &nbsp; Anda Login Sebagai <?php echo $data_u['level']; ?> <?php if ($_SESSION['mahasiswa'] || $_SESSION['admin']) {?><img src="img/<?php echo $data_u['foto']; ?>"  width="30" height="37" style="border-radius: 50%; "><?php } ?>   &nbsp; <?php if ($_SESSION['dosen']) {?><img src="img/dosen/<?php echo $data_u['foto']; ?>"  width="30" height="37" style="border-radius: 50%; "><?php } ?>   &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a>


</div>
        </nav>
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/logo2.png" class="user-image img-responsive"/>
                     <h3 style="color: white;">SIAKAD AlMUS</h3>
					</li>


                    <li>
                        <a  href="index.php"><i class="glyphicon glyphicon-home"></i>Dashboard</a>
                    </li>

                    <?php if ($_SESSION['mahasiswa'] ||$_SESSION['dosen']) {?>
                    <li>
                        <a  href="?page=profile"><i class="glyphicon glyphicon-user"></i>Profile</a>
                    </li>
                    <?php } ?>


                    <?php if ($_SESSION['admin'] ) {?>
                    <li>
                        <a  href="?page=mahasiswa"><i class="glyphicon glyphicon-user"></i>Mahasiswa</a>
                    </li>
                    <li>
                        <a  href="?page=dosen"><i class="glyphicon glyphicon-user"></i>Dosen</a>
                    </li>
						   
                      <li  >
                        <a  href="?page=matkul"><i class="glyphicon glyphicon-edit"></i>Mata Kuliah</a>
                    </li>

                     <li  >
                        <a  href="?page=jurusan"><i class="glyphicon glyphicon-th-list"></i>Jurusan </a>
                    </li>
                    <li  >
                        <a  href="?page=jadwal"><i class="glyphicon glyphicon-th-list"></i>Jadwal </a>
                    </li>

                    <li  >
                        <a  href="?page=nilai"><i class="glyphicon glyphicon-th"></i>Nilai Mahasiswa </a>
                    </li>
                    <?php } ?>


  <?php if ($_SESSION['dosen'] ) {?>
                      <li>
                        <a href="?page=nilai_d&dosen=<?php echo $_SESSION['username'];?>"><i class="glyphicon glyphicon-th"></i>  Nilai Mahasiswa </a>


                    </li>
								<?php } ?>


                     <?php if ($_SESSION['mahasiswa']) {?>
                     <li  >
                        <a   href="?page=krs"><i class="glyphicon glyphicon-th-large"></i>KRS</a>
                    </li>
                     <li  >
                        <a   href="?page=khs"><i class="glyphicon glyphicon-th-large"></i>KHS</a>
                    </li>
                    <?php } ?>


                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">


                        <?php

                        	$page = $_GET['page'];
                        	$aksi = $_GET['aksi'];

                        	if ($page=="mahasiswa") {
                        		if ($aksi=="") {
                        			include "page/mahasiswa/mahasiswa.php";
                        		}if ($aksi=="detail") {
                        			include "page/mahasiswa/detail.php";
                        		}if ($aksi=="tambah") {
                        			include "page/mahasiswa/tambah.php";
                        		}if ($aksi=="ubah") {
                        			include "page/mahasiswa/ubah.php";
                        		}if ($aksi=="hapus") {
                        			include "page/mahasiswa/hapus.php";
                        		}
                        	}if ($page=="dosen") {
                        		if ($aksi=="") {
                        			include "page/dosen/dosen.php";
                        		}if ($aksi=="tambah") {
                                    include "page/dosen/tambah.php";
                                }if ($aksi=="ubah") {
                                    include "page/dosen/ubah.php";
                                }if ($aksi=="hapus") {
                                    include "page/dosen/hapus.php";
                                }
                        	}if ($page=="jurusan") {
                        		if ($aksi=="") {
                        			include "page/jurusan/jurusan.php";
                        		}if ($aksi=="tambah") {
                                    include "page/jurusan/tambah.php";
                                }if ($aksi=="ubah") {
                                    include "page/jurusan/ubah.php";
                                }if ($aksi=="hapus") {
                                    include "page/jurusan/hapus.php";
                                }
                        	}if ($page=="krs") {
                        		if ($aksi=="") {
                        			include "page/krs/j_krs.php";
                        		}if ($aksi=="lihat") {
                                    include "page/krs/krs.php";
                                }if ($aksi=="proses_tmbh") {
                                    include "page/krs/proses_krs.php";
                                }if ($aksi=="hapus") {
                                    include "page/krs/hapus_krs.php";
                                }
                        	}if ($page=="jadwal") {
                                if ($aksi=="") {
                                    include "page/jadwal/jadwal.php";
                                }if ($aksi=="tambah") {
                                    include "page/jadwal/tambah.php";
                                }if ($aksi=="ubah") {
                                    include "page/jadwal/ubah.php";
                                }if ($aksi=="hapus") {
                                    include "page/jadwal/hapus.php";
                                }
                            }if ($page=="matkul") {
                                if ($aksi=="") {
                                    include "page/matkul/matkul.php";
                                }if ($aksi=="tambah") {
                                    include "page/matkul/tambah.php";
                                }if ($aksi=="ubah") {
                                    include "page/matkul/ubah.php";
                                }if ($aksi=="hapus") {
                                    include "page/matkul/hapus.php";
                                }
                            }if ($page=="profile") {
                                if ($aksi=="") {
                                    include "page/profile/profile.php";

                                }if ($aksi=="ubahpass") {
                                    include "page/profile/ubah_pass.php";

                                }if ($aksi=="ubahsmester") {
                                    include "page/profile/ubah_smester.php";

                                }
                            }if ($page=="nilai") {
                                if ($aksi=="") {
                                    include "page/nilai/tampil_mk.php";

                                }if ($aksi=="lihat_mhs") {
                                    include "page/nilai/tampil_nilai.php";

                                }if ($aksi=="edit") {
                                    include "page/nilai/edit_nilai.php";

                                }
                                if ($aksi=="input") {
                                    include "page/nilai/input.php";

                                }
                            }if ($page=="khs") {
                                if ($aksi=="") {
                                    include "page/khs/khs.php";

                                }if ($aksi=="tampil_nilai") {
                                    include "page/nilai/tampil_nilai.php";

                                }if ($aksi=="input") {
                                    include "page/nilai/input.php";

                                }
                            }if ($page == "nilai_d") {
                            	if ($aksi == "") {
                            		include "page/nilai_dosen/nilai.php";
                            	}

															if ($aksi == "lihat_mhs") {
                            		include "page/nilai_dosen/lihat_mhs.php";
                            	}
                              if ($aksi == "edit") {
                            		include "page/nilai_dosen/edit.php";
                            	}
															if ($aksi == "nilai") {
                            		include "page/nilai_dosen/input_nilai.php";
                            	}
                            }

														if ($page=="") {
                                    include "home.php";

                                }

                         ?>


                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
     <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
<?php
    }else{
        header("location:login.php");
    }
?>
