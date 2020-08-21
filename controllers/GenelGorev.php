<?php

class GenelGorev extends Controller
{


    function __construct()
    {
        parent::UploadLibrary(array("Bilgi","Form"));


        $this->Modelyukle('GenelGorev');

        Session::init();
    }

    function YorumFormKontrol()
    {


        if ($_POST) :


            $ad = $this->Form->get("ad")->bosmu();
            $yorum = $this->Form->get("yorum")->bosmu();
            $urunid = $this->Form->get("urunid")->bosmu();
            $uyeid = $this->Form->get("uyeid")->bosmu();
            $tarih = date("d-m-Y");
            if (!empty($this->Form->error)) :

                echo $this->Bilgi->uyari("danger", "LÜTFEN BOŞ ALAN BIRAKMAYINIZ");

            else:


                $sonuc = $this->model->Add("yorumlar",
                    array("uyeid", "urunid", "ad", "icerik", "tarih"),
                    array($uyeid, $urunid, $ad, $yorum, $tarih));

                if ($sonuc == 1):


                    echo $this->Bilgi->uyari("success", "Yorumunuz kayıt edildi. Onaylandıktan sonra yayınlanacaktır", 'id="ok"');

                else:


                    echo $this->Bilgi->uyari("danger", "HATA OLUŞTU. LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ");

                endif;

            endif;


        else:

            $this->Bilgi->direktYonlen("/");

        endif;


    } // YORUM  KONTROL

    function BultenKayit()
    {
        if ($_POST) :
            $mailadres = $this->Form->get("mailadres")->bosmu();
            $this->Form->GercektenMailmi($mailadres);
            $tarih = date("Y-m-d");

            if (!empty($this->Form->error)) :

                echo $this->Bilgi->uyari("danger", "GİRİLEN MAİL ADRESİ GEÇERSİZ");

            else:


                $sonuc = $this->model->Add("bulten",
                    array("mailadres", "tarih"),
                    array($mailadres, $tarih));

                if ($sonuc == 1):


                    echo $this->Bilgi->uyari("success", "Bultene Başarılı bir şekilde kayıt oldunuz. Teşekkür ederiz", 'id="bultenok"');

                else:


                    echo $this->Bilgi->uyari("danger", "HATA OLUŞTU. LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ");

                endif;

            endif;

        else:

            $this->Bilgi->direktYonlen("/");

        endif;


    } // BULTEN KAYIT  KONTROL

    function iletisim()
    {
        if ($_POST) :
            $ad = $this->Form->get("ad")->bosmu();
            $mail = $this->Form->get("mail")->bosmu();
            $konu = $this->Form->get("konu")->bosmu();
            $mesaj = $this->Form->get("mesaj")->bosmu();


            @$this->form->GercektenMailmi($mail);
            $tarih = date("d-m-Y");

            if (!empty($this->Form->error)) :

                echo $this->Bilgi->uyari("danger", "LÜTFEN TÜM BİLGİLERİ UYGUN GİRİNİZ");

            else:


                $sonuc = $this->model->Add("iletisim",
                    array("ad", "mail", "konu", "mesaj", "tarih"),
                    array($ad, $mail, $konu, $mesaj, $tarih));

                if ($sonuc == 1):


                    echo $this->Bilgi->uyari("success", "Mesajınız Alındı. En kısa sürede Dönüş yapılacaktır. Teşekkür ederiz", 'id="formok"');

                else:


                    echo $this->Bilgi->uyari("danger", "HATA OLUŞTU. LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ");

                endif;

            endif;


        else:

            $this->Bilgi->direktYonlen("/");

        endif;


    } // iletisim formu


    function SepeteEkle()
    {
        // form buraya gelecek buradan id ve adet eklenecek


        Cookie::SepeteEkle($this->Form->get("id")->bosmu(), $this->Form->get("adet")->bosmu());

    }

    function UrunSil()
    {
        if ($_POST) :
            Cookie::UrunUcur($_POST["urunid"]);

        else:
            $this->Bilgi->direktYonlen("/");
        endif;
    }

    function UrunGuncelle()
    {
        if ($_POST) :
            Cookie::Guncelle($_POST["urunid"], $_POST["adet"]);
        else:
            $this->Bilgi->direktYonlen("/");
        endif;
    }

    function SepetiBosalt()
    {

        $this->Bilgi->direktYonlen("/sayfalar/sepet");

        Cookie::SepetiBosalt();

    }


    function SepetKontrol()
    {

        echo '<a href="' . URL . '/sayfalar/sepet">
		<h3> <img src="' . URL . '/views/design/images/bag.png" alt=""> </h3>
							
                            
		<p>';


        if (isset($_COOKIE["urun"])) :

            echo count($_COOKIE["urun"]);


        else:

            echo "Sepetiniz Boş";
        endif;


        echo '</p></a>';


    }

