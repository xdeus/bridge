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
                        <h2>Distributor Personal Details</h2>
                        <div class='b-option'>
                            <div class='btn-default'>Business Details</div>
                            <div class='btn-default'>Orders</div>
                            <div class='btn-default'>Edit</div>
                        </div>
                    </div>
            
                    <div class='b-form-section'>
                        
                        <div class='b-form-section__box'>
                            
                            <div class="element-profile-image">
                                <img src='img/distributors/101.jpg'  height='150px' style=''>
                            </div>
                            
                            <div class="element-name" title="Name">
                                <label class="title">Name</label>
                                <span class="nameFirst">
                                    <input  type="text" size="8" name="nameFirst" value='Biraj' disabled='disabled'/>
                                    <label class="subtitle">First</label>
                                </span>
                                <span class="nameLast">
                                    <input  type="text" size="14" name="nameLast" value='Bora' disabled='disabled'/><label
                                     class="subtitle">Last</label>
                                </span>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class='b-form-section theme-border-left'>

                        <div class='b-form-section__box'>

                            <div class="element-input" title="Date of Birth">
                                <label class="title">Date of Birth</label>
                                <input class="medium" type="text" name="dateOfBirth" value='1988-01-29' disabled='disabled'/>
                            </div>

                            <div class="element-input" title="Gender">
                                <label class="title">Gender</label>
                                <input class="medium" type="text" name="gender" Value='Male' disabled='disabled'/>
                            </div>

                            <div class="element-phone" title="Contact Number">
                                <label class="title">Contact No.</label>
                                <input class="medium" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="phone"  value="+919957166604" disabled='disabled'/>
                            </div>

                            <div class="element-email" title="email">
                                <label class="title">Email</label>
                                <input class="large" type="email" name="email" value="biraj_x@yahoo.com" disabled='disabled'/>
                            </div>

                        </div>

                    </div>

                    <section class='b-address'>

                        <label class="title">Address</label>

                        <div class='b-form-section'>

                            <div class='b-form-section__box'>

                                <div class="element-address">
                                    
                                    <div class="addr1">
                                        <input  type="text" name="addressLine1" value='Milonpur' disabled='disabled'/>
                                        <label class="subtitle">Street Address</label>
                                    </div>
            
                                    <div class="addr2">
                                        <input  type="text" name="addressLine2" value='' disabled='disabled'/>
                                        <label class="subtitle">Address Line 2</label>
                                    </div>
                                    
                                    <span class="city">
                                        <input  type="text" name="cityTownVillage" value='Bokakhat' disabled='disabled'/>
                                        <label class="subtitle">City/Town/Village</label>
                                    </span>
            
                                    <span class="city">
                                        <input  type="text" name="postOffice" value='Bokakhat' disabled='disabled'/>
                                        <label class="subtitle">Post Office</label>
                                    </span>
                                    
                                </div>
                            </div>
                        </div>
                            
                        <div class='b-form-section theme-border-left'>			
                            <div class='b-form-section__box'>		
                                <div class="element-address">
                                    
                                    <span class="city">
                                        <input  type="text" name="policeStation" value='Bokakhat' disabled='disabled'/>
                                        <label class="subtitle">Police Station</label>
                                    </span>
                                    <span class="city">
                                        <input  type="text" name="district" value='Golaghat' disabled='disabled'/>
                                        <label class="subtitle">District</label>
                                    </span>
                                    <span class="state">
                                        <input  type="text" name="state" value='Assam' disabled='disabled'/>
                                        <label class="subtitle">State / Province / Region</label>
                                    </span>
                                    <span class="zip">
                                        <input  type="text" maxlength="15" name="zip" value='785612' disabled='disabled'/>
                                        <label class="subtitle">Postal / Zip Code</label>
                                    </span>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </section>
                   
                </form>
    
                <script type="text/javascript" src="<?php echo $base , $js ?>formoid-metro-black.js"></script>
                
            </div>

            <footer></footer>

        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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
