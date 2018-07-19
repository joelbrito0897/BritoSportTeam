<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class AdminModel extends CI_Model{

    public function login(){
        $query=$this->db->get_where('usuarios',array(
            'user'=>$this->input->post('user'),
            'pass'=>$this->input->post('pass')
        ));
        if ($query->row_array()) {
            $session=array(
                'user'=>$this->input->post('user'),
            );
            $this->session->set_userdata($session);
            return true;
        } else {
            return false;
        }
    }
     public function saveOrUpdateNoticias($name){
        $id=$this->input->post('id');
        $data=array(
            'id'=>$this->input->post('id'),
            'titulo'=>$this->input->post('titulo'),
            'resumen'=>$this->input->post('resumen'),
            'descripcion'=>$id=$this->input->post('descripcion'),
            'foto'=>$name,
        );
     if($this->input->post('id')>0) {
            $this->db->where('id',$this->input->post('id'));
            return $this->db->update('noticias',$data);
        } else {
            $this->db->insert('noticias',$data);
        }
    }
    public function saveOrUpdateImage($name){
        $id=$this->input->post('id');
        $data=array(
            'id'=>$this->input->post('id'),
            'nombre'=>$this->input->post('nombre'),
            'descripcion'=>$id=$this->input->post('descripcion'),
            'foto'=>$name,
        );
        if ($this->input->post('id')>0) {
            $this->db->where('id',$this->input->post('id'));
            return $this->db->update('galeria',$data);
        } else {
            $this->db->insert('galeria',$data);
        }
    }

    public function saveOrUpdateFaq(){
        $idd=$this->input->post('id');
        $data=array(
            'id'=>$this->input->post('id'),
            'preguntas'=>$this->input->post('preguntas'),
            'respuestas'=>$this->input->post('respuestas')
        );
        if ($this->input->post('id')>0) {
            $this->db->where('id',$this->input->post('id'));
            return $this->db->update('faq',$data);
        } else {
            $this->db->insert('faq',$data);
        }
    }
    public function saveOrUpdateEvent($name){
        $id=$this->input->post('id');
        $data=array(
            'id'=>$this->input->post('id'),
            'titulo'=>$this->input->post('titulo'),
            'descripcion'=>$this->input->post('descripcion'),
            'fecha'=>$this->input->post('fecha'),
            'hora'=>$this->input->post('hora'),
            'foto'=>$name
        );
        if ($this->input->post('id')>0) {
            $this->db->where('id',$this->input->post('id'));
            return $this->db->update('eventos',$data);
        } else {
            $this->db->insert('eventos',$data);
        }
    }
    public function registerAdmin(){
            $query=$this->db->get_where('usuarios',array('user',$this->input->post('user')));
            if($query->row_array()>0){
                return array(false,'Este miembro ya existe');
            }else{
                if ($_POST['user']=!null && $_POST['pass']=!null) {

                    $data=array(
                        'user'=>$this->input->post('usuario'),
                        'pass'=>$this->input->post('clave')
                    );
                    $this->db->insert('usuarios',$data);
                } else {
                    return array(false,'Debe de llenar todos los campos');
                }
            }
    }
    public function getMiembroClasificado(){
        $query = $this->db->get('clasificados');
        return $query->result_array();
    }
    public function getClasificado(){
        $this->db->limit(5);
        $this->db->order_by('id','DESC');
        $query = $this->db->get('clasificados');
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
    public function getMiembro(){
        $query = $this->db->get('miembros');
        return $query->result_array();
    }
    public function getFaq(){
        $query = $this->db->get('faq');
        return $query->result_array();
    }
    public function getContactos(){
        $query = $this->db->get('contacto');
        return $query->result_array();
    }
    public function getMiembrosById($id){
        $query=$this->db->get_where('miembros',array('id'=>$id));
        return $query->result_array();
    }
    public function getEvent(){
        $query = $this->db->get('eventos');
        return $query->result_array();
    }
    /*DELETE*/
    public function deleteNoticias($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('noticias');
    }
    public function deletefoto($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('galeria');
    }
    public function deleteAdmin($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('usuarios');
    }
    public function deleteClasificados($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('clasificados');
    }
    public function deleteContactos($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('contacto');
    }
    public function deleteFaq($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('faq');
    }
    public function deleteEvent($id){
        $this->db->where('id',$id);
        $this->db->delete('eventos');
    }
    
}