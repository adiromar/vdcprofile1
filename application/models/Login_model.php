<?php 

/**
 * 
 */
class Login_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function set_token($id)
	{
		$token = password_hash(substr( md5(rand()), 0, 7) , PASSWORD_DEFAULT);
		$expired_at = date("Y-m-d H:i:s", strtotime('+72 hours'));
		$created_at = date('Y-m-d H:i:s');

		$this->db->trans_start();
		$this->db->insert('users_authentication',array('users_id' => $id,'token' => $token,'expired_at' => $expired_at));
		if ($this->db->trans_status() === FALSE)
		{
          $this->db->trans_rollback();
          return 'Internal server error.';
       	} 
       	else 
       	{
          $this->db->trans_commit();
          return array('message' => 'Successfully login.','id' => $id, 'token' => $token);
        }
	}

	public function logout($id)
    {

        $this->db->where('users_id',$id)->delete('users_authentication');

        return array('message' => 'Successfully logged out.', 'User-ID' => $id);
    }

    public function auth($token)
    {
        
        $q  = $this->db->select('expired_at')->from('users_authentication')->where('token',$token)->get()->row();
        if($q == ""){
            return array('status' => 401,'message' => 'Unauthorized.');
        } else {
            // if($q->expired_at < date('Y-m-d H:i:s')){
            //     return json_output(array('status' => 401,'message' => 'Your session has been expired.'));
            // } else {
                $updated_at = date('Y-m-d H:i:s');
                $expired_at = date("Y-m-d H:i:s", strtotime('+72 hours'));
                $this->db->where('token',$token)->update('users_authentication',array('expired_at' => $expired_at,'updated_at' => $updated_at));
                return array('status' => 200,'message' => 'Authorized.');
            // }
        }
    }


}