            <div class='main' style='padding-top:100px;'>

                <div class='data'>
                    <div>Total no. distributors  </div>
                    <div><?php echo $noOfDistributors ; ?></div>
                </div>
                    
                <div class='data'>
                    <div>Today's company turn over </div>
                    <div><?php echo ( (int)$dailyJoiningIncome + (int)$dailyTDS + (int)$dailySDC ); ?></div>
                </div>
                
                <div class='data'>
                    <div>Today's company income ( from joining ) </div>
                    <div><?php echo $dailyJoiningIncome ; ?></div>
                </div>
                
                <div class='data'>
                    <div>Today's company TDS Collected ( 10.3% of today's pay )  </div>
                    <div><?php echo $dailyTDS ; ?></div>
                </div>
                
                <div class='data'>
                    <div>Today's company Social Development Charge Collected ( 2% of today's pay )  </div>
                    <div><?php echo $totalSDC ; ?></div>
                </div>
                
                <div class='data'>
                    <div>Total company turn over  </div>
                    <div><?php echo ( (int)$totalJoiningIncome + (int)$totalTDS + (int)$totalSDC ); ?></div>
                </div>
                
                <div class='data'>
                    <div>Total company income ( from joining )  </div>
                    <div><?php echo $totalJoiningIncome ; ?></div>
                </div>
                
                <div class='data'>
                    <div>Total company TDS Collected ( 10.3% of total pay )  </div>
                    <div><?php echo $totalTDS ; ?></div>
                </div>
                <div class='data'>
                    <div>Total company Social Development Charge Collected ( 2% of total pay )  </div>
                    <div><?php echo $totalSDC ; ?></div>
                </div>

                <br>
                    
                <h2>Qualified Distributors for payment</h2>

                <?php
                
                    $noOfQualiDist = 0 ;
                
                    foreach ( $qualiDist as $row )
                        $noOfQualiDist++ ;
                
                    echo "<div style='text-align : center'>Total no. of distributors qualified for payment : ".$noOfQualiDist."</div>";
                    
                    if ( $noOfQualiDist > 0 )
                    {
                        echo "
                            <table>
                                <tr>
                                    <th>Distributor ID</th>
                                    <th>Name</th>
                                    <th>Balance</th>
                                    <th>Paying amount <br>( in Rs. )</th>
                                    <th>Status</th>
                                </tr>
                        ";
                            
                        foreach ( $qualiDist as $row )
                        {
                            echo "
                                <tr>
                                    <td>". $row['x']->getProperty('id') ."</td>
                                    <td>". $row['x']->getProperty('nameFirst') ." ". $row['x']->getProperty('nameLast') ."</td>
                                    <td>". ( (int)$row['x']->getProperty('totalIncome') - (int)$row['x']->getProperty('recievedIncome') ) ."</td>
                                    <td><input value=". ( (int)$row['x']->getProperty('totalIncome') - (int)$row['x']->getProperty('recievedIncome') )." style='width: 150px; text-align : center'></td>
                                    <td><button>Pay</button></td>
                                </tr>
                            ";
                        }
                    }
                ?>
                
                </table>

            </div>