<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('bootstrap-3.3.6/css/bootstrap.css'); ?>">
        <link href="<?php echo base_url('bootstrap-3.3.6/css/scroll.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('bootstrap-3.3.6/css/All.css'); ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url('bootstrap-3.3.6/css/font-awesome.min.css'); ?>">
        <link href="<?php echo base_url('bootstrap-3.3.6/css/Login.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('bootstrap-3.3.6/css/Tabel.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('images/Logo.png') ?>" rel="icon" type="image/png"/>
        <script src="JavaScript.js"></script>
        <link href="<?php echo base_url('bootstrap-3.3.6/css/sweetalert.css'); ?>" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url('bootstrap-3.3.6/sweetalert-dev.js'); ?>"></script>
        <script src="<?php echo base_url('bootstrap-3.3.6/sweetalert.min.js'); ?>"></script>
        <title>Hapus Instrument</title>
    </head>
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
        body, html {
            height: 20%;
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
            background-image: url('Gambar/Rute2.png');
            min-height: 100%;
        }

        .w3-wide {letter-spacing: 10px;}
        .w3-hover-opacity {cursor: pointer;}

        /* Turn off parallax scrolling for tablets and phones */
        @media only screen and (max-device-width: 1024px) {
            .bgimg-1, .bgimg-2, .bgimg-3 {
                background-attachment: scroll;
            }
        }
        .buttonTambah{
            display: inline-block;
            border-radius: 4px;
            background-color: #f44336;
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

        .buttonTambah span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .buttonTambah span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .buttonTambah:hover span {
            padding-right: 25px;
        }

        .buttonAtur:hover span:after {
            opacity: 1;
            right: 0;
        }

        .scroll {
            height:600px;
        }
    </style>
    <body>

        <!-- Navbar (sit on top) -->
        <div class="w3-top">
            <?php
            $this->load->view("header_footer/header_instrumen");
            ?>
        </div>

        <div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
        </div>

        <?php
        if (isset($_SESSION["hapus_instrumen"])) {
            $ubah = $_SESSION["hapus_instrumen"];
            if ($ubah == 1) {
                echo "<script>swal(\"Hapus Instrumen Berhasil\", \"\", \"success\");</script>";
            } elseif ($ubah == 0) {
                echo "<script>swal({
                    title: \"Tidak ada penghapusan instrumen\",
                    text: \"Data Instrumen Aman.\",
                    timer: 3000,
                    showConfirmButton: false,
                    animation: \"slide-from-top\",
                    });</script>";
            } else {
                echo "<script>swal(\"Centang Checkbox Untuk Menghapus\", \"\", \"warning\");</script>";
            }
            $this->session->unset_userdata('hapus_instrumen');
        }

        if (isset($_SESSION["hapus_instrumen_confirm"])) {
            $list_id = $_SESSION["listid"];
            echo "<div id='id02' class='modal w3-responsive'>
                <div class='modal-content w3-animate-opacity w3-black' style='margin-top:15%;width:100%'>
                    <div class='container'>
                        <h5 class='w3-center'>Apakah Anda Yakin Akan Menghapus Data Instrumen?</i></h5>
                    </div>
                    <div class='container w3-center'>
                        <a class='btn btn-danger w3-xlarge' href='";
            echo base_url('/InstrumenControl/hapusFix?denied=1/');
            echo "' style='vertical-align:middle;'><i class='fa fa-check-square-o'></i> <span>Ya</span></a>
                        <a class='btn btn-success w3-xlarge' href='";
            echo base_url('/InstrumenControl/hapusFix?denied=0/');
            echo "'><i class='fa fa-remove'></i> <span>Tidak</span></a>
                    </div>
                </div>
            </div>";
            $this->session->unset_userdata('hapus_instrumen_confirm');
        }
        ?>

        <!--        <div class="w3-content w3-container w3-center" id="about">
                    <img src="<?php echo base_url('images/LogoCSSD.png') ?>" class="w3-center w3-margin-top w3-margin-bottom w3-animate-top">
                </div>-->

        <div class="w3-container">
            <div class="w3-container w3-responsive w3-padding-24">
                <form action="<?php echo base_url('/InstrumenControl/cariHapus'); ?>">
                    <div class="col-xs-12">
                        <table style="width:30%">
                            <tr>
                                <th style="width: 90%">
                                    <input style="height: 40px;width:95%;margin-top:15px" type="text" class="form-control" name="namainstrumen" placeholder="Cari Instrumen Untuk Dihapus" required="">
                                </th>
                                <th style="width: 10%;margin-left:1px">
                                    <button class="btn btn-success" name="cari" value="CARI"><i class="fa fa-search"></i>&nbsp;</button>
                                </th>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>


            <div class="w3-responsive w3-card-4 w3-padding-16 w3-animate-opacity scroll">
                <div class="w3-container w3-responsive w3-margin-bottom w3-center w3-animate-left">
                    <b class="w3-xlarge"style="color: green">Hapus Instrumen Di CSSD</b>
                </div>
                <form action="<?php echo base_url('/InstrumenControl/hapus'); ?>">
                    <table class="w3-table w3-striped w3-bordered w3-card" align="center" style="width:60%;margin-bottom:5%">
                        <thead>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($ada_instrumen) || isset($cari_instrumen)) {
                                $total = 0;
                                if (isset($cari_instrumen)) {
                                    $total = count($cari_instrumen);
                                } else {
                                    $total = count($ada_instrumen);
                                }
                            }

                            if ($total == 0) {
                                echo "<td style='text-align: center'>"
                                . "<h3 style='color: red' class='w3-padding-24'>DATA INSTRUMEN KOSONG</h3></td>";
                            } else {
                                echo "<tr class='w3-theme'>
                                    <th style='text-align: center;
                                    '>ID INSTRUMEN</th>
                                    <th style='text-align: left;
                                    '>NAMA INSTRUMEN</th>
                                    <th style='text-align: center;
                                    '>JUMLAH TOTAL INSTRUMEN</th>
                                    <th style='text-align: center;
                                    '>JUMLAH INSTRUMEN STERIL</th>
                                    <th style='text-align: center;
                                    '>PILIH</th>
                                </tr>";
                                if (isset($cari_instrumen)) {
                                    foreach ($cari_instrumen as $r):
                                        if ($r->jumlah > 0) {
                                            echo "
                                    <tr>
                                    <td style='text-align: center'>$r->id_instrumen</td>
                                    <td style='text-align: left'><b>$r->nama_instrumen</b></td>
                                    <td style='text-align: center'>$r->jumlah</td>
                                    <td style='text-align: center'>$r->steril</td>
                                    <td style='text-align: center'><input type='checkbox' name='id[]' value='$r->id_instrumen'></td>
                                    </tr>";
                                        }
                                    endforeach;
                                    $this->session->unset_userdata('nama_instrumen');
                                    $this->session->unset_userdata('cari_instrumen');
                                } else {
                                    if (isset($ada_instrumen)) {

                                        foreach ($ada_instrumen as $r):
                                            if ($r->jumlah > 0) {
                                                echo "
                                    <tr>
                                    <td style='text-align: center'>$r->id_instrumen</td>
                                    <td style='text-align: left'><b>$r->nama_instrumen</b></td>
                                    <td style='text-align: center'>$r->jumlah</td>
                                    <td style='text-align: center'>$r->steril</td>
                                    <td style='text-align: center'><input type='checkbox' name='id[]' value='$r->id_instrumen'></td>
                                    </tr>";
                                            }
                                        endforeach;
                                    }
                                }
                                echo "<tr>
                                <td colspan='5' style='text-align: right'>
                                    <button class='buttonTambah w3-center' style='width: 20%' type='submit' name='ubah' value='yes'><i class='fa fa-warning'></i>HAPUS</button>
                                </td>
                            </tr>";
                            }
                            ?>

                        </tbody>
                    </table>

                </form>
            </div>
        </div>

    </div>

    <?php
    $this->load->view("header_footer/footer");
    ?>
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