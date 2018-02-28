<div style='margin-top: 100px;'>
    <?php
    
     $i = 0 ;
                    
                    foreach ( $inbox as $row )
                    {                    
                        $msg[$i]['id']      = $row['x']->getProperty('id');       
                        $msg[$i]['msg']      = $row['x']->getProperty('msg');   
                        
                        echo "
                        <div class='msg-box'>
                            <div class='msg-id'>Message ID : ".$msg[$i]['id']."</div><br><div>";
                        echo $msg[$i]['msg']."</div></div><br><br>";
                        
                        $i++ ;
                    }
?>
    
</div>


