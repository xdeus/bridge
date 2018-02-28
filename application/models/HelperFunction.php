//<?php
//
//    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//
//    class HelperFunction extends CI_Model
//    {
//        function __construct()
//        {
//            //$this->load->model('Database');
//            
//            parent::__construct();
//        }
//
//        function isNodeExists( $nodeID , $nodeLabel )
//        {
//            $queryString =  '
//                                MATCH ( node : ' . $nodeLabel . ' )
//                                WHERE node.id = "' . $nodeID . '"
//                                RETURN node                                     
//                            ';
//
//            $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );
//
//            $result = $query->getResultSet();
//
//            if ( $result != NULL )
//                return TRUE;
//            else
//                return FALSE;
//        }
//
//        function isNodeCredentialsMatch( $nodeId , $password , $nodeLabel )
//        {
//            $queryString =  '
//                                MATCH ( node : '        . $nodeLabel .   ' )
//                                WHERE node.id = "'      . $nodeId .          '"
//                                AND node.password = "'  . $password .    '"
//                                RETURN node                                     
//                            ';
//
//            $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );
//
//            $result = $query->getResultSet();
//
//            if ( $result != NULL )
//                return TRUE;
//            else
//                return FALSE;
//        }
//    }
// 
//    
//    
//    // End of file : HelperFunction.php
//    // Location    : 