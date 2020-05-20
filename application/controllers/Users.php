<?php
	class Users extends CI_Controller{
		// Register user
		public function register(){
			$data['title'] = 'Užsiregistruoti';

			$this->form_validation->set_rules('name', 'Vardas', 'required');
			$this->form_validation->set_rules('username', 'Vartotojo vardas', 'required|callback_check_username_exists');
			$this->form_validation->set_rules('email', 'Emailas', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Slaptažodis', 'required');
			$this->form_validation->set_rules('password2', 'Patvirtinti Slaptažodį', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				// Set message
				$this->session->set_flashdata('user_registered', 'Jūs užsiregistravote ir dabar galite prisijungti');

				redirect('posts');
			}
		}

		// Log in user
		public function login(){
			$data['title'] = 'Prisijungti';

			$this->form_validation->set_rules('username', 'Vartotojo vardas', 'required');
			$this->form_validation->set_rules('password', 'Slaptažodis', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {

				// Get username
				$username = $this->input->post('username');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));

				// Login user
				$user_id = $this->user_model->login($username, $password);

				// id check
				if(!($user_id === false)){
					// Create session
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					// Set message
					$this->session->set_flashdata('user_loggedin', 'Jūs sėkmingai prisijungėte');

					redirect('posts');
				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Prisijungimas netinkamas');

					redirect('users/login');
				}
			}
		}

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// Set message
			$this->session->set_flashdata('user_loggedout', 'Jūs atsijungėte');

			redirect('users/login');
		}

		// Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'Vartotojo vardas yra užimtas. Prašome pasirinkti kitokį');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'Emailas yra užimtas. That email is taken. Prašome pasirinkti kitokį');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	}
