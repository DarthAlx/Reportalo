<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

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
	public function iniciar_sesion() {
		$data = array();
		$data['error'] = $this->session->flashdata('error');
    $this->load->view('Templates/header',$data);
		$this->load->view('login', $data);
    $this->load->view('Templates/footer',$data);

		/*
		<?php if ($error): ?> <p> <?php echo $error ?> </p> <?php endif; ?>
		*/
	}
	/*public function registrar() {

		$this->load->model('queries_model');
		$data = array();
		$data['exito_u'] = false;
		$data['exito_u_retorno'] =false;

			$data['error'] = $this->session->flashdata('error');



		if ($this->input->post()) {



			$email = $this->input->post('email');
			$contraseña = $this->input->post('contraseña');
			$contraseña1 = $this->input->post('contraseña1');
			$tipo = $this->input->post('tipouser');
			$idenlace = $this->input->post('idenlace');
			if ($tipo==1) {
				$nombre=$this->queries_model->obtenerfila("cg_equipo","*","id",$idenlace);
				$alias = $nombre->nombre;
			}
			if ($tipo==2) {
				$nombre=$this->queries_model->obtenerfila("cg_vendedores","*","id",$idenlace);
				$alias = $nombre->nombre;
			}
			if ($tipo==3) {
				$nombre=$this->queries_model->obtenerfila("cg_ranchos","*","id",$idenlace);
				$alias = $nombre->nombrerancho;
			}
			if ($tipo==4) {
				$nombre=$this->queries_model->obtenerfila("cg_trabajadores","*","curp",$idenlace);
				$alias = $nombre->nombre_trabajador;
			}

			if($contraseña==$contraseña1){
				$password=password_hash($contraseña, PASSWORD_BCRYPT);
				$registro = array(
				'usuario'=> $email,
				'email'=> $email,
				'tipo'=> $tipo,
				'idenlace'=> $idenlace,
				'alias'=> $alias,
				'contraseña'=> $password
				);
				$usuario=$this->queries_model->obtenerfila("cg_usuarios","email","email",$email);
				if (!$usuario) {
					if($this->queries_model->guardar("cg_usuarios", $registro)){


						$carpeta ='uploads/'. $email.'/archivos';
						$avatar ='uploads/'.$email.'/avatar';

						if (!file_exists($carpeta)) {
						    mkdir($carpeta, 0777, true);

						}
						if (!file_exists($avatar)) {
						    mkdir($avatar, 0777, true);



						}
						copy($_SERVER['DOCUMENT_ROOT'].'/admin/uploads/dummy/avatar.png',$_SERVER['DOCUMENT_ROOT'].'/admin/'.$avatar.'/avatar.png');
						if($this->input->get('Return', TRUE)=="True"){
							$data['exito_u_retorno'] =true;
							$data['exito_u'] = false;
						}else{
							$data['exito_u_retorno'] =false;
							$data['exito_u'] = true;
						}

					}
				}
				else {
					$this->session->set_flashdata('error', 'La dirección de correo se encuentra ligada a otra cuenta.');
					redirect('usuarios/registrar');
				}


			}
			else{
				$this->session->set_flashdata('error', 'Las contraseñas deben coincidir.');
				redirect('usuarios/registrar');
			}
		}



		$usuarios=$this->queries_model->obtener("cg_usuarios","*");
		$data['usuarios']=$usuarios;

		$data['titulo']="Crear Usuario";
		$data['menu']="Usuarios";
		//proceso de logueado
	if($this->session->userdata('logueado')){
		if($this->session->userdata('tipo')=="1"){
			$data['tipo'] = $this->session->userdata('tipo');
			$this->load->view('Templates/header', $data);
			$this->load->view('registro_c', $data);
			$this->load->view('Templates/footer', $data);
		}
		else{
			$data['tipo'] = $this->session->userdata('tipo');
			$this->load->view('Templates/header',$data);
			$this->load->view('usuariosinpermiso',$data);
			$this->load->view('Templates/footer',$data);
		}
	}
	else{
		redirect('usuarios/iniciar_sesion');
	}
	//termina proceso de logueado



	}*/

	public function iniciar_sesion_post() {
		if ($this->input->post()) {
			$email = $this->input->post('email');
			$contraseña = $this->input->post('contraseña');
			$this->load->model('users_model');
			$this->load->model('queries_model');
			$hash = $this->queries_model->obtenerfila("rp_users","*","email",$email);

				if (password_verify($contraseña, $hash->contraseña)) {
						$usuario = $this->users_model->usuario_por_nombre_contrasena($email, $hash->contraseña);
						if ($usuario) {
							$usuario_data = array( 'id' => $usuario->id,'email'=> $usuario->email, 'aliasuser' => $usuario->alias, 'logueado' => TRUE );
							$this->session->set_userdata($usuario_data);
							redirect(base_url().'index.php/news/noticia');
						}
						else {
							$this->session->set_flashdata('error', 'El usuario o la contraseña son incorrectos.');
							redirect(base_url().'index.php/usuarios/iniciar_sesion');
						}
			  } else {
					$this->session->set_flashdata('error', 'El usuario o la contraseña son incorrectos.');
					redirect(base_url().'index.php/usuarios/iniciar_sesion');
			  }



		}
		else {
			redirect(base_url().'index.php/usuarios/iniciar_sesion');
		}
	}

	public function cerrar_sesion() {
		$usuario_data = array( 'logueado' => FALSE );
		$this->session->set_flashdata('error', 'Sesión terminada.');
		$this->session->set_userdata($usuario_data);
		redirect(base_url().'index.php/usuarios/iniciar_sesion');
	}

	public function recuperacion() {
		$data = array();
		$data['error'] = $this->session->flashdata('error');
		$this->load->model('queries_model');

		$user = $this->input->get('user', TRUE)."";
		$usuario = $this->queries_model->obtenerfila("reseteopass","*","email",$user);
		$token = $this->input->get('token', TRUE)."";
		$data['token'] =$this->input->get('token', TRUE)."";
		$data['user'] =$this->input->get('user', TRUE)."";

		if ($this->input->post()) {
			$nuevacontraseña = $this->input->post('nuevacontraseña');
			$nuevacontraseña1 = $this->input->post('nuevacontraseña1');
			$userpost = $this->input->post('userpost');
			$tokenpost = $this->input->post('tokenpost');

			if($nuevacontraseña==$nuevacontraseña1){

				$guardarpass = password_hash($nuevacontraseña, PASSWORD_BCRYPT);
				$registrocontra = array(
				'contraseña'=> $guardarpass
			);

				if($this->queries_model->guardar("rp_users", $registrocontra,'email',$userpost)){
					$this->queries_model->eliminarregistro('reseteopass','token',$tokenpost);
					$this->session->set_flashdata('error', 'Tu contraseña se actualizó correctamente.');
					redirect(base_url().'index.php/usuarios/iniciar_sesion');
				}
			}
			else{
				$this->session->set_flashdata('error', 'Las contraseñas no coinciden.');
        $this->load->view('Templates/header',$data);
				$this->load->view('recovery', $data);
        $this->load->view('Templates/footer',$data);
			}

		}

			if($usuario->token==$token&&$usuario->activo){
        $this->load->view('Templates/header',$data);
				$this->load->view('recovery', $data);
        $this->load->view('Templates/footer',$data);
			}
			else{
				$this->session->set_flashdata('error', 'Link expirado, renueva el proceso de recuperación.');
				redirect(base_url().'index.php/usuarios/iniciar_sesion');
			}




		/*
		<?php if ($error): ?> <p> <?php echo $error ?> </p> <?php endif; ?>
		*/
	}

	public function enviar_recuperacion() {

		if ($this->input->post()) {
			$email = $this->input->post('email');
			$this->load->model('queries_model');
			$usuario = $this->queries_model->obtenerfila("rp_users","*","email",$email);
			if ($usuario) {

					$token=hash('md5',$usuario->email) . rand(1, 100);
					$registros = array(


					'email' => $usuario->email,
					'token' => $token,
					'activo'=>true
					);
					$this->queries_model->eliminarregistro('reseteopass','email',$email);
					if($this->queries_model->guardar("reseteopass", $registros)){

						$link = base_url() . "index.php/usuarios/recuperacion?user=" . $usuario->email ."&token=" . $token;
						$mensaje = '<html>
				    <head>
				        <title>Restablece tu contraseña</title>
				    </head>
				    <body>
				      <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
				      <p>Si hiciste esta petición, haz clic o copia y pega el siguiente enlace en tu navegador, si no hiciste esta petición puedes ignorar este correo.</p>
				      <p>
				        <strong>Enlace para restablecer tu contraseña</strong><br>
				        <a href="'.$link.'"> ' . $link . '</a>
				      </p>
				    </body>
				    </html>';

						$this->email->set_mailtype("html");
						$this->email->message($mensaje);
						$this->email->from('alexis@bms.mx','Repórtalo');
						$this->email->to($email);
						$this->email->subject('Recuperación de contraseña');
						$this->email->message($mensaje);



				  if($this->email->send()){
						$this->session->set_flashdata('error', 'Enviamos un enlace a tu correo para recuperar tu contraseña, puede tardar unos minutos en llegar y puede aparecer en tu carpeta de correo no deseado.');
						redirect(base_url().'index.php/usuarios/iniciar_sesion');
					}


					}
					else {
						$this->session->set_flashdata('error', 'Error en la solicitud, por favor, intentelo de nuevo.');
						redirect(base_url().'index.php/usuarios/iniciar_sesion');
					}

			}
			else{
				$this->session->set_flashdata('error', 'El email no esta asociado a ningun usuario.');
				redirect(base_url().'index.php/usuarios/iniciar_sesion');
			}

		}

	}

	public function normaliza ($cadena){
		$originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕñúüù';
		$modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRrnuuu';
		$cadena = utf8_decode($cadena);
		$cadena = strtr($cadena, utf8_decode($originales), $modificadas);
		$cadena = strtolower($cadena);
		return utf8_encode($cadena);
}
 }
