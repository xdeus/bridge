        <div class='main sign-in'>
            <link rel="stylesheet" href="<?php echo $base , $css ?>formoid-metro-black.css" type="text/css"/>
            <script type="text/javascript" src="<?php echo $base , $js ?>vendors/jquery-1.10.2.min.js"></script>

            <form method="post" class="formoid-metro-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px">
                <div class="title">
                    <h2>Sign In</h2>
                </div>
                <div class="element-input" title="Distributor ID">
                    <label class="title">Distributor ID<span class="required">*</span></label>
                    <input class="medium" type="text" name="distributorID" required="required"/>
                </div>
                <div class="element-password" title="Password">
                    <label class="title">Password<span class="required">*</span></label>
                    <input class="medium" type="password" name="password" value=""  placeholder='password' required="required"/>
                </div>
                <div class="submit">
                    <input type="submit" name='signin' value="Sign In"/>
                </div>
            </form>

            <script type="text/javascript" src="<?php echo $base , $js ?>formoid-metro-black.js"></script>

        </div>