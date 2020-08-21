<?php

class uye extends Controller
{


    function __construct()
    {
        parent::UploadLibrary(array("Bilgi", "View", "Form", "Pagination", "Captcha"));


        $this->Modelyukle('uye');
        Session::init();


    }


    function giris()
    {


        $this->View->goster("sayfalar/giris");

    } // GİRİŞ SAYFASI

    function hesapOlustur()
    {


        $this->View->goster("sayfalar/uyeol",
            array("source" => $this->Captcha->CodeCreate("auto")));

    } // HESAP OLUŞTUR SAYFASI


    function kayitkontrol()
    {

        if ($_POST) :
            $ad = $this->Form->get("ad")->bosmu();
            $soyad = $this->Form->get("soyad")->bosmu();
            $mail = $this->Form->get("mail")->bosmu();
            $sifre = $this->Form->get("sifre")->bosmu();
            $sifretekrar = $this->Form->get("sifretekrar")->bosmu();
            $telefon = $this->Form->get("telefon")->bosmu();
            $guvenlik = $this->Form->get("guvenlik")->bosmu();
            $this->Form->GercektenMailmi($mail);
            $sifre = $this->Form->SifreTekrar($sifre, $sifretekrar);


            if (!empty($this->Form->error)) :


                $this->View->goster("sayfalar/uyeol",
                    array("hata" => $this->Form->error));

            elseif ($guvenlik != Session::get("code")):
                $this->View->goster("sayfalar/uyeol",
                    array("bilgi" => $this->Bilgi->hata("Güvenlik kodu hatalıdır", "/uye/hesapOlustur", 3)));

            else:

                $sonuc = $this->model->Ekleİslemi("uye_panel",
                    array("ad", "soyad", "mail", "sifre", "telefon"),
                    array($ad, $soyad, $mail, $sifre, $telefon));

                if ($sonuc):


                    $this->View->goster("sayfalar/uyeol",
                        array("bilgi" => $this->Bilgi->basarili("KAYIT BAŞARILI", "/uye/giris", 3)));


                else:

                    $this->View->goster("sayfalar/uyeol",
                        array("bilgi" =>
                            $this->Bilgi->uyari("danger", "Kayıt esnasında hata oluştu")));


                endif;

            endif;

        else:

            $this->Bilgi->direktYonlen("/");
        endif;


    }    // KAYIT KONTROL

    function cikis()
    {

        Session::destroy();
        $this->Bilgi->direktYonlen("/magaza");

    } // ÇIKIŞ


    function giriskontrol()
    {


        if ($_POST) :

            $ad = $this->Form->get("ad")->bosmu();
            $sifre = $this->Form->get("sifre")->bosmu();


            if (!empty($this->Form->error)) :
                $this->View->goster("sayfalar/giris",
                    array("bilgi" => $this->Bilgi->uyari("danger", "Ad ve şifre boş olamaz")));


            else:
                $sifre = $this->Form->sifrele($sifre);
                $sonuc = $this->model->GirisKontrol("uye_panel", "ad='$ad' and sifre='$sifre' and durum=1");

                if ($sonuc):


                    $this->Bilgi->direktYonlen("/uye/panel");

                    Session::init();
                    Session::set("kulad", $sonuc[0]["ad"]);
                    Session::set("uye", $sonuc[0]["id"]); // üyenin id'si taşıcam
                // 10 skfjsmfj5754154hfdsf
                //$this->Form->sifrele($sifre);

                else:

                    $this->View->goster("sayfalar/giris",
                        array("bilgi" =>
                            $this->Bilgi->uyari("danger", "Kullanıcı adı veya şifresi hatalıdır")));

                endif;

            endif; // hatanın

        else:

            $this->Bilgi->direktYonlen("/");
        endif;


    } // GİRİŞ KONTROL


    //*********** ÜYENİN PANELİNİ SAĞLAYAN FONKSİYONLAR

