<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller{
    public function index(){
        // $this->load->model("Product");
        // $products = array("form_data" => $this->Product->get_all_data());
        $this->load->view("index");
    }

	public function login(){
		$this->form_validation->set_rules("email", "email", "required");
		$this->form_validation->set_rules("password", "password", "required");
		
		if($this->form_validation->run() == FALSE){
			$errors = array(
				"login_error_email" => form_error("email"),
				"login_error_password" => form_error("password")
			);

			$this->session->set_userdata($errors);
			redirect(base_url());
		}
		else{
			$email = $this->input->post("email");
			$password = $this->input->post("password");

			$this->load->model("Student");
			$login = $this->Student->login($email, $password);
			if($login == NULL){
				$this->session->set_userdata("login_message", "incorrect email or password");
                redirect(base_url());
			}
			else{
				$user = array(
					"id" => $login["id"],
					"email" => $login["email"],
					"first_name" => $login["first_name"],
					"last_name" => $login["last_name"],
					"is_logged_in" => true
				);
				$this->session->set_userdata($user);
				redirect("students/profile");
			}
		}
	}

	public function register(){
		$this->form_validation->set_rules("first_name", "first name", "trim|required");
		$this->form_validation->set_rules("last_name", "last name", "trim|required");
		$this->form_validation->set_rules("email", "email", "trim|required|valid_email|is_unique[students.email]");
		$this->form_validation->set_rules("password", "password", "required|min_length[8]");
		$this->form_validation->set_rules("confirm_password", "confirm password", "required|matches[password]");
		
		$this->form_validation->set_message("required", "%s can't be empty");
		$this->form_validation->set_message("balid_email", "please enter a valid email");
		$this->form_validation->set_message("is_unique", "this %s is already taken");
		$this->form_validation->set_message("min_length", "password must be at least 8 characters");
		$this->form_validation->set_message("matches", "passwords does not match");

		if($this->form_validation->run() == FALSE){
			$errors = array(
				"register_error_first_name" => form_error("first_name"),
				"register_error_last_name" => form_error("last_name"),
				"register_error_email" => form_error("email"),
				"register_error_password" => form_error("password"),
				"register_error_confirm_password" => form_error("confirm_password")
			);

			$this->session->set_userdata("first_name_value", set_value("first_name"));
			$this->session->set_userdata("last_name_value", set_value("last_name"));
			$this->session->set_userdata("email_value", set_value("email"));

			$this->session->set_userdata($errors);
			redirect(base_url());
		}
		else{
			$this->session->unset_userdata("first_name_value");
			$this->session->unset_userdata("last_name_value");
			$this->session->unset_userdata("email_value");

			$form_data = array(
				"first_name" => $this->input->post("first_name"),
				"last_name" => $this->input->post("last_name"),
				"email" => $this->input->post("email"),
				"password" => md5($this->input->post("password")),
			);

			$this->load->model("Student");
            $register_user = $this->Student->register($form_data);
            if($register_user){
				$this->session->set_userdata("register_message", "Registration successful!");
                redirect(base_url());
            }
		}
	}

    public function profile(){		
		if($this->session->userdata("is_logged_in")){
			$this->load->view("profile");
		}
		else{
			redirect(base_url());
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}