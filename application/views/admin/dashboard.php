            <div class='main' style='padding-top:100px;'>

                <div class='data'>
                    <div>Total no. distributors  </div>
                    <div><?php echo $noOfDistributors ; ?></div>
                </div>
                
                <!--Some fields are commented as TDS & SDC are not applicable in the new modified scheme C-->
                
                
                <!--<div class='data'>
                    <div>Today's company turn over </div>
                    <div>?php echo ( (int)$dailyJoiningIncome + (int)$dailyTDS + (int)$dailySDC ); ?></div>
                </div>-->
                
                <div class='data'>
                    <div>Today's company income ( from joining ) </div>
                    <div><?php echo $dailyJoiningIncome ; ?></div>
                </div>
                
                <!--<div class='data'>
                    <div>Today's company TDS Collected ( 10.3% of today's pay )  </div>
                    <div>?php echo $dailyTDS ; ?></div>
                </div>-->
                
                <!--<div class='data'>
                    <div>Today's company Social Development Charge Collected ( 2% of today's pay )  </div>
                    <div>?php echo $dailySDC ; ?></div>
                </div>-->
                
                <!--<div class='data'>
                    <div>Total company turn over  </div>
                    <div>?php echo ( (int)$totalJoiningIncome + (int)$totalTDS + (int)$totalSDC ); ?></div>
                </div>-->
                
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
                                <tr id='row". $row['x']->getProperty('id') ."' >
                                    <td class='td-id'>". $row['x']->getProperty('id') ."</td>
                                    <td class='td-name'>". $row['x']->getProperty('nameFirst') ." ". $row['x']->getProperty('nameLast') ."</td>
                                    <td class='td-balance'>". ( (int)$row['x']->getProperty('totalIncome') - (int)$row['x']->getProperty('recievedIncome') ) ."</td>
                                    <td class='td-paying-amount'><input type='number' min='500' max='". ( (int)$row['x']->getProperty('totalIncome') - (int)$row['x']->getProperty('recievedIncome') )."' value='". ( (int)$row['x']->getProperty('totalIncome') - (int)$row['x']->getProperty('recievedIncome') )."' style='width: 150px; text-align : center'></td>
                                    <td class='td-button'><button data-id ='". $row['x']->getProperty('id') ."' >Pay</button></td>
                                </tr>
                            ";
                        }
                    }
                ?>
                
                </table>

            </div>
            
            <script src="<?php echo $base , $js ?>vendors/jquery-1.10.2.min.js"></script>
            
            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
            
            <script language='javascript'>
                
                $(document).ready(function(){
                    $('.td-button button').click( function(){
                        
                        var inputBox = '#row'+$(this).attr('data-id')+' input' ;
                        var balance = '#row'+$(this).attr('data-id')+' .td-balance' ;
                        var btnPay = '#row'+$(this).attr('data-id')+' button' ;
                        
                        var id = $(this).attr('data-id') ;
                        var storePaidVal = $('#row'+$(this).attr('data-id')+' input').val() ; // $(inputBox).val()

                        //var tds = (10.3/100) * $(inputBox).val();
                        //var sdc = (2/100) * $(inputBox).val();
                        //var payingAmount = $(inputBox).val() - tds - sdc ;
                        
                        //alert( '<?php echo $base ?>index.php/admin/pay/'+ $(this).attr('data-id')+'/'+ parseInt($( balance).text()) +'/'+ $(inputBox).val() );
                        
                        if ( $(inputBox).val() < 500 ) {
                            alert("Error : Paying amount must be atleast Rs. 500");
                        }
                        else if ($(inputBox).val() > parseInt($(balance).text()) ) {
                            alert("Error : Paying amount can't be greater than BALANCE.");
                        }
                        else{
                            $.ajax({
                                type : 'POST',
                                url : '<?php echo $base ?>index.php/admin/pay/'+ $(this).attr('data-id')+'/'+ parseInt($( balance).text()) +'/'+ $(inputBox).val() ,
                                success : function(data){
                                    if ( parseInt($(balance).text()) <= data ) {
                                        alert( "Error in payment to " + id );
                                    }
                                    else{
                                        $(balance).text( parseInt($(balance).text()) - $(inputBox).val() );
                                        $(inputBox).val( parseInt( data ) )
                                        if ( parseInt($(balance).text()) < 500 ) {
                                            $(btnPay).prop('disabled', true );
                                            $(inputBox).val( 0 );
                                        }
                                        
                                        alert( 'ID : ' + id + '\r' +
                                               'Total amount : Rs. ' + storePaidVal + '\r' 
                                               //'Net Amount : Rs. ' + payingAmount + '\r'+
                                               //'TDS : Rs. ' + tds + '\r' +
                                               //'SDC : Rs. ' + sdc
                                            );
                                    }
                                },
                                error: function(){ alert("Error : Payment not done. Error response from server."); }
                            });
                        }
                        
                        
                    });
                });
            </script>