    function Yorumsil()
    {

        if ($_POST) :

            echo $this->model->Delete("yorumlar", "id=" . $_POST["yorumid"]);

        else:

            $this->Bilgi->direktYonlen("/");
        endif;

    } // YORUM SİL

    function adresSil()
    {

        if ($_POST) :

            echo $this->model->Delete("adresler", "id=" . $_POST["adresid"]);

        endif;

    } // ADRES SİL

    function YorumGuncelle()
    {

        if ($_POST) :
            /*$_POST["yorum"];
            $_POST["yorumid"];	*/

            // function yorumGuncelle($tabloisim,$sutunlar,$veriler,$kosul) {

            echo $this->model->Update("yorumlar",
                array("icerik", "durum"),
                array($_POST["yorum"], "0"), "id=" . $_POST["yorumid"]);


        else:

            $this->Bilgi->direktYonlen("/");
        endif;


    } // YORUM GÜNCELLE

    function AdresGuncelle()
    {

        if ($_POST) :

            echo $this->model->yorumGuncelle("adresler",
                array("adres"),
                array($_POST["adres"]), "id=" . $_POST["adresid"]);
        else:

            $this->Bilgi->direktYonlen("/");
        endif;


    } // ADRES GÜNCELLE


    function Panel()
    {

        $this->View->goster("sayfalar/panel", array(
            "siparisler" => $this->model->GetData("siparisler", "where uyeid=" . Session::get("uye"))));

    } // ANA PANEL

    function yorumlarim($currentPage = false)
    {
        $datas = $this->model->GetData("yorumlar", "where uyeid=" . Session::get("uye"));
        $this->Pagination->PaginationCreate(count($datas), $currentPage,
            $this->model->SingleData("uyeYorumAdet", " from ayarlar"));

        $this->View->goster("sayfalar/panel", array(
            "yorumlar" => $this->model->GetData("yorumlar", "where uyeid=" . Session::get("uye") . " LIMIT " . $this->Pagination->limit . "," . $this->Pagination->showNumber),
            "totalPage" => $this->Pagination->totalPage,
            "totalData" => count($datas)

        ));


    } // YORUMLAR

    function adreslerim()
    {


        $this->View->goster("sayfalar/panel", array(
            "adres" => $this->model->GetData("adresler", "where uyeid=" . Session::get("uye"))


        ));


    } // ADRESLER

    function adresekle()
    {


        $this->View->goster("sayfalar/panel", array(
            "adresekle" => "ekleme"


        ));


    } // ADRES EKLEME

    function adresEkleSon()
    {
        if ($_POST) :

            $yeniadres = $this->Form->get("yeniadres")->bosmu();
            $uyeid = $this->Form->get("uyeid")->bosmu();


            if (!empty($this->Form->error)) :
                $this->View->goster("sayfalar/panel",
                    array(
                        "adresekle" => "ekleme",
                        "bilgi" => $this->Bilgi->hata("Adres boş olmamalıdır.", "/uye/adresekle")
                    ));

            else:


                $sonuc = $this->model->Ekleİslemi("adresler",
                    array("uyeid", "adres"),
                    array($uyeid, $yeniadres));

                if ($sonuc):

                    $this->View->goster("sayfalar/panel",
                        array(
                            "adresekle" => "ok",
                            "bilgi" => $this->Bilgi->basarili("EKLEME BAŞARILI", "/uye/adreslerim")
                        ));

                else:

                    $this->View->goster("sayfalar/panel",
                        array(
                            "adresekle" => "ekleme",
                            "bilgi" => $this->Bilgi->hata("Kayıt Esnasında Hata Oluştu", "/uye/adreslerim")
                        ));

                endif;

            endif;


        else:

            $this->Bilgi->direktYonlen("/");
        endif;


    } // ADRES EKLENİYOR

    function hesapayarlarim()
    {


        $this->View->goster("sayfalar/panel", array(
            "ayarlar" => $this->model->GetData("uye_panel", "where id=" . Session::get("uye"))));


    } // HESAP AYARLARI

