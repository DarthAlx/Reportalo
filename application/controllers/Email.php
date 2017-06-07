<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
    $this->load->helper('path');
    delete_files(set_realpath('uploads/adjuntos/'));
		$reporte = $this->input->post('reporte');
		$nombre	= $this->input->post('nombre');
		$empleador=$this->input->post('empleador');
	 	$email = $this->input->post('email');
		$mensaje1=$this->input->post('mensaje');
		$telefono = $this->input->post('telefono');
    $adjunto = $this->input->post('adjunto');
			$mensaje = '<html>

					<body>
						<p>Hemos recibido una petición.</p>

						<p>
							<strong>Nombre: '.$nombre .'</strong><br>
							<strong>Reporte: '. $reporte.'</strong><br>
              <strong>Empleador: '. $empleador.'</strong><br>
							<strong>Teléfono: '.$telefono .'</strong><br>
              <strong>Mensaje: '.$mensaje1 .'</strong><br>


						</p>
					</body>
					</html>';
						$this->email->subject("Contácto Reportalo");


						$this->email->from($email, $nombre);
						$this->email->to('alexis@bms.mx');
						$this->email->set_mailtype("html");



						$this->email->message($mensaje);


              if ($_FILES['adjunto']['size'] > 0) {
                $config['upload_path'] =set_realpath('uploads/adjuntos/');
      	        $config['allowed_types'] = 'zip|rar|pdf|docx|txt|jpg|bmp|png';
      	        $config['remove_spaces']=TRUE;
      	        $config['max_size']    = '100000';
      	        $this->load->library('upload', $config);
                if($this->upload->do_upload('adjunto')){
                   $upload_data = $this->upload->data();
                   $this->email->attach($upload_data['full_path']);
                }
              }

          	if($this->email->send()){
          		$this->session->set_flashdata('Mensaje', 'Tu mensaje se envió correctamente.');
          		redirect(base_url().'index.php/contacto');
          	}
          	else{
          		$this->session->set_flashdata('Mensaje', 'Tu mensaje NO se envió correctamente.');
          			redirect(base_url().'index.php/contacto');
          	}


	}



}
