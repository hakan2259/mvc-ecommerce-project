<?php

class magaza extends Controller  {
	
	
	function __construct() {
		parent::UploadLibrary(array("View"));

		
		
	@Session::init();	
	

		
	}	
	
	function Index() {
		
		$this->Modelyukle('magaza');

	$this->View->goster("sayfalar/index",
	array(
	"data1" => $this->model->anasayfaUrunler("urunler","where durum=0 order by id desc LIMIT 9"),	"data2" => $this->model->anasayfaUrunler("urunler","where durum=1 order by id desc")
	
	));	
	}
	


	
}




?>