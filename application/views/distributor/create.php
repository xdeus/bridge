            <div class='main'>
                <link rel="stylesheet" href="<?php echo $base , $css ?>formoid-metro-black.css" type="text/css"/>
                <script type="text/javascript" src="<?php echo $base , $js ?>vendors/jquery-1.10.2.min.js"></script>

                <form enctype="multipart/form-data" class="formoid-metro-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
                    <div class="title"><h2>New Distributor Form</h2></div>
                    <div class="element-input" title="Distributor ID">
                        <label class="title">Distributor ID<span class="required">*</span></label>
                        <input class="large" type="text" name="id" value="<?php echo $distributorID ?>" readonly required="required"/>
                    </div>
                    <div class="element-password" title="Password">
                        <label class="title">Password<span class="required">*</span></label>
                        <input class="large" type="password" name="password" value="" required="required"/>
                    </div>
                    <div class="element-password" title="Confirm Password">
                        <label class="title">Confirm Password<span class="required">*</span></label>
                        <input class="large" type="password" name="confirmPassword1" value="" required="required"/>
                    </div>
                    <div class="element-input" title="Upline No.">
                        <label class="title">Upline No.<span class="required">*</span></label>
                        <input class="large" type="text" name="uplineNo" required="required"/>
                    </div>
                    
