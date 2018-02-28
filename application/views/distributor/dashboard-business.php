<div style='padding-top:100px;'>

    <div class='data'>
        <div>ID</div>
        <div><?php  echo $distributorID ; ?></div>
    </div>
    <div class='data'>
        <div>Today's Income</div>
        <div>Rs. <?php  echo $dailyIncome ; ?></div>
    </div>
    <div class='data'>
        <div>Total Income</div>
        <div>Rs. <?php  echo $totalIncome ; ?></div>
    </div>
    <div class='data'>
        <div>Balance </div>
        <div>Rs. <?php  echo ( $totalIncome - $recievedIncome ); ?></div>
    </div>
    <div class='data'>
        <div>Total Income Recieved</div>
        <div>Rs. <?php  echo $recievedIncome ; ?></div>
    </div>
    <div class='data'>
        <div>Carry Forward Amount</div>
        <div><?php  echo $carryForwardPair ; ?></div>
    </div>
    <div class='data'>
        <div>Carry Forward Left</div>
        <div><?php  echo $carryForwardLeft ; ?></div>
    </div>
    <div class='data'>
        <div class='data'>Carry Forward Right</div>
        <div><?php  echo $carryForwardRight ; ?></div>
    </div>
    <div class='data'>
        <div>Today's Scored Amount</div>
        <div><?php  echo $dailyScoredPair ; ?></div>
    </div>
    <div class='data'>
        <div>Total Scored Amount</div>
        <div><?php  echo $totalScoredPair ; ?></div>
    </div>

</div>

<div>
    <h2>Children business details</h2>
    <div style='text-align: center;'>Upline : <?php echo $upline; ?></div>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>

            <th>Today's Scored Amount</th>
            <th>Carry Forward Amount</th>
            <th>Carry Forward Left</th>
            <th>Carry Forward Right</th>

            <th>Down</th>
            <th>Up</th>
        </tr>
        <?php

            //foreach ( $upline as $row )
                //$uplineNo = $row['x']->getProperty('id');

            for( $i = 0 ; $i < 2 ; $i++ )
            {
                $downline = $children[$i]['distributorID'] ;

                if( $children[$i]['distributorID'] == '' )
                {
                    $children[$i]['distributorID'] = 'Not joined';
                    $downline = '#';
                }

                    echo
                        "<tr>
                            <td>". $children[$i]['distributorID'] ."</td>
                            <td>". $children[$i]['nameFirst']." ".$children[$i]['nameLast'] ."</td>

                            <td>". (int) $children[$i]['dailyScoredPair'] ."</td>
                            <td>". (int) $children[$i]['carryForwardPair'] ."</td>
                            <td>". (int) $children[$i]['carryForwardLeft'] ."</td>
                            <td>". (int) $children[$i]['carryForwardRight'] ."</td>

                            <td class='arrow-hilight'><a href='".$base."index.php/distributor/details/".$distributorID."/". $downline ."' >▼</a></td>
                            <td class='arrow-hilight'><a href='".$base."index.php/distributor/details/".$distributorID."/". $uplineDetails ."' >▲</a></td>
                        </tr>";
            }
        ?>

    </table>
</div>
