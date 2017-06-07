<?php
class Queries_model extends CI_Model {
  public function __construct() {
    parent::__construct();
  }

  public function guardar($tabla, $registros, $clave=null, $clave_c=null){
    if($clave){
      $this->db->where($clave, $clave_c);
      if($this->db->update($tabla, $registros)){
        return true;
      }
    }
    else{
      if($this->db->insert($tabla, $registros)){
        return true;
      }
      else{
        echo "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Cerrar'><span aria-hidden='true'>&times;</span></button>Hubo un error en tu solicitud, intentalo de nuevo.</div>";
        return false;
      }
    }
  }
  public function obtener($tabla,$campos,$clave=null, $clave_c=null){
    if($clave){
        $this->db->select($campos);
        $this->db->from($tabla);
        $this->db->where($clave, $clave_c);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
      }
      else{
        $this->db->select($campos);
        $this->db->from($tabla);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
      }
     }
     public function customsql($cadena){
       $query = $this->db->query($cadena);
       $resultado = $query->result();
       return $resultado;
     }
     public function obtenerfila($tabla,$campos,$clave=null, $clave_c=null){
       $this->db->select($campos);
       $this->db->from($tabla);
       $this->db->where($clave, $clave_c);
       $consulta = $this->db->get();
       $resultado = $consulta->row();
       return $resultado;
     }
     public function eliminarregistro($tabla,$clave, $clave_c){
       $this->db->where($clave, $clave_c);
       $this->db->delete($tabla);


     }

}
