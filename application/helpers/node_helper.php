<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function isNodeExists( $nodeID , $nodeLabel )
    {
        $node = NULL ;

        $CI = get_instance();
        $CI->load->model('dbCon');

        $client = $CI->dbcon->client;

        //$client = new Everyman\Neo4j\Client('localhost', 7474);

        //$client = new Everyman\Neo4j\Client('bridge.sb02.stations.graphenedb.com', 24789);        // remote original server
        //$client->getTransport()
        //         ->setAuth('bridge', 'UfYFxFznJVyK0z31yJI1');

        $queryString =  '
                            MATCH ( node : ' . $nodeLabel . ' )
                            WHERE node.id = "' . $nodeID . '"
                            RETURN node
                        ';

        $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

        $result = $query->getResultSet();

        foreach ( $result as $row )
            $node = $row['x']->getProperty('id');

        if ( $node != NULL )
            return TRUE;
        else
            return FALSE;
    }

    function isNodeCredentialsMatch( $nodeId , $password , $nodeLabel )
    {
        $node = NULL ;

        $CI = get_instance();
        $CI->load->model('dbCon');

        $client = $CI->dbcon->client;

        //$client = new Everyman\Neo4j\Client('localhost', 7474);

        //$client = new Everyman\Neo4j\Client('bridge.sb02.stations.graphenedb.com', 24789);        // remote original server
        //$client->getTransport()
        //         ->setAuth('bridge', 'UfYFxFznJVyK0z31yJI1');

        $queryString =  '
                            MATCH ( node : '        . $nodeLabel .   ' )
                            WHERE node.id = "'      . $nodeId .          '"
                            AND node.password = "'  . $password .    '"
                            RETURN node
                        ';

        $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

        $result = $query->getResultSet();

        foreach ( $result as $row )
            $node = $row['x']->getProperty('id');

        if ( $node != NULL )
            return TRUE;
        else
            return FALSE;
    }

    function getLastID()
    {
        $CI = get_instance();
        $CI->load->model('dbCon');

        $client = $CI->dbcon->client;

        //$client = new Everyman\Neo4j\Client('localhost', 7474);

        //$client = new Everyman\Neo4j\Client('bridge.sb02.stations.graphenedb.com', 24789);        // remote original server
        //$client->getTransport()
        //         ->setAuth('bridge', 'UfYFxFznJVyK0z31yJI1');

        if ( isNodeExists( 'store1' , 'store' ) )
        {
            $queryString =  '
                        MATCH ( node : '        . "store" .   ' )
                        RETURN node
                    ';

            $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

            $result = $query->getResultSet();

            foreach ( $result as $row )
                $lastID = $row['x']->getProperty('lastDistributorID');

            return $lastID;
        }
        else
            echo "Error : +store node doesn't exist..!!";
    }

    function generateRandomString($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // check does the parent node have at least one empty slot ( max 2 nodes allowed under him )

    function isNodeEligible( $uplineNo )
    {
        $CI = get_instance();
        $CI->load->model('dbCon');

        $client = $CI->dbcon->client;

        //$client = new Everyman\Neo4j\Client('localhost', 7474);

        //$client = new Everyman\Neo4j\Client('bridge.sb02.stations.graphenedb.com', 24789);        // remote original server
        //$client->getTransport()
        //         ->setAuth('bridge', 'UfYFxFznJVyK0z31yJI1');

        if ( isNodeExists( $uplineNo , 'distributor' ) || isNodeExists( $uplineNo , 'company' ) )
        {
            $queryString =
                    '
                        match parentNode where parentNode.id = "'.$uplineNo.'"
                        match ( parentNode )<-[relation:JOINED_UNDER]-()
                        return count( relation )
                    ';

            $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

            $result = $query->getResultSet();

            foreach ( $result as $row )
                $relationshipCount = $row['x'];

            if ( $relationshipCount < 2 )
            {
                //return TRUE;
                if ( $relationshipCount == 0 )
                    return 'LEFT';

                else if ( $relationshipCount == 1 )
                    return 'RIGHT';

                else
                    return FALSE;
            }
            else
                return FALSE;
        }
        else
            return FALSE ;
    }

    function generateDistributorIDs( $distributorID , $numberOfIDs )
    {
        $CI = get_instance();
        $CI->load->model('dbCon');

        $client = $CI->dbcon->client;

        //$client = new Everyman\Neo4j\Client('localhost', 7474);

        //$client = new Everyman\Neo4j\Client('bridge.sb02.stations.graphenedb.com', 24789);        // remote original server
        //$client->getTransport()
        //         ->setAuth('bridge', 'UfYFxFznJVyK0z31yJI1');

        if ( isNodeExists( $distributorID , 'distributor' ) )
        {
           $lastID = (int)getLastID() ;

           $newID = array('');
           $password = array('');

            for ( $x = 1 ; $x <= $numberOfIDs ; $x++ )
            {
                $newID[ ( $x - 1 ) ] = 'BD' . ( $lastID + $x ) ;
                $password[ ( $x - 1 ) ] = generateRandomString(6);

                $queryString = '
                    MATCH ( store:store )
                    CREATE ( node:unusedID { id:"'.$newID[ ( $x - 1 ) ].'" , password:"'.$password[ ( $x - 1 ) ].'" }),
                        (store)-[:HAS_UNUSED_ID]->(node)
                ';

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

                $result = $query->getResultSet();

                if ( $x == $numberOfIDs )
                {
                    $queryString =  '
                        MATCH ( node : store )
                        WHERE node.id = "store1"
                        SET node.lastDistributorID = "' . ( $lastID + $x ) . '
                    "';

                    $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

                    $result = $query->getResultSet();
                }
            }

            $message='';

            foreach ( $newID as $index => $id )
		$message .= 'ID : '.$id.' , Password : '.$password[ $index ].'<br>';

            $queryString = '
                MATCH ( nodeInbox : inbox ) WHERE nodeInbox.id = "inbox'.$distributorID.'"
                MATCH ( nodeDistributor:distributor ) WHERE nodeDistributor.id="'.$distributorID.'"
                MATCH ( nodeDistributor )-[ rel:HAS_INBOX ]->( nodeInbox )
                RETURN rel
            ';

            $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

            $result = $query->getResultSet();

            foreach ( $result as $row )
                $noOfMessages = (int)$row['x']->getProperty('noOfMessages');

            $queryString = '
                MATCH ( nodeDistributor ) WHERE nodeDistributor.id = "'.$distributorID.'"
                MATCH ( nodeInbox : inbox ) WHERE nodeInbox.id = "inbox'.$distributorID.'"
                MATCH ( nodeDistributor )-[ rel:HAS_INBOX ]->( nodeInbox )

                CREATE ( newMessage : message { id : "msg'.$noOfMessages.'" ,
                                                msg : "'.$message.'"
                }),

                ( nodeInbox )-[:HAS_MESSAGE{ date:"'.date("Y-m-d H:i:s").'" }]->( newMessage )

                SET rel.noOfMessages = "'.( $noOfMessages + 1 ).'"'
            ;

            $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

            $result = $query->getResultSet();

            $status =  $numberOfIDs." new IDs sent to Distributor ID : ".$distributorID ;
        }
        else
            $status = "Error : Distributor ID : ".$distributorID." does not exist..!!";

        return $status;
    }

    function generateDistributorIDsForSignup()
    {
        $CI = get_instance();
        $CI->load->model('dbCon');

        $client = $CI->dbcon->client;

           $lastID = (int)getLastID() ;


                $newID = 'BD' . ( $lastID + 1 ) ;
                //$password = generateRandomString(6);

                $queryString =  '
                    MATCH ( node : store )
                    WHERE node.id = "store1"
                    SET node.lastDistributorID = "' . ( $lastID + 1 ) . '
                "';

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

                $result = $query->getResultSet();



        return $newID;
    }


    function joiningScore( $distributorID )
    {
        $CI = get_instance();
        $CI->load->model('dbCon');

        $client = $CI->dbcon->client;

        $parentID = '';

        $queryString = '
                MATCH (node:distributor) WHERE node.id="'.$distributorID.'"
                MATCH (parent:distributor)<-[:JOINED_UNDER]-(node)
                RETURN parent , node.branch AS branch
            ';

        $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

        $result = $query->getResultSet();

        foreach ( $result as $row )
        {
            $parentID = $row['parent']->getProperty('id');

            if ( $parentID == NULL )
                return 'PARENT_NULL';

            $branch = $row['branch'];

            $carryForwardLeft = (int) $row['parent']->getProperty('carryForwardLeft');
            $carryForwardRight = (int) $row['parent']->getProperty('carryForwardRight');

            $dailyScoredPair = (int) $row['parent']->getProperty('dailyScoredPair');
            $carryForwardPair = (int) $row['parent']->getProperty('carryForwardPair');
            $totalScoredPair = (int) $row['parent']->getProperty('totalScoredPair');
        }

        if ( $parentID == NULL )
                return 'PARENT_NULL';

        if ( $branch == 'LEFT' )
        {
            if ( $carryForwardRight > 0 )
            {
                $dailyScoredPair++;
                $carryForwardPair++;
                $totalScoredPair++;

                $carryForwardRight--;
            }
            else
                $carryForwardLeft++;
        }
        elseif ( $branch == 'RIGHT' )
        {
            if ( $carryForwardLeft > 0 )
            {
                $dailyScoredPair++;
                $carryForwardPair++;
                $totalScoredPair++;

                $carryForwardLeft--;
            }
            else
                $carryForwardRight++;
        }

        $queryString = '
                MATCH (node:distributor) where node.id = "'.$parentID.'"
                SET node.carryForwardLeft = '.$carryForwardLeft.',
                    node.carryForwardRight = '.$carryForwardRight.',
                    node.dailyScoredPair = '.$dailyScoredPair.',
                    node.carryForwardPair = '.$carryForwardPair.',
                    node.totalScoredPair = '.$totalScoredPair.'
            ';

        $query = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

        $result = $query->getResultSet();

        joiningScore( $parentID ) ;
    }

    function deleteRegisteredID( $distributorID )
    {
        $CI = get_instance();
        $CI->load->model('dbCon');

        $client = $CI->dbcon->client;

        $queryString = '
                MATCH (node:unusedID) WHERE node.id="'.$distributorID.'"
                OPTIONAL MATCH (node)<-[rel]-()
                DELETE node, rel
            ';

        $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

        $result = $query->getResultSet();
    }

    function dailyPay( $distributorID )
    {
        $CI = get_instance();
        $CI->load->model('dbCon');

        $client = $CI->dbcon->client;

        $childLeft = NULL ;
        $childRight = NULL;

        $carryForwardPair = 0;
        $totalScoredPair = 0;

        $dailyIncome = 0;
        $totalIncome = 0;

        $status = '';

        // retrieve the Company variables

        $queryString = '
            MATCH (node:company)
            RETURN node
        ';

        $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

        $result = $query->getResultSet();

        foreach ( $result as $row )
        {
            $dailyJoiningIncome = (int) $row['x']->getProperty('dailyJoiningIncome');
            $totalJoiningIncome = (int) $row['x']->getProperty('totalJoiningIncome');
        }

        // retrieved the variables and children

        $queryString = '
            MATCH (node:distributor) WHERE node.id="'.$distributorID.'"
            MATCH (children:distributor)-[:JOINED_UNDER]->(node)
            RETURN children , node
        ';

        $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

        $result = $query->getResultSet();

        foreach ( $result as $row )
        {
                $children[] = $row['children']->getProperty('id');

                $childLeft  = isset($children[1]) ? $children[1] : null;
                $childRight = isset($children[0]) ? $children[0] : null;

            if ( $row['node'] != NULL )
            {
                $carryForwardPair = (int) $row['node']->getProperty('carryForwardPair');
                $totalScoredPair = (int) $row['node']->getProperty('totalScoredPair');

                $dailyIncome = (int) $row['node']->getProperty('dailyIncome');
                $totalIncome = (int) $row['node']->getProperty('totalIncome');
            }
        }

        if ( $carryForwardPair >= 3 )
        {
            $carryForwardPair -= 3 ;

            $dailyIncome += 500 ;
            $totalIncome += 500 ;

            $dailyJoiningIncome += 100 ;
            $totalJoiningIncome += 100 ;
        }

        //echo "<br>After payments :<br>";

        //echo "<br>CFP : ".$carryForwardPair ;
        //echo "<br>DP : ".$dailyIncome ;
        //echo "<br>TP : ".$totalIncome ;
        //echo "<br>DJI : ".$dailyJoiningIncome ;
        //echo "<br>TJI : ".$totalJoiningIncome ;
        //echo "<br>---------------------------<br>";

        // updating company variables and distributor variables

        $queryString = '
            MATCH (nodeCom:company)
            MATCH (node:distributor) WHERE node.id="'.$distributorID.'"

            SET nodeCom.dailyJoiningIncome = '.$dailyJoiningIncome.',
                nodeCom.totalJoiningIncome = '.$totalJoiningIncome.',

                node.carryForwardPair = '.$carryForwardPair.',
                node.totalScoredPair = '.$totalScoredPair.',
                node.dailyIncome = '.$dailyIncome.',
                node.totalIncome = '.$totalIncome.'
        ';

        $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

        $result = $query->getResultSet();

        if ( $childLeft != NULL )
            dailyPay( $childLeft ) ;

        if ( $childRight != NULL )
            dailyPay( $childRight ) ;

        $status = 'Payments are generated successfully.'.$distributorID ;

        return $status ;
    }

?>
