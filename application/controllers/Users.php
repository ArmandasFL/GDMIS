<?php
	class Users extends CI_Controller{
		// Užregistruojam vartotoją
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
				// Encryptinam slaptažodį
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				// Pridedam flash žinutę
				$this->session->set_flashdata('user_registered', 'Jūs užsiregistravote ir dabar galite prisijungti');

				redirect('posts');
			}
		}

		// Vartotojo prisijungimas
		public function login(){
			$data['title'] = 'Prisijungti';

			$this->form_validation->set_rules('username', 'Vartotojo vardas', 'required');
			$this->form_validation->set_rules('password', 'Slaptažodis', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {

				// Gaunam vartotojo vardą
				$username = $this->input->post('username');
				// Gaunam ir Encryptinam slaptažodį
				$password = md5($this->input->post('password'));

				// Prijungiam vartotoją
				$user_id = $this->user_model->login($username, $password);

				// Žiūrim id
				if(!($user_id === false)){
					// Sukuriam sesiją
					$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

					// Pridedam flash žinutę
					$this->session->set_flashdata('user_loggedin', 'Jūs sėkmingai prisijungėte');

					redirect('posts');
				} else {
					// Pridedam flash žinutę
					$this->session->set_flashdata('login_failed', 'Prisijungimas netinkamas');

					redirect('users/login');
				}
			}
		}

		// Atsijungiam
		public function logout(){
			// Atskiriam vartotojo duomenis nuo puslapio
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			// Pridedam flash žinutę
			$this->session->set_flashdata('user_loggedout', 'Jūs atsijungėte');

			redirect('users/login');
		}

		// Žiūrim ar vartotojas egzistuoja
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'Vartotojo vardas yra užimtas. Prašome pasirinkti kitokį');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		// Žiūrim ar emailas egzistuoja
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'Emailas yra užimtas. That email is taken. Prašome pasirinkti kitokį');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
	}