<!--                    <div class="element-checkbox" title="Select Scheme"><label class="title">Select Scheme<span class="required">*</span></label>		<div class="column column3"><label><input type="checkbox" name="checkbox[]" value="Scheme A"/ required="required"><span>Scheme A</span></label></div><span class="clearfix"></span>-->
<!--		<div class="column column3"><label><input type="checkbox" name="checkbox[]" value="Scheme B"/ required="required"><span>Scheme B</span></label></div><span class="clearfix"></span>-->
<!--		<div class="column column3"><label><input type="checkbox" name="checkbox[]" value="Scheme C"/ required="required"><span>Scheme C</span></label></div><span class="clearfix"></span>-->
<!--</div>-->
                    <!--<div class="element-checkbox" title="Select Scheme">-->
                    <!--    <label class="title">Select Scheme<span class="required">*</span></label>-->
                    <!--    <div class="column column3"><label><input type="checkbox" name="SchemeA" value="Scheme A"/ required="required"><span>Scheme A</span></label></div><span class="clearfix"></span>-->
                    <!--    <div class="column column3"><label><input type="checkbox" name="SchemeB" value="Scheme B"/ required="required"><span>Scheme B</span></label></div><span class="clearfix"></span>-->
                    <!--    <div class="column column3"><label><input type="checkbox" name="SchemeC" value="Scheme C"/ required="required"><span>Scheme C</span></label></div><span class="clearfix"></span>-->
                    <!--</div>-->
                    <div class="element-date" title="Date of joining">
                        <label class="title">Date of joining<span class="required">*</span></label>
                        <input class="large" data-format="yyyy-mm-dd" type="date" name="dateOfJoining" placeholder="yyyy-mm-dd" required="required"/>
                    </div>
                    <div class="element-separator" title="Transaction Details">
                        <hr>
                        <h3 class="section-break-title">Transaction Details</h3>
                    </div>
                    <div class="element-input" title="PAN">
                        <label class="title">PAN<span class="required">*</span></label>
                        <input class="large" type="text" name="pan" required="required"/>
                    </div>
                    <div class="element-input" title="Bank account no.">
                        <label class="title">Bank account no.<span class="required">*</span></label>
                        <input class="large" type="text" name="accountNo" required="required"/>
                    </div>
                    <div class="element-input" title="Bank name">
                        <label class="title">Bank name<span class="required">*</span></label>
                        <input class="large" type="text" name="bankName" required="required"/>
                    </div>
                    <div class="element-input" title="Branch name">
                        <label class="title">Branch name<span class="required">*</span></label>
                        <input class="large" type="text" name="branchName" required="required"/>
                    </div>
                    <div class="element-input" title="IFSC">
                        <label class="title">IFSC<span class="required">*</span></label>
                        <input class="large" type="text" name="ifsc" required="required"/>
                    </div>
                    <div class="element-separator" title="Personal Details">
                        <hr>
                            <h3 class="section-break-title">Personal Details</h3>
                    </div>
                    <div class="element-name">
                        <label class="title">Name</label>
                        <span class="nameFirst">
                            <input  type="text" size="8" name="nameFirst" />
                            <label class="subtitle">First</label>
                        </span>
                        <span class="nameLast">
                            <input  type="text" size="14" name="nameLast" />
                            <label class="subtitle">Last</label>
                        </span>
                    </div>
                    <div class="element-date" title="Date of birth">
                        <label class="title">Date of birth</label>
                        <input class="large" data-format="yyyy-mm-dd" type="date" name="dateOfBirth" placeholder="yyyy-mm-dd"/>
                    </div>
                    <div class="element-radio" title="Gender">
                        <label class="title">Gender</label>
                        <div class="column column2">
                            <label><input type="radio" name="gender" value="male" checked/><span>Male</span></label>
                        </div>
                        <span class="clearfix"></span>
                        <div class="column column2">
                            <label><input type="radio" name="gender" value="female" /><span>Female</span></label>
                        </div>
                        <span class="clearfix"></span>
                    </div>
                    <div class="element-phone" title="Contact No.">
                        <label class="title">Contact No.</label>
                        <input class="large" type="tel" pattern="[+]?[\.\s\-\(\)\*\#0-9]{3,}" maxlength="24" name="contactNo"  value=""/>
                    </div>
                    <div class="element-email">
                        <label class="title">Email</label>
                        <input class="large" type="email" name="email" value="" />
                    </div>
                    
                    
                    
                    <div class="element-file" title="Profile Picture">
                        <label class="title">Profile Picture</label>
                        <label class="large" >
                            <div class="button">Browse image</div>
                            <input type="file" class="file_input" name="profileImage" />
                            <div class="file_text">No image selected</div>
                        </label>
                    </div>
                    <span style='display: block; padding: 0px 0 30px 30px; color: #dd0;'>Only JPEG & PNG formats with a maximum size of 1MB are allowed.</span>
        
        
                        <label class="title">Address</label>
                        
                                <div class="element-address">
                                    
                                    <div class="addr1">
                                        <input  type="text" name="addressLine1"/>
                                        <label class="subtitle">Street Address</label>
                                    </div>
            
                                    <div class="addr2">
                                        <input  type="text" name="addressLine2"/>
                                        <label class="subtitle">Address Line 2</label>
                                    </div>
                                    
                                    <span class="city">
                                        <input  type="text" name="cityTownVillage"/>
                                        <label class="subtitle">City / Town / Village</label>
                                    </span>
            
                                    <span class="city">
                                        <input  type="text" name="postOffice"/>
                                        <label class="subtitle">Post Office</label>
                                    </span>
                                    
                                    <span class="city">
                                        <input  type="text" name="policeStation" />
                                        <label class="subtitle">Police Station</label>
                                    </span>
                                    <span class="city">
                                        <input  type="text" name="district" />
                                        <label class="subtitle">District</label>
                                    </span>
                                    <span class="state">
                                        <input  type="text" name="state"/>
                                        <label class="subtitle">State / Province / Region</label>
                                    </span>
                                    <span class="zip">
                                        <input  type="text" maxlength="15" name="zip"/>
                                        <label class="subtitle">Postal / Zip Code</label>
                                    </span>
                                    
                                </div>
        
<div class="submit"><input type="submit" name='create' value="Create"/></div></form>
                
                <script type="text/javascript" src="<?php echo $base , $js ?>formoid-metro-black.js"></script>
                
            </div>
