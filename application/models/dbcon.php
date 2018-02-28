<?php

    if ( !defined('BASEPATH')) exit('No direct script access allowed');

    class Dbcon extends CI_Model
    {
        public static $client;

        function __construct()
        {
            //$this->client = new Everyman\Neo4j\Client('localhost', 7474);       // localhost

             $this->client = new Everyman\Neo4j\Client('hobby-kfkllhhaanncgbkegpcbmepl.dbs.graphenedb.com', 24789);        // remote original server
             $this->client->getTransport()
                  ->setAuth('bridge', 'b.4rejKfj6JBWW.zuT7ZO5pbEJqIYub');

            parent::__construct();
        }
    }

    // End of file : Database.php
    // Location    :
