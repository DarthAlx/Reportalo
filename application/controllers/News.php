<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	/**
	 *  Author: Alexis Morales (alx.morales@hadoukendev.com)
	 */
	 public function index()
 	{

 	}

	public function noticia()
	{
		$data=array();
		$this->load->model('queries_model');

		if($this->input->post()){
      $titulonew= $this->input->post('titulonew');
			$publicadopor= $this->input->post('publicadopor');
			$contenido= htmlentities($this->input->post('contenido'));
      $fuente= $this->input->post('fuente');
      $imagendest= $this->input->post('imagendest');




			$registros = array(
        'titulonew' => $titulonew,
				'publicadopor' => $publicadopor,
				'contenido' => $contenido,
        'fuente' => $fuente,
        'imagendest' => $imagendest,
				'fecha' => date("d") . "/" . date("m") . "/" . date("Y")
				);

			$this->load->model('queries_model');
			if($this->queries_model->guardar("rp_news", $registros)){
				$data['exito']=true;
			}

		}else{
      $data['exito']=false;
    }

		$noticias=$this->queries_model->customsql("SELECT * FROM rp_news WHERE id = (SELECT MAX(id) FROM rp_news) ");
		$data['noticias']=$noticias;
		$files = get_filenames('uploads/noticias', FALSE);
    if($files){
				$data['files']=$files;

				}else{
						$data['files']=NULL;
				}




		  $data['titulo']="Noticias";



		//proceso de logueado
		if($this->session->userdata('logueado')){
			$this->load->view('Templates/header',$data);
			$this->load->view('admin/noticias',$data);
			$this->load->view('Templates/footer',$data);
		}
		else{
			redirect('index.php/usuarios/iniciar_sesion');
		}
		//termina proceso de logueado
	}



	public function editar($id)
	{
		$data=array();
		$this->load->model('queries_model');

		if($this->input->post()){
      $titulonew= $this->input->post('titulonew');
			$publicadopor= $this->input->post('publicadopor');
			$contenido= htmlentities($this->input->post('contenido'));
      $fuente= $this->input->post('fuente');
      $imagendest= $this->input->post('imagendest');




			$registros = array(
        'titulonew' => $titulonew,
				'contenido' => $contenido,
        'fuente' => $fuente,
        'imagendest' => $imagendest
				);

			$this->load->model('queries_model');
			if($this->queries_model->guardar("rp_news", $registros, "id", $id)){
				$data['exito']=true;
			}

		}else{
      $data['exito']=false;
    }

		$noticias=$this->queries_model->obtener("rp_news", "*", "id", $id);
		$data['id']=$id;
		$data['noticias']=$noticias;
		$files = get_filenames('uploads/noticias', FALSE);
    if($files){
				$data['files']=$files;

				}else{
						$data['files']=NULL;
				}




		  $data['titulo']="Noticias";



		//proceso de logueado
		if($this->session->userdata('logueado')){
			$this->load->view('Templates/header',$data);
			$this->load->view('admin/editar',$data);
			$this->load->view('Templates/footer',$data);
		}
		else{
			redirect('index.php/usuarios/iniciar_sesion');
		}
		//termina proceso de logueado
	}



  public function noticia_ind($id=null){
    $data=array();
    $this->load->model('queries_model');
    if ($id) {
  		$noticias = $this->queries_model->customsql("SELECT * FROM rp_news WHERE id = $id");
    }
    else {
      $noticias=$this->queries_model->customsql("SELECT * FROM rp_news WHERE id = (SELECT MAX(id) FROM rp_news) ");

    }
    $noticiasarray=$this->queries_model->obtener("rp_news","*");
    $data['noticiasarray']=$noticiasarray;
    $data['noticias']=$noticias;
    $data['titulo']="Noticia";
    $this->load->view('Templates/header',$data);
    $this->load->view('noticia',$data);
    $this->load->view('Templates/footer',$data);

  }

