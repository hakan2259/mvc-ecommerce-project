<?php

class panel extends Controller
{

    public $aramadegeri, $sorguhatasi;

    function __construct()
    {
        parent::UploadLibrary(array("Bilgi", "View", "Form", "Upload", "Pagination", "FileExport", "Dosyaİslemleri"));


        $this->Modelyukle('adminpanel');
        Session::init();

        if (!Session::get("Adminad") && !Session::get("Adminid")) :
            $this->giris();
            exit();
        else:
            $this->yetkiKontrol = new PanelHarici();
        endif;
    }    // construct

    function giris()
    {
        if (Session::get("Adminad") && Session::get("Adminid")) :
            $this->Bilgi->direktYonlen("/panel/siparisler");
        else:
            $this->View->goster("YonPanel/sayfalar/index");

        endif;


    } // LOGİN GİRİŞ SAYFASI

    function Index()
    {
        if ($this->yetkiKontrol->yoneticiYetki == 2):
            $this->urunler();
        elseif ($this->yetkiKontrol->yoneticiYetki == 3):
            $this->uyeler();
        else:
            $this->siparisler();
        endif;


    } // VARSAYILAN OLARAK ÇALIŞIYOR. ilk çalışacak olan index

    //----------------------------------------------

    function siparisler()
    {

        $this->yetkiKontrol->YetkiKontrol("siparisYonetim");
        $this->View->goster("YonPanel/sayfalar/siparis", array(

            "data" => $this->model->SipesifikVerial("siparis_no from siparisler")

        ));


    } // SİPARİŞLERİN ANA EKRANI

    function siparisiade()
    {

        $this->yetkiKontrol->YetkiKontrol("siparisYonetim");
        $this->view->goster("YonPanel/sayfalar/siparisiade", array(

            "data" => $this->model->SipesifikVerial("siparis_no from siparisler where durum=2")

        ));


    } // SİPARİŞLERİN ANA EKRANI

    function kargoguncelle($sipno)
    {

        $this->yetkiKontrol->YetkiKontrol("siparisYonetim");
        $this->View->goster("YonPanel/sayfalar/siparis", array(

            "KargoGuncelle" => $this->model->Verial("siparisler", "where siparis_no=" . $sipno)

        ));


    }  // KARGO DURUM GÜNCELLEME

    function kargoguncelleSon()
    {
        $this->yetkiKontrol->YetkiKontrol("siparisYonetim");
        if ($_POST) :

            $sipno = $this->Form->get("sipno")->bosmu();
            $durum = $this->Form->get("durum")->bosmu();


            $sonuc = $this->model->Guncelle("siparisler",
                array("kargodurum"),
                array($durum), "siparis_no=" . $sipno);

            if ($sonuc):

                $this->View->goster("YonPanel/sayfalar/siparis",
                    array(
                        "bilgi" => $this->Bilgi->basarili("GÜNCELLEME BAŞARILI", "/panel/siparisler")
                    ));

            else:

                $this->View->goster("YonPanel/sayfalar/siparis",
                    array(
                        "data" => $this->model->Verial("siparisler", false),
                        "bilgi" => $this->Bilgi->uyari("danger", "Güncelleme sırasında hata oluştu.")
                    ));

            endif;

        else:
            $this->Bilgi->direktYonlen("/panel/siparisler");


        endif;


    } // KARGO DURUM GÜNCELLEME SON

    function siparisarama()
    {
        $this->yetkiKontrol->YetkiKontrol("siparisYonetim");
        if ($_POST) :
            $aramatercih = $this->Form->get("aramatercih")->bosmu();

            $aramaverisi = $this->Form->get("aramaverisi")->bosmu();


            if (!empty($this->Form->error)) :

                $this->View->goster("YonPanel/sayfalar/siparis",
                    array(
                        "bilgi" => $this->Bilgi->hata("BİLGİ GİRİLMELİDİR.", "/panel/siparisler", 1)
                    ));


            else:


                if ($aramatercih == "sipno") :


                    $this->View->goster("YonPanel/sayfalar/siparis", array(

                        "data" => $this->model->arama("siparisler", "siparis_no LIKE '" . $aramaverisi . "'")));

                elseif ($aramatercih == "uyebilgi"):


                    $bilgicek = $this->model->arama("uye_panel",
                        "id LIKE '%" . $aramaverisi . "%' or 
			ad LIKE '%" . $aramaverisi . "%'  or 
			soyad LIKE '%" . $aramaverisi . "%' or 
			telefon LIKE '%" . $aramaverisi . "%'");

                    if ($bilgicek):

                        $this->View->goster("YonPanel/sayfalar/siparis", array(
                            "data" => $this->model->Verial("siparisler", "where uyeid=" . $bilgicek[0]["id"])
                        ));

                    else:

                        $this->View->goster("YonPanel/sayfalar/siparis",
                            array(
                                "bilgi" => $this->Bilgi->hata("HİÇBİR KRİTER UYUŞMADI.", "/panel/siparisler", 2)
                            ));
                    endif;

                endif;


            endif;


        else:
            $this->Bilgi->direktYonlen("/panel/siparisler");


        endif;


    } // SİPARİŞ ARAMA

    function siparisdetayliarama()
    {
        $this->yetkiKontrol->YetkiKontrol("siparisYonetim");


        if ($_POST) :

            $siparis_no = $this->Form->get("siparis_no", true);

            $uyebilgi = $this->Form->get("uyebilgi", true);
            $kargodurum = $this->Form->SelectBoxGet("kargodurum");
            $odemeturu = $this->Form->SelectBoxGet("odemeturu");
            $durum = $this->Form->SelectBoxGet("durum");


            $tarih1 = $this->Form->get("tarih1", true);
            $tarih2 = $this->Form->get("tarih2", true);

            if (!empty($siparis_no)) : $this->aramadegeri .= " Sipariş Numarası : " . $siparis_no; endif;
            if (!empty($uyebilgi)) : $this->aramadegeri .= " Üye Bilgisi : " . $uyebilgi; endif;
            if (!empty($kargodurum)) :
                switch ($kargodurum):
                    case "0":
                        $this->aramadegeri .= " Kargo Durumu : Tedarik Sürecinde ";
                        break;
                    case "1":
                        $this->aramadegeri .= " Kargo Durumu : Paketleniyor ";
                        break;
                    case "2":
                        $this->aramadegeri .= " Kargo Durumu : Kargolandı ";
                        break;

                endswitch;
            endif;
            if (!empty($odemeturu)) : $this->aramadegeri .= " Ödeme Türü : " . $odemeturu; endif;
            if (!empty($durum)) :
                switch ($durum):
                    case "0":
                        $this->aramadegeri .= " Sipariş Durumu : İşlemde ";
                        break;
                    case "1":
                        $this->aramadegeri .= " Sipariş Durumu : Tamamlandı ";
                        break;
                    case "2":
                        $this->aramadegeri .= " Sipariş Durumu : İade ";
                        break;
                endswitch;

            endif;
            if (empty($siparis_no) && empty($uyebilgi) && empty($kargodurum) && empty($odemeturu) && empty($durum) && empty($tarih1) && empty($tarih2)) : $this->aramadegeri .= " Tüm Arama Sonuçları "; endif;

            if (!empty($tarih1) && !empty($tarih2)):
                $tarihbilgisi = "and DATE(tarih) BETWEEN '" . $tarih1 . "' and '" . $tarih2 . "'";

                $this->aramadegeri .= " Başlangıç Tarihi : " . $tarih1 . " Bitiş Tarihi : " . $tarih2;
            endif;

            if (!empty($uyebilgi)) :


                $bilgicek = $this->model->arama("uye_panel",
                    "id LIKE '%" . $uyebilgi . "%' or 
			ad LIKE '%" . $uyebilgi . "%'  or 
			soyad LIKE '%" . $uyebilgi . "%' or 
			telefon LIKE '%" . $uyebilgi . "%'");

                if ($bilgicek):
                    $this->View->goster("YonPanel/sayfalar/siparisdetayarama", array(

                        "data" => $this->model->arama("siparisler",
                            "uyeid='" . $bilgicek[0]["id"] . "' and
                            siparis_no LIKE '%" . $siparis_no . "%' and
                            kargodurum LIKE '%" . $kargodurum . "%' and
                            odemeturu LIKE '%" . $odemeturu . "%' and              
                            durum LIKE '%" . $durum . "%' " . @$tarihbilgisi . "
                      "),
                        "aramakriter" => $this->aramadegeri
                    ));
                endif;

            elseif (!empty($siparis_no)):
                $this->View->goster("YonPanel/sayfalar/siparisdetayarama", array(

                    "data" => $this->model->arama("siparisler", "siparis_no LIKE " . $siparis_no

                    ),
                    "aramakriter" => $this->aramadegeri
                ));
            else:
                $this->View->goster("YonPanel/sayfalar/siparisdetayarama", array(

                    "data" => $this->model->arama("siparisler", "kargodurum LIKE '%" . $kargodurum . "%' and odemeturu LIKE '%" . $odemeturu . "%' and durum LIKE '%" . $durum . "%' " . @$tarihbilgisi . ""),
                    "aramakriter" => $this->aramadegeri
                ));


            endif;


        else:
            $this->View->goster("YonPanel/sayfalar/siparisdetayarama", array(

                "varsayilan" => true

            ));


        endif;


    } // SİPARİŞ DETAYLI ARAMA

    function SiparislerExcelCreate()
    {
        $gelen = Session::get("number");

        $this->yetkiKontrol->YetkiKontrol("siparisYonetim");
        $this->model->excelAyarCek2("siparis_no,urunad,urunadet,urunfiyat,toplamfiyat,kargodurum,odemeturu,durum,tarih from siparisler where siparis_no IN(" . $gelen . ")");
        $this->FileExport->Excelaktar("SİPARİŞLER", NULL,
            array(
                "Sipariş Numarası",
                "Ürün Ad",
                "Ürün Adet",
                "Ürün Fiyat",
                "Toplam Fiyat",
                "Kargo Durum",
                "Odeme Turu",
                "Durum",
                "Tarih"
            ), $this->model->icerikler[0]);

    } // Siparisler Excel Çıktı.

    //----------------------------------------------

    function kategoriler()
    {
        $this->yetkiKontrol->YetkiKontrol("kategoriYonetim");

        $this->View->goster("YonPanel/sayfalar/kategoriler", array(

            "anakategori" => $this->model->Verial("ana_kategori", false),
            "cocukkategori" => $this->model->Verial("cocuk_kategori", false),
            "altkategori" => $this->model->Verial("alt_kategori", false)


        ));


    } // KATEGORİLER GELİYOR

    function kategoriGuncelle($kriter, $id)
    {
        $this->yetkiKontrol->YetkiKontrol("kategoriYonetim");

        $this->View->goster("YonPanel/sayfalar/kategoriguncelleme", array(

            "data" => $this->model->Verial($kriter . "_kategori", "where id=" . $id),
            "kriter" => $kriter,
            "AnaktegorilerTumu" => $this->model->Verial("ana_kategori", false),
            "CocukkategorilerTumu" => $this->model->Verial("cocuk_kategori", false)

        ));


    } // KATEGORİLER GÜNCELLE

    function kategoriGuncelSon()
    {
        $this->yetkiKontrol->YetkiKontrol("kategoriYonetim");
        if ($_POST) :
            $kriter = $this->Form->get("kriter")->bosmu();
            $kayitid = $this->Form->get("kayitid")->bosmu();
            $katad = $this->Form->get("katad")->bosmu();

            @$anakatid = $_POST["anakatid"];
            @$cocukkatid = $_POST["cocukkatid"];


            if (!empty($this->Form->error)) :

                $this->View->goster("YonPanel/sayfalar/kategoriguncelleme",
                    array(
                        "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/kategoriler", "UNSUCCESSFUL", "Category Name cannot be empty!", "warning")
                    ));

            else:


                if ($kriter == "ana") :

                    $sonuc = $this->model->Guncelle("ana_kategori",
                        array("ad"),
                        array($katad), "id=" . $kayitid);

                elseif ($kriter == "cocuk") :


                    $sonuc = $this->model->Guncelle("cocuk_kategori",
                        array("ana_kat_id", "ad"),
                        array($anakatid, $katad), "id=" . $kayitid);


                elseif ($kriter == "alt") :

                    $sonuc = $this->model->Guncelle("alt_kategori",
                        array("cocuk_kat_id", "ana_kat_id", "ad"),
                        array($cocukkatid, $anakatid, $katad), "id=" . $kayitid);
                endif;


                if ($sonuc):

                    $this->View->goster("YonPanel/sayfalar/kategoriguncelleme",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/kategoriler", "SUCCESSFUL", "Update Successful!", "success")

                        ));

                else:

                    $this->View->goster("YonPanel/sayfalar/kategoriguncelleme",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/kategoriler", "ERROR", "Error while updating!", "error")

                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direktYonlen("/panel/kategoriler");


        endif;


    } // KATEGORİLER GÜNCELLENENİYOR VE SON POST İŞLEMİ BURASI

    function kategoriSil($kriter, $id)
    {

        $this->yetkiKontrol->YetkiKontrol("kategoriYonetim");
        $sonuc = $this->model->Sil($kriter . "_kategori", "id=" . $id);


        if ($sonuc):

            $this->View->goster("YonPanel/sayfalar/kategoriler",
                array(
                    "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/kategoriler", "SUCCESSFUL", "Delete Successful!", "success")

                ));

        else:

            $this->View->goster("YonPanel/sayfalar/kategoriler",
                array(
                    "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/kategoriler", "ERROR", "Error during deletion!", "error")

                ));

        endif;


    } // KATEGORİ SİL

