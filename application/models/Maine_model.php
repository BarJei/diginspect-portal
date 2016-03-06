<?php

class Maine_model extends CI_Model
{	
	public function get_inspectiondetails($id)
	{
		$sql="SELECT * FROM companydirectives, companydetails WHERE companydirectives.inspectID=companydetails.inspectID AND companydetails.inspectID=".$id;
        $result = $this->db->query($sql);
        return $result->result();
	}
	
	public function get_reports($str)
		{
			$sql="SELECT * FROM companydirectives WHERE deficiencyCompliance LIKE '%".$str."%'";
			$result = $this->db->query($sql);
			return $result->result();
		}
	
	public function search_data($srchstr)
		{
		$fields = array("inspectID","syncDate","establishmentName","plantOfficeAdd","plantOfficeGPS","wareHouseAdd","warehouseGPS","ownerName","telnum","faxnum","classification","products","notification","inspectionPurpose","ltoNum","ltoRenewal","ltoValidity","repName","repPosition","repRegNum","repDateIssued","repValidity","interviewedName","interviewedPos","orNum","orAmount","orDate","rsn");
		for($i=0;$i<count($fields);$i++)
			{
			$searchf=$fields[$i];
			//$result = $this->db->like($searchf,$srchstr);
			$result = $this->db->query("SELECT * from companydetails WHERE ".$searchf." LIKE '%".$srchstr."%'");
			///$result =$this->db->where($searchf.'LIKE ', '%'.$srchstr.'%');
				
				
			}
		return $result->result();
		}
	
    public function getData()
    {
        $sql="SELECT * FROM tbladmin";
        $result = $this->db->query($sql);
        return $result->result();
    }
	
	public function getuserlist()
    {
        $sql="SELECT * FROM users";
        $result = $this->db->query($sql);
        return $result->result();
    }
	
	public function collectData()
    {
        $sql="SELECT * FROM companydetails";
        $result = $this->db->query($sql);
        return $result->result();
    }
	
	public function collectdirectives()
    {
        $sql="SELECT * FROM companydirectives";
        $result = $this->db->query($sql);
        return $result->result();
    }
	
	public function insertContact($email,$subj,$msg)
		{
		$sqlQuery="INSERT INTO tbl_contact('Email','Subject','Msg') VALUES('".$email."','".$subj."','".$msg."')";
		}
		
	public function checkUser($username,$pass)
		{
		$sql="SELECT * FROM tbladmin WHERE username='$username' AND pass=password('$pass')";
	
		$result = $this->db->query($sql);
       	return $result->row();
		
		}
	
	public function getuserData($username)
    {
        $sql="SELECT * FROM tbladmin WHERE username='".$username."'";
        $result = $this->db->query($sql);
        return $result->result();
    }
	
	public function sortdate($date)
	{
		$sql="SELECT * from companydirectives WHERE syncDate LIKE '%".$date."%'";		
		$result = $this->db->query($sql);
        return $result->result();
	}
	
	public function sortdate_details($date)
	{
		$sql="SELECT * from companydetails WHERE syncDate LIKE '%".$date."%'";		
		$result = $this->db->query($sql);
        return $result->result();
	}
	
	
	public function storeUser($fname, $lname, $email, $uname, $password) {
        $uuid = uniqid('', true);
        $hash = do_hash($password);
        $encrypted_password = MD5($hash); // encrypted password
        $salt = sha1($hash); // salt
				date_default_timezone_set("Asia/Bangkok");
		$datestring = date_default_timezone_get();
	
 		$data = array(
			'unique_id'=>$uuid,
			'firstname'=>$fname,
			'lastname'=>$lname,
			'username'=>$uname,
			'email'=>$email,
			'encrypted_password'=>$encrypted_password,
			'salt'=>$salt,
			'created_at'=>mdate($datestring)
		);
        $result = $this->db->insert("users",$data);
		// check for successful store
        if ($result) {
			echo '<script>alert("New Account Successfully created!")</script>';
            // get user details 
            //$uid = mysql_insert_id(); // last inserted id
			//$result=$this->db->where('uid', $uid);
            //$result = mysql_query("SELECT * FROM users WHERE uid = $uid");
            // return user details
            //return mysql_fetch_array($result);
        } else {
            return false;
        }
    }
}