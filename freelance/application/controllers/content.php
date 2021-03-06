<?php
class Content extends CI_Controller {

function welcoming(){
    $this->load->view('header');
    $this->load->view('welcoming-page');
}

function home(){
    $this->load->view('header');
    $user_id = $this->session->userdata('id_user');
    $this->load->model('model_user');
    $get['data']=$this->model_user->get_freelancer($user_id)->result();
    $this->load->view('homepage',$get);
}

function profile(){
    $this->load->view('header');
    $user_id = $this->session->userdata('id_user');
    $this->load->model('model_user');
    $get['data']=$this->model_user->get_freelancer($user_id)->result();
    $this->load->view('form_profile',$get);
}

function edit_profile(){
    $this->load->view('header');
    $this->load->model('model_user');
    $id = $this->uri->segment(3);
    $edit['edit_profile']= $this->model_user->edit_freelancer($id)->row_array();
    $this->load->view('edit_profile',$edit);
}

function edit_simpan_profile(){

    $id = $this->input->post('id');
    $datauser = array(
    'id'=>$this->input->post('id'),
    'name'=>$this->input->post('name'),
    'address'=>$this->input->post('address'),
    );

    $this->db->where('id',$id);
    $this->db->update('tb_freelancer',$datauser);
    redirect('content/profile');
}

function kios(){
    $this->load->view('header');
    $this->load->model('model_user');
    $get['data']=$this->model_user->get_kios()->result();
    $this->load->view('form_kios',$get);
}

function transaksi(){
    $this->load->view('header');
    $user_id = $this->session->userdata('id_user');
    $this->load->model('model_user');
    $get['data']=$this->model_user->get_transaksi($user_id)->result();
    $this->load->view('form_transaksi',$get);
}

function komisi(){
    $this->load->view('header');
    $this->load->model('model_user');
    $get['data']=$this->model_user->get_transaksi()->result();
    $this->load->view('form_komisi',$get);
}

}