            <div class='main'>
                <link rel="stylesheet" href="<?php echo $base , $css ?>formoid-metro-black.css" type="text/css"/>
                <script type="text/javascript" src="<?php echo $base , $js ?>vendors/jquery-1.10.2.min.js"></script>
                
                <form class="formoid-metro-black" method="post" style=
    "background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px">
    <div class="title">
            <h2>Change Password</h2>
        </div>


        <div class="element-password" title="Current password">
            <label class="title">Current Password<span class=
            "required">*</span></label><input class="large" name="currentPassword"
            required="required" type="password" value="">
        </div>


        <div class="element-password" title="New Password">
            <label class="title">New Password<span class=
            "required">*</span></label><input class="large" name="newPassword"
            required="required" type="password" value="">
        </div>


        <div class="element-password" title="Retype New Password">
            <label class="title">Retype New Password<span class=
            "required">*</span></label><input class="large" name="retypePassword"
            required="required" type="password" value="">
        </div>

        <div class="submit">
            <input type="submit" value="Update" name='update'>
        </div>
    </form>

                <script type="text/javascript" src="<?php echo $base , $js ?>formoid-metro-black.js"></script>
                
            </div>