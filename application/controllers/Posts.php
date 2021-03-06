<?php
	class Posts extends CI_Controller{
		public function index($offset = 0){
			// Eilė puslapių skaičių, konfiguracija (Kad galėtume padaryti ant vieno puslapio knygą)
			$config['base_url'] = base_url() . 'posts/index/';
			$config['total_rows'] = $this->db->count_all('posts');
			$config['total_columns'] = $this->db->count_all('posts');
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link');

			// Init puslapių skaičius ant vieno controllerio
			$this->pagination->initialize($config);

			$data['title'] = 'Naujausi Postai';

			$data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['post'] = $this->post_model->get_posts($slug);
			$post_id = $data['post']['id'];
			$data['comments'] = $this->comment_model->get_comments($post_id);

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			// Žiūrim Login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'Sukurti Postą';

			$data['categories'] = $this->post_model->get_categories();

			$this->form_validation->set_rules('title', 'Pavadinimo', 'required');
			$this->form_validation->set_rules('body', 'Apibūdinimo', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			} else {
				// Įkeliam nuotrauką
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'nėra_nuotraukos.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->post_model->create_post($post_image);

				// Pridedam flash žinutę
				$this->session->set_flashdata('post_created', 'Jūsų postas buvo sukurtas');

				redirect('posts');
			}
		}

		public function delete($id){
			// Žiūrim Login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->post_model->delete_post($id);

			// Pridedam flash žinutę
			$this->session->set_flashdata('post_deleted', 'Jūsų postas buvo ištrintas');

			redirect('posts');
		}

		public function edit($slug){
			// Žiūrim Login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['post'] = $this->post_model->get_posts($slug);

			// Žiūrim Vartotoją
			if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
				redirect('posts');

			}

			$data['categories'] = $this->post_model->get_categories();

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = 'Redaguoti Postą';

			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
			// Žiūrim Login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->post_model->update_post();

			// Pridedam flash žinutę
			$this->session->set_flashdata('post_updated', 'Jūsų postas buvo atnaujintas');

			redirect('posts');
		}
	}
