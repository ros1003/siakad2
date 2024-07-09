<?php
  error_reporting(0);
    ob_start();
    session_start();
    $koneksi = new mysqli("localhost","root","","siakad2");

    if($_SESSION['admin'] || $_SESSION['mahasiswa'] || $_SESSION['dosen']){
        header("location:index.php");
    }else{
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>STAI AL MUSDARIYAH |LOGIN</title>
</head>

</head>
<body>
     <!----------------------- Main Container -------------------------->
     <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <!----------------------- Login Container -------------------------->
       <div class="row border rounded-5 p-3 bg-white shadow box-area">
    <!--------------------------- Left Box ----------------------------->
       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
           <div class="featured-image mb-3">
            <img src="images/1.png" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">SIAKAD AlMUS</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">By Rosmiati Nurhasanah</small>
       </div> 
    <!-------------------- ------ Right Box ---------------------------->
        
    <div class="col-md-6 right-box">
          <div class="row align-items-center">
         <div class="header-text mb-4">
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Halaman Login</h2>


            </div>
        </div>
        <div class="panel-body">
                                <form role="form" method="POST">
                                
        <div class="form-group input-group">
                                     <div class="input-group mb-3">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input class="form-control" placeholder="Username" name="username"  autofocus>
                                     </div>
                                        </div>
                                            <div class="form-group input-group">
                                            <div class="input-group mb-1">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                           <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                                            </div>
                                        </div>
                                        
                                    <input  type="submit" name="login" class="btn btn-lg btn-primary w-100 fs-6" value="Login"/>
                                   
                                    </form>
          </div>
        </div>
    </div>
         </div>
          </div>
       </div>
       </div>
     </div>
     
                            </div>
                        </div>
                  </div>
         </div>
    </div>
         </div>
          </div>
       </div>
       </div>
     </div>

     


                        <?php



                            $username = $_POST['username'];
                            $pass = $_POST['pass'];

                            $login = $_POST['login'];

                            if($login){

                                $sql = $koneksi->query("select * from tb_user where user_id='$username' and pass='$pass' ");
                                $ketemu = $sql->num_rows;
                                $data = $sql->fetch_assoc();


                                if($ketemu >=1){

                                    session_start();

                                    $_SESSION['username'] = $data ['user_id'];
                                    $_SESSION[pass] = $data [pass];
                                    $_SESSION[level] = $data [level];


                                    if($data['level'] == "admin"){
                                        $_SESSION['admin'] = $data[id];
                                        header("location:index.php");

                                    }else if($data['level']== "mahasiswa"){
                                        $_SESSION['mahasiswa'] = $data[id];
                                        header("location:index.php");

                                    }else if($data['level']== "dosen"){
                                        $_SESSION['dosen'] = $data[id];
                                        header("location:index.php");

                                    }
                                } else{
                                            ?>
                                                <script type="text/javascript">
                                                    alert("Login Gagal Username dan Password Salah.. Silahkan Ulangi Lagi");
                                                </script>
                                            <?php
                                        }

                            }

                        ?>

                            </div>

                        </div>
                    </div>


        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>


<?php
    }
?>
