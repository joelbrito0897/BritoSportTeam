<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class SportModel extends CI_Model{
    
    public function verificarCedula(){
        $query=$this->db->get_where('miembros',array('cedula',$this->input->post('cedula')));
        if($query->row->array()>0){
            return array(false,'Este miembro ya existe');
        }else{
            if ($_POST['cedula']=!null && $_POST['correo']=!null) {
                $this->db->insert('miembros',$_POST);
            } else {
                return array(false,'Debe de llenar todos los campos');
            }
        }
    }
    public function registerMiembro($name){
        $data=array(
            'id'=>$this->input->post('id'),
            'nombre'=>$this->input->post('nombre'),
            'apellido'=>$this->input->post('apellido'),
            'telefono'=>$this->input->post('telefono'),
            'celular'=>$this->input->post('celular'),
            'cedula'=>$this->input->post('cedula'),
            'foto'=>$name,
            'correo'=>$this->input->post('correo'),
            'direccion'=>$this->input->post('direccion'),
            'latitud'=>$this->input->post('latitud'),
            'longitud'=>$this->input->post('longitud')
        );
        $query=$this->db->get_where('miembros',array('cedula',$this->input->post('cedula')));
        if($query->row_array()>0){
            return array(false,'Este miembro ya existe');
        }else{
                $id=$this->input->post('id');
            if($id>0){
                if ($_POST['cedula']=!null && $_POST['correo']=!null) {
                    $this->db->where('id',$id);
                    $this->db->update('miembros',$data);
                } else {
                    return array(false,'Debe de llenar todos los campos');
                }
            }else{
                if ($_POST['cedula']=!null && $_POST['correo']=!null) {
                    $this->db->insert('miembros',$data);
                } else {
                    return array(false,'Debe de llenar todos los campos');
                }
            }
        }
    }
  
    public function loginMiembro(){
        $query=$this->db->get_where('miembros',array(
            'cedula'=>$this->input->post('cedula')
        ));
        if ($query->row_array()) {
            $session=array(
                'cedula'=>$query->row_array()['cedula'],
                'nombre'=>$query->row_array()['nombre'],
                'idMiembro'=>$query->row_array()['id']
            );
            $this->session->set_userdata($session);
            return true;
        } else {
            return false;
        }
    }
    public function detalleNoticia($id){
        $query = $this->db->get_where('noticias',array('id'=>$id));
        return $query->result_array();
    }    
    public function detalleEvento($id){
        $query = $this->db->get_where('listevento',array('idEvento'=>$id));
        return $query->result_array();
    }
    public function detalleClasificados($id){
        $query = $this->db->get_where('clasificados ',array('id'=>$id));
        return $query->result_array();
    }  
    public function saveOrUpdateClasificados($name){
        
        $data=array(
            'titulo'=>$this->input->post('titulo'),
            'descripcion'=>$this->input->post('descripcion'),
            'foto'=>$name,
            'fecha'=>date('d/m/Y'),
            'idMiembro'=>$_SESSION['idMiembro']
        );
        $this->db->insert('clasificados',$data);
    }
    
    public function saveContactos(){
        $data=array(
            'id'=>$this->input->post('id'),
            'nombre'=>$this->input->post('nombre'),
            'email'=>$this->input->post('email'),
            'mensaje'=>$this->input->post('mensaje')
        );
        $this->db->insert('contacto',$data);
    }
    public function saveListEvent($idEvento){
        $data=array(
            'id'=>$this->input->post('id'),
            'idEvento'=>$idEvento,
            'idMiembro'=>$_SESSION['idMiembro']
        );
        $this->db->insert('listEvento',$data);
    }
    public function SaveComentarios($idNoticia){
        $data=array(
            'id'=>$this->input->post('id'),
            'comentario'=>$this->input->post('comentario'),
            'idMiembro'=>$_SESSION['idMiembro'],
            'idNoticia'=>$idNoticia
        );
        $this->db->insert('comentarios',$data);
    }
    public function deleteListEvent($idMiembro){
        $this->db->where('idMiembro',$idMiembro);
        $this->db->delete('listEvento');
    }
    public function getNoticias(){
        $this->db->limit(5);
        $this->db->order_by('id','DESC');
        $query = $this->db->get('noticias');
        return $query->result_array();
    }
    public function getAllNoticias($inicio = false, $limite= false) {

        $this->db->order_by('id','DESC');

        if($inicio !== false and $limite !== false){
            $this->db->limit($limite,$inicio);
        }

        $query = $this->db->get('noticias');
        return $query->result_array();
    }

    public function getMiembros($inicio=false , $limite=false){

        $this->db->order_by('id','DESC');

      if($inicio !== false and $limite !== false){
        $this->db->limit($limite,$inicio);
    }

        $query = $this->db->get('miembros');
        return $query->result_array();
    }

    public function getAllEvent($inicio=false , $limite=false){
        $this->db->order_by('id','DESC');
        
        if($inicio !== false and $limite !== false){
            $this->db->limit($limite,$inicio);
        }
        $query = $this->db->get('eventos');
        return $query->result_array();
    }

    public function getClasificado($inicio=false , $limite=false){
        $this->db->order_by('id','DESC');
        
        if($inicio !== false and $limite !== false){
            $this->db->limit($limite,$inicio);
        }
       
        $query = $this->db->get('clasificados');
        return $query->result_array();
    }
    public function getComentarios(){
        $query = $this->db->get('comentarios');
        return $query->result_array();
    }
    public function getEvent(){
        $this->db->limit(5);
        $this->db->order_by('id','DESC');
        $query = $this->db->get('eventos');
        return $query->result_array();
    }
    public function getClasificados(){
        $this->db->limit(5);
        $this->db->order_by('id','DESC');
        $query = $this->db->get('clasificados');
        return $query->result_array();
    }
    public function getMiembrosById($id){
        $query = $this->db->get_where('miembros',array('id'=>$id));
        return $query->result_array();
    }
    public function getFaq(){
        $query = $this->db->get('faq');
        return $query->result_array();
    }

    public function getFotos(){
        $query = $this->db->get('galeria');
        return $query->result_array();
    }
  
    public function deleteNoticias($id){
        $this->db->where('id',$id);
        $this->db->delete('noticias');
    }
    
    public function deleteClasificado($id){
        $this->db->where('id',$id);
        $this->db->delete('clasificados');
    }
    
}