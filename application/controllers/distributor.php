<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributor extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

        var $base;
        var $css;
        var $js;
        var $img;

        public function Distributor()
        {
            parent::__construct();

            $this->base = $this->config->item('base_url');
            $this->css = $this->config->item('css');
            $this->js = $this->config->item('js');
            $this->img = $this->config->item('img');
        }


        function createDistributorSchemeC( $distributorID )
        {
            // LOAD HELPERS
            $this->load->helper(array('form', 'url', 'node'));

            $data['base']   = $this->base;
            $data['css']    = $this->css;
            $data['js']     = $this->js;
            $data['img']    = $this->img;

                $data['distributorID'] = $distributorID;
                $data['report'] = '';

            $this->load->view('header',$data);
            $this->load->view('distributor/nav',$data);

            if( $this->input->post('create') )
            {
                            //$config['upload_path'] = './uploads/';
                            //$config['allowed_types'] = 'jpg|png';
                            //$config['max_size']	= '1024';
                            //$config['max_width']  = '1024';
                            //$config['max_height']  = '768';

                //$config['file_name'] = $this->input->post('id');

                //$this->load->library('upload');
                //$this->upload->initialize($config);

                    //$this->load->library('upload', $config);

                    //if ( ! $this->upload->do_upload('profileImage'))
            //{
                    //$error = array('error' => $this->upload->display_errors());

                    //$this->load->view('upload_form', $error);
                    //foreach( $error as $x)
                    //echo $x;
            //}
            //else
            //{
                    //$data[$error] = array('upload_data' => $this->upload->data());
                    //$this->load->view('upload_success', $data);
            //}
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

        function editDistributor($distributorID)
        {
		// LOAD HELPERS

        $this->load->helper(array('form', 'url', 'node'));

		$data['base']                   = $this->base ;
        $data['css']                    = $this->css ;
        $data['js']                     = $this->js ;
        $data['img']                    = $this->img ;

		$this->load->view('header',$data);
		$this->load->view('distributor/nav',$data);

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

			if( isset($_POST['dateOfBirth']) ? $_POST['dateOfBirth'] : NULL )
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
		    //redirect($base.'/index.php/admin/edit_distributor_details/');
		    //$this->load->view('distributor/form-edit-details',$data);
                    redirect( '/index.php/distributor/profile/'.$distributorID );
		}
		else
		    $this->load->view('distributor/edit' ,$data);
	    }

	    $this->load->view('footer',$data);
    }

        public function details( $distributorID , $upDownID = '' )
        {

            $this->load->model('distributorx');

            // distributor's own details

            $distributorDetails = $this->distributorx->getDistributorDetails( $distributorID ) ;

            foreach ( $distributorDetails as $row )
            {
                $data['distributorID']       = $row['x']->getProperty('id');

                $data['carryForwardLeft']       = $row['x']->getProperty('carryForwardLeft');
                $data['carryForwardRight']       = $row['x']->getProperty('carryForwardRight');
                $data['carryForwardPair']       = $row['x']->getProperty('carryForwardPair');

                $data['dailyScoredPair']       = $row['x']->getProperty('dailyScoredPair');
                $data['totalScoredPair']       = $row['x']->getProperty('totalScoredPair');

                $data['dailyIncome']       = $row['x']->getProperty('dailyIncome');
                $data['totalIncome']       = $row['x']->getProperty('totalIncome');
                $data['recievedIncome']    = $row['x']->getProperty('recievedIncome');
            }

            // children details

            $childPropValue = array();

            for( $child = 0 ; $child < 2 ; $child++ )
            {
                $childPropValue[$child]['distributorID']     = '';
                $childPropValue[$child]['uplineNo']          = '';

                $childPropValue[$child]['carryForwardLeft']    = 0;
                $childPropValue[$child]['carryForwardRight']   = 0;
                $childPropValue[$child]['dailyScoredPair']     = 0;
                $childPropValue[$child]['totalScoredPair']     = 0;
                $childPropValue[$child]['carryForwardPair'] = 0;
                //$childPropValue[$child]['dailyIncome']        = 0;
                //$childPropValue[$child]['totalIncome']        = 0;

                //$childPropValue[$child]['dateOfJoining']     = '';

                $childPropValue[$child]['nameFirst']         = 'Not available';
                $childPropValue[$child]['nameLast']          = '';
            }

            $data['children'] = $childPropValue;

            $this->load->helper('url');

                //$this->load->model('distributorx');

                if ( $upDownID == '' )
                {
                    $children = $this->distributorx->distributorDownlineDetails( $distributorID );
                    $uplineID = $distributorID;
                    $uplineDetails = $this->distributorx->distributorUplineID( $upDownID );
                }
                else
                {
                    $children = $this->distributorx->distributorDownlineDetails( $upDownID );
                    $uplineID = $upDownID;
                    $uplineDetails = $this->distributorx->distributorUplineID( $upDownID );
                }

                //else
                    //$children = NULL ;

                if( $children )
                {
                    $child = 0 ;

                    foreach ( $children as $row )
                    {
                        $childPropValue[$child]['distributorID']       = $row['x']->getProperty('id');
                        $childPropValue[$child]['uplineNo']            = $row['x']->getProperty('uplineNo');

                        $childPropValue[$child]['carryForwardLeft']    = $row['x']->getProperty('carryForwardLeft');
                        $childPropValue[$child]['carryForwardRight']   = $row['x']->getProperty('carryForwardRight');
                        $childPropValue[$child]['dailyScoredPair']     = $row['x']->getProperty('dailyScoredPair');
                        $childPropValue[$child]['totalScoredPair']     = $row['x']->getProperty('totalScoredPair');
                        $childPropValue[$child]['carryForwardPair']    = $row['x']->getProperty('carryForwardPair');
                        //$childPropValue[$child]['dailyIncome']         = $row['x']->getProperty('dailyIncome');
                        //$childPropValue[$child]['totalIncome']         = $row['x']->getProperty('totalIncome');

                        //$childPropValue[$child]['dateOfJoining']       = $row['x']->getProperty('dateOfJoining');

                        $childPropValue[$child]['nameFirst']           = $row['x']->getProperty('nameFirst');
                        $childPropValue[$child]['nameLast']            = $row['x']->getProperty('nameLast');

                        $child++ ;
                    }
                }

                $data['children'] = $childPropValue;

                //$data['report'] = $status;

                $data['upline'] = $uplineID;

                if ( $uplineDetails == 'bridge' || $uplineDetails == $distributorID )
                    $uplineDetails = "#";

                $data['uplineDetails'] = $uplineDetails;

                $data['distributorID'] = $distributorID;

                $data['base']   = $this->base;
		$data['css']    = $this->css;
		$data['js']     = $this->js;
		$data['img']    = $this->img;

		$this->load->view('header',$data);
		$this->load->view('distributor/nav',$data);
                $this->load->view('distributor/dashboard-business',$data);
                //$this->load->view('report',$data);
                $this->load->view('footer',$data);
        }

        //function details( $distributorID , $funcDownDetails = '' , $downDistID )
        //{

        //}

        function inbox( $distributorID )
        {
            $this->load->model('distributorx');

            $inbox = $this->distributorx->viewInbox( $distributorID );

            $data['distributorID'] = $distributorID;
            $data['base']   = $this->base;
		$data['css']    = $this->css;
		$data['js']     = $this->js;
		$data['img']    = $this->img;

            $data['inbox'] = $inbox;

            $this->load->view('header',$data);
		$this->load->view('distributor/nav',$data);
                $this->load->view('distributor/inbox',$data);
                $this->load->view('footer',$data);
        }

        function profile( $distributorID )
        {
            $this->load->model('distributorx');

            $details = $this->distributorx->getDistributorDetails( $distributorID );

            $data['base']   = $this->base;
            $data['css']    = $this->css;
            $data['js']     = $this->js;
            $data['img']    = $this->img;

            $data['distributorID'] = $distributorID;
            $data['details'] = $details;

            $this->load->view('header',$data);
            $this->load->view('distributor/nav',$data);
            $this->load->view('distributor/profile',$data);
            //$this->load->view('report',$data);
            $this->load->view('footer',$data);
        }

        function signup()
        {
            $this->load->model('distributorx');

            //$details = $this->distributorx->getDistributorDetails( $distributorID );
            $distributorID = generateDistributorIDsForSignup();

            $data['base']   = $this->base;
            $data['css']    = $this->css;
            $data['js']     = $this->js;
            $data['img']    = $this->img;

            $data['distributorID'] = $distributorID;
            $data['details'] = $details;

            $this->load->view('header',$data);
            $this->load->view('distributor/nav',$data);
            $this->load->view('distributor/profile',$data);
            //$this->load->view('report',$data);
            $this->load->view('footer',$data);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
