<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TeacherController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('TeacherModel');
        $this->load->library('session');
        $this->load->library('form_validation'); // Load form validation library
    }

    public function index()
    {
        if ($this->session->userdata('user')) {
            redirect('dashboard');
        } else {
            $this->load->view('login');
        }
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Validate input
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === false) {
            // Validation failed
            $this->session->set_flashdata('error', 'Invalid login. Please check your credentials.');
            redirect('/');
        }

        $data = $this->TeacherModel->login($email, $password);
        if ($data) {
            $this->session->set_userdata('user', $data);

            if ($data['role'] == 'Teacher') {
                redirect('teacher_dashboard');
            } else {
                redirect('student_dashboard');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid login. User not found.');
            redirect('/');
        }
    }

    public function teacher_dashboard()
    {
        if ($this->session->userdata('user')) {
            $student_data['students'] = $this->TeacherModel->get_all_students();
            $this->load->view('teacher_dashboard', $student_data);
        } else {
            redirect('/');
        }
    }

    public function student_dashboard()
    {
        if ($this->session->userdata('user')) {
            $this->load->view('student_dashboard');
        } else {
            redirect('/');
        }
    }

    public function delete($id)
    {
        $student_update = $this->TeacherModel->delete($id);
        $this->session->set_flashdata('success', 'Data is Deleted!');
        redirect('teacher_dashboard');
    }

    public function insert()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'marks' => $this->input->post('marks')
        );

        // Validate input 
        $this->form_validation->set_rules('name', 'Name', 'required');
      
        if ($this->form_validation->run() === false) {
            // Validation failed
            $this->session->set_flashdata('error', 'Please fill in all required fields.');
            redirect('teacher_dashboard');
        }

        $student_update = $this->TeacherModel->insert($data);
        $this->session->set_flashdata('success', 'Data is Inserted!');
        redirect('teacher_dashboard');
    }

    public function update()
{
    $id = $this->input->post('id');
    $data = array(
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'subject' => $this->input->post('subject'),
        'marks' => $this->input->post('marks')
    );

    // Set validation rules
    $this->form_validation->set_rules('name', 'Name', 'required');
    

    if ($this->form_validation->run() === false) {
        // Validation failed
        $this->session->set_flashdata('error', 'Please fill in all required fields.');
    } else {
        // Validation passed, update data and show success message
        $student_update = $this->TeacherModel->update($id, $data);
        $this->session->set_flashdata('success', 'Data is updated!');
    }

    // Redirect to teacher dashboard
    redirect('teacher_dashboard');
}

    public function logout()
    {
        //load session library
        $this->load->library('session');
        $this->session->unset_userdata('user');
        redirect('/');
    }

}
