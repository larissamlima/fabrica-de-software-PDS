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
		$this->load->helper(array('url', 'html', 'form'));
		$this->load->library('session');
		$this->load->database();
		// $this->form_validation->set_rules('uname', 'Username', 'required');
		// $this->form_validation->set_rules('psw', 'Password', 'required');
	}

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$this->load->view('LoginView.html');
	}

	public function cadastrar()
	{
		$this->load->view('CadastroView.html');
	}

	public function entrar()
	{
	}

	public function inserirCadastro()
	{
		$login = new LoginModel;
		$data = array(
			'nome' => $this->input->post('nome'),
			'sobrenome' => $this->input->post('sobrenome'),
			'email' => $this->input->post('email'),
			'senha' => $this->input->post('senha')
		);
		$login->registrar($data);
		redirect(base_url('index.php/LoginController/login'));
	}

	public function auth()
	{
		$login = new LoginModel;
		$data = array(
			'email' => $this->input->post('email'),
			'senha' => $this->input->post('senha')
		);
		$user = $login->obterUsuario($data['email']);
		echo ($user[0]['email']);
		echo ($user[0]['senha']);
		$var = (strcmp($user[0]['email'], $data['email']));
		echo "$var";
		echo ($data['email']);
		echo ($data['senha']);
		if (strcmp($user[0]['email'], $data['email']) && strcmp($user[0]['senha'], $data['senha'])) {
			redirect(base_url('index.php/HomeController/index'));
		} else {
			// redirect(base_url('index.php/LoginController/login'));
		}
	}
}
