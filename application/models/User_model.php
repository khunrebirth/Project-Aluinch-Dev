<?php

class User_model extends CI_Model
{
	public function get_user_all()
	{
		$query = $this->db
			->select('users.id, users.username, users.created_at, roles.title as role_title')
			->join('roles', 'users.role_id = roles.id')
			->get('users');

		return $query->num_rows() > 0 ? $query->result() : false;
	}

	public function insert_user($data)
	{
		$this->db->insert('users', $data);

		return $this->db->insert_id();
	}

	public function update_user_by_id($id, $data)
	{
		$this->db->where('id', $id)->update('users', $data);

		return $this->db->affected_rows() > 0 ? true : false;
	}

	public function delete_user_by_id($id)
	{
		return $this->db->where('id', $id)->delete('users');
	}

	public function get_user($username)
    {
        $user = $this->db
            ->where('username', $username)
            ->get('users');

        return $user->num_rows() > 0 ? $user->result() : [];
    }

    public function get_user_by_id($id)
    {
        $user = $this->db
            ->where('id', $id)
            ->get('users');

        return $user->num_rows() > 0 ? $user->row() : false;
    }

    public function get_users_count_total()
	{
		return $this->db->count_all('users');
	}
}
