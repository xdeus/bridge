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

        <style>
            body{
                background-color: #fcfcfc;
            }
            .bx-wrapper{
                width: 100%;
                margin: 0!important;
            }
            .bxslider>li{
                left: 0;
            }
            .bx-viewport{
                border: 0!important;
                left: 0;
            }
            .updates  marquee{
                padding: 20px;
            }
            .updates h3{
                padding: 10px;
            }
            .updates>div{
                width: 96%;
                height: 340px;
                background-color: #eee;
                padding: 20px;
                margin-top: 20px;
            }
            .latest-products{
                width: 100%;
                padding-top: 40px;
            }
            .latest-products img{
                width: 24.5%;
            }
            .winner{
                padding-top: 40px;
            }
            .winner .bx-wrapper{
                margin: auto!important;
            }
            .slides{
                padding-top: 30px;
            }
            marquee{
                border: 1px solid #eee;
            }
            .left-container,.right-container{
                width: 49.75%;
                display: inline-block;
                vertical-align: top;
                cursor: pointer;
                color: #000;
            }
            .left-container h3{
                padding: 10px;
                background-color: #f4f;
                color: #fff;
            }
            .right-container h3{
                padding: 10px;
                background-color: #77f;
                color: #fff;
            }
            .awards h3{
                padding: 10px;
                background-color: #f44;
                color: #fff;
            }
            .product h3{
                padding: 10px;
                background-color: #7f7;
                color: #fff;
            }

        </style>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="http://bxslider.com/lib/jquery.bxslider.js"></script>
        <link href="http://bxslider.com/lib/jquery.bxslider.css" rel="stylesheet" />

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

        <div class='main'>

                <ul class="bxslider">
                    <li><img src="<?php echo $base , $img ?>slides/slide0.jpg" /></li>
                    <li><img src="<?php echo $base , $img ?>slides/slide1.jpg" /></li>
                    <li><img src="<?php echo $base , $img ?>slides/slide2.jpg" /></li>
                    <li><img src="<?php echo $base , $img ?>slides/slide3.jpg" /></li>
                </ul>

                <div class='slides'>
                    <marquee>
                        <img src="<?php echo $base , $img ?>product/bridge-product/product1.JPG" height='150'/>
                        <img src="<?php echo $base , $img ?>product/bridge-product/product2.JPG" height='150'/>
                        <img src="<?php echo $base , $img ?>product/bridge-product/product3.JPG" height='150'/>
                        <img src="<?php echo $base , $img ?>product/bridge-product/product12.JPG" height='150'/>
                        <img src="<?php echo $base , $img ?>product/bridge-product/product4.JPG" height='150'/>
                        <img src="<?php echo $base , $img ?>product/bridge-product/product11.JPG" height='150'/>
                    </marquee>
                </div>

                <a class='left-container' href='<?php echo $base."index.php/welcome/about" ?>' >

                    <center>
                        <h3>Welcome Message</h3>
                    </center>

                    <p>
                        <strong><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Accomplished your life with <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        self-reliant and benevolence...<br></em></strong><br>
                        <span style='text-align: justify;'>
                            Welcome friends, today you are on the real path to go with endless possibility.
                            You are going to live a life, with economically self-supporting and benevolence.
                            Bridge Trade Com Pvt. Ltd. not only gives you self reliant. It gives you a path
                            to live your life with dignify, courage and healthy.<br><br>
                            Friends, If you think that Bridge Trade Com Pvt. Ltd is only a business to earn
                            money, then there will be vanished a another valley of silly. Bridge Trade Com Pvt. Ltd
                            is reliable path for good health and self support to the peoples who live the life
                        </span>
                        ......<span style='color:#f4f;'>more</span>
                    </p>
                </a>
                <a class='right-container' href='<?php echo $base."index.php/welcome/about#about-company" ?>' >
                    <center>
                        <h3>About the Company</h3>
                    </center>

                    <p>
                        <span style='text-align: justify;'>
                        Bridge TradeCom Pvt Ltd is a business installation under company Law 1956,
                        Registration Number <strong>U51909AS2013PTC011607</strong>.
                        Started in 26 August of 2013, the head Office of this installation situated in Amguri, Dist Sivsagar.<br><br>
                        Starting with health, agriculture, hand made and daily needed family goods,
                        this networking business is mainly focusing on the natural elements which are
                        eaten by our ancestors to live a energetic and healthy life. ‘<strong>Health is wealth</strong>’
                        - pursuit this truth Bridge TradeCom Pvt Ltd patronize both financial support
                        and good health. The company always responsible to the members for provide them
                        a good career with maintain the standard of quality and offer the customers in a
                        reasonable rate
                        </span>
                        .......<span style='color:#f4f;'>more</span>
                    </p>
                </a>

                <div class='awards'>
                    <h3>Incentives & Rewards</h3>
                    <marquee height='200'>
                        <img src="<?php echo $base , $img ?>awards/smartphone.jpg" height='200'/>
                        <img src="<?php echo $base , $img ?>awards/tablet.jpg" height='200'/>
                        <img src="<?php echo $base , $img ?>awards/bike.jpg" height='200'/>
                        <img src="<?php echo $base , $img ?>awards/plane.jpg" height='200'/>
                        <img src="<?php echo $base , $img ?>awards/business-dev-incentive.jpg" height='200'/>
                        <img src="<?php echo $base , $img ?>awards/royalty-income.jpg" height='200'/>
                        <img src="<?php echo $base , $img ?>awards/car.jpg" height='200'/>
                        <img src="<?php echo $base , $img ?>awards/home.jpg" height='200'/>
                    </marquee>
                </div>

                <!--<div class='updates left-container'>-->
                <!--    <h3 style='background-color: #774;'>News & Updates</h3>-->
                <!--    -->
                <!--    <marquee direction='up' scrollamount='2'>-->
                <!--    -->
                <!--        <div>-->
                <!--            <p>-->
                <!--                <span>•</span> Update 1, Welcome friends, today you are on the real path to go with endless possibility.-->
                <!--                You are going to live a life, with economically self-supporting and benevolence.-->
                <!--                Bridge Trade Com Pvt. Ltd. not only gives you self reliant.-->
                <!--            </p>-->
                <!--            <p>-->
                <!--                <span>•</span> Update 2, Welcome friends, today you are on the real path to go with endless possibility.-->
                <!--                You are going to live a life, with economically self-supporting and benevolence.-->
                <!--                Bridge Trade Com Pvt. Ltd. not only gives you self reliant.-->
                <!--            </p>-->
                <!--            <p>-->
                <!--                <span>•</span> Update 3, Welcome friends, today you are on the real path to go with endless possibility.-->
                <!--                You are going to live a life, with economically self-supporting and benevolence.-->
                <!--                Bridge Trade Com Pvt. Ltd. not only gives you self reliant.-->
                <!--            </p>-->
                <!--            <p>-->
                <!--                <span>•</span> Update 4, Welcome friends, today you are on the real path to go with endless possibility.-->
                <!--                You are going to live a life, with economically self-supporting and benevolence.-->
                <!--                Bridge Trade Com Pvt. Ltd. not only gives you self reliant.-->
                <!--            </p>-->
                <!--        </div>-->
                <!--    -->
                <!--    </marquee>-->
                <!--</div>-->
                <!--<div class='updates right-container'>-->
                <!--    <h3 style='background-color: #f74;'>Achievers</h3>-->
                <!--    <marquee direction='up' scrollamount='2'>-->
                <!--        <img src="< phpecho base , img >achievers/achiever-1.jpg" width='400'/>-->
                <!--        <img src="< phpecho base , img >achievers/achiever-2.jpg" width='400'/>-->
                <!--    </marquee>-->
                <!--</div>-->
                <div class='product'>
                    <h3>Our Latest Products</h3>
                    <marquee  direction='right' height='200'>
                        <img src="<?php echo $base , $img ?>product/bridge-product/product5.JPG" height='200'/>
                        <img src="<?php echo $base , $img ?>product/bridge-product/product6.JPG" height='200'/>
                        <img src="<?php echo $base , $img ?>product/bridge-product/product7.JPG" height='200'/>
                        <img src="<?php echo $base , $img ?>product/bridge-product/product8.JPG" height='200'/>
                        <img src="<?php echo $base , $img ?>product/bridge-product/product9.JPG" height='200'/>
                        <img src="<?php echo $base , $img ?>product/bridge-product/product10.JPG" height='200'/>
                    </marquee>
                </div>

        </div>
        <script language='javascript'>
            $(document).ready(function(){
                    $('.bxslider').bxSlider({
                        mode: 'fade',
                        captions: true,
                        auto: true,
                        autoControls: false
                    });
                });
        </script>
