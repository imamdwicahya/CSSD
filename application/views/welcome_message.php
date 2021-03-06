<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo base_url('bootstrap-3.3.6/css/All.css'); ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url('bootstrap-3.3.6/css/font-awesome.min.css'); ?>">
        <link href="<?php echo base_url('bootstrap-3.3.6/css/Login.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('images/Logo.png') ?>" rel="icon" type="image/png"/>
        <script src="<?php echo base_url('bootstrap-3.3.6/js/JavaScript.js') ?>"></script>
        <script src="JavaScript.js"></script>
        <title>Login</title>
    </head>
    <?php
    if (isset($_SESSION["is_logged_in"])) {
        $login = $_SESSION["is_logged_in"];
        if ($login) {
            redirect(base_url('site/halamanUtama'));
        }
    }
    ?>
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
        body, html {
            height: 100%;
            color: #777;
            line-height: 1.8;
        }

        /* Create a Parallax Effect */
        .bgimg-1, .bgimg-2, .bgimg-3 {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* First image (Logo. Full height) */
        .bgimg-1 {
            background-image: url(<?php echo base_url('images/RSUD.jpg'); ?>);
            min-height: 100%;

        }

        /* Second image (Portfolio) */

        .w3-wide {letter-spacing: 10px;}
        .w3-hover-opacity {cursor: pointer;}

        /* Turn off parallax scrolling for tablets and phones */
        @media only screen and (max-device-width: 1024px) {
            .bgimg-1, .bgimg-2, .bgimg-3 {
                background-attachment: scroll;
            }
        }

        .buttonAtur {
            display: inline-block;
            border-radius: 4px;
            background-color: green;
            border: none;
            color: #fff;
            text-align: center;
            font-size: 22px;
            padding: 5px;
            width: 140px;
            /*height: 50px;*/
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .buttonAtur span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .buttonAtur span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .buttonAtur:hover span {
            padding-right: 25px;
        }

        .buttonAtur:hover span:after {
            opacity: 1;
            right: 0;
        }

    </style>
    <body>

        <!-- Navbar (sit on top) -->
        <div class="w3-top">

            <!-- Navbar on small screens -->
            <div id="myNavbar" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
                <a href="index.php/LoginControl/destroy_session" class="w3-bar-item w3-button" onclick="toggleFunction()"><i class="fa fa-sign-in"></i> HOME</a>
            </div>
        </div>

        <div class="bgimg-1 w3-display-container w3-opacity-min w3-green" id="home">
            <div class="w3-display-middle w3-animate-opacity w3-card-4">
                <!--                <div class="w3-display-middle w3-padding w3-col m3">-->
                <div class="w3-container w3-green w3-center">
                    <img src="<?php echo base_url('images/LogoCSSD.png') ?>" class="w3-center w3-margin-bottom">
                    <?php
                    if (isset($_SESSION["is_logged_in"])) {
                        echo "<div id=\"id02\" class=\"modal w3-responsive\">
                <div class=\"modal-content animate w3-black\" style=\"margin-top:15%\">
                    <div class=\"container\">";
                        ?>
                        <?php
                        if (isset($_SESSION["not_user"])) {
                            echo "<h5 class=\"w3-center\">Anda Tidak Berhak Login</i></h5>";
                            $this->session->unset_userdata('not_user');
                        } else {
                            if (isset($_SESSION["not_login"])) {
                                echo "<h5 class=\"w3-center\">Maaf Anda Harus Login</i></h5>";
                            } else {
                                echo "<h5 class=\"w3-center\">Kombinasi Username dan Password Salah <i>Mohon Diulangi</i></h5>";
                            }
                        }

                        if (isset($not_login)) {
                            echo "<h5 class=\"w3-center\">Maaf Anda Harus Login</i></h5>";
                        }
                        echo "</div>
                            <div class = \"container w3-center\">
                        <a class=\"buttonAtur\" href=\""
                        ?><?php echo base_url('LoginControl/destroy_session') ?><?php
                        echo "\" style=\"vertical-align:middle;\"><span>ULANGI</span></a>
                    </div>
                </div>
            </div>";
                        $this->session->unset_userdata('is_logged_in');
                    }

                    
                    ?>
                </div>
                <div class="w3-container w3-white w3-padding-16">
                    <form method="post" action="<?php echo base_url('LoginControl/cobaLogin') ?>">
                        <input type="text" name="username" id="username" placeholder="Username" required="required" style="width:100%;height:60px"/>
                        <input type="password" name="password" id="password" placeholder="Password" required="required" style="width:100%;height:60px"/>
                        <button class="w3-goldyellow"><h3>Login</h3></button>

                    </form>
                </div>
            </div>
        </div>



        <footer class="w3-padding-16 w3-green w3-center w3-margin-top w3-margin-bottom">
            <a href="https://www.usd.ac.id/" target="_blank" class="w3-opacity-min w3-hover-opacity-off"><img src="<?php echo base_url('images/USD.png') ?>"></a>
            <br><b class="w3-text-black">Universitas Sanata Dharma, DI Yogyakarta</b>
            <br>Powered by : <a title="" target="_blank" class="w3-hover-text-black">Imam Dwicahya & I Putu Budi Dharma P.</a>
            <br class="w3-large"><b>© 2017</b>
        </footer>
        <script>
            function myFunction() {
                var navbar = document.getElementById("myNavbar");
                if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                    navbar.className = "w3-bar" + " w3-card-2" + " w3-animate-top" + " w3-white";
                } else {
                    navbar.className = navbar.className.replace(" w3-card-2 w3-animate-top w3-white", "");
                }
            }
            function toggleFunction() {
                var x = document.getElementById("navDemo");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }
        </script>
        <script>
            // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            var modal2 = document.getElementById('id02');

            // When the user clicks anywhere outside of the modal, close it

            modal2.style.display = "block";
//            window.onclick = function(event) {
//                if (event.target == modal2) {
//                    modal2.style.display = "none";
//                }
//            }
        </script>
    </body>
</html>
