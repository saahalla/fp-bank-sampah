<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trash extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function price()
    {
        $data['title'] = 'Check Trash Price';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['trash_category'] = $this->db->get('trash_category')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/trash/price', $data);
        $this->load->view('templates/footer', $data);
    }

    public function sell()
    {
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('weight', 'Weight', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Check Trash Price';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['trash_category'] = $this->db->get('trash_category')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/trash/sell', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $user_id = $user['id'];
            $data = [
                'category_id' => $this->input->post('category'),
                'weight' => $this->input->post('weight'),
                'user_id' => $user_id
            ];
            $this->db->insert('trash_trx', $data);
            redirect('trash/user_transaction');
        }
    }

    // admin
    public function category()
    {
        $data['title'] = 'Check Trash Price';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['trash_category'] = $this->db->get('trash_category')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/trash/category', $data);
        $this->load->view('templates/footer', $data);
    }

    public function transaction()
    {
        $data['title'] = 'Trash Transaction';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $queryTrx = "   SELECT u.name, t.weight, c.category, c.price, (c.price * t.weight) as total_price
                        FROM trash_trx as t JOIN user as u
                        ON t.user_id = u.id
                        JOIN trash_category as c
                        ON t.category_id = c.id
                        ORDER BY t.id DESC";

        $trx = $this->db->query($queryTrx)->result_array();
        $data['transaction'] = $trx;
        // get total saldo
        $saldo = 0;
        foreach ($trx as $t) {
            $saldo += $t['total_price'];
        }
        $data['saldo'] = $saldo;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/trash/transaction', $data);
        $this->load->view('templates/footer', $data);
    }

    public function add()
    {
        $data['title'] = 'Add Trash Categorys';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/trash/add');
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'category' => $this->input->post('category'),
                'price' => $this->input->post('price')
            ];
            $this->db->insert('trash_category', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Add Category Success</div>');
            redirect('trash/category');
        }
    }

    public function edit()
    {
        $data['title'] = 'Add Trash Categorys';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim');


        if ($this->form_validation->run() == false) {
            $id = $this->input->get('id');
            $category = $this->db->get_where('trash_category', ['id' => $id])->row_array();
            $data['category'] = $category;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/trash/edit', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $data = [
                'category' => $this->input->post('category'),
                'price' => $this->input->post('price'),
            ];
            $id = $this->input->post('id');
            $this->db->where('id', $id);
            $this->db->update('trash_category', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Edit Category Success</div>');
            redirect('trash/category');
        }
    }

    public function delete()
    {
        $id = $this->input->get('id');
        $this->db->delete('trash_category', ['id' => $id]);
        redirect('trash/category');
    }

    public function user_transaction()
    {
        $data['title'] = 'Trash Transaction';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $queryTrx = "   SELECT u.name, t.weight, c.category, c.price, (c.price * t.weight) as total_price
                        FROM trash_trx as t JOIN user as u
                        ON t.user_id = u.id
                        JOIN trash_category as c
                        ON t.category_id = c.id
                        WHERE t.user_id = {$data['user']['id']}
                        ORDER BY t.id DESC";

        $trx = $this->db->query($queryTrx)->result_array();
        // get total saldo
        $saldo = 0;
        foreach ($trx as $t) {
            $saldo += $t['total_price'];
        }
        $data['saldo'] = $saldo;
        $data['transaction'] = $trx;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/trash/transaction', $data);
        $this->load->view('templates/footer', $data);
    }
}
