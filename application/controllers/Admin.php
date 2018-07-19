<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('AdminModel');
    }
    public function index(){
        if (isset($_SESSION['user'])) {
            $this->load->view('admin/noticias');
        } else {
            $this->load->view('admin/login');
        }
    }
    public function noticias(){
        $this->load->view('admin/noticias');
    }
    public function contactos(){
        $data['contacto']=$this->AdminModel->getContactos();
        $this->load->view('admin/contactos',$data);
    }
    public function faq(){
        $data['faq']=$this->AdminModel->getFaq();
        $this->load->view('admin/faq',$data);
    }
    public function galeria(){
        $this->load->view('admin/galeria');
    }
   

public function miembros($miembrospag = false){
    
        $inicio=0;
        $limite=10;
            if($miembrospag){
                $inicio=($miembrospag-1)*$limite;
            }
            $this->load->library('pagination');
            

            $data['miembros']=$this->AdminModel->getMiembros($inicio,$limite);

            $config['base_url'] = base_url(). 'miembrospag/';
            $config['total_rows'] = count($this->AdminModel->getMiembros());
            $config['per_page'] = $limite;
            $config['uri_segment'] = 2;
            $config['first_url']=base_url('Admin/miembros'); 
            $config['num_links']=1;
            $config['full_tag_open'] = '<ul class="paginador">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = 'Primero';
            $config['last_link'] = 'Ultimo';
            $config['next_link'] = '<i class="fa fa-arrow-right" aria-hidden="true"></i>';
            $config['prev_link'] = '<i class="fa fa-arrow-left" aria-hidden="true"></i>';
            $config['first_tag_open'] = '<li>';
            $config['last_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['next_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li ">';
            $config['cur_tag_open'] = '<li class="active"><strong><a >';
            $config['cur_tag_close'] = '</a></strong></li>';
            $config['num_tag_close'] = '</li>';
            
            $this->pagination->initialize($config);
            
            $data['paginacion']=$this->pagination->create_links();

        $this->load->view('admin/miembros',$data);
    }
    public function clasificados(){
        $data['usuario']=$this->AdminModel->getMiembroClasificado();
        $data['clasificado']=$this->AdminModel->getClasificado();
        $this->load->view('admin/clasificados',$data);
    }
    public function eventos(){
        $data['eventos']=$this->AdminModel->getEvent();
        $this->load->view('admin/eventos',$data);
    }
    public function login(){
        if ($this->AdminModel->login()) {
            $data['session']=$this->session->userdata();
            redirect('Admin/noticias');
        } else {
            $data['error']='Usuario o Clave incorrecto';
            $data['correo']=$this->input->post('correo');
            $this->load->view('admin/login',$data);
        }
        
    }
    public function location($id){
		$data['ubicacion']=$this->AdminModel->getMiembrosById($id);
		$this->load->view('admin/location',$data);
	}
    public function registerAdmin(){
        if ($_POST) {
            $registerResult=$this->AdminModel->registerAdmin();

            if ($registerResult[0]) {
                redirect('Admin/Noticias');
            } else {
                $data=array(
                    'error'=>$registerResult[1],
                    'user'=>$_POST['user']
                );
                $this->load->view('admin/addMiembro',$data);
            }
            
        } else {
           $this->load->view('admin/addMiembro');
        }
    }
    public function saveNoticias(){

        $this->form_validation->set_rules('titulo', 'titulo', 'required');
        $this->form_validation->set_rules('resumen', 'resumen', 'required');
        $this->form_validation->set_rules('descripcion', 'descripcion', 'required');
        $this->form_validation->set_message('required','El campo {field} es obligatorio');

        $confi['upload_path']='img';
        $confi['allowed_types']="jpg|gif|png";
        $confi['max_size'] = '1024';
        $confi['image_size_str']="width='800',height='600'";
       

		$this->load->library('upload',$confi);
        
        if ($this->form_validation->run() === false) {
            $this->load->view('admin/noticias');
        } else {
            if (!$this->upload->do_upload('foto')) {
                $data['error']=$this->upload->display_errors();
                $this->load->view('admin/noticias',$data);
            } else {
                $name=$this->upload->file_name;
                $this->AdminModel->saveOrUpdateNoticias($name);
                $this->load->view('admin/noticias');
            }
        }
    }   

    public function saveFoto(){
        
        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('descripcion', 'descripcion', 'required');
        $this->form_validation->set_message('required','El campo {field} es obligatorio');

        $confi['upload_path']='img';
        $confi['allowed_types']="jpg|gif|png|jpeg";
        $confi['max_size'] = '1024';
        $confi['image_size_str']="width='800',height='600";
        $confi['image_width]']='800px';
        $confi['image_height']='600px';
        
        
        $this->load->library('upload',$confi);
        
        if ($this->form_validation->run() === false) {
            $this->load->view('admin/galeria');
        } else {
            if (!$this->upload->do_upload('foto')) {
                $data['error']=$this->upload->display_errors();
                $this->load->view('admin/galeria',$data);
            } else {
                $name=$this->upload->file_name;
                $this->AdminModel->saveOrUpdateImage($name);
                $this->load->view('admin/galeria');
            }
        }
    }   
    public function saveFaq(){
        $this->form_validation->set_rules('preguntas', 'preguntas', 'required');
       // $this->form_validation->set_rules('respuestas', 'respuestas', 'required');
        $this->form_validation->set_message('required','El campo {field} es obligatorio');

        if ($this->form_validation->run() === false) {
            $this->load->view('admin/faq');
        } else {
            $this->AdminModel->saveOrUpdateFaq();
            $this->faq();
        }
    }
public function saveEvent(){
    $this->form_validation->set_rules('titulo', 'titulo', 'required');
    $this->form_validation->set_rules('descripcion', 'descripcion', 'required');
    $this->form_validation->set_rules('fecha', 'fecha', 'required');
    $this->form_validation->set_rules('hora', 'hora', 'required');

    $this->form_validation->set_message('required','El campo {field} es obligatorio');

    $confi['upload_path']='img';
    $confi['allowed_types']="jpg|gif|png|jpeg";
    $confi['max_size'] = '1024';
    $confi['image_size_str']="width='800',height='600";
    $confi['image_width]']='800px';
    $confi['image_height']='600px';
    
    $this->load->library('upload',$confi);
    
    if ($this->form_validation->run() === false) {
        $this->load->view('admin/eventos');
    } else {
        if (!$this->upload->do_upload('foto')) {
            $data['error']=$this->upload->display_errors();
            $this->load->view('admin/eventos',$data);
        } else {
            $name=$this->upload->file_name;
            $this->AdminModel->saveOrUpdateEvent($name);
            $this->eventos();
        }
    }
}
    public function logout(){
        $this->session->sess_destroy();
		redirect('admin/login');
    }

    public function exportarExcel(){
        $this->load->library('export_excel');
        $result=$this->AdminModel->getMiembro();
        //var_dump($result);
        $this->export_excel->to_excel($result,'lista_de_miembro');
    }
    
    /*delete */

    public function deleteContactos($id){
        $this->AdminModel->deleteContactos($id);
        $this->contactos();
    }
    public function deleteNoticias($id){
        $this->AdminModel->deleteNoticias($id);
        $this->noticias();
    }
    public function deleteFoto($id){
        $this->AdminModel->deleteFoto($id);
        $this->galeria();
    }
    public function deleteAdmin($id){
        $this->AdminModel->deleteAdmin($id);
        $this->registerAdmin();
    }
    public function deleteClasificados($id){
        $this->AdminModel->deleteClasificados($id);
        $this->clasificados();
    }
    public function deleteFaq($id){
        $this->AdminModel->deleteFaq($id);
        $this->faq();
    }
    public function deleteEventos($id){
        $this->AdminModel->deleteFaq($id);
        $this->eventos();;
    }
}