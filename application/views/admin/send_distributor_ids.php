            <div class='main'>
                <link rel="stylesheet" href="<?php echo $base , $css ?>formoid-metro-black.css" type="text/css"/>
                <script type="text/javascript" src="<?php echo $base , $js ?>vendors/jquery-1.10.2.min.js"></script>
                
                <form class="formoid-metro-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Open Sans','Helvetica Neue','Helvetica',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
                    <div class="title">
                        <h2>Send Distributor IDs</h2>
                    </div>
                    <div class="element-input" title="To DIstributor ID">
                        <label class="title">To DIstributor ID<span class="required">*</span></label>
                        <input class="large" type="text" name="distributorID" required="required"/>
                    </div>
                    <div class="element-number" title="Number of Distributor IDs to be send">
                        <label class="title">Number of Distributor IDs to be send<span class="required">*</span></label>
                        <input class="large" type="text" min="1" max="1000" name="numberOfIDs" required="required" value=""/>
                    </div>
                    <div class="submit">
                        <input type="submit" value="Send" name='send'/>
                    </div>
                </form>

                <script type="text/javascript" src="<?php echo $base , $js ?>formoid-metro-black.js"></script>
                
            </div>