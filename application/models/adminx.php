<?php

    if ( !defined('BASEPATH')) exit('No direct script access allowed');
    
    class Adminx extends CI_Model
    {   
        function __construct()
        {
            parent::__construct();
        }
        
        function changePassword( $currentPassword, $newPassword )
        {
            $node = NULL ;
            
            $this->load->helper('node');
            
            $this->load->model('dbcon');
            
            $client = $this->dbcon->client;
            
            $queryString =  '
                                    MATCH ( node:company )
                                    WHERE node.password = "'.$currentPassword.'"
                                    
                                    SET node.password = "'.$newPassword.'"
                                    
                                    return node
                                ';
                                
            $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );
        
            $result = $query->getResultSet();
            
            foreach ( $result as $row )
                $node = $row['x']->getProperty('id');
            
            if ($node != NULL)
            {
                return "Password changed.";
            }
            else{
                return "Error : Password not changed !! Please try again.";
            }
            
        }

    }



    // End of file : Admin.php
    // Location    : 