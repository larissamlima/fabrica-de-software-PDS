<?php
class LoginModel extends CI_Model
{

    public function registrar($data)
    {

        return $this->db->insert('usuarios', $data);
    }

    public function obterUsuario($email)
    {
        $this->db->select('email, senha');
        $this->db->from('usuarios');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->result_array();
    }
    // public function get_products(){
    //     if(!empty($this->input->get("search"))){
    //       $this->db->like('title', $this->input->get("search"));
    //       $this->db->or_like('description', $this->input->get("search")); 
    //     }
    //     $query = $this->db->get("products");
    //     return $query->result();
    // }
    // public function insert_product()
    // {    
    //     $data = array(
    //         'title' => $this->input->post('title'),
    //         'description' => $this->input->post('description')
    //     );
    //     return $this->db->insert('products', $data);
    // }
    // public function update_product($id) 
    // {
    //     $data=array(
    //         'title' => $this->input->post('title'),
    //         'description'=> $this->input->post('description')
    //     );
    //     if($id==0){
    //         return $this->db->insert('products',$data);
    //     }else{
    //         $this->db->where('id',$id);
    //         return $this->db->update('products',$data);
    //     }        
    // }
}
