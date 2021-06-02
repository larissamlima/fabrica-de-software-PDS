<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

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
	 *  https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
		$this->load->helper('url');
	}

	public function index()
	{
		$users = new LoginModel;
		$this->load->view('LoginView.html');
	}

	public function login()
	{
		$this->load->view('LoginView.html');
	}

	public function cadastrar()
	{
		$this->load->view('CadastroView.html');
	}

	public function inserirCadastro()
	{
		$cadastro = new LoginModel;
		$data = array(
			'nome' => $this->input->post('nome'),
			'sobrenome' => $this->input->post('sobrenome'),
			'email' => $this->input->post('email'),
			'senha' => $this->input->post('senha')
		);
		$cadastro->registrar($data);
		redirect(base_url('index.php/LoginController/login'));
	}
}
