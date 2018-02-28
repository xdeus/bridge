<?php
    
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    $objRank = new HelperFunction();

    class Rank extends CI_Model
    {
        private $rankID;         
        private $rankName;

        function __construct()
        {
            $rankID = '';
            $rankName = '';

            $this->load->model('Database');
            
            parent::__construct();
        }

        function createProduct
        (
            $rankID,
            $rankName        
        )
        {
            $isRankIDExists = $objRank->isNodeExists( $rankID , 'rank' );

            if ( !$isRankIDExists )
            {
                $queryString =  '
                                    CREATE ( newRank:rank
                                    {
                                        id:"'       . $rankID   .'",
                                        rankName:"' . $rankName .'",
                                    })
                                ';

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

                $result = $query->getResultSet();

                $status = 'success';
            }
            else
            {
                if( $isRankIDExists )
                    $status += '+RankIDExists';             
            }
            
            return $status;
        }
        
        function getRankDetails( $rankID )
        {
            $isRankIDExists = $objRank->isNodeExists( $rankID , 'rank' );
            
            if( $isRankIDExists )
            {
                $queryString =  '
                                    MATCH ( node:rank{ id:"'.$rankID.'" } )
                                    RETURN node
                                ';

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );
    
                $result = $query->getResultSet();

                foreach( $result as $row )
                {
                    $this->$rankID      = $row['x']->getProperty('id');       
                    $this->$rankName    = $row['x']->getProperty('rankName');
                }

                $status = 'success';
            }
            else
                $status += '+RankIDDoesNotExists';
                
            return $status;
        }

        function editDistributor
        (
            $rankID,
            $rankName
        )
        {
            $isRankIDExists = $objRank->isNodeExists( $rankID , 'rank' );
            
            if( $isRankIDExists )
            {
                $queryString =  '
                                    MATCH ( node:rank{ id:"'.$rankID.  '" } )
                                    SET node.rankName = "'  .$rankName.'"
                                ';

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );
    
                $result = $query->getResultSet();

                $status = 'success';
            }
            else
                $status += '+RankIDDoesNotExists';

            return $status;
        }
    }

    
    
    // End of file : Rank.php
    // Location    : 