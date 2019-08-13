<?php


class User_model extends CI_Model {

    public function get_user($username, $password)
    {
        $user = $this->db
            ->where('username', $username)
            ->where('password', $password)
            ->get('users');

        return $user->num_rows() > 0 ? $user->row() : false;
    }

    public function get_user_by_id($id)
    {
        $user = $this->db
            ->where('id', $id)
            ->get('users');

        return $user->num_rows() > 0 ? $user->row() : false;
    }
}