    function adresBilgileriGetir()
    {
        if ($_POST) :
            $sipno = $this->Form->get("sipno")->bosmu();
            $adresid = $this->Form->get("adresid")->bosmu();

            $teslimatbilgileriGetir = $this->model->Verial("teslimatbilgileri", "where siparis_no=" . $sipno);
            $adresbilgileriGetir = $this->model->Verial("adresler", "where id=" . $adresid);

            echo '<div class="row">
		
				<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 border-dark">
					<div class="row">
					
							<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 text-left">
								<div class="row">
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 border-bottom border-secondary mb-2">
							<h5>KİŞİSEL BİLGİLER</h5>
							</div>
					
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<span class="font-weight-bold">Ad : ' . $teslimatbilgileriGetir[0]["ad"] . '</span>
							</div>
							
							
								<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<span class="font-weight-bold">Soyad : ' . $teslimatbilgileriGetir[0]["soyad"] . '</span>
							</div>
							
							
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<span class="font-weight-bold">Mail :  ' . $teslimatbilgileriGetir[0]["mail"] . '</span>
							</div>
							
							
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<span class="font-weight-bold">Telefon : ' . $teslimatbilgileriGetir[0]["telefon"] . '</span>
							</div>
						
					
							</div>
							
							
							</div>
							
							
							
							
							
							
							
							<div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 text-left">
								<div class="row">
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 border-bottom border-secondary mb-2">
							<h5>ADRES BİLGİSİ</h5>
							</div>
					
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<span class="font-weight-bold">Adres : ' . $adresbilgileriGetir[0]["adres"] . '</span>
							</div>
							
							
							
						
					
							</div>
							
							
							</div>
							
							
							
					
							
					
					
					
					</div>
				
				
				
				</div>
		
		
		</div>';


        else:

            $this->Bilgi->direktYonlen("/");

        endif;


    } //Yönetim Paneli Adres ve Kişisel Bilgileri Getir.


    function iadeislemi()
    {
        if ($_POST) :
            $sipno = $this->Form->get("sipno")->bosmu();


            $iadeislemi = $this->model->Guncelle("siparisler", array("durum"),array(2),"siparis_no=".$sipno);
          if($iadeislemi):
              echo '<div class="alert alert-primary text-center">İade İşlemi Başarılı.</div>';
          else:
              echo '<div class="alert alert-primary" text-center>İşlem Sırasında Hata Oluştu.</div>';

          endif;




        else:

            $this->Bilgi->direktYonlen("/");

        endif;


    } //Yönetim Paneli Adres ve Kişisel Bilgileri Getir.
    function iadeonaylamaislemi()
    {
        if ($_POST) :
            $sipno = $this->Form->get("sipno")->bosmu();


            $iadeislemi = $this->model->Guncelle("siparisler", array("durum"),array(3),"siparis_no=".$sipno);





        else:

            $this->Bilgi->direktYonlen("/");

        endif;


    } //Yönetim Paneli İade İşlemini Onaylıyoruz.


    function siparisBilgileriGetir()
    {
        if ($_POST) :

            $sipno=$this->Form->get("sipno")->bosmu();
            $adresid=$this->Form->get("adresid")->bosmu();


            $siparisGetir=$this->model->Verial("siparisler","where siparis_no=".$sipno);

            ?>
            <div class="row arkaplan p-1 mt-2 pb-0 text-center">

                <div class="col-lg-3 col-xl-3 col-md-3 geneltext2 "> <span>ÜRÜN AD</span> </div>
                <div class="col-lg-3 col-xl-3 col-md-3 geneltext2 "> <span>ÜRÜN ADET</span> </div>
                <div class="col-lg-3 col-xl-3 col-md-3 geneltext2 "> <span>ÜRÜN FİYAT</span> </div>
                <div class="col-lg-3 col-xl-3 col-md-3 geneltext2 "> <span>TOPLAM FİYAT</span> </div>
            </div>
            <?php
            $toplam=array();
            foreach ($siparisGetir as $deger):

                echo '<div class="row border border-light text-center">     
<div class="col-lg-3 col-xl-3 col-md-3 text-dark kalinyap p-2">'.$deger["urunad"].'</div>
<div class="col-lg-3 col-xl-3 col-md-3 text-dark kalinyap p-2">'.$deger["urunadet"].'</div>
<div class="col-lg-3 col-xl-3 col-md-3 text-dark kalinyap p-2">
'.number_format($deger["urunfiyat"],2,",",".").' TL</div>
<div class="col-lg-3 col-xl-3 col-md-3 text-dark kalinyap p-2">'.number_format($deger["toplamfiyat"],2,",",".").' TL</div>             
           </div> ';
                $toplam[]=$deger["toplamfiyat"];
            endforeach;

            ?>


            <!-- TOPLAM FİYAT -->

            <div class="row">


                <div class="col-lg-12  geneltext2 text-right kalinyap p-2 border-bottom border-secondary"><span >SİPARİŞ TOPLAMI

					<?php
                    print_r(number_format(array_sum($toplam),2,",","."). " TL");

                    ?></span></div>

            </div>
            <!-- TOPLAM FİYAT -->





            <?php



            $teslimatbilgileriGetir=$this->model->Verial("teslimatbilgileri","where siparis_no=".$sipno);
            $AdresGetir=$this->model->Verial("adresler","where id=".$adresid);
            echo '<div class="row">		
				<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 border-dark">
					<div class="row">					
							<div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 text-left">
								<div class="row">
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 border-bottom border-secondary mb-2 geneltext2">
							<h5>KİŞİSEL BİLGİLER</h5>
							</div>					
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<span class="font-weight-bold">Ad : </span>'.$teslimatbilgileriGetir[0]["ad"].'
							</div>
							
							
								<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<span class="font-weight-bold">Soyad : </span>'.$teslimatbilgileriGetir[0]["soyad"].'
							</div>
							
							
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<span class="font-weight-bold">Mail :  </span>'.$teslimatbilgileriGetir[0]["mail"].'
							</div>
							
							
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<span class="font-weight-bold">Telefon : </span>'.$teslimatbilgileriGetir[0]["telefon"].'
							</div>					
					
							</div>							
							
							</div>	
							<hr>
							<div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 text-left">
								<div class="row">
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 border-bottom border-secondary mb-2 geneltext2">
							<h5>ADRES BİLGİSİ</h5>
							</div>					
							<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
							<span class="font-weight-bold">Adres : </span>'.$AdresGetir[0]["adres"].'
							</div>
					
							</div>
							</div>
					
					</div>	
				</div>
		</div>';

        else:

            $this->Bilgi->direktYonlen("/");

        endif;


    } //Yönetim Paneli Siparis Bilgileri Getir.