/*
	public function foroeditor()
	{
		$data=array();
		$this->load->model('queries_model');

		if($this->input->post('categoria')){
			$registros = array(
				'categoria' => ucfirst($this->input->post('categoria'))

			);
			$this->load->model('queries_model');
			if($this->queries_model->guardar("cg_categorias", $registros)){
				$data['exito']=true;
			}
		}else{
			$data['exito']=false;
		}
		$categorias=$this->queries_model->obtener("cg_categorias","*");
		$data['categorias']=$categorias;


		if($this->input->post('titulo')){
			$registros = array(
				'titulo' => ucfirst($this->input->post('titulo')),
				'categorialink' => $this->input->post('categorialink'),
				'contenido' => $this->input->post('contenido'),
				'publicadopor' => $this->input->post('publicadopor'),
				'fecha' => date("d") . "/" . date("m") . "/" . date("Y")

			);
			$this->load->model('queries_model');
			if($this->queries_model->guardar("cg_temas", $registros)){
				$data['exito_t']=true;
			}
		}else{
			$data['exito_t']=false;
		}



		$data['titulo']="Foro editor";
		$data['menu']="Contenidos";
		//proceso de logueado
		if($this->session->userdata('logueado')){
		if($this->session->userdata('tipo')=="1"){
			$data['tipo'] = $this->session->userdata('tipo');
			$this->load->view('Templates/header',$data);
			$this->load->view('foroeditor',$data);
			$this->load->view('Templates/footer',$data);
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
	}
*/
	public function do_upload()
	    {
					$data = array();

	        $config['upload_path'] = 'uploads/noticias';
	        $config['allowed_types'] = 'zip|rar|pdf|docx|txt|jpg|bmp|png';
	        $config['remove_spaces']=TRUE;
	        $config['max_size']    = '2048';
	        $this->load->library('upload', $config);




	    if ( ! $this->upload->do_upload())
	        {
	            $this->session->set_flashdata('error', 'Hubo un error, verifique que el nombre del archivo no contenga caracteres especiales o exceda el peso e intente de nuevo.');
							redirect(base_url().'index.php/news/noticia');
	        }
	        else
	        {
						$this->session->set_flashdata('error', 'Archivo guardado.');
	          redirect(base_url().'index.php/news/noticia');



	        }

	   }

		 public function do_upload2($id)
	 	    {
	 					$data = array();

	 	        $config['upload_path'] = 'uploads/noticias';
	 	        $config['allowed_types'] = 'zip|rar|pdf|docx|txt|jpg|bmp|png';
	 	        $config['remove_spaces']=TRUE;
	 	        $config['max_size']    = '2048';
	 	        $this->load->library('upload', $config);




	 	    if ( ! $this->upload->do_upload())
	 	        {
	 	            $this->session->set_flashdata('error', 'Hubo un error, verifique que el nombre del archivo no contenga caracteres especiales o exceda el peso e intente de nuevo.');
	 							redirect(base_url().'index.php/news/editar/'.$id);
	 	        }
	 	        else
	 	        {
	 						$this->session->set_flashdata('error', 'Archivo guardado.');
	 	          redirect(base_url().'index.php/news/editar/'.$id);



	 	        }

	 	   }
		 public function downloads($name){

		        $data = file_get_contents('uploads/noticias/'.$name);
		        force_download($name,$data);

		 }
		 public function delete($name){

		 	if(unlink("uploads/noticias/".$name)) {
		     $this->session->set_flashdata('error', 'Archivo borrado. ('.$name.')');
		     redirect(base_url().'index.php/news/noticia');
		 }
		 else {
		   $this->session->set_flashdata('error', 'No se pudo borrar. ('.$name.')');
		   redirect(base_url().'index.php/news/noticia');
		 }
		 }

		 public function delete2($name, $id){

		 	if(unlink("uploads/noticias/".$name)) {
		     $this->session->set_flashdata('error', 'Archivo borrado. ('.$name.')');
		     redirect(base_url().'index.php/news/editar/'.$id);
		 }
		 else {
		   $this->session->set_flashdata('error', 'No se pudo borrar. ('.$name.')');
		   redirect(base_url().'index.php/news/editar/'.$id);
		 }
		 }

}
