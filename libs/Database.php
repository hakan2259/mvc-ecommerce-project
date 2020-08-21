<?php

class Database extends PDO
{


    protected $dizi = array();
    protected $dizi2 = array();


    function __construct()
    {

        parent::__construct('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

        $this->bilgi = new Bilgi();


    }


    function Ekle($tabloisim, $sutunadlari, $veriler)
    {

        $sutunsayi = count($sutunadlari);
        for ($i = 0; $i < $sutunsayi; $i++) :
            $this->dizi[] = '?';
        endfor;

        $sonVal = join(",", $this->dizi);
        $sonhal = join(",", $sutunadlari);

        $sorgu = $this->prepare('insert into ' . $tabloisim . ' (' . $sonhal . ') 	
		VALUES(' . $sonVal . ')');


        if ($sorgu->execute($veriler)) :
            return true;
        else:
            return false;

        endif;


    } // ekleme


    function TopluEkle($tabloisim, $sutunadlari, $sonVal)
    {


        $sonhal = join(",", $sutunadlari);

        $sorgu = $this->prepare('insert into ' . $tabloisim . ' (' . $sonhal . ') 	
		VALUES ' . $sonVal);


        if ($sorgu->execute()) :
            return true;
        else:
            return false;

        endif;


    } // ekleme

    function listele($tabloisim, $kosul = false)
    {


        if ($kosul == false) :

            $sorgum = "select * from " . $tabloisim;

        else:

            $sorgum = "select * from " . $tabloisim . " " . $kosul;

        endif;

        $son = $this->prepare($sorgum);
        $son->execute();

        return $son->fetchAll();


    } // listeleme

    function sipesifiklistele($sorgu, $kosul = false)
    {


        if ($kosul == false) :

            $sorgum = "select " . $sorgu;

        else:

            $sorgum = "select " . $sorgu . " " . $kosul;

        endif;

        $son = $this->prepare($sorgum);
        $son->execute();

        return $son->fetchAll();


    } // Sipesifik listeleme

    function sil($tabloisim, $kosul)
    {

        $sorgum = $this->prepare("delete from " . $tabloisim . ' where ' . $kosul);

        if ($sorgum->execute()) :

            return true;
        else:
            return false;

        endif;

    } // silme

    function guncelle($tabloisim, $sutunlar, $veriler, $kosul)
    {


        foreach ($sutunlar as $deger) :

            $this->dizi2[] = $deger . "=?";

        endforeach;

        $sonSutunlar = join(",", $this->dizi2);
        unset($this->dizi2);


        $sorgum = $this->prepare("update " . $tabloisim . " set " . $sonSutunlar . " where " . $kosul);


        if ($sorgum->execute($veriler)) :

            return true;
        else:
            return false;

        endif;


    } // güncelleme

    function arama($tabloisim, $kosul)
    {


        $sorgum = "select * from " . $tabloisim . " where " . $kosul;


        $son = $this->prepare($sorgum);
        $son->execute();

        return $son->fetchAll();


    } // arama

    function giriskontrol($tabloisim, $kosul)
    {


        $sorgum = "select * from " . $tabloisim . " where " . $kosul;
        $son = $this->prepare($sorgum);
        $son->execute();

        if ($son->rowCount() > 0) :

            return $son->fetchAll();

        else:

            return false;


        endif;


    } // giriş kontrol


    function siparisTamamla($veriler = array())
    {


        $sorgu = $this->prepare('insert into siparisler (siparis_no,adresid,uyeid,urunad,urunadet,urunfiyat,toplamfiyat,odemeturu,tarih) 	
		VALUES(?,?,?,?,?,?,?,?,?)');


        $sorgu->execute($veriler);


    }

    function sistembakim($dbName)
    {
        $sorgu = $this->prepare('SHOW TABLES');
        if ($sorgu->execute()):
            $tablolar = $sorgu->fetchAll();
            foreach ($tablolar as $tabloadi):
                // echo $tabloadi["Tables_in_ecommerce"];
                /*Buraya tekrar bakacağım */
                $this->query("REPAIR TABLE " . $tabloadi["Tables_in_" . $dbName . ""]);
                $this->query("OPTIMIZE TABLE " . $tabloadi["Tables_in_" . $dbName . ""]);

            endforeach;
            $tarih = date("Y.m.d-H:i:s");
            $zamanguncelle = $this->prepare("update ayarlar set bakimzaman='$tarih'");
            $zamanguncelle->execute();
            return true;


        else:
            return false;
        endif;


    }

    function PaginationCount($tableName)
    {
        $query = $this->prepare("select count(*) as toplam from " . $tableName);
        $query->execute();
        $fetch = $query->fetch(PDO::FETCH_ASSOC);
        return $fetch["toplam"];


    } // SAYFALAMA TOPLAM ADET

    function SingleListing($column, $condition)
    {

        $query = $this->prepare("select " . $column . " " . $condition);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);


        return $data[$column];


    } // listeleme

    function JoinProcess($requrestedData, $tables, $condition)
    {


        $recentData = join(",", $requrestedData);
        $recentTables = join(" JOIN ", $tables);

        $query = "select
         " . $recentData . "
         from
         " . $recentTables . "
         ON " . $condition;

        $end = $this->prepare($query);
        $end->execute();

        return $end->fetchAll();


    } // JOIN


    function DatabaseYedekAlma($dbName)
    {
        $tables = array();
        $sorgu = $this->prepare('SHOW TABLES');
        if ($sorgu->execute()):$durum = true;
        else : $durum = false; endif;

        while ($row = $sorgu->fetch(PDO::FETCH_ASSOC)):
            $tables[] = $row["Tables_in_" . $dbName . ""];
        endwhile;

        $return = "SET NAMES utf8;";
        //tabloların içine gireceğiz
        ////tabloda kaç sütun var onu bulucağız
        //tabloların verisini alacağız.
        foreach ($tables as $table) :
            $result = $this->prepare("select * from $table");
            $result->execute();
            $numColumns = $result->columnCount();
            $return .= "DROP TABLE IF EXISTS $table;";
            $result2 = $this->prepare("SHOW CREATE TABLE $table");
            $result2->execute();
            $row2 = $result2->fetch(PDO::FETCH_ASSOC);
            $return .= "\n\n" . $row2["Create Table"] . "\n\n";

            for ($i = 0; $i < $numColumns; $i++):
                while ($row = $result->fetch(PDO::FETCH_NUM)):
                    $return .= "INSERT INTO $table VALUES(";
                    for ($a = 0; $a < $numColumns; $a++):
                        if (isset($row[$a])):
                            $return .= '"' . $row[$a] . '"';
                        else:
                            $return .= '""';
                        endif;
                        if ($a < ($numColumns - 1)):
                            $return .= ',"';
                        endif;
                    endfor;
                    $return .= ")";
                endwhile;
            endfor;
            $return .= "\n\n\n";


        endforeach;

        if ($durum):
            $tarih = date("Y.m.d-H:i:s");
            $zamanguncelle = $this->prepare("update ayarlar set yedekzaman='$tarih'");
            $zamanguncelle->execute();

        endif;

        return [$return, $durum];


    }

}


?>