<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bridge TradeCom Pvt. Ltd.</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php echo $base , $css ?>normalize.css">
        <link rel="stylesheet" href="<?php echo $base , $css ?>main.css">
        <script src="<?php echo $base , $js ?>vendors/modernizr-2.6.2.min.js"></script>

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <div class='wrapper'>

            <header>
                <div class='logo'>
                    <a href='#'>B</a>
                </div>

                <div class='b-user-panel'>
                    <div>Welcome User</div>
                    <div class='b-user-panel__signout'>Signout</div>
                </div>

                <nav role='navigation'>
            
                    <div class='b-category theme-1'>
                        <div class='b-category__caption'>Distributor</div>

                        <div class='b-category__links l-distributor'>
                            <a href=''>Create Distributor</a><br>
                            <a href=''>View Distributor Details</a><br>
                            <a href=''>Edit Distributor</a><br>
                            <a href=''>Activate Distributors</a>
                        </div>
                    </div><div

                     class='b-category theme-2'>
                        <div class='b-category__caption'>Order</div>

                        <div class='b-category__links'>
                            <a href=''>Confirm pending orders</a><br>
                            <a href=''>Edit pending orders</a><br>
                            <a href=''>Cancel pending orders</a>
                        </div>
                    </div><div

                     class='b-category theme-1'>
                        <div class='b-category__caption'>Product</div>

                        <div class='b-category__links'>
                            <a href='./codes/product/createProduct.php'>Create Product</a><br>
                            <a href=''>Edit Product</a><br>
                            <a href=''>Delete Product</a><br>
                        </div>
                    </div><div
        
                     class='b-category theme-2'>
                        <div class='b-category__caption'>Rank</div>

                        <div class='b-category__links'>
                            <a href=''>Create Rank</a><br>
                            <a href=''>Edit Rank</a><br>
                            <a href=''>Delete Rank</a><br>
                        </div>
                    </div>
                </nav>

            </header>

            <div class='main distributor-personal-details'>
                <link rel="stylesheet" href="<?php echo $base , $css ?>formoid-metro-black.css" type="text/css"/>
                <script type="text/javascript" src="<?php echo $base , $js ?>vendors/jquery-1.10.2.min.js"></script>

                <form enctype="multipart/form-data" class="formoid-metro-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:960px;min-width:150px" method="post">
                    <div class="title">
                        <h2>Distributor Business Details</h2>
                        <div class='b-option'>
                            <div class='btn-default'>Personal Details</div>
                            <div class='btn-default'>Orders</div>
                            <div class='btn-default'>Edit</div>
                        </div>
                    </div>

                    <div class='b-form-section theme-border-right'>
                        <div class='b-form-section__box'>
                            <div class="element-input" title="Distributor ID">
                                <label class="title">Distributor ID<span class="required">*</span></label>
                                <input class="medium" type="text" name="id" required="required" value='<?php echo $distributorID ?>' disabled='disabled'/>
                            </div>
                            <!--<div class="element-password" title="Password">-->
                            <!--    <label class="title">Password<span class="required">*</span></label>-->
                            <!--    <input class="medium" type="password" name="password" value="" required="required" value='password' disabled='disabled'/>-->
                            <!--</div>-->
                            
                            <div class="element-input" title="Upline No.">
                                <label class="title">Upline No.<span class="required">*</span></label>
                                <input class="medium" type="text" name="uplineNo" required="required" value='<?php echo $uplineNo ?>' disabled='disabled'/>
                            </div>
                            
                            <div class="element-input" title="Date of Joining">
                                <label class="title">Date of Joining</label>
                                <input class="medium" type="text" name="dateOfJoining" value='<?php echo $dateOfJoining ?>' disabled='disabled'/>
                            </div>
                            
                            <div class="element-input" title="Rank">
                                <label class="title">Rank</label>
                                <input class="medium" type="text" name="rank" value='<?php echo $rank ?>' disabled='disabled'/>
                            </div>
                            
                            <div class="element-input">
                                <label class="title">Status</label>
                                <input class="medium" type="text" name="status"  value="<?php echo $status ?>" disabled='disabled'/>
                            </div>
                        </div>
                    </div>

                    <div class='b-form-section'>
                        <div class='b-form-section__box'>
                            
                            <div class="element-number">
                                <label class="title">Current Month BV ( Self )</label>
                                <input class="medium" type="text" min="0" name="currentMonthSelfBV"  value="<?php echo $currentMonthSelfBV ?>" disabled='disabled'/>
                            </div>
                            <div class="element-number">
                                <label class="title">Current Month BV ( Self & Others )</label>
                                <input class="medium" type="text" min="0" name="currentMonthBV"  value="<?php echo $currentMonthBV ?>" disabled='disabled'/>
                            </div>
                            <div class="element-number">
                                <label class="title">Total BV</label>
                                <input class="medium" type="text" min="0" name="totalBV"  value="<?php echo $totalBV ?>" disabled='disabled'/>
                            </div>
                            <div class="element-number">
                                <label class="title">Current Month Bonus ( in Rs. )</label>
                                <input class="medium" type="text" min="0" name="number"  value="<?php echo $currentMonthBonus ?>" disabled='disabled'/>
                            </div>
                            
                        </div>
                    </div>
    
                </form>
    
                <script type="text/javascript" src="<?php echo $base , $js ?>formoid-metro-black.js"></script>
                
            </div>

            <footer></footer>

        </div>

        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="../vendors/js/vendors/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="<?php echo $base , $js ?>plugins.js"></script>
        <script src="<?php echo $base , $js ?>main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
