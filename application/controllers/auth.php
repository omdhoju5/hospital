<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends BaseController {

    public function __construct(){
        parent::__construct(false);
    }

	public function index() {
        redirect('auth/login');
	}

    public function login() {

        if ($this->isActiveSession()) {
            redirect('/');
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return $this->loadView('admin/auth/login');
        }

        try {

            $user = User::find_valid_by_username($this->input->post('username'));

            $user->login(
                $this->input->post('password')
            );

            $this->session->set_userdata(array(
                'user_id' => $user->id,
                'user_name' => $user->username,
            ));

            $this->session->set_flashdata('alert_success', "Welcome back to BG Hospital.");

            redirect('/dashboard');

        } catch (Exception $e) {
            return $this->loadView(
                'admin/auth/login',
                array(
                    'message' => $e->getMessage(),
                )
            );
        }
    }

    public function logout() {

		$this->session->sess_destroy();
		redirect('/');
    }
}