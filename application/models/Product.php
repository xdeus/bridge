<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    $objProduct = new HelperFunction();

    class product extends CI_Model
    {
        private $productID;         
        private $productName;       
        private $productBV;         
        private $productImage;

        private $productDescription;
        private $availabilityStatus;

        function __construct()
        {
            $productID = '';         
            $productName = '';       
            $productBV = '';         
            $productImage = '';

            $productDescription = '';
            $availabilityStatus = 'OUT_OF_STOCK';

            $this->load->model('Database');
            
            parent::__construct();
        }

        function createProduct
        (
            $productID,
            $productName,       
            $productBV,         
            $productImage,

            $productDescription,
            $availabilityStatus            
        )
        {
            $isProductIDExists       = $objProduct->isNodeExists( $productID , 'product' );
            
            if ( !$isProductIDExists )
            {
                $queryString =  '
                                    CREATE ( newProduct:product
                                    {
                                        id:"'                           . $productID                .'",
                                        productName:"'                  . $productName              .'",
                                        productBV:"'                    . $productBV                .'",
                                        productImage:"'                 . $productImage             .'"

                                        description:"'                  . $productDescription       .'",
                                        availabilityStatus:"'           . $availabilityStatus.'"
                                    })
                                ';

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

                $result = $query->getResultSet();

                $status = 'success';
            }
            else
            {
                if( $isProductIDExists )
                    $status += '+ProductIDExists';             
            }
            
            return $status;
        }
        
        function getProductDetails( $productID )
        {
            $isProductIDExists = $objProduct->isNodeExists( $productID , 'product' );
            
            if( $isProductIDExists )
            {
                $queryString =  '
                                    MATCH ( node:product{ id:"'.$productID.'" } )
                                    RETURN node
                                ';

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );
    
                $result = $query->getResultSet();

                foreach( $result as $row )
                {
                    $this->$productID                   = $row['x']->getProperty('id');       
                    $this->$productName                 = $row['x']->getProperty('productName');
                    $this->$productBV                   = $row['x']->getProperty('productBV');
                    $this->$productImage                = $row['x']->getProperty('productImage');

                    $this->$productDescription          = $row['x']->getProperty('description');
                    $this->$availabilityStatus          = $row['x']->getProperty('availabilityStatus');
                }
                
                $status = 'success';
            }
            else
                $status = '+ProductIDDoesNotExists';
                
            return $status;
        }
        
        function editDistributor
        (
            $productID,       
            $productName,       
            $productBV,         
            $productImage,

            $productDescription,
            $availabilityStatus
        )
        {
            $isProductIDExists = $objProduct->isNodeExists( $productID , 'product' );
            
            if( $isProductIDExists )
            {
                $queryString =  '
                                    MATCH ( node:product{ id:"'. $productID    .'" } )
                                    
                                    SET node.productName = "'  . $productName  . '" ,
                                        node.productBV = "'    . $productBV    . '" ,
                                        node.productImage = "' . $productImage . '" ,
                                        
                                        node.productDescription = "' . $productDescription . '" ,
                                        node.availabilityStatus = "' . $availabilityStatus . '"
                                ';

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );
    
                $result = $query->getResultSet();

                $status = 'success';
            }
            else
                $status = '+ProductIDDoesNotExists';
                
            return $status;
        }
    }

    
    
    // End of file : Product.php
    // Location    : 