<?php
	class Categories extends CI_Controller{
		public function index(){
			$data['title'] = 'Kategorijos';

			$data['categories'] = $this->category_model->get_categories();

			$this->load->view('templates/header');
			$this->load->view('categories/index', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			// Žiūrim Login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'Sukurti Kategoriją';

			$this->form_validation->set_rules('name', 'Vardo', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('categories/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->category_model->create_category();

				// Pridedam flash žinutę
				$this->session->set_flashdata('category_created', 'Jūsų kategorija buvo sukurta');

				redirect('categories');
			}
		}

		public function posts($id){
			$data['title'] = 'Kategorija: ' . $this->category_model->get_category($id)->NAME;

			$data['posts'] = $this->post_model->get_posts_by_category($id);

			$this->load->view('templates/header');
			$this->load->view('posts/index2', $data);
			$this->load->view('templates/footer');
		}

		public function delete($id){
			// Žiūrim Login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->category_model->delete_category($id);

			// Pridedam flash žinutę
			$this->session->set_flashdata('category_deleted', 'Jūsų kategorija buvo ištrinta');

			redirect('categories');
		}
	}
