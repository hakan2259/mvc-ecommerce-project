<?php

class urunler_model extends Model {
	
	
	function __construct() {		
		parent:: __construct();
	}
	
	function uruncek($tabloisim,$kosul) {
		
		return $this->db->listele($tabloisim,$kosul);
		
	}
    function SingleData($column, $condition){
        return $this->db->SingleListing($column, $condition);
    }
	
	

	
	

	

	
}




?>