    function VarsayilanAdresYap2()
    {
        if ($_POST) :
            $uyeid = $this->Form->get("uyeid")->bosmu();
            $adresid = $this->Form->get("adresid")->bosmu();


            $this->model->Guncelle("adresler",
                array("varsayilan"),
                array(1),"id=".$adresid." and uyeid=" . $uyeid);


        else:

            $this->Bilgi->direktYonlen("/");

        endif;

    } // Varsayılarn tüm adresleri sıfırlıyor.

    function VarsayilanAdresYap()
    {
        if ($_POST) :
            $uyeid = $this->Form->get("uyeid")->bosmu();
            $adresid = $this->Form->get("adresid")->bosmu();


            $this->model->Guncelle("adresler",
                array("varsayilan"),
                array(0)," uyeid=" . $uyeid);


        else:

            $this->Bilgi->direktYonlen("/");

        endif;

    } // Seçilen adresi varsayılan yapıyor.

    function uyeyorumkontrol()
    {
        if ($_POST) :
            $yorumid = $this->Form->get("yorumid")->bosmu();
            $kriter = $this->Form->get("kriter")->bosmu();

          if($kriter==1):
              $this->model->Guncelle("yorumlar",
                  array("durum"),
                  array(1)," id=".$yorumid);



          elseif($kriter==2):
              $this->model->Delete("yorumlar","id=".$yorumid);

          endif;

        else:

            $this->Bilgi->direktYonlen("/");

        endif;

    } // Üye yorumları onay işlevi.

    function SelectKontrol(){
        $anaid=$_POST["anaid"];
      $cocukid=$_POST["cocukid"];
      if($_POST["kriter"]=="cocukgetir"){
          $gelendeger=$this->model->Verial("cocuk_kategori","where ana_kat_id=".$anaid);
          foreach ($gelendeger as $value) {
              Form::OlusturOption(array("value" => $value["id"]), false, $value["ad"]);
          }
      }

        if($_POST["kriter"]=="altgetir"){
            $gelendeger=$this->model->Verial("alt_kategori","where cocuk_kat_id=".$cocukid);
            foreach ($gelendeger as $value) {
                Form::OlusturOption(array("value" => $value["id"]), false, $value["ad"]);
            }
        }

        //--------------ANA EKRAN KONTROLLERİ BAŞLIYOR---------------
        if($_POST["kriter"]=="anaekrancocukgetir"){
            $gelendeger=$this->model->Verial("cocuk_kategori","where ana_kat_id=".$anaid);
            foreach ($gelendeger as $value) {
                Form::OlusturOption(array("value" => $value["id"]), false, $value["ad"]);
            }
        }

        if($_POST["kriter"]=="cocukekrankatgetir"){
            $gelendeger=$this->model->Verial("alt_kategori","where cocuk_kat_id=".$cocukid);
            foreach ($gelendeger as $value) {
                Form::OlusturOption(array("value" => $value["id"]), false, $value["ad"]);
            }
        }



    }//Select Kontrol

    function BultenTopluMailSil(){
        if($_POST):

        $idler = rtrim($_POST["idler"],",");
        $this->model->Delete("bulten","id IN(".$idler.")");
        else:
            $this->Bilgi->direktYonlen("/");
        endif;


    } // Bulten Toplu Mail Silme

    function UrunlerTopluSilme(){
        if($_POST):

            $idler = rtrim($_POST["idler"],",");
            $this->model->Delete("urunler","id IN(".$idler.")");
        else:
            $this->Bilgi->direktYonlen("/");
        endif;
    } // Urunler Toplu Mail Silme




}


?>