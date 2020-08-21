<?php

class  Controller {
	
	
	function __construct() {
			

	}
	
	// ihtyiacımız olan model'i dahil ediyoruz
	public function Modelyukle($name) {
		
		$yol='model/'.$name.'_model.php';
		
		if (file_exists($yol)) :
		
		require $yol;
		
		$modelsinifName=$name.'_model';
		
		$this->model= new $modelsinifName();
		
		endif;
		
		
	}
	//nesne olusturuyoruz.
	 function UploadLibrary(array $name){
        foreach ($name as $value) {
            $firstLetterUppercase = ucfirst($value);
            $this->$value = new $firstLetterUppercase();

	    }
    }


	
	
	

	
}




?>