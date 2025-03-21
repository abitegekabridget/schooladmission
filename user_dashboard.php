<?php
$cn = mysqli_connect("localhost", "root", "1+Six=16", "db_admission");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100i,300,300i,400,700" rel="stylesheet">

    <link rel="stylesheet" href="assets1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets1/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets1/css/owl.carousel.min.css">
     <link rel="stylesheet" href="userstyle.css">

     
    
    <script src="assets1/js/jquery-3.2.1.slim.min.js"></script>

    <title>Student Application</title>
    <link rel="shortcut icon" type="image/png" href="https://7hillskampala.com/wp-content/uploads/2023/04/cropped-Logo-png-1-32x32.png">
   
</head>

<body>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-2 sidebar" style="background-color: #A9C46C; height: 100vh; position: fixed; width: 250px; padding: 20px; display: flex; flex-direction: column; gap: 10px; font-weight: bold; top: 0; left: 0; overflow-y: auto;">
    <div class="text-primary fw-bold mb-3" style="color: #A9C46C;">ONLINE APPLICATIONS</div>
    <a href="#" style="text-decoration: none; padding: 10px; background: #A9C46C; color: white; text-align: left; transition: background 0.3s ease; display: block;">DOWNLOAD DOCUMENTS</a>
    <a href="#" style="text-decoration: none; padding: 10px; background: #A9C46C; color: white; text-align: left; transition: background 0.3s ease; display: block;">APPLICATION HISTORY</a>
    <a href="#" style="text-decoration: none; padding: 10px; background: #A9C46C; color: white; text-align: left; transition: background 0.3s ease; display: block;">ADMISSION HISTORY</a>
    <a href="login" class="logout" style="margin-top: auto; background: #BE4B49; text-align: center; text-decoration: none; padding: 10px; color: white; display: block;">LOG OUT</a>
</div>


            <div class="col-md-10 offset-md-2">
                <div class="header-area header-absoulate">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="logo">
                                    <a href="">
                                        <!-- <i class="fa fa-home"></i> -->
                                        <a href="">
                                  <img src="https://7hillskampala.com/wp-content/uploads/2023/04/logo.fw_.png" alt="7HILLS INTERNATIONAL SCHOOL Logo" style="max-height: 50px; /* Adjust as needed */">
   
                            
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="main-menu">
                                    <?php include('component/menu.php'); ?>
                                </div>
                            </div>
                            <div class="col-md-1 text-right">
                                <span class="social-icon">
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="welcome-area">
                    <div class="owl-carousel slider-content">
                        <div class="single-slider-item slider-bg-1">
                            <div class="slider-inner"> 
                                <div class="container"> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="slide-text">
                                                <h2>We provide quality education</h2>
                                                <p>Education is what remains after one has forgotten<br>
                                                    what one has learned in school.
                                                    <br><i>Albert Einstein</i>
                                                </p>
                                                <a href="" class="boxed-btn">learn more <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="single-slider-item slider-bg-2">
                            <div class="slider-inner"> 
                                <div class="container"> 
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="slide-text">
                                                <h2>We provide intencive care</h2>
                                                <p>Education is the most powerful weapon<br>
                                                    which you can use to change the world.
                                                    <br><i>Nelsonjjjjj Mandela</i>
                                                </p>
                                                <a href="" class="boxed-btn">learn more <i class="fa fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <?php include('Component/controller.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="widget">
                                    <div class="logo">
                                        <a href="">
                                            <!-- <i class="fa fa-home"></i>
                                            <span>School</span> -->
                                        </a>
                                        <p> Education is what remains after one has forgotten <br>
                                            what one has learned in school.
                                            <br><i>Albert Einstein</i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="widget">
                                    <h3>Navigation</h3>
                                    
                                    <div class="footer-menu">
                                        <ul>
                                            <li><a href="student_add">home</a></li>
                                            <li><a href="?a=student_add">admission</a></li>
                                            <!-- <li><a href="?a=view">students</a></li> -->
                                            <!-- <li><a href="student_add">contact us</a></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3>Contact Us</h3>
                                <span class="social-icon">
                                    <!-- <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a> -->
                                </span>
                            </div>
                            <p class="copy-right">Copyright &copy;2025 7Hills International School. All Rights Reserved.</p>

                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="assets1/js/popper-1.12.9.min.js"></script>
    <script src="assets1/js/bootstrap.min.js"></script>
    <script src="assets1/js/owl.carousel.min.js"></script>
    <script src="assets1/js/main.js"></script>
</body>

</html>