    function sifredegistir()
    {


        $this->View->goster("sayfalar/panel", array(
            "sifredegistir" => Session::get("uye")));


    } // ŞİFRE DEĞİŞTİR

    function siparislerim()
    {

        $this->View->goster("sayfalar/panel", array(
            "siparisler" => $this->model->GetData("siparisler", "where uyeid=" . Session::get("uye"))));


    } // SİPARİŞLER

    function ayarGuncelle()
    {
        if ($_POST) :

            $ad = $this->Form->get("ad")->bosmu();
            $soyad = $this->Form->get("soyad")->bosmu();
            $mail = $this->Form->get("mail")->bosmu();
            $telefon = $this->Form->get("telefon")->bosmu();
            $uyeid = $this->Form->get("uyeid")->bosmu();


            if (!empty($this->Form->error)) :
                $this->View->goster("sayfalar/panel",
                    array(
                        "ayarlar" => $this->model->GetData("uye_panel", "where id=" . Session::get("uye")),
                        "bilgi" => $this->Bilgi->uyari("danger", "Girilen bilgiler hatalıdır.")
                    ));

            else:


                $sonuc = $this->model->Update("uye_panel",
                    array("ad", "soyad", "mail", "telefon"),
                    array($ad, $soyad, $mail, $telefon), "id=" . $uyeid);

                if ($sonuc):

                    $this->View->goster("sayfalar/panel",
                        array(
                            "ayarlar" => "ok",
                            "bilgi" => $this->Bilgi->basarili("GÜNCELLEME BAŞARILI", "/uye/panel")
                        ));

                else:

                    $this->View->goster("sayfalar/panel",
                        array(
                            "ayarlar" => $this->model->GetData("uye_panel", "where id=" . Session::get("uye")),
                            "bilgi" => $this->Bilgi->uyari("danger", "Güncelleme sırasında hata oluştu.")
                        ));

                endif;

            endif;


        else:

            $this->Bilgi->direktYonlen("/");
        endif;


    } // ÜYE KENDİ AYARLARINI GÜNCELLİYOR.

    function sifreguncelle()
    {

        if ($_POST) :

            $msifre = $this->Form->get("msifre")->bosmu();
            $yen1 = $this->Form->get("yen1")->bosmu();
            $yen2 = $this->Form->get("yen2")->bosmu();
            $uyeid = $this->Form->get("uyeid")->bosmu();
            $sifre = $this->Form->SifreTekrar($yen1, $yen2); // ŞİFRELİ YENİ HALİ ALIYORUM
            /*
            ÖNCE GELEN ŞFİREYİ SORGULAMAM LAZIM DOĞRUMU DİYE, EĞER MEVCUT ŞİFRE DOĞRU İSE
            DEVAM EDECEK HATALI İSE İŞLEM BİTECEK

            */

            $msifre = $this->Form->sifrele($msifre);

            if (!empty($this->Form->error)) :
                $this->View->goster("sayfalar/panel",
                    array(
                        "sifredegistir" => Session::get("uye"),
                        "bilgi" => $this->Bilgi->uyari("danger", "Girilen bilgiler hatalıdır.")
                    ));

            else:


                $sonuc2 = $this->model->GirisKontrol("uye_panel", "ad='" . Session::get("kulad") . "' and sifre='$msifre'");

                if ($sonuc2):

                    $sonuc = $this->model->sifreGuncelle("uye_panel",
                        array("sifre"),
                        array($sifre), "id=" . $uyeid);

                    if ($sonuc):


                        $this->View->goster("sayfalar/panel",
                            array(
                                "sifredegistir" => "ok",
                                "bilgi" => $this->Bilgi->basarili("ŞİFRE DEĞİŞTİRME BAŞARILI", "/uye/panel")
                            ));


                    else:

                        $this->View->goster("sayfalar/panel",
                            array(
                                "sifredegistir" => Session::get("uye"),
                                "bilgi" => $this->Bilgi->uyari("danger", "Şifre değiştirme sırasında hata oluştu.")
                            ));

                    endif;

                else:


                    $this->View->goster("sayfalar/panel",
                        array(
                            "sifredegistir" => Session::get("uye"),
                            "bilgi" => $this->Bilgi->uyari("danger", "Mevcut şifre hatalıdır.")
                        ));


                endif;

            endif;


        else:

            $this->Bilgi->direktYonlen("/");
        endif;


    } // ÜYE ŞİFRESİNİ GÜNCELLİYOR.


