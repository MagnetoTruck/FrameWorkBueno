<?php
	
	class Home extends Controller{
		protected $model;
		protected $view;
		
		function __construct($params){
			parent::__construct($params);
			$this->model=new mHome();
			$this->view= new vHome();
			
			//echo 'Hello controller!';
		}
		
		function home(){
			//Coder::codear($this->conf);
		}

		function login(){
		   if(isset($_POST['name'])){
		         $name=filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		         $pass=md5(filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING));
		         $user=$this->model->login($name,$pass);
		         if ($user== TRUE){
		               // cap a la pàgina principal
		               header('Location:'.APP_W.'/index/index');
		         }
		         else{
		             // no hi és l'usuari, cal registrar
		               header('Location:'.APP_W.'/index/register');
		             }
		   }
		}
}//END CLASS HOME