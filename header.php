<?php
include_once "session.php";
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">

    <!-- Page title + Description -->
    <title>Sport - Sporting Club &amp; Centre Theme</title>
    <meta name="description" content="Sport is the best theme for sports clubs and centres">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-touch-icon-152x152.png">
    <link rel="icon" type="image/png" href="favicons/favicon-196x196.png" sizes="196x196">
    <link rel="icon" type="image/png" href="favicons/favicon-160x160.png" sizes="160x160">
    <link rel="icon" type="image/png" href="favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicons/mstile-144x144.png">



    <!-- Style Sheets -->
    <link rel="stylesheet" type="text/css" href="css/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.sidr.light.css">
    <link rel="stylesheet" type="text/css" href="js/media/mediaelementplayer.min.css" />
    <link rel="stylesheet" type="text/css" href="js/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.css?v=2.1.4"/>
    <link rel="stylesheet" type="text/css" href="css/mosaic.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/rs-plugin.css">
    <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" />
    <link rel="stylesheet" type="text/css" href="css/tooltipster.css">
    <link rel="stylesheet" type="text/css" href="css/mega.css" />

    <link rel="stylesheet" href="animate.css-master/animate.min.css">


    <link rel="stylesheet" type="text/css" href="css/skin2.css"> <!-- change to skin2.css for other skin -->
    <link rel="stylesheet" type="text/css" href="css/full.css"> <!-- change to boxed.css for boxed style -->


    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body style="background-color: white; ">


<!-- Pre Header Area OPCIJSKO PRED ZAČETKOM TURNIRJEV -->
<div class="outter-wrapper pre-header-area header-style-5">
    <div class="wrapper clearfix">

        <div class="pre-header-left left">
            <!-- Second Nav -->
            <ul>
                <li><a href="index.html"><strong>Ime Dogodka</strong></a></li>
                <strong>Začetek:</strong> <div class="countdown styled"></div>

            </ul>
        </div>



        <div class="pre-header-right right">
            <a class="fa" title="Facebook" href="https://www.facebook.com/groups/499525183557082/"> &#xf09a; <strong> Poiščite nas na Facebooku </strong></a>&nbsp;&nbsp;&nbsp;&nbsp;

            <?php if(!empty($_SESSION['user_id'])){ ?>
            <i class="fa fa-users"></i> <strong> <?php echo $_SESSION['user_name']." ".$_SESSION['user_surename'] ?> </strong>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="logout.php" title="odjava"> <i class="fa fa-power-off"></i> <strong> Odjava</strong> </a>
            <?php }

            else { ?>
            <a href="register.php" class="fa" title="registracija"> <i class="fa fa-users"></i> <strong> Včlani se</strong> </a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="sign_in.php" class="fa" title="prijava"> <i class="fa fa-user"></i> <strong> Prijavi se</strong> </a>
            <?php } ?>


        </div>

    </div>
</div>

<!-- End Pre-Header -->




<!-- Header Area -->
<div class="outter-wrapper header-area header-style-5">
    <div class="wrapper clearfix logo-container with-menu">

        <!-- Start Mobile Menu Icon -->
        <div id="mobile-header" class="">
            <a id="responsive-menu-button" href="#sidr-main">
                <em class="fa fa-bars"></em> Menu
            </a>
        </div>

        <header>
            <div id="navigation" class="clearfix">

                <ul class="menuHideBtn">
                    <li><a id="closebtn" class="fa" href="#">&#xf00d;</a></li>
                </ul>


                <div class="main-header-left left adjust-left">
                    <a class="logo" href="index.html">
                        <img src="img/logo-white.png" alt="Scene" />
                    </a>
                </div>

                <!-- ** Začetek menija. Prilagojen tudi za telefone in tablice ** -->
                <div class="main-header-right right adjust-right">
                    <nav class="megamenu_container">
                        <ul id="nav" class="right megamenu">
                            <li class="nav-parent"><a href="index.php">Domov</a>

                            </li>
                            <li class="nav-parent">
                                <a href="#">Turnirji</a>
                                <ul>
                                    <li><a href="about.html">3v3 žreb &nbsp; </a></li>

                                    <li><a href="galleries.html">3v3 ekipe &nbsp;</a></li>
                                    <li><a href="team.html">1v1 &nbsp;</a></li>
                                    <li><a href="member.html">Meti iz za črte &nbsp;</a></li>


                                </ul>
                            </li>


                            <li><a href="#" class="megamenu_drop">Rezultati <em class="fa">&#xf107;</em></a><!-- Begin Mega Item -->
                                <div class="dropdown_fullwidth"><!-- Begin Item Container -->

                                    <div class="clearfix">
                                        <div class="col-2-3 clearfix">
                                            <h3 class="mega-title">Opis dogodka</h3>
                                            <a class="col-1-2" href="post.html"><img src="img/fill-8.jpg" alt="Mock" /></a>
                                            <h6 class="title"><a href="post.html">Simbolična slika</a></h6>
                                            <p>Kratek opis zgodbe &#8230;<a href="post.html" class="read-more">Več o tem</a></p>
                                        </div>

                                        <div class="col-1-3 last">
                                            <h3 class="mega-title">Dogodki</h3>
                                            <ul class="list-2 widget-list">
                                                <li><a href="index.html">Nazarje, november</a></li>
                                                <li><a href="event-calender.html">Mozirje, december</a></li>
                                                <li><a href="team.html">Gornji Grad, januar</a></li>

                                            </ul>
                                        </div>
                                    </div>

                                </div><!-- End Item Container -->
                            </li><!-- End Mega Item -->



                            <li class="nav-parent">
                                <a href="#">Lestvice</a>
                                <ul>
                                    <li><a href="about.html">3v3 žreb &nbsp; </a></li>

                                    <li><a href="galleries.html">3v3 ekipe &nbsp;</a></li>
                                    <li><a href="team.html">1v1 &nbsp;</a></li>
                                    <li><a href="member.html">Meti iz za črte &nbsp;</a></li>
                                </ul>
                            </li>
                            <li class="nav-parent">
                                <a href="#">Blog</a>
                                <ul>
                                    <li><a href="blog-rsb.html">Opcije &nbsp;</a></li>

                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- ** Konec menija. Prilagojen tudi za telefone in  tablice ** -->

            </div>
        </header>
    </div>
</div>