    //***********  ÜYENİN PANELİNİ SAĞLAYAN FONKSİYONLAR


    function siparisTamamlandi()
    {

        if ($_POST) :


            $ad = $this->Form->get("ad")->bosmu();
            $soyad = $this->Form->get("soyad")->bosmu();
            $mail = $this->Form->get("mail")->bosmu();
            $telefon = $this->Form->get("telefon")->bosmu();
            $toplam = $this->Form->get("toplam")->bosmu();


            $odeme = $this->Form->get("odeme")->bosmu();
            $adrestercih = $this->Form->get("adrestercih")->bosmu();
            $odemeturu = ($odeme == 1) ? "Nakit" : "Hata";
            $tarih = date("d.m.Y");


            if (!empty($this->Form->error)) :
                $this->View->goster("sayfalar/siparisitamamla",
                    array("bilgi" => $this->Bilgi->uyari("danger", "Bilgiler eksiksiz doldurulmalıdır")));


            else:

                $siparisNo = mt_rand(0, 99999999);
                $uyeid = Session::get("uye");

                $this->model->TopluislemBaslat();


                if (isset($_COOKIE["urun"])) :


                    foreach ($_COOKIE["urun"] as $id => $adet) :

                        $GelenUrun = $this->model->GetData("urunler", "where id=" . $id);


                        $birimfiyat = $GelenUrun[0]["fiyat"] * $adet;

                        $this->model->SiparisTamamlama(
                            array(
                                $siparisNo,
                                $adrestercih,
                                $uyeid,
                                $GelenUrun[0]["urunad"],
                                $adet,
                                $GelenUrun[0]["fiyat"],
                                $birimfiyat,
                                $odemeturu,
                                $tarih

                            ));

                    $this->model->Update("urunler",
                            array("stok"),
                            array($GelenUrun[0]["stok"] - $adet), "id=" . $GelenUrun[0]["id"]);


                    endforeach;


                else:
                    // cookie  tanımlı değilse diye bir knotrol
                    $this->Bilgi->direktYonlen("/");

                endif;


                $this->model->TopluislemTamamla();


                Cookie::SepetiBosalt(); // sepeti boşalttık


                $TeslimatBilgileri = $this->model->Ekleİslemi("teslimatbilgileri",
                    array("siparis_no", "ad", "soyad", "mail", "telefon"),
                    array(
                        $siparisNo,
                        $ad,
                        $soyad,
                        $mail,
                        $telefon
                    ));


                if ($TeslimatBilgileri):

                    $this->View->goster("sayfalar/siparistamamlandi",
                        array(
                            "siparisno" => $siparisNo,
                            "toplamtutar" => $toplam,
                            "bankalar" => $this->model->GetData("bankabilgileri", false)
                        ));


                else:

                    $this->View->goster("sayfalar/siparisitamamla",
                        array("bilgi" => $this->Bilgi->uyari("danger", "Sipariş oluşturulurken hata oluştu")));

                endif;

            endif;


        else:

            $this->Bilgi->direktYonlen("/");
        endif;


    } // SİPARİŞ TAMAMLANDI


    //-------------------------------Admin işlemleriiii

