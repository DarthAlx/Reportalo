<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function usuario_por_nombre_contrasena($email, $contraseña){
    $this->db->select('*');
    $this->db->from('rp_users');
    $this->db->where('email', $email);
    $this->db->where('contraseña', $contraseña);
    $consulta = $this->db->get();
    $resultado = $consulta->row();
    return $resultado;
  }

}
