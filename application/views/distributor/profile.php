<?php

    foreach( $details as $row )
    {
        echo "<h2>Distributor Details</h2>

        <div class='data'>
            <div>Distributor ID</div>
            <div>".             $row['x']->getProperty('id')                       ."
            </div>
        </div>
        <div class='data'>
            <div>Status</div>
            <div><span style='color: #f00'>Inactive</span>
            <span style='float: right'><button style='background-color:#21c773'>Activate</button></span>
            </div>

        </div>
        <div class='data'>
            <div>Password</div>
            <div>".                   $row['x']->getProperty('password')                 ."</div>
        </div>
        <div class='data'>
            <div>Upline No.</div>
            <div>".                 $row['x']->getProperty('uplineNo')                 ."</div>
        </div>
        <div class='data'>
            <div>Date of joining</div>
            <div>".            $row['x']->getProperty('dateOfJoining')            ."</div>
        </div>
        <div class='data'>
            <div>PAN</div>
            <div>".                        $row['x']->getProperty('pan')                      ."</div>
        </div>
        <div class='data'>
            <div>Bank account no.</div>
            <div>".           $row['x']->getProperty('accountNo')                ."</div>
        </div>
        <div class='data'>
            <div>Branch name</div>
            <div>".                $row['x']->getProperty('branchName')               ."</div>
        </div>
        <div class='data'>
            <div>IFSC</div>
            <div>".                       $row['x']->getProperty('ifsc')                     ."</div>
        </div>

        <h3>Personal Details : </h3>

        <div class='data'>
            <div>Name</div>
            <div>".                       $row['x']->getProperty('nameFirst')." ".$row['x']->getProperty('nameLast')  ."</div>
        </div>
        <div class='data'>
            <div>Date of birth</div>
            <div>".              $row['x']->getProperty('dateOfBirth')              ."</div>
        </div>
        <div class='data'>
            <div>Gender</div>
            <div>".                     $row['x']->getProperty('gender')                   ."</div>
        </div>
        <div class='data'>
            <div>Contact no.</div>
            <div>".                $row['x']->getProperty('contactNo')                ."</div>
        </div>
        <div class='data'>
            <div>Email</div>
            <div>".                      $row['x']->getProperty('email')                    ."</div>
        </div>
        <!-- <div  class='data'>Profile picture</div>
        <div> ".       $row['x']->getProperty('profileImage')             ."</div> -->

        <h4>Address</h4>

        <div  class='data'>
            <div>Street Address</div>
            <div>".             $row['x']->getProperty('addrLine1')                ."</div>
        </div>
        <div  class='data'>
            <div>Address Line 2</div>
            <div>".             $row['x']->getProperty('addrLine2')                ."</div>
        </div>
        <div  class='data'>
            <div>City / Town / Village</div>
            <div>".      $row['x']->getProperty('cityTownVillage')          ."</div>
        </div>
        <div class='data'>
            <div>Post office</div>
            <div>".                $row['x']->getProperty('postOffice')               ."</div>
        </div>
        <div class='data'>
            <div>Police Station</div>
            <div>".             $row['x']->getProperty('policeStation')            ."</div>
        </div>
        <div class='data'>
            <div>District</div>
            <div>".                   $row['x']->getProperty('district')                 ."</div>
        </div>
        <div class='data'>
            <div>State / Province / Region</div>
            <div>".  $row['x']->getProperty('state')                    ."</div>
        </div>
        <div class='data'>
            <div>Postal / Zip code</div>
            <div>".          $row['x']->getProperty('postalZip')                ."</div>
        </div>";
    }
?>
