<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    var $base;
    var $css;
    var $js;
    var $img;

    function Admin()
    {
        parent::__construct();
        
		$this->base = $this->config->item('base_url');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		$this->img = $this->config->item('img');
    }

    function index()
    {
	$this->dashboard();
    }
    
    function dashboard( $report = '' )
    {
	$this->load->helper(array('form', 'url', 'node'));

	// retrieve company details
	
	$this->load->model('distributorx');
	
	$companyDetails = $this->distributorx->getCompanyDetails();
	
	foreach ( $companyDetails as $row )
            {                    
                $data['dailyJoiningIncome']       = $row['x']->getProperty('dailyJoiningIncome');
                $data['dailyTDS']       	  = $row['x']->getProperty('dailyTDS');
		$data['dailySDC']       	= $row['x']->getProperty('dailySDC');
		
                $data['totalJoiningIncome']       = $row['x']->getProperty('totalJoiningIncome');
                $data['totalTDS']       	= $row['x']->getProperty('totalTDS');
                $data['totalSDC']       	= $row['x']->getProperty('totalSDC');
            }
	
	
	// retrieve no of distributors
	
	$this->load->model('distributorx');

	$noOfDistributors = $this->distributorx->getNoOfDistributors();
	
	foreach ( $noOfDistributors as $value )
	    $data['noOfDistributors'] = $value;

	$data['qualiDist'] = $this->distributorx->paymentQualifiedDist();
	    
	$data['base']   = $this->base ;
	$data['css']    = $this->css ;
	$data['js']     = $this->js ;
	$data['img']    = $this->img ;
	$data['report'] = $report;

	$this->load->view('header',$data);
	$this->load->view('admin/nav',$data);

	$this->load->view('admin/dashboard',$data);
	$this->load->view('report',$data);
	$this->load->view('footer',$data);
    }
    
    function change_password()
    {
        // LOAD HELPERS

        $this->load->helper(array('form', 'url', 'node'));

	$data['base']                   = $this->base ;
        $data['css']                    = $this->css ;
        $data['js']                     = $this->js ;
        $data['img']                    = $this->img ;
	$data['report']			= '';
	
	$this->load->view('header',$data);
	$this->load->view('admin/nav',$data);
	
        if( $this->input->post('update') )
        {
	    $currentPassword = $this->input->post('currentPassword');
	    
	    $newPassword = $this->input->post('newPassword');
	    
	    $this->load->model('adminx');
	    
	    $data['report'] = $this->adminx->changePassword( $currentPassword, $newPassword );
	    
	    $this->load->view('report',$data);
            $this->load->view('admin/change-password',$data);
            
        }
        else
        {

	    $this->load->view('report',$data);
            $this->load->view('admin/change-password',$data);
	    
	}
	
	$this->load->view('footer',$data);
    }

    function create_distributor()
    {
	// LOAD HELPERS
        $this->load->helper(array('form', 'url', 'node'));
	
		$data['base']   = $this->base;
		$data['css']    = $this->css;
		$data['js']     = $this->js;
		$data['img']    = $this->img;

		$this->load->view('header',$data);
		$this->load->view('admin/nav',$data);

		    if( $this->input->post('create') )
		    {
			//$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '1024';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
		
			//$config['file_name'] = $this->input->post('id');
			
			//$this->load->library('upload');
			//$this->upload->initialize($config);
		    
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('profileImage'))
			{
				$error = array('error' => $this->upload->display_errors());
	
				//$this->load->view('upload_form', $error);
				//foreach( $error as $x)
				//echo $x;
			}
			else
			{
				//$data[$error] = array('upload_data' => $this->upload->data());
				//$this->load->view('upload_success', $data);
			}
			//$this->input->post('profileImage') = '';

			$this->load->model('distributorx');

			$data['report'] =  $this->distributorx->createDistributor(
								$this->input->post('id'),
								$this->input->post('password'),
								$this->input->post('uplineNo'),
								$this->input->post('dateOfJoining'),
								
								$this->input->post('pan'),
								$this->input->post('accountNo'),
								$this->input->post('bankName'),
								$this->input->post('branchName'),
								$this->input->post('ifsc'),
								
								$this->input->post('nameFirst'),
								$this->input->post('nameLast'),
								$this->input->post('dateOfBirth'),
								$this->input->post('gender'),
								$this->input->post('contactNo'),
								$this->input->post('email'),
								'',

								$this->input->post('addressLine1'),
								$this->input->post('addressLine2'),
								$this->input->post('cityTownVillage'),
								$this->input->post('postOffice'),
								$this->input->post('policeStation'),
								$this->input->post('district'),
								$this->input->post('state'),
								$this->input->post('zip')
							      );
			
			//$this->load->view('report',$data);
			
			//echo $data['report'];
		}
        
		$this->load->view('distributor/create',$data);
		$this->load->view('report',$data);
		$this->load->view('footer',$data);
    }

    function view_distributor_details()
    {
        // LOAD HELPERS
	
        $this->load->helper(array('form', 'url', 'node'));

	$data['base']                   = $this->base ;
        $data['css']                    = $this->css ;
        $data['js']                     = $this->js ;
        $data['img']                    = $this->img ;
	
	$this->load->view('header',$data);
	$this->load->view('admin/nav',$data);
	
        if( $this->input->post('view') )
        {
            $this->load->model('distributorx');

	    $distributorID = $this->input->post('id');
	    
            if ( $this->distributorx->getDistributorDetails( $distributorID ) != 'DistributorIDDoesNotExists')
            {
		$details = $this->distributorx->getDistributorDetails( $distributorID );
		
		$data['distributorID'] = $distributorID;
		$data['details'] = $details;
		
		$this->load->view('distributor/profile',$data);
            }
        }
        else
        {
            $data['base']   = $this->base ;
            $data['css']    = $this->css ;
            $data['js']     = $this->js ;
            $data['img']    = $this->img ;

            $this->load->view('distributor/form-view-details',$data);
	}
	
	$this->load->view('footer',$data);
    }
    
    function edit_distributor_details()
    {
        // LOAD HELPERS
	
        $this->load->helper(array('form', 'url', 'node'));

	$data['base']                   = $this->base ;
        $data['css']                    = $this->css ;
        $data['js']                     = $this->js ;
        $data['img']                    = $this->img ;
	
	
	
        if( $this->input->post('edit') )
        {
	    $distributorID = $this->input->post('id');
	    
	    redirect($base.'/index.php/admin/editDistributor/'.$distributorID);
        }
        else
        {
            $data['base']   = $this->base ;
            $data['css']    = $this->css ;
            $data['js']     = $this->js ;
            $data['img']    = $this->img ;

	    $this->load->view('header',$data);
	    $this->load->view('admin/nav',$data);
            $this->load->view('distributor/form-edit-details',$data);
	    $this->load->view('footer',$data);
	}
	
	
    }
    
    function editDistributor($distributorID)
    {
	// LOAD HELPERS
	
        $this->load->helper(array('form', 'url', 'node'));

	$data['base']                   = $this->base ;
        $data['css']                    = $this->css ;
        $data['js']                     = $this->js ;
        $data['img']                    = $this->img ;
	
	$this->load->view('header',$data);
	$this->load->view('admin/nav',$data);
	
	$this->load->model('distributorx');

	    $data['distributorID'] = $distributorID;
	    $data['details'] = $this->distributorx->getDistributorDetails( $distributorID );
	    
	    foreach( $data['details'] as $row )
                $dateOfBirth 		= $row['x']->getProperty('dateOfBirth');
	    
            if ( $this->distributorx->getDistributorDetails( $distributorID ) != 'DistributorIDDoesNotExists')
            {
	
		if( $this->input->post('save') )
		{
		    $distributorID	= $this->input->post('id');
		    $password 		= $this->input->post('password');

		    $pan		= $this->input->post('pan');
		    $bankName		= $this->input->post('bankName');
		    $branchName		= $this->input->post('branchName');
		    $accountNo		= $this->input->post('accountNo');
		    $ifsc		= $this->input->post('ifsc');
	    
		    $nameFirst		= $this->input->post('nameFirst');
		    $nameLast		= $this->input->post('nameLast');
		    
		    if( isset($_POST['something']) ? $_POST['something'] : NULL )
                        $dateOfBirth	= $this->input->post('dateOfBirth');
		    
		    $gender		= $this->input->post('gender');
		    $contactNo		= $this->input->post('contactNo');
		    $email		= $this->input->post('email');
	    
		    $addrLine1		= $this->input->post('addrLine1');
		    $addrLine2		= $this->input->post('addrLine2');
		    $cityTownVillage	= $this->input->post('cityTownVillage');
		    $postOffice		= $this->input->post('postOffice');
		    $policeStation	= $this->input->post('policeStation');
		    $district		= $this->input->post('district');
		    $state		= $this->input->post('state');
		    $postalZip		= $this->input->post('zip');
		    
		    $status = $this->distributorx->editDistributor( $distributorID,
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
								    );
		    //$this->load->view('distributor/edit',$data);
		    redirect($base.'/index.php/admin/edit_distributor_details/');		    
		    //$this->load->view('distributor/form-edit-details',$data);
		}
		else
		    $this->load->view('distributor/edit',$data);
	    }
	    
	    $this->load->view('footer',$data);
    }

    function send_distributor_ids()
    {
	// LOAD HELPERS
        $this->load->helper(array('form', 'url', 'node'));
	
	$data['base']   = $this->base ;
	$data['css']    = $this->css ;
	$data['js']     = $this->js ;
	$data['img']    = $this->img ;
	
	$this->load->view('header',$data);
	$this->load->view('admin/nav',$data);
	
	$data['report'] = '';
	    
	if( $this->input->post('send') )
	{
	    $distributorID = $this->input->post('distributorID');
	    $numberOfIDs = $this->input->post('numberOfIDs');

	    $data['report'] = generateDistributorIDs( $distributorID , $numberOfIDs );

	    //$this->load->view('report',$data);
	}

	$this->load->view('admin/send_distributor_ids',$data);
	$this->load->view('report',$data);
	$this->load->view('footer',$data);
    }
    
    function generatePay()
    {
	$this->load->helper('url');
	
	$data['report'] = '';
	
	$this->load->model('distributorx');
	
	$data['report'] = $this->distributorx->generatePay( 'BD2001' );
	
	if ( $data['report'] == '' )
	    $data['report'] = 'Error : Payments are not generated.';
	
	$data['report'] = 'Payment-reports-are-generated-successfully';
	
	redirect('index.php/admin/dashboard/'.$data['report']);
    }
    
    //function listPaymentQualifiedDist()
    //{
	//$data['base']   = $this->base ;
	//$data['css']    = $this->css ;
	//$data['js']     = $this->js ;
	//$data['img']    = $this->img ;
	//
	//$this->load->view('header',$data);
	//$this->load->view('admin/nav',$data);
	
	//$this->load->model('distributorx');
	
	//$qualiDist = array();
	
	//$qualiDist = 0;
	
	//for ( $i = 0 ; $i < 2 ; $i++ )
	//{
	//    $qualiDist[$i]['id'] = 'ID' ;
	//    $qualiDist[$i]['name'] = 'NAME' ;
	//    $qualiDist[$i]['totalIcome'] = 'TOTAL INCOME' ;
	//    $qualiDist[$i]['recievedIncome'] = 'RECIEVED INCOME' ;
	//}
	//$qualiDist =0;
	
	//$data['qualiDist'] = $this->distributorx->paymentqualifiedDist();
	
	//$data['qualiDist'] = $qualiDist ;
	
	//$this->load->view('admin/dashboard',$data);
	//$this->load->view('report',$data);
	//$this->load->view('footer',$data);
	
	
	
    //}

    function pay( $distributorID , $balance , $payingAmount )
    {
		$this->load->model('distributorx');
		echo $this->distributorx->payDistributor( $distributorID , $balance , $payingAmount );
    }
    
}

