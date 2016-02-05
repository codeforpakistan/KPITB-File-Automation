<?php 
	function check_permission($permission)
	{
		$ci =& get_instance();
		$ci->load->library('session');
		$staff_id = $ci->session->userdata('id');
		$result = $ci->db->query("select * from permission p inner join permission_allocated a on a.right_id = p.id  where a.staff_id = '$staff_id' and p.value = '$permission'")->num_rows();
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

?>