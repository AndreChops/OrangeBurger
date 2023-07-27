<?php
    session_start();

    include_once "db.php";

    $log_namemail_err = $log_password_err = $log_captcha_err = $log_err_msg = "";
    if(isset($_GET['log_err']) || isset($_GET['log1_err']) || isset($_GET['log2_err']) || isset($_GET['log3_err'])){

        //Username/Email error
        if(isset($_GET['log1_err']) && $_GET['log1_err'] == 1) {
            $log_namemail_err = "*Username/email tidak boleh kosong.";
        }

        //Password error
        if(isset($_GET['log2_err']) && $_GET['log2_err'] == 1) {
            $log_password_err = "*Password tidak boleh kosong.";
        }

        //Captcha error
        if(isset($_GET['log3_err'])) {
            if($_GET['log3_err'] == 1) {
                $log_captcha_err = "*Captcha tidak boleh kosong.";
            }
            else if($_GET['log3_err'] == 2) {
                $log_captcha_err = "*Captcha tidak cocok.";
            }
            else if($_GET['log3_err'] == 3) {
                $log_captcha_err = "*Captcha error.";
            }
        }

        //Account login error
        if(isset($_GET['log_err'])) {
            if($_GET['log_err'] == 1) {
                $log_err_msg = "*Username/email belum terdaftar atau password Anda salah.";
            }
            else if($_GET['log_err'] == 2) {
                $log_err_msg = "*Terjadi kesalahan. Silahkan coba lagi.";
            }
        }
    }

    $reg_fname_err = $reg_lname_err = $reg_username_err = $reg_email_err = $reg_password_err = $reg_bdate_err = $reg_gender_err = $reg_err_msg = "";
    if(isset($_GET['reg_err']) || isset($_GET['reg1_err']) || isset($_GET['reg2_err']) || isset($_GET['reg3_err']) || isset($_GET['reg4_err']) || isset($_GET['reg5_err'])){

        //First Name error
        if(isset($_GET['reg1_err']) && $_GET['reg1_err'] == 1) {
            $reg_fname_err = "*First name tidak boleh kosong.";
        }
        
        //Last Name error
        if(isset($_GET['reg2_err']) && $_GET['reg2_err'] == 1) {
            $reg_lname_err = "*Last name tidak boleh kosong.";
        }
        
        //Username error
        if(isset($_GET['reg3_err']) && $_GET['reg3_err'] == 1) {
            $reg_username_err = "*Username tidak boleh kosong.";
        }

        //Email error
        if(isset($_GET['reg4_err'])) {
            if($_GET['reg4_err'] == 1) {
                $reg_email_err = "*Email tidak boleh kosong.";
            }
            else if($_GET['reg4_err'] == 2) {
                $reg_email_err = "*Format Email yang Anda masukkan tidak valid.";
            }
        }

        //Password error
        if(isset($_GET['reg5_err'])) {
            if($_GET['reg5_err'] == 1) {
                $reg_password_err = "*Password tidak boleh kosong.";
            }
            else if($_GET['reg5_err'] == 2) {
                $reg_password_err = "*Password harus memiliki minimal 4 karakter.";
            }
        }

        //Account register error
        if(isset($_GET['reg_err'])) {
            if($_GET['reg_err'] == 1) {
                $reg_err_msg = ''.
                '<div class="alert" style="background:#eee; padding:7px">'.
                    '<span style="color:red; font-size:0.9rem">*Akun dengan username/email tersebut telah digunakan.</span>'.
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'.
                '</div>';
            }
            else if($_GET['reg_err'] == 2) {
                $reg_err_msg = ''.
                '<div class="alert" style="background:#eee; padding:7px">'.
                    '<span style="color:red; font-size:0.9rem">*Terjadi kesalahan. Silahkan coba lagi.</span>'.
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'.
                '</div>';
            }
            else if($_GET['reg_err'] == 0) {
                $log_err_msg = ''.
                    '<div class="alert alert-info alert-block" style="background:#eee;">'.
                        '<span style="color:green; font-size:0.9rem">*Pendaftaran akun berhasil.</span>'.
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>'.
                    '</div>';
            }
        }
    }

    $redirectTo = "";
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        $redirectTo = 'shoppingcart.php';
    }
    else {
        $redirectTo = 'index.php?log_err=0';
    }

    $query = $menu = "";
    if(isset($_GET["category"])) {

        if($_GET["category"] == 1) {
            $query = "SELECT * FROM menu WHERE kategori = 'burger'";
        }
        else if($_GET["category"] == 2) {
            $query = "SELECT * FROM menu WHERE kategori = 'french fries'";
        }
        else if($_GET["category"] == 3) {
            $query = "SELECT * FROM menu WHERE kategori = 'beverages'";
        }
        else {
            $query = "SELECT * FROM menu";
        }
        
        $result = $conn->query($query);

        $path = "assets/images/";

        while($row = $result->fetch()){
            $menu .= ''.
                '<div class="col-lg-4">'.
                    '<div class="trainer-item" data-aos="zoom-out" style="height:500px">'.
                        '<div class="image-thumb">'.
                            '<img src="'.$path.$row["gambar"].'" style="height:240px; object-fit:cover" alt="'.$row["nama"].'">'.
                        '</div>'.
                        '<div class="down-content">'.
                            '<span><sup>Rp</sup>'.$row["harga"].'</span>'.
                            '<h4>'.$row["nama"].'</h4>'.
                            '<p style="height:80px">'.$row["deskripsi"].'</p>'.
                        '</div>'.
                        '<a href="'.$redirectTo.'?menu='.$row["nama"].'"><ul class="social-icons"><li class="form-control" style="text-align:center; background:#ed563b; border-radius:5px; padding:6px; color:white">+ Order</li></ul></a>'.
                    '</div>'.
                '</div>';
        }

        unset($query);
        unset($result);
    }
    else {
        echo "<script>window.location='menu.php?category=0'</script>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Orange Burger | Menu</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/aos.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  </head>
    
  <body>
    <!-- ***** Login Start ***** -->
    <div class="modal fade" id="loginModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="login.php" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Sign In</h4>
                        <button type="button" class="close" style="padding-top: 20px; padding-right: 18px" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <?php echo $log_err_msg; ?>
                            <div class="form-group <?php echo (!empty($log_namemail_err)) ? 'has-error' : ''; ?>">
                                <label>Username/email</label>
                                <input type="text" id="namemail" name="namemail" class="form-control" placeholder="Enter username/email">
                                <span class="help-block" style="color:red"><?php echo $log_namemail_err; ?></span>
                            </div> 
                            <div class="form-group <?php echo (!empty($log_password_err)) ? 'has-error' : ''; ?>">
                                <label>Password:</label>
                                <input type="password" id="log_password" name="log_password" class="form-control" pattern=".{4,}" placeholder="Enter password">
                                <span class="help-block" style="color:red"><?php echo $log_password_err; ?></span>
                            </div>
                            <div class="form-group <?php echo (!empty($log_captcha_err)) ? 'has-error' : ''; ?>">
                                <label>Captcha:</label>
                                <div class="container row">
                                    <input type="text" id="captcha" name="captcha" class="form-control col-5" pattern=".{6}" placeholder="Enter Captcha">
                                    <div class="col-7 row" style="margin-left:auto">
                                        <img src="captcha.php" alt="CAPTCHA" class="captcha-image col-10" style="height:38px; width:200px">
                                        <div class="refreshCaptcha" style="border:0.5px solid #ced4da; border-radius:5px; height:90%; width:15%; padding:6px 9px 10px 9px; cursor:pointer">
                                            <img src="assets/images/refresh.png" style="height:12px; width:12px">
                                        </div>
                                    </div>
                                </div>
                                <span class="help-block" style="color:red"><?php echo $log_captcha_err; ?></span>
                            </div>
                            <script>
                                var refreshCaptcha = document.querySelector(".refreshCaptcha");
                                refreshCaptcha.onclick = function() {
                                    document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
                                }
                            </script>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p style="margin-right: auto">Don't have an account? <a data-toggle="modal" data-dismiss="modal" data-target="#registerModal" style="color:#ed563b">Register here.</a></p>
                        <button type="submit" class="btn btn-primary" name="submit">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ***** Login End ***** -->
    
    <!-- ***** Register Start ***** -->
    <div class="modal fade" id="registerModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="register.php" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Sign Up</h4>
                        <button type="button" class="close" style="padding-top: 20px; padding-right: 18px" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container row">
                            <div class="form-group col-6 <?php echo (!empty($reg_fname_err)) ? 'has-error' : ''; ?>">
                                <label>First Name</label>
                                <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter first name">
                                <span class="help-block" style="color:red"><?php echo $reg_fname_err; ?></span>
                            </div>
                            <div class="form-group col-6 <?php echo (!empty($reg_lname_err)) ? 'has-error' : ''; ?>">
                                <label>Last Name</label>
                                <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter last name">
                                <span class="help-block" style="color:red"><?php echo $reg_lname_err; ?></span>
                            </div>
                            <div class="form-group col-6 <?php echo (!empty($reg_username_err)) ? 'has-error' : ''; ?>">
                                <label>Username</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Enter username">
                                <span class="help-block" style="color:red"><?php echo $reg_username_err; ?></span>
                            </div>
                            <div class="form-group col-6 <?php echo (!empty($reg_email_err)) ? 'has-error' : ''; ?>">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">
                                <span class="help-block" style="color:red"><?php echo $reg_email_err; ?></span>
                            </div>
                            <div class="form-group col-6 <?php echo (!empty($reg_password_err)) ? 'has-error' : ''; ?>">
                                <label>Password</label>
                                <input type="password" id="reg_password" name="reg_password" class="form-control" placeholder="Enter password">
                                <span class="help-block" style="color:red"><?php echo $reg_password_err; ?></span>
                            </div>
                            <div class="form-group col-6 <?php echo (!empty($reg_bdate_err)) ? 'has-error' : ''; ?>">
                                <label>Birth Date</label>
                                <input type="date" id="bdate" name="bdate" class="form-control" placeholder="Enter birth date">
                                <span class="help-block" style="color:red"><?php echo $reg_bdate_err; ?></span>
                            </div>
                            <div class="form-group col-6 <?php echo (!empty($reg_gender_err)) ? 'has-error' : ''; ?>">
                                <label>Gender</label>
                                <select class="form-select form-control" aria-label="Gender selection">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="O">Other</option>
                                    <option value="U">Rather not say</option>
                                </select>
                                <span class="help-block" style="color:red"><?php echo $reg_gender_err; ?></span>
                            </div>
                            <div class="form-group col-6">
                                <span class="help-block" style="color:red; padding-top:26px"><?php echo $reg_err_msg; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p style="margin-right: auto">Already have an account? <a data-toggle="modal" data-dismiss="modal" data-target="#loginModal" style="color:#ed563b">Login here.</a></p>
                        <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ***** Register End ***** -->

    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">Orange <em> Burger</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="menu.php" class="active">Menu</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="about.php">About Us</a>
                                    <a class="dropdown-item" href="testimonials.php">Testimonials</a>
                                </div>
                            </li>
                            <li><a href="contact.php">Contact</a></li> 
                            <?php
                                if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                                    echo ''.
                                    '<li class="dropdown">'.
                                        '<a class="dropdown-toggle" data-toggle="dropdown" href="" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION["name"].'</a>'.
                                        '<div class="dropdown-menu">'.
                                            '<a class="dropdown-item" href="logout.php">Sign Out</a>'.
                                        '</div>'.
                                    '</li>';
                                }
                                else {
                                    echo '<li><a href="" data-toggle="modal" data-target="#loginModal">Sign In</a></li>';
                                }
                            ?>
                            <li><a href="shoppingcart.php"><i class="fa fa-shopping-cart" style="font-size:20px"></i></a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/burgerlineup.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Our <em>Menu</em></h2>
                        <p>Our Burgers, French Fries, and Beverages</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <!-- ***** Fleet Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <br>
            <br>
            <nav>
              <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item" style="width: 12rem; text-align:center"><a class="page-link" href="?category=0">All</a></li>
                <li class="page-item" style="width: 12rem; text-align:center"><a class="page-link" href="?category=1">Burger</a></li>
                <li class="page-item" style="width: 12rem; text-align:center"><a class="page-link" href="?category=2">French Fries</a></li>
                <li class="page-item" style="width: 12rem; text-align:center"><a class="page-link" href="?category=3">Beverages</a></li>
              </ul>
            </nav>
            <br>
            <br>
            <div class="row">
                <?php echo $menu; ?>
            </div>
        </div>
    </section>
    <!-- ***** Fleet Ends ***** -->

    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2020 Company Name
                        - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/aos.js"></script>

    <script type="text/javascript">
        AOS.init();
    </script>

  </body>
</html>