    function admingiriskontrol()
    {

        if ($_POST) :

            $adminkuladi = $this->Form->get("adminkuladi")->bosmu();
            $adminsifre = $this->Form->get("adminsifre")->bosmu();


            if (!empty($this->Form->error)) :
                $this->View->goster("YonPanel/sayfalar/index",
                    array("bilgi" => $this->Bilgi->uyari("danger", "Ad ve şifre boş olamaz")));


            else:
                $sifre = $this->Form->sifrele($adminsifre);
                $sonuc = $this->model->GirisKontrol("yonetim", "ad='$adminkuladi' and sifre='$sifre'");

                if ($sonuc):
                    $this->Bilgi->direktYonlen("/panel/siparisler");

                    Session::init();
                    Session::set("Adminad", $sonuc[0]["ad"]);
                    Session::set("Adminid", $sonuc[0]["id"]); // üyenin id'si taşıcam
                // 10 skfjsmfj5754154hfdsf
                //$this->Form->sifrele($sifre);

                else:

                    $this->View->goster("YonPanel/sayfalar/index",
                        array("bilgi" =>
                            $this->Bilgi->uyari("danger", "Kullanıcı adı veya şifresi hatalıdır")));

                endif;

            endif; // hatanın

        else:

            $this->Bilgi->direktYonlen("/");
        endif;

    } // ADMİN GİRİS KONTROL

    function admincikis()
    {
        Session::destroy();
        $this->Bilgi->direktYonlen("/panel/giris");
    } //ADMİN ÇIKIŞ

    function adminsifredegistir()
    {


        $this->View->goster("YonPanel/sayfalar/sifredegistir", array(
            "sifredegistir" => Session::get("Adminid")));


    } // ŞİFRE DEĞİŞTİR

    function adminsifreguncelle()
    {

        if ($_POST) :

            $mevcutsifre = $this->Form->get("mevcutsifre")->bosmu();
            $yen1 = $this->Form->get("yen1")->bosmu();
            $yen2 = $this->Form->get("yen2")->bosmu();
            $adminid = $this->Form->get("adminid")->bosmu();
            $sifre = $this->Form->SifreTekrar($yen1, $yen2); // ŞİFRELİ YENİ HALİ ALIYORUM
            /*
            ÖNCE GELEN ŞFİREYİ SORGULAMAM LAZIM DOĞRUMU DİYE, EĞER MEVCUT ŞİFRE DOĞRU İSE
            DEVAM EDECEK HATALI İSE İŞLEM BİTECEK

            */

            $mevcutsifre = $this->Form->sifrele($mevcutsifre);

            if (!empty($this->Form->error)) :
                $this->View->goster("YonPanel/sayfalar/sifredegistir",
                    array(
                        "sifredegistir" => Session::get("Adminid"),
                        "bilgi" => $this->Bilgi->uyari("danger", "Girilen bilgiler hatalıdır.")
                    ));

            else:


                $sonuc2 = $this->model->GirisKontrol("yonetim", "ad='" . Session::get("Adminad") . "' and sifre='$mevcutsifre'");

                if ($sonuc2):

                    $sonuc = $this->model->Update("yonetim",
                        array("sifre"),
                        array($sifre), "id=" . $adminid);

                    if ($sonuc):


                        $this->View->goster("YonPanel/sayfalar/sifredegistir",
                            array(
                                "sifredegistir" => Session::get("Adminid"),
                                "bilgi" => $this->Bilgi->basarili("ŞİFRE DEĞİŞTİRME BAŞARILI", "/panel/siparisler")
                            ));


                    else:

                        $this->View->goster("YonPanel/sayfalar/sifredegistir",
                            array(
                                "sifredegistir" => Session::get("Adminid"),
                                "bilgi" => $this->Bilgi->uyari("danger", "Şifre değiştirme sırasında hata oluştu.")
                            ));

                    endif;

                else:


                    $this->View->goster("YonPanel/sayfalar/sifredegistir",
                        array(
                            "sifredegistir" => Session::get("Adminid"),
                            "bilgi" => $this->Bilgi->uyari("danger", "Mevcut şifre hatalıdır.")
                        ));


                endif;

            endif;


        else:

            $this->Bilgi->direktYonlen("/");
        endif;


    } // ADMİN ŞİFRESİNİ GÜNCELLİYOR.

    //-------------------------------Admin işlemleriiii

}


?>