    function kategoriEkle($kriter)
    {
        $this->yetkiKontrol->YetkiKontrol("kategoriYonetim");
        $this->View->goster("YonPanel/sayfalar/kategoriEkle",
            array("kriter" => $kriter,
                "AnaktegorilerTumu" => $this->model->Verial("ana_kategori", false),
                "CocukkategorilerTumu" => $this->model->Verial("cocuk_kategori", false)));


    } // KATEGORİ EKLE

    function kategoriEkleSon()
    {
        $this->yetkiKontrol->YetkiKontrol("kategoriYonetim");

        if ($_POST) :
            $kriter = $this->Form->get("kriter")->bosmu();
            $katad = $this->Form->get("katad")->bosmu();

            @$anakatid = $_POST["anakatid"];
            @$cocukkatid = $_POST["cocukkatid"];


            if (!empty($this->Form->error)) :

                $this->View->goster("YonPanel/sayfalar/kategoriekle",
                    array(
                        "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/kategoriler", "UNSUCCESSFUL", "Category name must be entered!", "warning")

                    ));

            else:


                if ($kriter == "ana") :

                    $sonuc = $this->model->Ekleme("ana_kategori",
                        array("ad"),
                        array($katad));

                elseif ($kriter == "cocuk") :


                    $sonuc = $this->model->Ekleme("cocuk_kategori",
                        array("ana_kat_id", "ad"),
                        array($anakatid, $katad));


                elseif ($kriter == "alt") :

                    $sonuc = $this->model->Ekleme("alt_kategori",
                        array("cocuk_kat_id", "ana_kat_id", "ad"),
                        array($cocukkatid, $anakatid, $katad));
                endif;


                if ($sonuc):

