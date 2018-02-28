<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href= "<?php echo $base , $css ?>normalize.css">
        <link rel="stylesheet" href="<?php echo $base , $css ?>main.css">
        <script src="<?php echo $base , $js ?>vendors/modernizr-2.6.2.min.js"></script>

        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->
        <!--<script src="http://bxslider.com/lib/jquery.bxslider.js"></script>-->
        <!--<link href="http://bxslider.com/lib/jquery.bxslider.css" rel="stylesheet" />-->

    </head>
    <body>

        <img src='<?php echo $base , $img ?>pattern.png' class='pattern'>

        <div class='wrapper home'>
            <img style='margin-left:250px;' src='<?php echo $base , $img ?>company-name.PNG'>

            <header>
                <div class='logo'>
                    <a href='#'>
                        <img src='<?php echo $base , $img ?>bridge-logo.PNG'/>
                    </a>
                </div>
                <nav>
                    <ul class="top-level-menu">
                        <li><a href='<?php echo $base."index.php/welcome/" ?>'>HOME</a></li>
                        <li><a href='<?php echo $base."index.php/welcome/about" ?>'>ABOUT US</a></li>
                        <li>
                            <a href="#">PRODUCTS</a>
                            <ul class="second-level-menu">

                                <li>
                                    <a href="#">SCHEME C</a>
                                    <ul class="third-level-menu">

                                        <li><a href='<?php echo $base."index.php/welcome/product_c" ?>'>All products</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href='<?php echo $base."index.php/welcome/concept" ?>'>CONCEPT</a>

                        </li>
                        <li><a href='<?php echo $base."index.php/welcome/contact" ?>'>CONTACT</a></li>
                        <li><a href='<?php echo $base."index.php/welcome/signin" ?>'>SIGNIN</a></li>
                        <li><a href='<?php echo $base."index.php/welcome/signup" ?>'>SIGNUP</a></li>
                    </ul>
                </nav>

            </header>
