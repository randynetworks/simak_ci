<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();

	}

	public function index()
	{
		if ($this->session->userdata('nomor_induk')) {
			redirect('dashboard');
		}

		// role
		$this->form_validation->set_rules('nomor_induk', 'Nomor Induk', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		// validasi
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Halaman Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			// validasi success login
			$this->_login();
		}
	}

	public function _login()
	{

		$nomor_induk = $this->input->post('nomor_induk');
		$password    = $this->input->post('password');
		$user        = $this->db->get_where('user', ['nomor_induk' => $nomor_induk])->row_array();

		// avaible user
		if ($user) {
			//if active user
			if ((int)$user['is_active'] === 1) {

				// check pass
				if (password_verify($password, $user['password'])) {

					$data = [
						'nomor_induk' => $user['nomor_induk'],
						'role_id' => $user['role_id']
					];

					$this->session->set_userdata($data);

					redirect('dashboard');
				} else {
					$this->session->set_flashdata(
						'message',
						'<div class="alert alert-danger" role="alert">
                        Password Salah.
                    </div>'
					);
				}
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger" role="alert">
                        Akun Belum Aktif.
                    </div>'
				);
				redirect('auth');
			}
		}
	}

	public function registration()
	{
		if ($this->session->userdata('nomor_induk')) {
			redirect('dashboard');
		}
		// role
		// roll fullname | gk boleh kosong
		$this->form_validation->set_rules('name', 'Name', 'required|trim');

		// role email
		$this->form_validation->set_rules('nomor_induk', 'nomor_induk', 'required|trim|is_unique[user.nomor_induk]', [
			'is_unique' => 'Nomor Induk Telah Digunakan'
		]);

		// role pass1
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password tidak sama',
			'min_length' => 'Password terlalu Pendek'
		]);

		// role pass2
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password2]');

		if ($this->form_validation->run() === false) {

			$data['title'] = 'Halaman Registrasi';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {

			$data = [

				'name'          => htmlspecialchars($this->input->post('name', true)),
				'nomor_induk'   => htmlspecialchars($this->input->post('nomor_induk', true)),
				'image'         => 'default.png',
				'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id'       => 1,
				'is_active'     => 0,
				'date_created'  => time()

			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-success" role="alert">
                Akun Telah dibuat, Namun belum aktif.<br>Silahkan Hubungi Sistem Informasi
            </div>'
			);
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('nomor_induk');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata(
			'message',
			'<div class="alert alert-success" role="alert">
            Telah Logout!
        </div>'
		);
		redirect('auth');
	}
}
