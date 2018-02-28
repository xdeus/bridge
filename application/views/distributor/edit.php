<?php
    foreach( $details as $row )
    {
	$password 		= $row['x']->getProperty('password');
	
	$pan			= $row['x']->getProperty('pan');
	$bankName		= $row['x']->getProperty('bankName');
	$branchName		= $row['x']->getProperty('branchName');
	$accountNo		= $row['x']->getProperty('accountNo');
	$ifsc			= $row['x']->getProperty('ifsc');
	
	$nameFirst		= $row['x']->getProperty('nameFirst');
	$nameLast		= $row['x']->getProperty('nameLast');
	$dateOfBirth		= $row['x']->getProperty('dateOfBirth');
	$gender			= $row['x']->getProperty('gender');
	$contactNo		= $row['x']->getProperty('contactNo');
	$email			= $row['x']->getProperty('email');
	
	$addrLine1		= $row['x']->getProperty('addrLine1');
	$addrLine2		= $row['x']->getProperty('addrLine2');
	$cityTownVillage	= $row['x']->getProperty('cityTownVillage');
	$postOffice		= $row['x']->getProperty('postOffice');
	$policeStation		= $row['x']->getProperty('policeStation');
	$district		= $row['x']->getProperty('district');
	$state			= $row['x']->getProperty('state');
	$postalZip		= $row['x']->getProperty('postalZip');
	
	
    }
    
?>
	    
	    <div class='main'>
                <link rel="stylesheet" href="<?php echo $base , $css ?>formoid-metro-black.css" type="text/css"/>
                <script type="text/javascript" src="<?php echo $base , $js ?>vendors/jquery-1.10.2.min.js"></script>

                <form enctype="multipart/form-data" class="formoid-metro-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
                    <div class="title"><h2>Edit Distributor Form</h2></div>
                    <div class="element-input" title="Distributor ID">
                        <label class="title">Distributor ID<span class="required">*</span></label>
                        <input class="large" type="text" name="id" value="<?php echo $distributorID ?>" readonly />
                    </div>
                    <div class="element-password" title="Password">
                        <label class="title">Password<span class="required">*</span></label>
                        <input class="large" type="text" name="password" value="<?php echo $password ?>" required="required"/>
                    </div>
                    
                    <div class="element-separator" title="Transaction Details">
                        <hr>
                        <h3 class="section-break-title">Transaction Details</h3>
                    </div>
                    <div class="element-input" title="PAN">
                        <label class="title">PAN<span class="required">*</span></label>
                        <input class="large" type="text" name="pan" value="<?php echo $pan ?>" required="required"/>
                    </div>
                    <div class="element-input" title="Bank account no.">
                        <label class="title">Bank account no.<span class="required">*</span></label>
                        <input class="large" type="text" name="accountNo" value="<?php echo $accountNo ?>" required="required"/>
                    </div>
                    <div class="element-input" title="Bank name">
                        <label class="title">Bank name<span class="required">*</span></label>
                        <input class="large" type="text" name="bankName" value="<?php echo $bankName ?>" required="required"/>
                    </div>
                    <div class="element-input" title="Branch name">
                        <label class="title">Branch name<span class="required">*</span></label>
                        <input class="large" type="text" name="branchName" value="<?php echo $branchName ?>" required="required"/>
                    </div>
                    <div class="element-input" title="IFSC">
                        <label class="title">IFSC<span class="required">*</span></label>
                        <input class="large" type="text" name="ifsc" value="<?php echo $ifsc ?>" required="required"/>
                    </div>
                    <div class="element-separator" title="Personal Details">
                        <hr>
                            <h3 class="section-break-title">Personal Details</h3>
                    </div>
                    <div class="element-name">
                        <label class="title">Name</label>
                        <span class="nameFirst">
                            <input  type="text" size="8" name="nameFirst" value="<?php echo $nameFirst ?>"/>
                            <label class="subtitle">First</label>
                        </span>
                        <span class="nameLast">
                            <input  type="text" size="14" name="nameLast" value="<?php echo $nameLast ?>"/>
                            <label class="subtitle">Last</label>
                        </span>
                    </div>
                    <div class="element-date" title="Date of birth">
                        <label class="title">Date of birth</label>
                        <input class="large" data-format="yyyy-mm-dd" type="date" name="dateOfBirth" placeholder="yyyy-mm-dd" value="<?php echo $dateOfBirth ?>" />
                    </div>
                    <div class="element-radio" title="Gender">
                        <label class="title">Gender</label>
                        <div class="column column2">
                            <label><input type="radio" name="gender" value="male" <?php if($gender == 'male') echo"checked"; ?>/><span>Male</span></label>
                        </div>
                        <span class="clearfix"></span>
                        <div class="column column2">
                            <label><input type="radio" name="gender" value="female" <?php if($gender == 'female') echo"checked"; ?>/><span>Female</span></label>
                        </div>
                        <span class="clearfix"></span>
                    </div>
                    <div class="element-phone" title="Contact No.">
                        <label class="title">Contact No.</label>
                        <input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="contactNo"  value="<?php echo $contactNo ?>"/>
                    </div>
                    <div class="element-email">
                        <label class="title">Email</label>
                        <input class="large" type="email" name="email" value="<?php echo $email ?>" />
                    </div>
                    
                        <label class="title">Address</label>
                        
                                <div class="element-address">
                                    
                                    <div class="addr1">
                                        <input  type="text" name="addrLine1" value="<?php echo $addrLine1 ?>"/>
                                        <label class="subtitle">Street Address</label>
                                    </div>
            
                                    <div class="addr2">
                                        <input  type="text" name="addrLine2" value="<?php echo $addrLine2 ?>"/>
                                        <label class="subtitle">Address Line 2</label>
                                    </div>
                                    
                                    <span class="city">
                                        <input  type="text" name="cityTownVillage" value="<?php echo $cityTownVillage ?>"/>
                                        <label class="subtitle">City / Town / Village</label>
                                    </span>
            
                                    <span class="city">
                                        <input  type="text" name="postOffice" value="<?php echo $postOffice ?>"/>
                                        <label class="subtitle">Post Office</label>
                                    </span>
                                    
                                    <span class="city">
                                        <input  type="text" name="policeStation" value="<?php echo $policeStation ?>"/>
                                        <label class="subtitle">Police Station</label>
                                    </span>
                                    <span class="city">
                                        <input  type="text" name="district" value="<?php echo $district ?>"/>
                                        <label class="subtitle">District</label>
                                    </span>
                                    <span class="state">
                                        <input  type="text" name="state" value="<?php echo $state ?>"/>
                                        <label class="subtitle">State / Province / Region</label>
                                    </span>
                                    <span class="zip">
                                        <input  type="text" maxlength="15" name="zip" value="<?php echo $postalZip ?>"/>
                                        <label class="subtitle">Postal / Zip Code</label>
                                    </span>
                                    
                                </div>
        
<div class="submit"><input type="submit" name='save' value="Update"/></div></form>
                
                <script type="text/javascript" src="<?php echo $base , $js ?>formoid-metro-black.js"></script>
                
            </div>
