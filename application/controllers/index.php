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
	
	function Welcome()
	{
		parent::Controller();
		
		$this->base = $this->config->item('base_url');
		$this->css = $this->config->item('css'); 
	}
	
	
	
	public function index()
	{
		//$this->load->view('welcome_message');
		//$this->load->model('Database');
		//$this->Database->printServerInfo();

		//$this->load->model('Admin');
		//$this->load->test();
		
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		
		$this->load->view( 'about' , $data );
		
	}
	
	public function about()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		
		$this->load->view('about' , $data);
	}
	
	public function products()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
	
		$this->load->view('products',$data);
	}
	
	public function career()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		
		$this->load->view('career', $data);
	}
	
	public function contact()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		
		$this->load->view('contact',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */