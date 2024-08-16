<?php
class TeacherModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Authenticate user login.
     *
     * @param string $email
     * @param string $password
     * @return array|null
     */
    public function login($email, $password)
    {
        $query = $this->db->get_where('users', array('email' => $email, 'password' => $password));

        return $query->row_array();
    }

    /**
     * Get all student records.
     *
     * @return array
     */
    public function get_all_students()
    {
        return $this->db->get('students')->result();
    }

    /**
     * Update student data by ID.
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('students', $data);
    }

    /**
     * Delete student record by ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('students');
    }

    /**
     * Insert new student record.
     *
     * @param array $data
     * @return bool
     */
    public function insert($data)
    {
        return $this->db->insert('students', $data);
    }
}
?>
