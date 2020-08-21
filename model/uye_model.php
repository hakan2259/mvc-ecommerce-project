<?php

class uye_model extends Model {
	
	
	function __construct() {		
		parent:: __construct();
	}
	
	
	
	function GirisKontrol($tabloisim,$kosul) {
		
		return $this->db->giriskontrol($tabloisim,$kosul);		
		
	}
	
		
	function Ekleİslemi($tabloisim,$sutunadlari,$veriler) {
		
		return $this->db->Ekle($tabloisim,$sutunadlari,$veriler);
	
		
		
	}
	
	function GetData($tabloisim,$kosul) {
		
		return $this->db->listele($tabloisim,$kosul);
	
		
		
	}
	
	function Delete($tabloisim,$kosul) {
		
		return $this->db->sil($tabloisim,$kosul);
	
		
		
	}

	function Update($tabloisim,$sutunlar,$veriler,$kosul) {
		
		
		return $this->db->guncelle($tabloisim,$sutunlar,$veriler,$kosul);
	}

	
	function TopluislemBaslat() {		
	return $this->db->beginTransaction();	
		
	}
	
	function TopluislemTamamla() {
	return $this->db->commit();
	}
	
	
	
	function SiparisTamamlama($veriler) {
	
	return $this->db->siparisTamamla($veriler);
		
	} // SİPARİŞ TAMAMLAMA

    function SingleData($column, $condition){
        return $this->db->SingleListing($column, $condition);
    }
	
}




?>