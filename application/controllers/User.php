<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __Construct()
	{
		parent::__Construct();
		$this->load->model("user_model");
		$this->load->helper(array('form', 'url'));
		// $this->load->model("upload_model");
	}

	public function index()
	{	
		$this->data['error_message'] = "";
		if(isset($_POST['login']))
		{	
			$session = $this->session->userdata('isLogin');
			// print_r($_POST);die();
			$username = $this->input->post("username");
			$password = sha1($this->input->post("password"));
			 
			// echo $username;
			// echo $password;die;
			$login_condition = array("user_name"=>$username, "user_password"=>$password, "status"=>'active');
			$user_data = $this->user_model->userLogin($login_condition);
			
			if($user_data !== FALSE)
			{
				// echo "sd";die;
				$user_id = $user_data['user_id'];
				$user_type = $this->user_model->get_user_type($user_id);
				$type = $user_type[0]['user_type'];
				// echo $username;die;
				// echo "logged_in" . $user_id;$user_ty;die;
				// die();
				
				$this->session->set_userdata("user_id", $user_id);			
				$ty = $this->session->set_userdata("user_type", $type);
				$this->session->set_userdata("user_name", $username);

				$this->session->set_userdata("username", $user_data['user_name']);
				if ($type == 'User'){
					$this->session->set_flashdata('login_success', 'Login Successful. Welcome <b>'.$username.'</b> ');
					redirect('pages/home', $this->data);
				}elseif ($type == 'District Admin'){
					$this->session->set_flashdata('login_success', 'Login Successful. Welcome <b>'.$username.'</b> ');
					redirect('pages/home', $this->data);
				}elseif ($type == 'Admin'){
					$this->session->set_flashdata('login_success', 'Login Successful. Welcome <b>'.$username.'</b> ');
					redirect('pages/home', $this->data);
				}elseif ($type == 'SuperAdmin'){
					$this->session->set_flashdata('login_success', 'Login Successful. Welcome <b>'.$username.'</b> ');
					redirect('pages/home', $this->data);
				}
			}else{
				// echo "login error dd";die;
				$this->session->set_flashdata('login_error', '<b>Login Error!! </b>Username/Password not matched.');
				redirect(base_url(), $this->data);
			}
		}		
		// $this->load->view("pages/home", $this->data);
	}

	public function info()
	{
		$this->load->model('user_model');
		$data['list_user'] = $this->user_model->check_user();

		$data['title'] = "User Mgmt";
		$this->load->view('includes/header');
		$this->load->view('user/info', $data);
		$this->load->view('includes/footer');
	}

	public function logout()
	{
		$this->session->unset_userdata("username");
		$this->session->unset_userdata("status");
		$this->session->sess_destroy();
		
		$this->session->set_flashdata('logout', '<b>You have Logged Out Successfully !!');
		redirect("pages/home");
	}

	public function adduser()
	{
		$data['title'] = "Add New User";
		$data['get_dis'] = $this->page_model->fetch_district();
		$data['get_local'] = $this->page_model->get_local_level();
		// $data['all_email'] = $this->user_model->get_all_email();
		
		$this->load->view('includes/header');
		$this->load->view('user/adduser', $data);
		$this->load->view('includes/footer');
	}

	public function change_password(){
		$user_id=$this->session->userdata('user_id');
		$data['change'] = $this->user_model->get_user($user_id);
		$this->load->view('front_templates/header');
		$this->load->view('user/change_password', $data);
		$this->load->view('front_templates/footer');
	}

	public function forgot_password(){
		$user_id=$this->session->userdata('user_id');
		
		$this->load->view('front_templates/header_home');
		$this->load->view('user/forgot_password');
		$this->load->view('front_templates/footer');
	}

	public function insertuser()
	{	
		$data['title'] = "Insert User";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user_login.email]');;
		
		if ($this->form_validation->run() == FALSE){
			$data['title'] = "Add New User";
			$this->session->set_flashdata('dupli', '<b>Please Try Again. This Email already Exists .');
            redirect("user/adduser");
        }else{
			if(isset($_POST['user_add'])){
			
			$firstname =$this->input->post('firstname');
			$lastname =$this->input->post('lastname');
			$username =$this->input->post('username');
			$password =$this->input->post('password');
			$district =$this->input->post('district');
			$local_level =$this->input->post('local_level');
			$ward =$this->input->post('ward_no');
			$user_type =$this->input->post('user_type');
			$email =$this->input->post('email');
			$status =$this->input->post('status');

			$log_data = array(
					'firstname'=>$firstname,
					'lastname'=>$lastname,
			        'user_name'=>$username,
			        'user_password' => sha1($password),
			        'email' => $email,
			        'district' => $district,
			        'local_level' => $local_level,
			        'ward_no' => $ward,
			        'user_type' => $user_type,
			        'status' =>$status
			    );
			
			$d = $this->user_model->insertUser($log_data);
			if ($d == true){
				$this->session->set_flashdata('post_updated', '<b> New User Successfully Added');
				redirect("user/info");
			}else{
				$this->session->set_flashdata('error', '<b>User Can Not Be Added.');
				redirect("user/info");
			}
			
		}
            }
		
	}

	public function edituser($id){
		$data['title'] = "Edit User";
		$data['get_dis'] = $this->page_model->fetch_district();
		$data['get_local'] = $this->page_model->get_local_level();
		$data['get_user'] = $this->user_model->get_user($id);
		$this->load->view('includes/header');
		$this->load->view('user/edituser', $data);
		$this->load->view('includes/footer');

		$tablename = 'user_login';
		// print_r($_POST);die();
		if(isset($_POST['user_edit'])){
			// echo "hello";
			$id = $this->input->post('user_id');
			$firstname =$this->input->post('firstname');
			$lastname =$this->input->post('lastname');
			$username =$this->input->post('username');
			$password =$this->input->post('password');
			$district =$this->input->post('district');
			$local_level =$this->input->post('local_level');
			$ward =$this->input->post('ward_no');
			$user_type =$this->input->post('user_type');
			$email = $this->input->post('email');
			$status =$this->input->post('status');
			
			$log_data = array(
					'firstname'=>$firstname,
					'lastname'=>$lastname,
			        'user_name'=>$username,
			        'user_password' => sha1($password),
			        'email' => $email,
			        'district' => $district,
			        'local_level' => $local_level,
			        'ward_no' => $ward,
			        'user_type' => $user_type,
			        'status' =>$status
			    );
			
			$d = $this->user_model->update_user($tablename, $log_data, $id);
			// print_r($d);
			redirect("user/info");
		}
		
	}
	
	public function deleteuser()
	{
		$str = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$id = explode("/", $str, 5);
		// echo $id[4];die();
		// echo "delete user";	
		$this->db->where("user_id",$id[4]);
    	$this->db->delete('user_login');
    	// return $this->db->affected_rows();
    	redirect("user/info");
	}

	public function change_pass(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->library('email');
		$user_id=$this->session->userdata('user_id');
		$info = $this->user_model->get_user($user_id);
		$old = $info[0]['user_password'];
		$email = $info[0]['email'];
		// echo $old;die;
		// print_r($info);die;

		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('old_pass', 'Old Password', 'required'); 
        $this->form_validation->set_rules('new_pass', 'New Password', 'required|min_length[6]|max_length[20]'); 
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[new_pass]|min_length[6]|max_length[20]'); 
		
		if ($this->form_validation->run() == FALSE) { 
			
			$data['change'] = $this->user_model->get_user($user_id);
			$this->load->view('front_templates/header');
         	$this->load->view('user/change_password', $data); 
         	$this->load->view('front_templates/footer');
         } else { 
         	// echo '<pre>';
         	// print_r($_POST);die;
         	$old_pass =$this->input->post('old_pass');
			$username =$this->input->post('username');
			$confirm =$this->input->post('confirm');
			
			if (sha1($old_pass) == $old){
				$edit_data = array(
					'user_name'=>$username,
					'user_password'=>sha1($confirm),
			    );
				$d = $this->user_model->update_user('user_login', $edit_data, $user_id);

				if($d == true){
					// send account password in email
						$config = Array(
      						'protocol' => 'smtp',
      						'smtp_host' => 'ssl://smtp.googlemail.com',
      						'smtp_port' => 465,
      						'smtp_user' => 'abc@gmail.com', 
      						'smtp_pass' => 'passwrd', 
      						'mailtype' => 'html',
      						'charset' => 'iso-8859-1',
      						'wordwrap' => TRUE
    						);
						 $this->load->library('email', $config);

							// mail code new
						 	$msg = 'Dear '.$user_name.', You have successfully changed your password. 
						 	Your Username is '.$username.'
						 	Your Password is '.$confirm.'';

							$this->email->from('noreply@vdcprofile.com', 'Vdcprofile Admin');
							$this->email->to($email);
							$this->email->cc('');
							$this->email->bcc('');
							$this->email->subject('Account Password Sent');
							$this->email->message($msg);
							$this->email->send();

					$this->session->set_flashdata('changed', '<b>Password Changed Successfully !!');
					redirect("user/change_password");
				}else{
					$this->session->set_flashdata('nt_changed', '<b>Error in changing Password');
					redirect("user/change_password");
				}
				
			}else{
				// die;
				$this->session->set_flashdata('nt_changed', '<b>Old Password is Incorrect. Try Again'); 
				redirect("user/change_password");
			}
         }
	}


	public function renue_password(){
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->library('email');
		// echo $old;die;
		// print_r($info);die;

		$this->form_validation->set_rules('email', 'Email', 'required');
		
		if ($this->form_validation->run() == FALSE) { 
			
			$this->load->view('front_templates/header_home');
         	$this->load->view('user/forgot_password'); 
         	$this->load->view('front_templates/footer');
         } else { 

			if ($this->input->post('renue_pass')){
				$email =$this->input->post('email');
				$que= $this->db->query("SELECT user_password,user_name,email from user_login where email='$email'");
						$row=$que->row();
						$user_name=$row->user_name;
						$user_email=$row->email;

						if((!strcmp($email, $user_email))){
						$pass=$row->user_password;
							/*Mail Code*/
						$config = Array(
      						'protocol' => 'smtp',
      						'smtp_host' => 'ssl://smtp.googlemail.com',
      						'smtp_port' => 465,
      						'smtp_user' => 'abc@gmail.com', 
      						'smtp_pass' => 'passwrd', 
      						'mailtype' => 'html',
      						'charset' => 'iso-8859-1',
      						'wordwrap' => TRUE
    						);
						 $this->load->library('email', $config);

						 // random password
						 function random_password() {
    							$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    							$password = array(); 
    							$alpha_length = strlen($alphabet) - 1; 
    							for ($i = 0; $i < 8; $i++) {
    							    $n = rand(0, $alpha_length);
    							    $password[] = $alphabet[$n];
    							}
    							return implode($password); 
							}
							$rnd_pass = random_password();

							// mail code new
						 	$msg = 'Dear '.$user_name.', This is your new Password. Please change your Account Password after login. 
						 	Your Username is '.$user_name.'
						 	Your Password is '.$rnd_pass.'';

							$this->email->from('noreply@vdcprofile.com', 'Vdcprofile Admin');
							$this->email->to($user_email);
							$this->email->cc('');
							$this->email->bcc('');
							$this->email->subject('Account Password Sent');
							$this->email->message($msg);

							$edit_data = array(
								'user_password'=>sha1($rnd_pass),
			    			);
							$renew = $this->user_model->update_user_by_email('user_login', $edit_data, $user_email);

							if ($renew == true){
								if($this->email->send() == true){
								$this->session->set_flashdata("email_sent","Email has been sent to $user_email . If an account exists with the email you entered. You should receive them shortly.

									If you don't receive an email, please make sure you've entered the address you registered with, and check your spam folder."); 
								redirect("user/forgot_password"); 
							}else{
								$this->session->set_flashdata("nt_changed","Error in sending Email."); 
         						$this->load->view('user/forgot_password'); 
							}
						}else{
							$this->session->set_flashdata("nt_changed","Error in Editing Password."); 
         					$this->load->view('user/forgot_password'); 
						}

							}else{
								$this->session->set_flashdata('nt_changed', '<b>Sorry !! Email not found.');
								redirect("user/forgot_password");
							}
				
			}else{
				// die;
				$this->session->set_flashdata('nt_changed', '<b>Try Again'); 
				redirect("user/forgot_password");
			}
         }
	} // ends function
}





