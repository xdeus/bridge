<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	function Welcome()
	{
		parent::__construct();

		$this->base = $this->config->item('base_url');
		$this->css = $this->config->item('css');
		$this->js = $this->config->item('js');
		$this->img = $this->config->item('img');

	}

	public function index()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['img'] = $this->img;

		$this->load->view( 'home' , $data );
		$this->load->view( 'footer' , $data );
	}

	public function about()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['img'] = $this->img;

		$this->load->view('header' , $data);
		$this->load->view('about' , $data);
		$this->load->view('footer' , $data);
	}

	public function products()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['img'] = $this->img;

		$this->load->view('products',$data);
	}

	public function concept_scheme_b()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['img'] = $this->img;

		$this->load->view('header', $data);
		$this->load->view('concept-scheme-b', $data);
		$this->load->view('footer', $data);
	}

	public function concept()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['img'] = $this->img;

		$this->load->view('header', $data);
		$this->load->view('concept', $data);
		$this->load->view('footer', $data);
	}

	public function contact()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['img'] = $this->img;

		$this->load->view('header' , $data);
		$this->load->view('contact' , $data);
		$this->load->view('footer' , $data);
	}

	public function product_c()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['img'] = $this->img;

		$this->load->view('header' , $data);
		$this->load->view('product-c',$data);
		$this->load->view('footer' , $data);
	}

	public function signin()
	{
		// LOAD LIBRARIES
		//$this->load->library(array('encrypt', 'form_validation', 'session'));

		// LOAD HELPERS
		$this->load->helper(array('form', 'url', 'node'));

		if( $this->input->post('signin') )
		{
			$distributorID = $this->input->post('distributorID');
			$password = $this->input->post('password');

			if ( isNodeCredentialsMatch( $distributorID , $password , 'company' ) )
			{
				redirect('index.php/admin/dashboard/');
			}
			else if ( isNodeCredentialsMatch( $distributorID , $password , 'distributor' ) )
			{
				redirect('index.php/distributor/details/'.$distributorID);
			}
			else if ( isNodeCredentialsMatch( $distributorID , $password , 'unusedID' ) )
			{
				redirect('index.php/distributor/createDistributorSchemeC/'.$distributorID);
			}
			else
			{
				echo '<br><br> Incorrect User ID or Password !! <br><br>';
			}
		}

		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['js'] = $this->js;
		$data['img'] = $this->img;

		$this->load->view('header' , $data);
		$this->load->view('signin' , $data);
		$this->load->view('footer' , $data);
	}

	public function signup()
	{
		$this->load->helper(array('form', 'url', 'node'));
		$distributorID = generateDistributorIDsForSignup();
		redirect('index.php/distributor/createDistributorSchemeC/'.$distributorID);

	}
}
/* test */
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
