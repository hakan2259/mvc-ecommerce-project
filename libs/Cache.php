<?php

class Cache  {
    public $cacheFile,$second,$type;
    function __construct()
    {

    }

    function CacheControl($second2 = false){
        include 'config/Cache.php';

        $piece = explode("/",$_SERVER["REQUEST_URI"]);
        if(in_array(end($piece),$cacheNo)):
            $this->type = false;
        else:
            $this->type=true;
        endif;
        if($this->type):
        if($second2):
            $this->second = $second2;
        else:
            $this->second = $CacheTime["Time"];
        endif;


        $this->cacheFile = CACHEPATH.md5($_SERVER['REQUEST_URI']).".html"; //cache dosya yolunu alıyor

        if(file_exists($this->cacheFile) && (time()-$this->second<filemtime($this->cacheFile))):
            // include($cacheFile);
            readfile($this->cacheFile);

            exit();
        endif;

        /*
         *
        60 saniyede = 100 kişi
        60 saniyede = 10 sorgu
        60 saniyede = 1000 sorgu

        1. saniyede biri cache olusturuyor ve sadece 10 sorgu çalışır.
        59. saniyede 99 kişi cache dosyası gelecektir.
        60 saniyede = 10 sorgu çalıştırmış olacağım.

        ---> çok büyük bir performans olacaktır.

        */
        ob_start();
        endif;
    }
	function CacheCreate(){
        $file = fopen($this->cacheFile,"w"); // dosyayı aç
        fwrite($file,ob_get_contents()); // dosyayı kodları ile beraber yaz.
        fclose(); // dosya kapat
        ob_end_flush(); // ob_start sonlandır.
    }
	

	
}




?>