                    $this->View->goster("YonPanel/sayfalar/kategoriekle",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/kategoriler", "SUCCESSFUL", "Adding Successful!", "success")

                        ));

                else:

                    $this->View->goster("YonPanel/sayfalar/kategoriekle",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/kategoriler", "ERROR", "Error during adding!", "error")

                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direktYonlen("/panel/kategoriler");


        endif;


    } // KATEGORİ EKLE SON

    function kategoriarama()
    {
        $this->yetkiKontrol->YetkiKontrol("kategoriYonetim");
        if ($_POST) :
            $aramatercih = $this->Form->get("aramatercih")->bosmu();

            $aramaverisi = $this->Form->get("aramaverisi")->bosmu();


            if (!empty($this->Form->error)) :

                $this->View->goster("YonPanel/sayfalar/kategoriler",
                    array(
                        "bilgi" => $this->Bilgi->hata("BİLGİ GİRİLMELİDİR.", "/panel/kategoriler", 1)
                    ));


            else:


                if ($aramatercih == "ana") :
                    $bilgicek = $this->model->arama("ana_kategori",
                        "ad LIKE '%" . $aramaverisi . "%'");

                elseif ($aramatercih == "cocuk"):

                    $bilgicek = $this->model->JoinP(
                        array(
                            "ana_kategori.ad as anakatad",
                            "cocuk_kategori.ad as cocukad",
                            "cocuk_kategori.id as cocukid"
                        ),
                        array(
                            "ana_kategori",
                            "cocuk_kategori",

                        ),
                        (
                            "(ana_kategori.id=cocuk_kategori.ana_kat_id)
                           AND cocuk_kategori.ad LIKE '%" . $aramaverisi . "%'"
                        )
                    );

                elseif ($aramatercih == "alt"):
                    $bilgicek = $this->model->JoinP(
                        array(
                            "ana_kategori.ad as anakatad",
                            "cocuk_kategori.ad as cocukkatad",
                            "alt_kategori.ad as altad",
                            "alt_kategori.id as altid"
                        ),
                        array(
                            "ana_kategori",
                            "cocuk_kategori",
                            "alt_kategori"
                        ),
                        (
                            "(ana_kategori.id=cocuk_kategori.ana_kat_id) AND (cocuk_kategori.id=alt_kategori.cocuk_kat_id)
                           AND alt_kategori.ad LIKE '%" . $aramaverisi . "%'"
                        )
                    );

                endif;
                if ($bilgicek):

                    $this->View->goster("YonPanel/sayfalar/kategoriler", array(
                        "kategoriaramasonuc" => $bilgicek,
                        "aranankelime" => $aramaverisi,
                        "kategori" => $aramatercih

                    ));

                else:

                    $this->View->goster("YonPanel/sayfalar/kategoriler",
                        array(
                            "bilgi" => $this->Bilgi->hata("HİÇBİR KRİTER UYUŞMADI.", "/panel/kategoriler", 2)
                        ));
                endif;

            endif;


        else:
            $this->Bilgi->direktYonlen("/panel/kategoriler");


        endif;


    } // KATEGORİ ARAMA

    //----------------------------------------------

    function uyeler($currentPage = false)
    {

        $this->yetkiKontrol->YetkiKontrol("uyeYonetim");
        $this->Pagination->PaginationCreate($this->model->Pagination("uye_panel"), $currentPage,
            $this->model->SingleData("uyelerGoruntuAdet", " from ayarlar"));

        $this->View->goster("YonPanel/sayfalar/uyeler", array(

            "data" => $this->model->Verial("uye_panel", "LIMIT " . $this->Pagination->limit . "," . $this->Pagination->showNumber),
            "totalPage" => $this->Pagination->totalPage,
            "totalData" => $this->model->Pagination("uye_panel")

        ));


    } // ÜYELER GELİYOR

    function uyeguncelleSon()
    {
        $this->yetkiKontrol->YetkiKontrol("uyeYonetim");

        if ($_POST) :

            $ad = $this->Form->get("ad")->bosmu();
            $soyad = $this->Form->get("soyad")->bosmu();
            $mail = $this->Form->get("mail")->bosmu();
            $telefon = $this->Form->get("telefon")->bosmu();
            //$durum=$this->Form->get("durum")->bosmu();
            $uyeid = $this->Form->get("uyeid")->bosmu();
            $durum = $_POST["durum"];

            if (!empty($this->Form->error)) :

                $this->View->goster("YonPanel/sayfalar/uyeler",
                    array(
                        "bilgi" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/panel/uyeler", 2)
                    ));

            else:


                $sonuc = $this->model->Guncelle("uye_panel",
                    array("ad", "soyad", "mail", "telefon", "durum"),
                    array($ad, $soyad, $mail, $telefon, $durum), "id=" . $uyeid);


                if ($sonuc):

                    $this->View->goster("YonPanel/sayfalar/uyeler",
                        array(
                            "bilgi" => $this->Bilgi->basarili("GÜNCELLEME BAŞARILI", "/panel/uyeler", 2)
                        ));

                else:

                    $this->View->goster("YonPanel/sayfalar/uyeler",
                        array(
                            "bilgi" => $this->Bilgi->hata("GÜNCELLEME SIRASINDA HATA OLUŞTU.", "/panel/uyeler", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direktYonlen("/panel/uyeler");


        endif;


    } // ÜYELER GÜNCEL SON

    function uyeGuncelle($id)
    {
        $this->yetkiKontrol->YetkiKontrol("uyeYonetim");

        $this->View->goster("YonPanel/sayfalar/uyeler", array(
            "Uyeguncelle" => $this->model->Verial("uye_panel", "where id=" . $id)
        ));


    } // ÜYELER GÜNCELLE

    function uyeSil($id)
    {

        $this->yetkiKontrol->YetkiKontrol("uyeYonetim");
        $sonuc = $this->model->Sil("uye_panel", "id=" . $id);


        if ($sonuc):

            $this->View->goster("YonPanel/sayfalar/uyeler",
                array(
                    "bilgi" => $this->Bilgi->basarili("SİLME BAŞARILI", "/panel/uyeler", 2)
                ));

        else:

            $this->View->goster("YonPanel/sayfalar/uyeler",
                array(
                    "bilgi" => $this->Bilgi->hata("SİLME SIRASINDA HATA OLUŞTU.", "/panel/uyeler", 2)
                ));

        endif;


    }  // ÜYE SİL

    function uyearama($word = false, $currentPage = false)
    {
        $this->yetkiKontrol->YetkiKontrol("uyeYonetim");
        if ($_POST || isset($word)) :
            if ($_POST):
                $aramaverisi = $this->Form->get("aramaverisi")->bosmu();
                $sorgum = !empty($this->Form->error);
            else:
                $aramaverisi = $word;
                $sorgum = empty($word);
            endif;


            if ($sorgum) :

                $this->View->goster("YonPanel/sayfalar/uyeler",
                    array(
                        "bilgi" => $this->Bilgi->hata("KRİTER GİRİLMELİDİR.", "/panel/uyeler", 2)
                    ));


            else:


                $bilgicek = $this->model->arama("uye_panel",
                    "id LIKE '%" . $aramaverisi . "%' or 
			ad LIKE '%" . $aramaverisi . "%'  or 
			soyad LIKE '%" . $aramaverisi . "%' or 
			telefon LIKE '%" . $aramaverisi . "%'");

                $this->Pagination->PaginationCreate(count($bilgicek), $currentPage,
                    $this->model->SingleData("uyelerAramaAdet", " from ayarlar"));

                if (count($bilgicek) > 0):

                    $this->View->goster("YonPanel/sayfalar/uyeler", array(

                        "data" => $this->model->arama("uye_panel",
                            "id LIKE '%" . $aramaverisi . "%' or 
			ad LIKE '%" . $aramaverisi . "%'  or 
			soyad LIKE '%" . $aramaverisi . "%' or 
			telefon LIKE '%" . $aramaverisi . "%' LIMIT " . $this->Pagination->limit . "," . $this->pagination->showNumber),
                        "totalPage" => $this->Pagination->totalPage,
                        "totalData" => count($bilgicek),
                        "search" => $aramaverisi
                    ));

                else:

                    $this->View->goster("YonPanel/sayfalar/uyeler",
                        array(
                            "bilgi" => $this->Bilgi->hata("HİÇBİR KRİTER UYUŞMADI.", "/panel/uyeler", 2)
                        ));
                endif;


            endif;


        else:
            $this->Bilgi->direktYonlen("/panel/uyeler");


        endif;


    } // ÜYE ARAMA

    function uyeadresbak($id)
    {
        $this->yetkiKontrol->YetkiKontrol("uyeYonetim");

        $this->View->goster("YonPanel/sayfalar/uyeler", array(
            "UyeadresBak" => $this->model->Verial("adresler", "where uyeid=" . $id)
        ));


    } // ÜYE ADRESLERİ

    function musteriyorumlar($currentPage = false)
    {
        $this->yetkiKontrol->YetkiKontrol("uyeYonetim");
        $this->Pagination->PaginationCreate($this->model->Pagination("yorumlar"), $currentPage,
            $this->model->SingleData("uyelerYorumAdet", " from ayarlar"));


        $this->View->goster("YonPanel/sayfalar/musteriyorumlar", array(

            "data" => $this->model->JoinP(
                array(
                    "urunler.urunad as urunad",
                    "yorumlar.*"

                ),
                array(
                    "urunler",
                    "yorumlar"
                ),
                "yorumlar.urunid=urunler.id order by durum asc LIMIT " . $this->Pagination->limit . "," . $this->Pagination->showNumber
            ),
            "toplamsayfa" => $this->Pagination->totalPage,
            "toplamveri" => $this->model->Pagination("yorumlar")

        ));

    } // ÜYE YORUMLARI


    //----------------------------------------------

    function urunler($currentPage = false)
    {
        $this->yetkiKontrol->YetkiKontrol("urunYonetim");
        $this->Pagination->PaginationCreate($this->model->Pagination("urunler"), $currentPage,
            $this->model->SingleData("urunlerGoruntuAdet", " from ayarlar"));

        $this->View->goster("YonPanel/sayfalar/urunler", array(

            "data" => $this->model->Verial("urunler", "LIMIT " . $this->Pagination->limit . "," . $this->Pagination->showNumber),
            "totalPage" => $this->Pagination->totalPage,
            "totalData" => $this->model->Pagination("urunler"),
            "data2" => $this->model->Verial("ana_kategori", false)

        ));


    }  // ÜRÜNLER GELİYOR

    function urunGuncelle($id)
    {
        $this->yetkiKontrol->YetkiKontrol("urunYonetim");

        $this->View->goster("YonPanel/sayfalar/urunler", array(
            "Urunguncelle" => $this->model->Verial("urunler", "where id=" . $id),
            "data2" => $this->model->Verial("alt_kategori", false),
            "AnakategorilerTumu" => $this->model->Verial("ana_kategori", false),
            "CocukkategorilerTumu" => $this->model->Verial("cocuk_kategori", false)


        ));


    } // ÜRÜNLER GÜNCELLE

    function urunguncelleSon()
    {
        $this->yetkiKontrol->YetkiKontrol("urunYonetim");

        if ($_POST) :
            $ana_kat_id = $this->Form->get("ana_kat_id")->bosmu();
            $cocuk_kat_id = $this->Form->get("cocuk_kat_id")->bosmu();

            $urunad = $this->Form->get("urunad")->bosmu();
            $katid = $this->Form->get("katid")->bosmu();
            $kumas = $this->Form->get("kumas")->bosmu();
            $uretimyeri = $this->Form->get("uretimyeri")->bosmu();
            $renk = $this->Form->get("renk")->bosmu();
            $fiyat = $this->Form->get("fiyat")->bosmu();
            $stok = $this->Form->get("stok")->bosmu();
            $durum = $this->Form->SelectBoxGet("durum");
            $urunaciklama = $this->Form->get("urunaciklama")->bosmu();
            $urunozellik = $this->Form->get("urunozellik")->bosmu();
            $urunekstra = $this->Form->get("urunekstra")->bosmu();
            $kayitid = $this->Form->get("kayitid")->bosmu();

            if ($this->Upload->uploadPostAl("res1")): $this->Upload->UploadDosyaKontrol("res1"); endif;
            if ($this->Upload->uploadPostAl("res2")): $this->Upload->UploadDosyaKontrol("res2"); endif;
            if ($this->Upload->uploadPostAl("res3")): $this->Upload->UploadDosyaKontrol("res3"); endif;


            if (!empty($this->Form->error)) :

                $this->View->goster("YonPanel/sayfalar/urunler",
                    array(
                        "bilgi" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/panel/urunler", 2)
                    ));

            elseif (!empty($this->Upload->error)) :

                $this->View->goster("YonPanel/sayfalar/urunler",
                    array(
                        "bilgi" => $this->Upload->error
                    ));

            else:


                $sutunlar = array("ana_kat_id", "cocuk_kat_id", "katid", "urunad", "durum", "aciklama", "kumas", "urtYeri", "renk", "fiyat", "stok", "ozellik", "ekstraBilgi");
                $veriler = array($ana_kat_id, $cocuk_kat_id, $katid, $urunad, $durum, $urunaciklama, $kumas, $uretimyeri, $renk, $fiyat, $stok, $urunozellik, $urunekstra);

                if ($this->Upload->uploadPostAl("res1")):
                    $sutunlar[] = "res1";
                    $veriler[] = $this->Upload->Yukle("res1", true);
                endif;
                if ($this->Upload->uploadPostAl("res2")):
                    $sutunlar[] = "res2";
                    $veriler[] = $this->Upload->Yukle("res2", true);
                endif;
                if ($this->Upload->uploadPostAl("res3")):
                    $sutunlar[] = "res3";
                    $veriler[] = $this->Upload->Yukle("res3", true);
                endif;


                $sonuc = $this->model->Guncelle("urunler",
                    $sutunlar,
                    $veriler, "id=" . $kayitid);


                if ($sonuc):

                    $this->View->goster("YonPanel/sayfalar/urunler",
                        array(
                            "bilgi" => $this->Bilgi->basarili("ÜRÜN BAŞARIYLA GÜNCELLENDİ", "/panel/urunler", 2)
                        ));

                else:

                    $this->View->goster("YonPanel/sayfalar/urunler",
                        array(
                            "bilgi" => $this->Bilgi->hata("GÜNCELLEME SIRASINDA HATA OLUŞTU.", "/panel/urunler", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direktYonlen("/panel/urunler");


        endif;


    } // ÜRÜNLER GÜNCEL SON

    function Urunekleme()
    {
        $this->yetkiKontrol->YetkiKontrol("urunYonetim");
        $this->View->goster("YonPanel/sayfalar/urunler", array(
            "Urunekleme" => true,
            "data2" => $this->model->Verial("alt_kategori", false),
            "bilgi" => true
        ));


    }     // ÜRÜN EKLEME

    //Toplu Urun İşlemleri --------------------

    function TopluUrunEkleme($son = false)
    {
        $this->yetkiKontrol->YetkiKontrol("urunYonetim");
        if ($son):
            $tercih = $this->Form->RadioButtonGet("dosyatercih");

            if ($tercih == "xml"):
                $this->Dosyaİslemleri->VerileriAyikla("dosya", "/urunler/urun", array("ana_kat_id", "cocuk_kat_id", "katid", "*urunad", "*res1", "*res2", "*res3", "durum", "*aciklama", "*kumas", "*urtYeri", "*renk", "fiyat", "stok", "*ozellik", "*ekstraBilgi"));

            else:
                $this->Dosyaİslemleri->JsonVerileriAyikla("dosya");
            endif;


            if (!empty($this->Dosyaİslemleri->error)) :

                $this->View->goster("YonPanel/sayfalar/topluurunislem",
                    array(
                        "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/urunler", "BAŞARISIZ", "Yüklenen XML Dosya Açılamadı", "warning")
                    ));

            else:
                $zipsonuc = $this->Upload->xmlzipresimyukleme("zipdosya");

                if (!empty($this->Upload->error)) :

                    $this->View->goster("YonPanel/sayfalar/topluurunislem",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/urunler", "BAŞARISIZ", "Yüklenen Zip Dosyası Hatalı", "warning")
                        ));

                else:

                    $sonuc = $this->model->TopluEkleme("urunler", array("ana_kat_id", "cocuk_kat_id", "katid", "urunad", "res1", "res2", "res3", "durum", "aciklama", "kumas", "urtYeri", "renk", "fiyat", "stok", "ozellik", "ekstraBilgi"), $this->Dosyaİslemleri->verileritut);


                    if ($sonuc):
                        $this->Upload->ZipResimYuklemeSon("zipdosya", $zipsonuc);
                        $this->View->goster("YonPanel/sayfalar/topluurunislem",
                            array(
                                "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/urunler", "BAŞARILI", "İÇERİ AKTARIM BAŞARI", "success")
                            ));

                    else:

                        $this->View->goster("YonPanel/sayfalar/topluurunislem",
                            array(
                                "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/urunler", "BAŞARISIZ", "EKLEME SIRASINDA HATA OLUŞTU", "warning")
                            ));

                    endif;

                endif;

            endif;

        else:
            $this->View->goster("YonPanel/sayfalar/topluurunislem", array(
                "topluekleme" => true,
                "bilgi" => true
            ));

        endif;


    } // TOPLU ÜRÜN EKLEME

    function TopluUrunGuncelle($son = false)
    {
        $this->yetkiKontrol->YetkiKontrol("urunYonetim");


        if ($son):
            $tercih = $this->Form->RadioButtonGet("dosyatercih");

            /*echo "<pre>";
            print_r($this->Dosyaİslemleri->sutunlardizi);
            print_r($this->Dosyaİslemleri->verilerdizi);
            echo "</pre>";*/

            if ($tercih == "xml"):
                $this->Dosyaİslemleri->TopluGuncellemeXML("dosya", "/urunler/urun");

            else:
                $this->Dosyaİslemleri->TopluGuncellemeJSON("dosya");
            endif;


            if (!empty($this->Dosyaİslemleri->error)) :

                $this->View->goster("YonPanel/sayfalar/topluurunislem",
                    array(
                        "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/urunler", "BAŞARISIZ", "Yüklenen XML Dosya Açılamadı", "warning")
                    ));

            else:
                if ($this->Dosyaİslemleri->resimvarmi):
                    $zipsonuc = $this->Upload->xmlzipresimyukleme("zipdosya");

                    if (!empty($this->Upload->error)) :

                        $this->View->goster("YonPanel/sayfalar/topluurunislem",
                            array(
                                "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/urunler", "BAŞARISIZ", "Yüklenen Zip Dosyası Hatalı", "warning")
                            ));
                        exit();
                    endif;


                endif;

                $this->model->TopluislemBaslat();

                for ($a = 0; $a < count($this->Dosyaİslemleri->verilerdizi); $a++):
                    $sonuc = $this->model->Guncelle("urunler",
                        $this->Dosyaİslemleri->sutunlardizi[$a],
                        $this->Dosyaİslemleri->verilerdizi[$a],
                        "id=" . $this->Dosyaİslemleri->verilerdizi[$a][0]);

                    if (!$sonuc):
                        $this->sorguhatasi = true;
                    else:
                        $this->sorguhatasi = false;
                    endif;

                endfor;

                if ($this->sorguhatasi):
                    $this->model->İslemlerigerial();

                else:
                    $this->model->TopluislemTamamla();
                endif;


                if (!$this->sorguhatasi):
                    if ($this->Dosyaİslemleri->resimvarmi):
                        $this->Upload->ZipResimYuklemeSon("zipdosya", $zipsonuc);
                    endif;

                    $this->View->goster("YonPanel/sayfalar/topluurunislem",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/urunler", "BAŞARILI", "İÇERİ AKTARIM BAŞARI", "success")
                        ));

                else:

                    $this->View->goster("YonPanel/sayfalar/topluurunislem",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/urunler", "BAŞARISIZ", "EKLEME SIRASINDA HATA OLUŞTU", "warning")
                        ));

                endif;


            endif;

        else:
            $this->View->goster("YonPanel/sayfalar/topluurunislem", array(
                "topluguncelle" => true,
                "bilgi" => true
            ));

        endif;


    } // TOPLU ÜRÜN GUNCELLE

    function TopluUrunSilme($son = false)
    {
        $this->yetkiKontrol->YetkiKontrol("urunYonetim");

        if ($son):

            $tercih = $this->Form->RadioButtonGet("dosyatercih");

            if ($tercih == "xml"):

                $sonhal = $this->Dosyaİslemleri->TopluSilmeXml("dosya", "/urunler/urun");

            else:

                $sonhal = $this->Dosyaİslemleri->TopluSilmeJson("dosya");

            endif;


            if (!empty($this->Dosyaİslemleri->error)) :

                $this->View->goster("YonPanel/sayfalar/topluurunislem",
                    array(
                        "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/urunler", "BAŞARISIZ", "Yüklenen  Dosya Açılamadı", "warning")
                    ));

            else:


                $sonuc = $this->model->Sil("urunler", "id IN($sonhal)");

                if ($sonuc):

                    $this->View->goster("YonPanel/sayfalar/topluurunislem",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/urunler", "BAŞARILI", "ÜRÜNLER SİLİNDİ", "success")
                        ));

                else:

                    $this->View->goster("YonPanel/sayfalar/topluurunislem",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/urunler", "BAŞARISIZ", "EKLEME SIRASINDA HATA OLUŞTU", "warning")
                        ));

                endif;


            endif;

        else:
            $this->View->goster("YonPanel/sayfalar/topluurunislem", array(
                "toplusilme" => true
            ));

        endif;


    } // TOPLU ÜRÜN SİLME

    //Toplu Urun İşlemleri ----------------------

    function urunekle()
    {


        /*   echo $_FILES["res1"]["name"].'<br>';
           echo $_FILES["res2"]["name"].'<br>';
           echo $_FILES["res3"]["name"].'<br>';


           foreach ($_FILES["res"]["name"] as $item) {
              echo $item.'<br>';
           }*/
        $this->yetkiKontrol->YetkiKontrol("urunYonetim");


        if ($_POST) :

            $urunad = $this->Form->get("urunad")->bosmu();
            $katid = $this->Form->get("katid")->bosmu();
            $kumas = $this->Form->get("kumas")->bosmu();
            $uretimyeri = $this->Form->get("uretimyeri")->bosmu();
            $renk = $this->Form->get("renk")->bosmu();
            $fiyat = $this->Form->get("fiyat")->bosmu();
            $stok = $this->Form->get("stok")->bosmu();
            $durum = $this->Form->get("durum")->bosmu();
            $urunaciklama = $this->Form->get("urunaciklama")->bosmu();
            $urunozellik = $this->Form->get("urunozellik")->bosmu();
            $urunekstra = $this->Form->get("urunekstra")->bosmu();

            $this->Upload->UploadResimYeniEkleme("res", 3);


            if (!empty($this->Form->error)) :

                $this->View->goster("YonPanel/sayfalar/urunler",
                    array(
                        "bilgi" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/panel/urunler", 2)
                    ));

            elseif (!empty($this->Upload->error)) :

                $this->View->goster("YonPanel/sayfalar/urunler",
                    array(
                        "bilgi" => $this->Upload->error
                    ));

            else:


                $dosyayukleme = $this->Upload->Yukle();

                $sonuc = $this->model->Ekleme("urunler",
                    array("katid", "urunad", "res1", "res2", "res3", "durum", "aciklama", "kumas", "urtYeri", "renk", "fiyat", "stok", "ozellik", "ekstraBilgi"),
                    array($katid, $urunad, $dosyayukleme[0], $dosyayukleme[1], $dosyayukleme[2], $durum, $urunaciklama, $kumas, $uretimyeri, $renk, $fiyat, $stok, $urunozellik, $urunekstra));


                if ($sonuc):

                    $this->View->goster("YonPanel/sayfalar/urunler",
                        array(
                            "bilgi" => $this->Bilgi->basarili("ÜRÜN BAŞARIYLA EKLENDİ", "/panel/urunler", 2)
                        ));

                else:

                    $this->View->goster("YonPanel/sayfalar/urunler",
                        array(
                            "bilgi" => $this->Bilgi->hata("EKLEME SIRASINDA HATA OLUŞTU.", "/panel/urunler", 2)
                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direktYonlen("/panel/urunler");


        endif;


    }     // ÜRÜN EKLEME SON

    function urunSil($id)
    {

        $this->yetkiKontrol->YetkiKontrol("urunYonetim");
        $sonuc = $this->model->Sil("urunler", "id=" . $id);


        if ($sonuc):

            $this->View->goster("YonPanel/sayfalar/urunler",
                array(
                    "bilgi" => $this->Bilgi->basarili("SİLME BAŞARILI", "/panel/urunler", 2)
                ));

        else:

            $this->View->goster("YonPanel/sayfalar/urunler",
                array(
                    "bilgi" => $this->Bilgi->hata("SİLME SIRASINDA HATA OLUŞTU.", "/panel/urunler", 2)
                ));

        endif;


    }  // ÜRÜNLER SİL

    function katgoregetir($katid = false, $currentPage = false)
    {
        $this->yetkiKontrol->YetkiKontrol("urunYonetim");
        if ($_POST) :

            $katid = $this->Form->get("katid")->bosmu();


            $bilgicek = $this->model->Verial("urunler", "where katid=" . $katid);

            $this->Pagination->PaginationCreate(count($bilgicek), $currentPage,
                $this->model->SingleData("urunlerKategoriAramaAdet", " from ayarlar"));

            if ($bilgicek):

                $this->View->goster("YonPanel/sayfalar/urunler", array(

                    "totalPage" => $this->Pagination->totalPage,
                    "totalData" => count($bilgicek),
                    "katid" => $katid,
                    "data" => $this->model->Verial("urunler", "where katid=" . $katid . " LIMIT " . $this->Pagination->limit . "," . $this->Pagination->showNumber),
                    "data2" => $this->model->Verial("ana_kategori", false)

                ));


            else:

                $this->View->goster("YonPanel/sayfalar/urunler",
                    array(
                        "bilgi" => $this->Bilgi->hata("HİÇBİR KRİTER UYUŞMADI.", "/panel/urunler", 2)
                    ));
            endif;

        elseif (isset($katid)):
            $bilgicek = $this->model->Verial("urunler", "where katid=" . $katid);

            $this->Pagination->PaginationCreate(count($bilgicek), $currentPage,
                $this->model->SingleData("urunlerKategoriAramaAdet", " from ayarlar"));

            $this->View->goster("YonPanel/sayfalar/urunler", array(

                "totalPage" => $this->Pagination->totalPage,
                "totalData" => count($bilgicek),
                "katid" => $katid,
                "data" => $this->model->Verial("urunler", "where katid=" . $katid . " LIMIT " . $this->Pagination->limit . "," . $this->Pagination->showNumber),
                "data2" => $this->model->Verial("alt_kategori", false)
            ));

        else:
            $this->Bilgi->direktYonlen("/panel/urunler");


        endif;


    } // ÜRÜNLERi KATEGORİYE GÖRE GETİR

    function urunarama($word = false, $currentPage = false)
    {
        $this->yetkiKontrol->YetkiKontrol("urunYonetim");
        if ($_POST || isset($word)) :
            if ($_POST):
                $aramaverisi = $this->Form->get("arama")->bosmu();
                $sorgum = !empty($this->Form->error);
            else:
                $aramaverisi = $word;
                $sorgum = empty($word);
            endif;


            if ($sorgum) :

                $this->View->goster("YonPanel/sayfalar/urunler",
                    array(
                        "bilgi" => $this->Bilgi->hata("KRİTER GİRİLMELİDİR.", "/panel/urunler", 2)
                    ));

            else:

                $bilgicek = $this->model->arama("urunler",
                    "urunad LIKE '%" . $aramaverisi . "%' or 
			kumas LIKE '%" . $aramaverisi . "%'  or 
			urtYeri LIKE '%" . $aramaverisi . "%' or 
			stok LIKE '%" . $aramaverisi . "%'");

                $this->Pagination->PaginationCreate(count($bilgicek), $currentPage,
                    $this->model->SingleData("urunlerAramaAdet", " from ayarlar"));

                if (count($bilgicek) > 0):

                    $this->View->goster("YonPanel/sayfalar/urunler", array(

                        "data" => $this->model->arama("urunler",
                            "urunad LIKE '%" . $aramaverisi . "%' or 
			kumas LIKE '%" . $aramaverisi . "%'  or 
			urtYeri LIKE '%" . $aramaverisi . "%' or 
			stok LIKE '%" . $aramaverisi . "%' LIMIT " . $this->Pagination->limit . "," . $this->Pagination->showNumber),
                        "totalPage" => $this->Pagination->totalPage,
                        "totalData" => count($bilgicek),
                        "search" => $aramaverisi,
                        "data2" => $this->model->Verial("ana_kategori", false)
                    ));

                else:

                    $this->View->goster("YonPanel/sayfalar/urunler",
                        array(
                            "bilgi" => $this->Bilgi->hata("HİÇBİR KRİTER UYUŞMADI.", "/panel/urunler", 2)
                        ));
                endif;


            endif;

        else:
            $this->Bilgi->direktYonlen("/panel/urunler");


        endif;


    } // ÜRÜNLER ARAMA

    //----------------------------------------------

    function bulten($currentPage = false)
    {

        $this->yetkiKontrol->YetkiKontrol("bultenYonetim");
        $this->Pagination->PaginationCreate($this->model->Pagination("bulten"), $currentPage,
            $this->model->SingleData("bultenGoruntuAdet", " from ayarlar"));

        $this->View->goster("YonPanel/sayfalar/bulten", array(

            "data" => $this->model->Verial("bulten", "LIMIT " . $this->Pagination->limit . "," . $this->Pagination->showNumber),
            "totalPage" => $this->Pagination->totalPage,
            "totalData" => $this->model->Pagination("bulten")


        ));


    }  // BULTEN GELİYOR

    function bultenExcelCreate()
    {
        $this->yetkiKontrol->YetkiKontrol("bultenYonetim");
        $this->model->excelAyarCek("bulten", false, "bulten");
        $this->FileExport->Excelaktar("Bültendeki mailler", NULL, array("Mail adres"), $this->model->icerikler);

    } // Bulten Excel Çıktı.

    function bultenTxtCreate()
    {
        $this->yetkiKontrol->YetkiKontrol("bultenYonetim");

        $this->FileExport->TxtCreate($this->model->Verial("bulten", false));

    } // Bulten TXT Çıktı.

    function mailSil($id)
    {
        $this->yetkiKontrol->YetkiKontrol("bultenYonetim");

        $sonuc = $this->model->Sil("bulten", "id=" . $id);


        if ($sonuc):

            $this->View->goster("YonPanel/sayfalar/bulten",
                array(
                    "bilgi" => $this->Bilgi->basarili("SİLME BAŞARILI", "/panel/bulten", 2)
                ));

        else:

            $this->View->goster("YonPanel/sayfalar/bulten",
                array(
                    "bilgi" => $this->Bilgi->hata("SİLME SIRASINDA HATA OLUŞTU.", "/panel/bulten", 2)
                ));

        endif;


    }  // BULTEN SİL

    function mailarama($word = false, $currentPage = false)
    {
        $this->yetkiKontrol->YetkiKontrol("bultenYonetim");

        if ($_POST || isset($word)) :
            if ($_POST):
                $aramaverisi = $this->Form->get("arama")->bosmu();
                $sorgum = !empty($this->Form->error);
            else:
                $aramaverisi = $word;
                $sorgum = empty($word);
            endif;


            if ($sorgum) :

                $this->View->goster("YonPanel/sayfalar/bulten",
                    array(
                        "bilgi" => $this->Bilgi->hata("MAİL ADRESİ GİRİLMELİDİR.", "/panel/bulten", 2)
                    ));


            else:


                $bilgicek = $this->model->arama("bulten",
                    "mailadres LIKE '%" . $aramaverisi . "%'");

                $this->Pagination->PaginationCreate(count($bilgicek), $currentPage,
                    $this->model->SingleData("bultenGoruntuAdet", " from ayarlar"));

                if (count($bilgicek) > 0):

                    $this->View->goster("YonPanel/sayfalar/bulten", array(

                        "data" => $this->model->arama("bulten",
                            "mailadres LIKE '%" . $aramaverisi . "%'  LIMIT " . $this->Pagination->limit . "," . $this->Pagination->showNumber),
                        "totalPage" => $this->Pagination->totalPage,
                        "totalData" => count($bilgicek),
                        "search" => $aramaverisi,

                    ));

                else:

                    $this->View->goster("YonPanel/sayfalar/bulten",
                        array(
                            "bilgi" => $this->Bilgi->hata("MAİL ADRESİ UYUŞMADI.", "/panel/bulten", 2)
                        ));
                endif;


            endif;


        else:
            $this->Bilgi->direktYonlen("/panel/bulten");


        endif;


    } // BULTEN ARAMA

    function tarihegoregetir($tarih1 = false, $tarih2 = false, $currentPage = false)
    {
        $this->yetkiKontrol->YetkiKontrol("bultenYonetim");
        if ($_POST || isset($tarih1) and isset($tarih2)) :
            if ($_POST):
                $tar1 = $this->Form->get("tar1")->bosmu();
                $tar2 = $this->Form->get("tar2")->bosmu();
                $sorgum = !empty($this->Form->error);
            else:
                $tar1 = $tarih1;
                $tar2 = $tarih2;
                $sorgum = empty($tarih1) && empty($tarih2);
            endif;

            if ($sorgum) :

                $this->View->goster("YonPanel/sayfalar/bulten",
                    array(
                        "bilgi" => $this->Bilgi->hata("TARİH GİRİLMELİDİR.", "/panel/bulten", 2)
                    ));


            else:


                $bilgicek = $this->model->Verial("bulten",
                    "where DATE(tarih) BETWEEN '" . $tar1 . "' and '" . $tar2 . "'");
                $this->Pagination->PaginationCreate(count($bilgicek), $currentPage,
                    $this->model->SingleData("bultenGoruntuAdet", " from ayarlar"));

                if (count($bilgicek) > 0):

                    $this->View->goster("YonPanel/sayfalar/bulten", array(

                        "data" => $this->model->Verial("bulten",
                            "where DATE(tarih) BETWEEN '" . $tar1 . "' and '" . $tar2 . "'  LIMIT " . $this->Pagination->limit . "," . $this->Pagination->showNumber),
                        "totalPage" => $this->Pagination->totalPage,
                        "totalData" => count($bilgicek),
                        "tariharama" => true,
                        "tarih1" => $tar1,
                        "tarih2" => $tar2
                    ));

                else:

                    $this->View->goster("YonPanel/sayfalar/bulten",
                        array(
                            "bilgi" => $this->Bilgi->hata("HİÇBİR TARİH UYUŞMADI.", "/panel/bulten", 2)
                        ));
                endif;


            endif;


        else:
            $this->Bilgi->direktYonlen("/panel/bulten");


        endif;


    } // TARİHE GÖRE ARAMA

    //----------------------------------------------

    function sistemayar()
    {
        $this->yetkiKontrol->YetkiKontrol("sistemayarYonetim");
        $this->View->goster("YonPanel/sayfalar/sistemayar", array(

            "sistemayar" => $this->model->Verial("ayarlar", false),


        ));


    }  // SiSTEM AYAR GELİYOR

    function sistemguncelle()
    {
        $this->yetkiKontrol->YetkiKontrol("sistemayarYonetim");

        if ($_POST) :

            $sloganUst1 = $this->Form->get("sloganUst1")->bosmu();
            $sloganAlt1 = $this->Form->get("sloganAlt1")->bosmu();
            $sloganUst2 = $this->Form->get("sloganUst2")->bosmu();
            $sloganAlt2 = $this->Form->get("sloganAlt2")->bosmu();
            $sloganUst3 = $this->Form->get("sloganUst3")->bosmu();
            $sloganAlt3 = $this->Form->get("sloganAlt3")->bosmu();

            $uyelerGoruntuAdet = $this->Form->get("uyelerGoruntuAdet")->bosmu();
            $uyelerAramaAdet = $this->Form->get("uyelerAramaAdet")->bosmu();
            $uyelerYorumAdet = $this->Form->get("uyelerYorumAdet")->bosmu();
            $urunlerGoruntuAdet = $this->Form->get("urunlerGoruntuAdet")->bosmu();
            $urunlerAramaAdet = $this->Form->get("urunlerAramaAdet")->bosmu();
            $urunlerKategoriAramaAdet = $this->Form->get("urunlerKategoriAramaAdet")->bosmu();
            $siteUrunlerGoruntuAdet = $this->Form->get("siteUrunlerGoruntuAdet")->bosmu();
            $bultenGoruntuAdet = $this->Form->get("bultenGoruntuAdet")->bosmu();


            $uyeYorumAdet = $this->Form->get("uyeYorumAdet")->bosmu();


            $title = $this->Form->get("title")->bosmu();
            $sayfaAciklama = $this->Form->get("sayfaAciklama")->bosmu();
            $anahtarKelime = $this->Form->get("anahtarKelime")->bosmu();
            $kayitid = $this->Form->get("kayitid")->bosmu();


            if (!empty($this->Form->error)) :

                $this->View->goster("YonPanel/sayfalar/sistemayar",
                    array(
                        "bilgi" => $this->Bilgi->hata("Tüm alanlar doldurulmalıdır.", "/panel/sistemayar", 2)
                    ));


            else:
                $sonuc = $this->model->Guncelle("ayarlar",
                    array("sloganUst1", "sloganAlt1", "sloganUst2", "sloganAlt2", "sloganUst3", "sloganAlt3", "title", "sayfaAciklama", "anahtarKelime"
                    , "uyelerGoruntuAdet", "uyelerAramaAdet", "uyelerYorumAdet", "urunlerGoruntuAdet", "urunlerAramaAdet", "urunlerKategoriAramaAdet", "siteUrunlerGoruntuAdet", "uyeYorumAdet", "bultenGoruntuAdet"),
                    array($sloganUst1, $sloganAlt1, $sloganUst2, $sloganAlt2, $sloganUst3, $sloganAlt3, $title, $sayfaAciklama, $anahtarKelime,
                        $uyelerGoruntuAdet, $uyelerAramaAdet, $uyelerYorumAdet, $urunlerGoruntuAdet, $urunlerAramaAdet,
                        $urunlerKategoriAramaAdet, $siteUrunlerGoruntuAdet, $uyeYorumAdet, $bultenGoruntuAdet), "id=" . $kayitid);

                if ($sonuc):

                    $this->View->goster("YonPanel/sayfalar/sistemayar",
                        array(
                            "bilgi" => $this->Bilgi->basarili("SİSTEM AYARLARI BAŞARIYLA GÜNCELLENDİ", "/panel/sistemayar", 2)
                        ));

                else:

                    $this->View->goster("YonPanel/sayfalar/sistemayar",
                        array(
                            "bilgi" => $this->Bilgi->hata("SİSTEM AYARLARI GÜNCELLEME SIRASINDA HATA OLUŞTU.", "/panel/sistemayar", 2)
                        ));

                endif;


            endif;


        else:
            $this->bilgi->direktYonlen("/panel/sistemayar");


        endif;


    } // SiSTEM AYAR GÜNCELLE

    //----------------------------------------------

    function sistembakim()
    {
        $this->yetkiKontrol->YetkiKontrol("sistembakimYonetim");
        $this->View->goster("YonPanel/sayfalar/bakim", array(

            "sistembakim" => true


        ));


    }  // SiSTEM BAKIM GELİYOR

    function bakimyap()
    {
        $this->yetkiKontrol->YetkiKontrol("sistembakimYonetim");
        if ($_POST["sistemBtn"]) :


            $bakim = $this->model->Bakim(DB_NAME);

            if ($bakim):

                $this->View->goster("YonPanel/sayfalar/bakim",
                    array(
                        "bilgi" => $this->Bilgi->basarili("BAKIM BAŞARIYLA YAPILDI.", "/panel/sistembakim", 2)
                    ));

            else:

                $this->View->goster("YonPanel/sayfalar/bakim",
                    array(
                        "bilgi" => $this->Bilgi->hata("BAKIM  SIRASINDA HATA OLUŞTU.", "/panel/sistembakim", 2)
                    ));

            endif;


        else:
            $this->Bilgi->direktYonlen("/panel/sistembakim");


        endif;

    } //BAKIM YAAP

    function yedek()
    {
        $this->yetkiKontrol->YetkiKontrol("sistembakimYonetim");
        $this->View->goster("YonPanel/sayfalar/yedek", array(

            "veritabaniyedek" => true


        ));


    }  // YEDEK GELİYOR

    function pcBackUp($deger)
    {
        $this->yetkiKontrol->YetkiKontrol("sistembakimYonetim");
        $this->FileExport->DbBackUpDownload($deger);
    }

    function yedekal()
    {
        $this->yetkiKontrol->YetkiKontrol("sistembakimYonetim");
        if ($_POST["sistemBtn"]) :


            $yedek = $this->model->Yedek(DB_NAME);
            $yedektercih = $this->Form->RadioButtonGet("YedekTercih");


            if ($yedek[1]):
                if ($yedektercih == "Local"):
                    $tarih = date("d.m.Y");
                    $olustur = fopen(YEDEKYOL . $tarih . ".sql", "w+");
                    fwrite($olustur, $yedek[0]);
                    fclose($olustur);


                    $this->View->goster("YonPanel/sayfalar/yedek",
                        array(
                            "bilgi" => $this->Bilgi->basarili("YEDEK BAŞARIYLA ALINDI.", "/panel/yedek", 2)
                        ));

                else:
                    $this->pcBackUp($yedek[0]);

                endif;

            else:

                $this->View->goster("YonPanel/sayfalar/yedek",
                    array(
                        "bilgi" => $this->Bilgi->hata("YEDEK ALMA  SIRASINDA HATA OLUŞTU.", "/panel/yedek", 2)
                    ));

            endif;


        else:
            $this->Bilgi->direktYonlen("/panel/yedek");


        endif;

    } //YEDEK  AL

    //-----------------------------------------------

    function yonetici()
    {
        $this->yetkiKontrol->YetkiKontrol("yoneticiYonetim");
        $this->View->goster("YonPanel/sayfalar/yonetici", array(

            "data" => $this->model->Verial("yonetim", false),


        ));
    } // YÖNETİCİ GELİYOR

    function yonSil($id)
    {
        $this->yetkiKontrol->YetkiKontrol("yoneticiYonetim");
        $sonuc = $this->model->Sil("yonetim", "id=" . $id);


        if ($sonuc):

            $this->View->goster("YonPanel/sayfalar/yonetici",
                array(
                    "bilgi" => $this->Bilgi->basarili("SİLME BAŞARILI", "/panel/yonetici", 2)
                ));

        else:

            $this->View->goster("YonPanel/sayfalar/yonetici",
                array(
                    "bilgi" => $this->Bilgi->hata("SİLME SIRASINDA HATA OLUŞTU.", "/panel/yonetici", 2)
                ));

        endif;
    } // YÖNETİCİ SİLİNİYOR

    function yonEkle($islem)
    {
        $this->yetkiKontrol->YetkiKontrol("yoneticiYonetim");
        if ($islem == "ilk"):
            $this->View->goster("YonPanel/sayfalar/yonetici", array(

                "yoneticiekle" => true,


            ));
        elseif ($islem == "son"):

            if ($_POST) :

                $yonadi = $this->Form->get("yonadi")->bosmu();
                $sif1 = $this->Form->get("sif1")->bosmu();
                $sif2 = $this->Form->get("sif2")->bosmu();
                $sifre = $this->Form->SifreTekrar($sif1, $sif2); // ŞİFRELİ YENİ HALİ ALIYORUM
                /*
                ÖNCE GELEN ŞFİREYİ SORGULAMAM LAZIM DOĞRUMU DİYE, EĞER MEVCUT ŞİFRE DOĞRU İSE
                DEVAM EDECEK HATALI İSE İŞLEM BİTECEK

                */
                $yetki = $this->Form->SelectBoxGet("yetki");
                $siparisYonetim = $this->Form->CheckboxGet("siparisYonetim");
                $kategoriYonetim = $this->Form->CheckboxGet("kategoriYonetim");
                $uyeYonetim = $this->Form->CheckboxGet("uyeYonetim");
                $urunYonetim = $this->Form->CheckboxGet("urunYonetim");
                $muhasebeYonetim = $this->Form->CheckboxGet("muhasebeYonetim");
                $bultenYonetim = $this->Form->CheckboxGet("bultenYonetim");
                $yoneticiYonetim = $this->Form->CheckboxGet("yoneticiYonetim");
                $sistemayarYonetim = $this->Form->CheckboxGet("sistemayarYonetim");
                $sistembakimYonetim = $this->Form->CheckboxGet("sistembakimYonetim");


                if (!empty($this->Form->error)) :
                    $this->View->goster("YonPanel/sayfalar/yonetici",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/yonetici", "UNSUCCESSFUL", "Girilen Bilgiler Hatalıdır!", "warning")

                        ));

                else:

                    $sonuc = $this->model->Ekleme("yonetim",
                        array("ad", "sifre", "yetki", "siparisYonetim", "kategoriYonetim", "uyeYonetim", "urunYonetim",
                            "muhasebeYonetim", "bultenYonetim", "yoneticiYonetim", "sistemayarYonetim", "sistembakimYonetim"),
                        array($yonadi, $sifre, $yetki, $siparisYonetim, $kategoriYonetim, $uyeYonetim, $urunYonetim,
                            $muhasebeYonetim, $bultenYonetim, $yoneticiYonetim, $sistemayarYonetim, $sistembakimYonetim));

                    if ($sonuc):


                        $this->View->goster("YonPanel/sayfalar/yonetici",
                            array(
                                "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/yonetici", "SUCCESSFUL", "Yeni Yönetici Eklendi.", "success")

                            ));


                    else:

                        $this->View->goster("YonPanel/sayfalar/yonetici",
                            array(
                                "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/yonetici", "ERROR", "Ekleme Sırasında Hata Oluştu.", "error")

                            ));

                    endif;
                endif;


            else:

                $this->Bilgi->direktYonlen("/");
            endif;
        endif;

    } // YÖNETİCİ EKLEME

    function yonGuncelle($islem, $id = false)
    {

        $this->yetkiKontrol->YetkiKontrol("yoneticiYonetim");
        if ($islem == "ilk"):
            $this->View->goster("YonPanel/sayfalar/yonetici", array(

                "YoneticiGuncelle" => $this->model->Verial("yonetim", "where id=" . $id)


            ));
        elseif ($islem == "son"):

            if ($_POST) :

                $yonadi = $this->Form->get("yonadi")->bosmu();
                $yetki = $this->Form->SelectBoxGet("yetki");
                $siparisYonetim = $this->Form->CheckboxGet("siparisYonetim");
                $kategoriYonetim = $this->Form->CheckboxGet("kategoriYonetim");
                $uyeYonetim = $this->Form->CheckboxGet("uyeYonetim");
                $urunYonetim = $this->Form->CheckboxGet("urunYonetim");
                $muhasebeYonetim = $this->Form->CheckboxGet("muhasebeYonetim");
                $bultenYonetim = $this->Form->CheckboxGet("bultenYonetim");
                $yoneticiYonetim = $this->Form->CheckboxGet("yoneticiYonetim");
                $sistemayarYonetim = $this->Form->CheckboxGet("sistemayarYonetim");
                $sistembakimYonetim = $this->Form->CheckboxGet("sistembakimYonetim");
                $yonid = $this->Form->get("yonid")->bosmu();


                if (!empty($this->Form->error)) :
                    $this->View->goster("YonPanel/sayfalar/yonetici",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/yonetici", "UNSUCCESSFUL", "Girilen Bilgiler Hatalıdır!", "warning")

                        ));

                else:

                    $sonuc = $this->model->Guncelle("yonetim",
                        array("ad", "yetki", "siparisYonetim", "kategoriYonetim", "uyeYonetim", "urunYonetim",
                            "muhasebeYonetim", "bultenYonetim", "yoneticiYonetim", "sistemayarYonetim", "sistembakimYonetim"),
                        array($yonadi, $yetki, $siparisYonetim, $kategoriYonetim, $uyeYonetim, $urunYonetim,
                            $muhasebeYonetim, $bultenYonetim, $yoneticiYonetim, $sistemayarYonetim, $sistembakimYonetim), "id=" . $yonid);

                    if ($sonuc):


                        $this->View->goster("YonPanel/sayfalar/yonetici",
                            array(
                                "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/yonetici", "SUCCESSFUL", "Yönetici Güncelleme Başarılı!.", "success")

                            ));


                    else:

                        $this->View->goster("YonPanel/sayfalar/yonetici",
                            array(
                                "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/yonetici", "ERROR", "Güncelleme Sırasında Hata Oluştu.", "error")

                            ));

                    endif;
                endif;


            else:

                $this->Bilgi->direktYonlen("/");
            endif;
        endif;

    } // YÖNETİCİ GÜNCELLE

    //-------------------------------------------------


    //----------------------------- ---------------------
    function bankabilgileri()
    {
        $this->yetkiKontrol->YetkiKontrol("muhasebeYonetim");
        $this->View->goster("YonPanel/sayfalar/bankabilgileri", array(

            "data" => $this->model->Verial("bankabilgileri", false),


        ));


    } // BANKA BİLGİLERİ GELİYOR

    function bankaguncelleSon()
    {
        $this->yetkiKontrol->YetkiKontrol("muhasebeYonetim");

        if ($_POST) :

            $bankaAd = $this->Form->get("bankaAd")->bosmu();
            $hesapAd = $this->Form->get("hesapAd")->bosmu();
            $hesapNo = $this->Form->get("hesapNo")->bosmu();
            $ibanNo = $this->Form->get("ibanNo")->bosmu();
            $bankaid = $this->Form->get("bankaid")->bosmu();


            if (!empty($this->Form->error)) :

                $this->View->goster("YonPanel/sayfalar/bankabilgileri",
                    array(
                        "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/bankabilgileri", "UNSUCCESSFUL", "Tüm Alanlar Doldurulmalıdır!", "warning")

                    ));

            else:


                $sonuc = $this->model->Guncelle("bankabilgileri",
                    array("banka_ad", "hesap_ad", "hesap_no", "iban_no"),
                    array($bankaAd, $hesapAd, $hesapNo, $ibanNo), "id=" . $bankaid);


                if ($sonuc):

                    $this->View->goster("YonPanel/sayfalar/bankabilgileri",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/bankabilgileri", "SUCCESSFUL", "GÜNCELLEME BAŞARILI", "success")

                        ));

                else:

                    $this->View->goster("YonPanel/sayfalar/bankabilgileri",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/bankabilgileri", "ERROR!", "GÜNCELLEME SIRASINDA HATA OLUŞTU!", "error")

                        ));

                endif;


            endif;


        else:
            $this->Bilgi->direktYonlen("/panel/bankabilgileri");


        endif;


    } // BANKA BİLGİLERİ GÜNCEL SON

    function bankaGuncelle($id)
    {

        $this->yetkiKontrol->YetkiKontrol("muhasebeYonetim");
        $this->View->goster("YonPanel/sayfalar/bankabilgileri", array(
            "Bankaguncelle" => $this->model->Verial("bankabilgileri", "where id=" . $id)
        ));


    } // BANKA BİLGİLERİ GÜNCELLE

    function bankaSil($id)
    {
        $this->yetkiKontrol->YetkiKontrol("muhasebeYonetim");

        $sonuc = $this->model->Sil("bankabilgileri", "id=" . $id);


        if ($sonuc):

            $this->View->goster("YonPanel/sayfalar/uyeler",
                array(
                    "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/bankabilgileri", "SUCCESSFUL", "Silme Başarılı!", "success")

                ));

        else:

            $this->View->goster("YonPanel/sayfalar/uyeler",
                array(
                    "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/bankabilgileri", "SUCCESSFUL", "Silme Sırasında Hata Oluştu!", "error")

                ));

        endif;


    }  // BANKA BİLGİLERİ SİL

    function bankaEkle($islem)
    {
        $this->yetkiKontrol->YetkiKontrol("muhasebeYonetim");
        if ($islem == "ilk"):
            $this->View->goster("YonPanel/sayfalar/bankabilgileri", array(
                "BankaEkle" => true
            ));

        elseif ($islem == "son"):
            if ($_POST) :

                $bankaAd = $this->Form->get("bankaAd")->bosmu();
                $hesapAd = $this->Form->get("hesapAd")->bosmu();
                $hesapNo = $this->Form->get("hesapNo")->bosmu();
                $ibanNo = $this->Form->get("ibanNo")->bosmu();


                if (!empty($this->Form->error)) :

                    $this->View->goster("YonPanel/sayfalar/bankabilgileri",
                        array(
                            "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/bankabilgileri", "UNSUCCESSFUL", "Tüm Alanlar Doldurulmalıdır!", "warning")

                        ));

                else:


                    $sonuc = $this->model->Ekleme("bankabilgileri",
                        array("banka_ad", "hesap_ad", "hesap_no", "iban_no"),
                        array($bankaAd, $hesapAd, $hesapNo, $ibanNo));


                    if ($sonuc):

                        $this->View->goster("YonPanel/sayfalar/bankabilgileri",
                            array(
                                "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/bankabilgileri", "SUCCESSFUL", "EKLEME BAŞARILI", "success")

                            ));

                    else:

                        $this->View->goster("YonPanel/sayfalar/bankabilgileri",
                            array(
                                "bilgi" => $this->Bilgi->SweetAlert(URL . "/panel/bankabilgileri", "ERROR!", "EKLEME SIRASINDA HATA OLUŞTU!", "error")

                            ));

                    endif;


                endif;


            else:
                $this->Bilgi->direktYonlen("/panel/bankabilgileri");


            endif;
        endif;

    }
    //--------------------------------------------------
}


?>