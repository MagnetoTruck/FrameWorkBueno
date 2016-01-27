<?php

	class mHome extends Model{

		function __construct(){
			parent::__construct();
			
		}

		function login($user,$pass){
		  try{
			    $sql="SELECT * FROM usuaris WHERE user=? AND pass=?";
			    $query=$this->db->prepare($sql);
			    $query->bindParam(1,$user);
			    $query->bindParam(2,$pass);
			    $query->execute();
			    if($query->rowCount()==1){
		          	Session::set('islogged',TRUE);
		          	Session::set('user',$user);

		          	return TRUE;
			    }
		    	else {
		         	Session::set('islogged',FALSE);
		          	return FALSE;
		      	}
		    }
		    catch(PDOException $e){
		       echo "Error:".$e->getMessage();
		   	}
		}
	}