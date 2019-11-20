<?php

class Project_model extends CI_Model {

    public function get_project_all()
    {
//		$sql = "
//			SELECT  projects.id,
//					projects.title,
//					projects.description,
//					projects.created_at,
//					projects.img_cover,
//					projects.img_title_alt,
//					COUNT(image_projects.id) as counter
//			FROM projects
//			LEFT JOIN image_projects ON projects.id = image_projects.project_id
//			GROUP BY image_projects.project_id
//        ";

		$sql = "
			SELECT *,
			(SELECT COUNT(*) FROM image_projects WHERE projects.id = image_projects.project_id) as counter
			FROM projects
		";

		$query = $this->db->query($sql);

		return $query->num_rows() > 0 ? $query->result() : [];
    }

    public function get_project_by_id($id)
    {
        $query = $this->db->where('id', $id)->get('projects');

        return $query->num_rows() > 0 ? $query->row() : false;
    }

	public function get_image_project_by_project_id($id)
	{
		$query = $this->db->where('project_id', $id)->get('image_projects');

		return $query->num_rows() > 0 ? $query->result() : [];
	}

    public function insert_project($data)
    {
        $this->db->insert('projects', $data);

        return $this->db->insert_id();
    }

    public function update_project_by_id($id, $data)
    {
        $this->db->where('id', $id)->update('projects', $data);

        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete_project_by_id($id)
    {
        return $this->db->where('id', $id)->delete('projects');
    }
}
