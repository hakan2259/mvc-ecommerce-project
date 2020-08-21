<?php

class adminpanel_model extends Model {
	public $basliklar,$icerikler = array();
	
	function __construct() {		
		parent:: __construct();
	}

    function GirisKontrol($tabloisim,$kosul) {

        return $this->db->giriskontrol($tabloisim,$kosul);

    }
	
	function Verial($tabloisim,$kosul) {
		
		return $this->db->listele($tabloisim,$kosul);
		
	}
    function SipesifikVerial($tabloisim) {

        return $this->db->sipesifiklistele($tabloisim);

    }
	
	function Guncelle($tabloisim,$sutunlar,$veriler,$kosul) {
		
		
		return $this->db->guncelle($tabloisim,$sutunlar,$veriler,$kosul);
	}
	
	function Arama($tabloisim,$kosul) {
		
		
		return $this->db->arama($tabloisim,$kosul);
	}
	
	function Sil($tabloisim,$kosul) {
		
		return $this->db->sil($tabloisim,$kosul);
		
	}
	function Ekleme($tabloisim,$sutunlar,$veriler) {
		
		
		return $this->db->Ekle($tabloisim,$sutunlar,$veriler);
	}

    function TopluEkleme($tabloisim,$sutunlar,$veriler) {


        return $this->db->TopluEkle($tabloisim,$sutunlar,$veriler);
    }
    function TopluislemBaslat() {
        return $this->db->beginTransaction();

    }

    function TopluislemTamamla() {
        return $this->db->commit();
    }

    function İslemlerigerial() {
        return $this->db->rollBack();
    }
    function Bakim($databaseName) {

        return $this->db->sistembakim($databaseName);

    }


    function Yedek($databaseName) {

        return $this->db->DatabaseYedekAlma($databaseName);

    }
    function Pagination($tableName){
	    return $this->db->PaginationCount($tableName);

    }
    function SingleData($column, $condition){
        return $this->db->SingleListing($column, $condition);
    }

    function JoinP($requrestedData,$tables,$condition){
        return $this->db->JoinProcess($requrestedData,$tables,$condition);
    }

    function excelAyarCek($tabloisim,$kosul,$bolum){

	    switch ($bolum):
            case  "bulten":
                foreach ($this->db->listele($tabloisim,$kosul) as $degerler):
                    $this->icerikler[]=array($degerler["mailadres"]);
                endforeach;
                break;
        endswitch;

    }

    function excelAyarCek2($tabloisim){

	   $this->icerikler[]=$this->db->sipesifiklistele($tabloisim);


    }
	
	
	
	
	
}




?>