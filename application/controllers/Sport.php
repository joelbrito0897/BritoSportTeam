<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sport extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('SportModel');
    }
    public function index(){
        $data=array(
            'noticias'=>$this->SportModel->getNoticias(),
            'eventos'=>$this->SportModel->getEvent(),
            'clasificado'=>$this->SportModel->getClasificados()
        );
        $this->load->view('inicio',$data);
    }
    public function noticias($pagina=false){
        $inicio = 0;
        $limite = 3;
        if($pagina){
            $inicio = ($pagina-1)*$limite;
        }
        $this->load->library('pagination');

        $data['noticias']=$this->SportModel->getAllNoticias($inicio, $limite);
        
        
        $config['base_url'] = base_url(). 'pagina/';
        $config['total_rows'] = count($this->SportModel->getAllNoticias());
        $config['per_page'] = $limite;
        $config['uri_segment']=2;
        $config['first_url']=base_url('Sport/noticias'); 
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
        $this->load->view('noticias',$data);
    }
    public function miembro($miembropag = false){
     
        $inicio=0;
        $limite=5;
            if($miembropag){
                $inicio=($miembropag-1)*$limite;
            }
            $this->load->library('pagination');
            

            $data['miembros']=$this->SportModel->getMiembros($inicio,$limite);

            $config['base_url'] = base_url(). 'miembropag/';
            $config['total_rows'] = count($this->SportModel->getMiembros());
            $config['per_page'] = $limite;
            $config['uri_segment'] = 2;
            $config['first_url']=base_url('Sport/miembro'); 
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
             $this->load->view('miembros',$data);
    }

    public function eventos($eventospag =false){
        
        $inicio=0;
        $limite=4;
            if($eventospag){
                $inicio=($eventospag-1)*$limite;
            }
            $this->load->library('pagination');
            

            
            $data['eventos']=$this->SportModel->getAllEvent($inicio,$limite);

            $config['base_url'] = base_url(). 'eventospag/';
            $config['total_rows'] = count($this->SportModel->getAllEvent());
            $config['per_page'] = $limite;
            $config['uri_segment'] = 2;
            $config['first_url']=base_url('Sport/eventos'); 
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

        $this->load->view('eventos',$data);
    } 


    public function clasificados($clasificadospag=false){
        $inicio=0;
        $limite=5;
            if($clasificadospag){
                $inicio=($clasificadospag-1)*$limite;
            }
            $this->load->library('pagination');
            
            $data['clasificados']=$this->SportModel->getClasificado($inicio,$limite);

            $config['base_url'] = base_url(). 'clasificadospag/';
            $config['total_rows'] = count($this->SportModel->getClasificado());
            $config['per_page'] = $limite;
            $config['uri_segment'] = 2;
            $config['first_url']=base_url('Sport/clasificados'); 
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

        $this->load->view('clasificados',$data);
    }
    public function galeria(){
        $data['galeria']=$this->SportModel->getFotos();
        $this->load->view('galeria',$data);
    }
    
    public function contacto(){
        $this->load->view('contactos');
    }
    public function faq(){
        $data['faq']=$this->SportModel->getFaq();
        $this->load->view('faq',$data);
    }

    public function verificarCedula(){
       $this->load->view('verificarCedula');
    }

    public function registerMiembro(){
        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('apellido', 'apellido', 'required');
        $this->form_validation->set_rules('telefono', 'telefono', 'required');
        $this->form_validation->set_rules('cedula', 'cedula', 'required');
        $this->form_validation->set_rules('correo', 'correo', 'required');
        $this->form_validation->set_rules('direccion', 'direccion', 'required');
        $this->form_validation->set_rules('latitud', 'latitud', 'required');
        $this->form_validation->set_rules('longitud', 'longitud', 'required');

        $this->form_validation->set_message('required','El campo {field} es obligatorio');

        $confi['upload_path']='img';
        $confi['allowed_types']="jpg|gif|png|jpeg";
        $confi['max_size'] = '1024';
        $confi['image_size_str']="width='300',height='100";
        $confi['image_width]']='300px';
        $confi['image_height']='100px';
     
        $this->load->library('upload',$confi);

        if ($this->form_validation->run() === false) {
            $this->load->view('registerMiembro');
        }else{
            if (!$this->upload->do_upload('foto')) {
                $data['error']=$this->upload->display_errors();
                $this->load->view('registerMiembro',$data);
            }else{
                $name=$this->upload->file_name;
                $this->SportModel->registerMiembro($name);
                $this->index();
            }
        }
    }
    public function saveClasificados(){

        
        $this->form_validation->set_rules('titulo', 'titulo', 'required');
        $this->form_validation->set_rules('descripcion', 'descripcion', 'required');
        $this->form_validation->set_message('required','El campo {field} es obligatorio');

        $confi['upload_path']='img';
        $confi['allowed_types']="jpg|gif|png|jpeg";
        $confi['max_size'] = '1024';
        $confi['image_size_str']="width='800',height='600";
        $confi['image_width]']='800px';
        $confi['image_height']='600px';
     
        $this->load->library('upload',$confi);

        if ($this->form_validation->run() == false) {
            $this->load->view('clasificados');
        }else{
            if (!$this->upload->do_upload('foto')) {
                $data['error']=$this->upload->display_errors();
                $this->load->view('clasificados',$data);
            }else{
                $name=$this->upload->file_name;
                $this->SportModel->saveOrUpdateClasificados($name);
                $this->load->view('clasificados');
            }
        }
    } 
    public function detalleNoticia($id){     
        $data['comentarios']=$this->SportModel->getComentarios();
        $data['detalle']=$this->SportModel->detalleNoticia($id);
       // $this->SaveComentarios($id);
        $this->load->view('detallesNoticias',$data);
    }
    public function SaveComentarios($id){
            $this->SportModel->SaveComentarios($id);
            $this->index();
    }
    public function saveContactos(){
        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('mensaje', 'nombre', 'required');
        $this->form_validation->set_message('required', 'El campo {field} es obligatorio');

        if ($this->form_validation->run() == false) {
            $this->load->view('contactos');
        }else{
                $this->SportModel->saveContactos();
                $this->load->view('contactos');
            }
    }
    public function listEvent($idEvento){
        $this->SportModel->saveListEvent($idEvento);
        $this->eventos();
    }
    public function nolistEvent($idMiembro){
        $this->SportModel->deleteListEvent($idMiembro);
        $this->eventos();
    }
   
    
    public function loginMiembro(){
        if($_POST){
            if ($this->SportModel->loginMiembro()) {
                $id=$_SESSION['idMiembro'];
                $data=array(
                    'session'=>$this->session->set_userdata(),
                    'miembros'=>$this->SportModel->getMiembros($id)
                );  
                redirect('Sport');
            } else {
                $data=array(
                    'error'=>'Cedula Incorrecta'
                );
                $this->load->view('loginMiembro',$data);
            }
        }else{
            $this->session->sess_destroy();
            $this->load->view('loginMiembro');
        }
    }


    public function detalleClasificados($id){        
        $data['detalle']=$this->SportModel->detalleClasificados($id);
        $this->load->view('detallesClasificados',$data);
    }
    public function detalleEventos($id){        
        $data['detalles']=$this->SportModel->detalleEvento($id);
        $this->load->view('detallesEventos',$data);
    }
    public function miembroById($id){        
        $data['datos']=$this->SportModel->getMiembrosById($id);
        $this->load->view('misDatos',$data);
    }
    public function logout(){
        $this->session->sess_destroy();
		redirect('Sport');
    }
    
}