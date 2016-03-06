<?php

class Maine extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('form');
		$this->load->model('Maine_model','mm');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper(array('form','url'));
		$this->load->helper('html');
		$this->load->library('pagination');
		$this->load->helper('security');
		$this->load->helper('date');
		$this->load->library('javascript');
		$this->load->library('encrypt');
	}
	public function index()
	{
		
		if($this->session->has_userdata("username"))
		{
			redirect("Maine/home");
		}
		else{
			$this->load->view('diginspect/index');
		}
	}
	
	public function sortbydate()
	{
		$date=$this->input->post("_date");
		
		if($this->session->has_userdata("username"))
		{
			$datelist= $this->mm->sortdate($date);
			if(count($datelist)>0 )
			{
				$data["datelist"] = $datelist;
				$this->load->view('diginspect/admin/sortbydate',$data);
			}
			else	
			{
				echo "<script>alert('No data found!');</script>";
				$inspectionlist= $this->mm->collectdirectives();
				$data["inspectionlist"] = $inspectionlist;
				$this->load->view("diginspect/admin/view_reports",$data);
			}
		}
		else
		{
			redirect("Maine/home");
		}
		
	}
	
	public function sortbydate_details()
	{
		$date=$this->input->post("_date");
		
		if($this->session->has_userdata("username"))
		{
			$datelist= $this->mm->sortdate_details($date);
			$data["datelist"] = $datelist;
			if(count($datelist)>0 )
			{
				$this->load->view('diginspect/admin/sortbydate',$data);
			}
			else
			{
				redirect('Maine/get_collected_data');
			}
		}
		else
		{
			redirect("Maine/home");
		}
		
	}
	
	public function admin()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("txtuserName","User Name","required");
		$this->form_validation->set_rules("txtPassword","Password","required");
		
		if($this->form_validation->run() == false)
		{
			$this->load->view('diginspect/index');
		}
		else
		{
			$un = $this->input->post("txtuserName");
			$pass= $this->input->post("txtPassword");
			$data = $this->mm->checkUser($un,$pass);
			if(count($data)>0 )
			{
				$newdata = array('username'  => $un);

				$this->session->set_userdata($newdata);
				$this->load->view("diginspect/menu",$newdata);
					//redirect('Maine/home');
			}
			else
			{
					//redirect('Maine/index');
				echo '<script>alert("User does not exist.")</script>';
				$this->load->view("diginspect/index");
				
			}
		}
	}	
	

	public function get_collected_data()
	{
		if($this->session->has_userdata("username"))
		{
			$inspectionlist= $this->mm->collectData();
			$data["inspectionlist"] = $inspectionlist;
			$this->load->view("diginspect/admin/inspection_reports",$data);
		}
		else
		{
			redirect("Maine/home");
		}
	}
	
	
	public function home()
	{
		
		if($this->session->has_userdata("username"))
		{
			$newdata = array('username'  => $this->session->username);
			$this->load->view("diginspect/menu",$newdata);
		}
		else	
		{	
			$this->load->view("diginspect/index");
			
		}
	}
	
	public function logout()
	{
		if($this->session->has_userdata("username"))
		{
			$this->session->unset_userdata("username");
			redirect('Maine/index');
		}
	}
	
	public function search()
	{
		$srchstr = $this->input->post("txtSearch");	
		$inspectionlist= $this->mm->search_data($srchstr);
		$data["inspectionlist"] = $inspectionlist;
		$this->load->view('diginspect/admin/search',$data);
	}
	
	public function viewpage($id)
	{
			//echo $id;
			//$this->load->view('diginspect/get_collected_data');
			//$newdata = array('id'  => $this->session->$id);
		$inspectionlist= $this->mm->get_inspectiondetails($id);
		$data["inspectionlist"] = $inspectionlist;
		$this->load->view('diginspect/admin/inspection_get_details',$data);
	}
	
	public function adduser ()
	{
		if($this->session->has_userdata("username"))
		{
			//$userlist= $this->mm->getuserlist();
			//$data["userlist"] = $userlist;
			$this->load->view("diginspect/admin/add_inspector");
		}
		else
		{
			redirect('Maine/home');
		}
	}
	
	
	public function save_user()
	{			
		$this->load->library("form_validation");
		$this->form_validation->set_rules("txtFirstName","First Name","required") ;
		$this->form_validation->set_rules("txtLastName","Last Name","required") ;
		$this->form_validation->set_rules("txtEmail","Email Address","required");
		$this->form_validation->set_rules("txtUserName","Username","required");
		$this->form_validation->set_rules("txtPassword","Password","required");
		
		$email = $this->input->post("txtEmail");
		$fname = $this->input->post("txtFirstName");
		$lname = $this->input->post("txtLastName");
		$un = $this->input->post("txtUserName");
		$password = $this->input->post("txtPassword");
		
		if($this->form_validation->run()==false)
		{
			redirect("Maine/adduser");
		}
		else
		{
			$data =array(
				"username"=>$un,
				"pass"=>$password,
				"firstname"=>$fname,
				"lastname"=>$lname,
				"emailAdd"=>$email,
				);
			$this->mm->storeUser($fname,$lname,$email,$un,$password);	
			$newdata = array('username'  => $this->session->userdata("username"));
			//$this->session->set_userdata($newdata);
			$this->load->view("diginspect/menu",$newdata);
		}
	}
	
	public function edit_admin_profile($username)
	{
		$data['username'] = $username;
		$userlist= $this->mm->getuserData($username);
		$data["userlist"] = $userlist;
		
		$this->load->view("diginspect/admin/admin_profile", $data);			
	}
	
	public function deleteview($id)
	{
		$this->db->where('id', $id);
		if($this->db->delete('tbl_accounts'))
		{
			$this->load->view("about/delete_view");			
		}
	}
	
	public function save_changes()
	{
		
		$this->load->library("form_validation");
		$this->form_validation->set_rules("txtName","Name","trim|required|max_length[50]|min_length[12]") ;
		$this->form_validation->set_rules("txtUsername","Username","trim|required|max_length[100]|min_length[1]");
		$this->form_validation->set_rules("txtPassword","Password","trim|required|max_length[100]|min_length[1]");
		
		$name = $this->input->post("txtName");
		$username = $this->input->post("txtUsername");
		$password = $this->input->post("txtPassword");
		
		$data =array(
			"id"=>$this->input->post("txtID"),
			"username"=>$username,
			"pass"=>$password,
			"adminName"=>$name
			
			);
		if($this->db->replace("tbladmin",$data))
		{
			echo '<script>alert("Changes saved.");</script>';
			$newdata = array('username'  => $username);

			$this->session->set_userdata($newdata);
			$this->load->view("diginspect/menu",$newdata);
		}	
	}
	
	public function view_reports()
	{
		if($this->session->has_userdata("username"))
		{
			//$inspectionlist= $this->mm->collectdirectives();
			//$data["inspectionlist"] = $inspectionlist;
			$this->load->view("diginspect/admin/reports_menu");
		}
		else
		{
			redirect("Maine/home");
		}
	}
	
	public function load_reports($str)
	{
		if($this->session->has_userdata("username"))
		{
			$inspectionlist= $this->mm->get_reports($str);
			$data["inspectionlist"] = $inspectionlist;
			$this->load->view("diginspect/admin/view_reports",$data);
		}
		else
		{
			redirect("Maine/home");
		}
	}
	
	public function load_user()
	{
		$this->load->view('diginspect/admin/add_new_inspector');	
	}
	
	public function load_pdf()
	{
		$this->load->view("../../mobile/4-Mcdonalds.pdf");
	}
	
	public function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('about/upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('about/upload_success_view', $data);
		}
	}
	
}