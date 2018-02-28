<?php

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Distributorx extends CI_Model
    {
        public $distributorID;
        public $password;
        public $uplineNo;
        public $dateOfJoining;

        public $pan;
        public $accountNo;
        public $bankName;
        public $branchName;
        public $ifsc;


        public $nameFirst;
        public $nameLast;

        public $dateOfBirth;
        public $gender;
        public $contactNo;
        public $email;
        public $profileImage;

        public $addrLine1;
        public $addrLine2;
        public $cityTownVillage;
        public $postOffice;
        public $policeStation;
        public $district;
        public $state;
        public $postalZip;

        public $rankId;
        public $currentMonthSelfBV;
        public $currentMonthBV;
        public $totalBV;
        public $currentMonthBonus;
        public $status;

        function __construct()
        {
            $distributorID = '';
            $password = '';
            $uplineNo = '';
            $dateOfJoining = '';

            $pan = '';
            $accountNo = '';
            $bankName = '';
            $branchName = '';
            $ifsc = '';

            $nameFirst = '';
            $nameLast = '';

            $dateOfBirth = '';
            $gender = '';
            $contactNo = '';
            $email = '';
            $profileImage = '';

            $addrLine1 = '';
            $addrLine2 = '';
            $cityTownVillage = '';
            $postOffice = '';
            $policeStation = '';
            $district = '';
            $state = '';
            $postalZip = '';

            $rankId = 1;
            $currentMonthSelfBV = 0;
            $currentMonthBV = 0;
            $totalBV = 0;
            $currentMonthBonus = 0;
            $status = '';

            parent::__construct();
        }

        function createDistributor
        (
            $distributorID='',
            $password='',
            $uplineNo='',

            $dateOfJoining='',

            $pan = '',
            $accountNo = '',
            $bankName = '',
            $branchName = '',
            $ifsc = '',

            $nameFirst='',
            $nameLast='',

            $dateOfBirth='',
            $gender='',
            $contactNo='',
            $email='',
            $profileImage='',

            $addrLine1='',
            $addrLine2='',
            $cityTownVillage='',
            $postOffice='',
            $policeStation='',
            $district='',
            $state='',
            $postalZip='',

            $rankID = '1' ,
            $distributorStatus = 'SLEEP' ,

            $currentMonthSelfBV = 0 ,
            $currentMonthBV = 0 ,
            $totalBV = 0 ,
            $currentMonthBonus = 0
        )
        {
            $status = '';

            $this->load->helper('node');

            $this->load->model('dbcon');

            $client = $this->dbcon->client;

            //$isUplineNoExists       = isNodeExists( $uplineNo , 'distributor' ) || isNodeExists( $uplineNo , 'company' ) ;
            $ifParentEligibleBranch   = isNodeEligible( $uplineNo );

            $isDistributorIDExists  = isNodeExists( $distributorID , 'distributor' ) || isNodeExists( $distributorID , 'company' );
            //$isRankIDExists         = isNodeExists( $rankID, 'rank' );

            //$distributorID = generateDistributorIDsForSignup();

            if ( $ifParentEligibleBranch && !$isDistributorIDExists )
            {
                $queryString = '
                                    MATCH ( parentDistributor ) WHERE parentDistributor.id="'.$uplineNo.'"

                                    CREATE ( newDistributor:distributor
                                    {
                                        id:"'                   .$distributorID.'",
                                        password:"'             .$password.'",
                                        uplineNo:"'             .$uplineNo.'",
                                        branch:"'               .$ifParentEligibleBranch.'",
                                        dateOfJoining:"'        .$dateOfJoining.'",

                                        carryForwardLeft:0,
                                        carryForwardRight:0,

                                        dailyScoredPair:0,
                                        totalScoredPair:0,
                                        carryForwardPair:0,

                                        dailyIncome:0,
                                        totalIncome:0,
                                        recievedIncome:0,

                                        pan:"'                  .$pan.'",
                                        accountNo:"'            .$accountNo.'",
                                        bankName:"'             .$bankName.'",
                                        branchName:"'           .$branchName.'",
                                        ifsc:"'                 .$ifsc.'",

                                        nameFirst:"'            .$nameFirst.'",
                                        nameLast:"'             .$nameLast.'",

                                        dateOfBirth:"'          .$dateOfBirth.'",
                                        gender:"'               .$gender.'",
                                        contactNo:"'            .$contactNo.'",
                                        email:"'                .$email.'",
                                        profileImage:"'         .$profileImage.'",

                                        addrLine1:"'            .$addrLine1.'",
                                        addrLine2:"'            .$addrLine2.'",
                                        cityTownVillage:"'      .$cityTownVillage.'",
                                        postOffice:"'           .$postOffice.'",
                                        policeStation:"'        .$policeStation.'",
                                        district:"'             .$district.'",
                                        state:"'                .$state.'",
                                        postalZip:"'            .$postalZip.'",

                                        status:"'               .$distributorStatus.'",

                                        currentMonthSelfBV:"'   .$currentMonthSelfBV.'",
                                        currentMonthBV:"'       .$currentMonthBV.'",
                                        totalBV:"'              .$totalBV.'",
                                        currentMonthBonus:"'    .$currentMonthBonus.'"
                                    }),

                                    ( newDistributor )-[:JOINED_UNDER{ date:"'.date("Y-m-d H:i:s").'" }]->( parentDistributor )
                                ';

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

                $result = $query->getResultSet();

                //joiningScore( $distributorID );

                $status = ' Distributor with ID : '.$distributorID.' created successfully.';

                redirect('index.php/distributor/profile/'.$distributorID);
            }

            else
            {
                $status = 'Error : ';
                if( $ifParentEligibleBranch == FALSE )
                    $status .= ' + Either Upline No. does not exist or not eligible. ';

                if( $isDistributorIDExists == TRUE )
                    $status .= ' + DistributorIDExists ';
            }

            return $status;
        }

        function getDistributorDetails( $distributorID )
        {
            $status = '';

            $this->load->helper('node');

            $this->load->model('dbcon');

            $client = $this->dbcon->client;

            $isDistributorIDExists = isNodeExists( $distributorID , 'distributor' );

            if( $isDistributorIDExists )
            {
                $queryString =  '
                                    MATCH ( node:distributor{ id:"'.$distributorID.'" } )
                                    RETURN node
                                ';

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

                $result = $query->getResultSet();

                $status = $result;
            }
            else
                $status = 'DistributorIDDoesNotExists';

            return $status;
        }

        function editDistributor
        (
            $distributorID,
            $password,

            $pan,
            $accountNo,
            $bankName,
            $branchName,
            $ifsc,

            $nameFirst,
            $nameLast,
            $dateOfBirth,
            $gender,
            $contactNo,
            $email,

            $addrLine1,
            $addrLine2,
            $cityTownVillage,
            $postOffice,
            $policeStation,
            $district,
            $state,
            $postalZip
        )
        {
            $status = '';

            $this->load->helper('node');

            $this->load->model('dbcon');

            $client = $this->dbcon->client;

            $isDistributorIDExists  = isNodeExists( $distributorID , 'distributor' );

            if( $isDistributorIDExists )
            {
                $queryString =  '
                                    MATCH distributor WHERE distributor.id="'.$distributorID.'"

                                    SET

                                        distributor.password = "'             .$password.'",
                                        distributor.nameFirst = "'            .$nameFirst.'",
                                        distributor.nameLast = "'             .$nameLast.'",

                                        distributor.pan = "'                .$pan.'",
                                        distributor.bankAccount = "'        .$accountNo.'",
                                        distributor.bankName = "'           .$bankName.'",
                                        distributor.branchName = "'         .$branchName.'",

                                        distributor.dateOfBirth = "'          .$dateOfBirth.'",
                                        distributor.gender = "'               .$gender.'",
                                        distributor.contactNo = "'            .$contactNo.'",
                                        distributor.email = "'                .$email.'",

                                        distributor.addrLine1 = "'            .$addrLine1.'",
                                        distributor.addrLine2 = "'            .$addrLine2.'",
                                        distributor.cityTownVillage = "'      .$cityTownVillage.'",
                                        distributor.postOffice = "'           .$postOffice.'",
                                        distributor.policeStation = "'        .$policeStation.'",
                                        distributor.district = "'             .$district.'",
                                        distributor.state = "'                .$state.'",
                                        distributor.postalZip = "'            .$postalZip.'"
                                ';

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

                $result = $query->getResultSet();

                $status = 'success';
            }
            else
                $status = 'DistributorIDDoesNotExists';

            return $status;
        }

        function getNoOfDistributors(){

            $status = '';

            $this->load->model('dbcon');

            $client = $this->dbcon->client;

            $queryString = '
                MATCH ( node:distributor )
                return count( node )
            ';

            $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

            $result = $query->getResultSet();

            foreach ( $result as $row )
                $status = $row;

            return $status;
        }

        function distributorUplineID( $distributorID )
        {
            $uplineID = '';

            $this->load->model('dbcon');

            $client = $this->dbcon->client;

            $queryString = '
                MATCH ( node:distributor ) WHERE node.id = "'. $distributorID .'"
                MATCH ( parent ) WHERE (parent)<-[:JOINED_UNDER]-(node)
                return parent
            ';

            $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

            $result = $query->getResultSet();

            foreach ( $result as $row )
                $uplineID = $row['x']->getProperty('id');

            if ( $uplineID != NULL )
                return $uplineID;

            else
                return 0;
        }

        function distributorDownlineDetails( $distributorID )
        {
            $downline = '';

            $this->load->model('dbcon');

            $client = $this->dbcon->client;

            $queryString = '
                MATCH ( parent:distributor ) WHERE parent.id = "'. $distributorID .'"
                MATCH ( children:distributor ) WHERE (parent)<-[:JOINED_UNDER]-(children)
                return children
            ';

            $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

            $result = $query->getResultSet();

            //foreach ( $result as $row )
                $downline = $result;

            if ($downline != NULL)
                return $downline;

            else
                return 0;
        }

        function viewInbox( $distributorID )
        {
            $client = $this->dbcon->client;

            $queryString = '
                MATCH ( node:inbox ) WHERE node.id = "inbox'. $distributorID .'"
                MATCH ( msg:message ) WHERE (node)-[:HAS_MESSAGE]->(msg)
                return msg
            ';

            $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

            $result = $query->getResultSet();

            return $result;
        }

        function generatePay( $distributorID )
        {
            $this->load->helper('node');

            $client = $this->dbcon->client;

            // Reset daily variables

            $queryString = '
                MATCH (node:company)
                SET node.dailyJoiningIncome = 0
            ';

                //    these codes are from above query about tds and sdc
                //    removed as tds and sdc are not applicable

                //node.dailyTDS = 0 ,
                //node.dailySDC = 0

            $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

            $result = $query->getResultSet();

            dailyPay( $distributorID );

        }


        // Illegal function, should be in Admin model
        function getCompanyDetails()
        {
            $client = $this->dbcon->client;

                $queryString =  '
                                    MATCH ( node:company )
                                    return node
                                ';

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

                $result = $query->getResultSet();

            return $result;
        }

        // populate payment qualified distributors

        function paymentQualifiedDist()
        {
            $client = $this->dbcon->client;

                $queryString =  '
                                    MATCH ( node:distributor )
                                    WHERE ( node.totalIncome - node.recievedIncome ) >= 500
                                    return node
                                ';

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

                $result = $query->getResultSet();

            return $result;
        }

        function payDIstributor( $distributorID , $balance , $payingAmount  )
        {
            // commented as tds and sdc are not applicable

            //$tds = (10.3/100) * $payingAmount;
            //$sdc = (2/100) * $payingAmount;

            if ( $payingAmount >= 500 && $balance >= $payingAmount )
            {
                $client = $this->dbcon->client;

                $queryString =  '
                                    MATCH (com:company)
                                    MATCH ( node:distributor )
                                    WHERE node.id = "'.$distributorID.'"
                                    SET node.recievedIncome = node.recievedIncome + '.$payingAmount.'

                                    return ( node.totalIncome - node.recievedIncome ) as balance
                                ';

                                //    these codes are from above query about tds and sdc
                                //    removed as tds and sdc are not applicable

                                //    SET com.totalTDS = com.totalTDS + '.$tds.'
                                //    SET com.totalSDC = com.totalSDC + '.$sdc.'
                                //
                                //    SET com.dailyTDS = com.dailyTDS + '.$tds.'
                                //    SET com.dailySDC = com.dailySDC + '.$sdc.'

                $query  = new Everyman\Neo4j\Cypher\Query( $client, $queryString );

                $result = $query->getResultSet();

                foreach ( $result as $row )
                    $balance = $row['balance'];
            }

            return $balance;
        }
    }



    // End of file : Distributor.php
    // Location    :
