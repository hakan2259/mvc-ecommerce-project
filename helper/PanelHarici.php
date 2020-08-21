<?php


class  PanelHarici extends Model
{

    public $sonuc, $siparisYonetim, $kategoriYonetim, $uyeYonetim, $urunYonetim, $muhasebeYonetim, $bultenYonetim,
        $yoneticiYonetim, $sistemayarYonetim, $sistembakimYonetim, $yoneticiYetki;

    function __construct()
    {

        parent::__construct();
        $this->sonuc = $this->db->listele("yonetim", "where id=" . Session::get("Adminid"));
        $this->siparisYonetim = $this->sonuc[0]["siparisYonetim"];
        $this->kategoriYonetim = $this->sonuc[0]["kategoriYonetim"];
        $this->uyeYonetim = $this->sonuc[0]["uyeYonetim"];
        $this->urunYonetim = $this->sonuc[0]["urunYonetim"];
        $this->muhasebeYonetim = $this->sonuc[0]["muhasebeYonetim"];
        $this->bultenYonetim = $this->sonuc[0]["bultenYonetim"];
        $this->yoneticiYonetim = $this->sonuc[0]["yoneticiYonetim"];
        $this->sistemayarYonetim = $this->sonuc[0]["sistemayarYonetim"];
        $this->sistembakimYonetim = $this->sonuc[0]["sistembakimYonetim"];
        $this->yoneticiYetki = $this->sonuc[0]["yetki"];

    }

    function MenuKontrol()
    {
        if ($this->siparisYonetim == 1):
            ?>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSiparisler"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-donate"></i>
                    <span>Sipariş Yönetimi</span>
                </a>
                <div id="collapseSiparisler" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo URL . "/panel/siparisler"; ?>">Siparisler</a>
                        <a class="collapse-item" href="<?php echo URL . "/panel/siparisiade"; ?>">İade</a>
                        <a class="collapse-item" href="<?php echo URL . "/panel/siparisdetayliarama"; ?>">Detaylı Arama</a>
                    </div>
                </div>
            </li>

        <?php

        endif;

        if ($this->kategoriYonetim == 1):
            ?>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL . "/panel/kategoriler"; ?>">
                    <i class="fas fa-sliders-h"></i>
                    <span>Kategori Yönetimi</span></a>
            </li>
        <?php
        endif;

        if ($this->uyeYonetim == 1):
            ?>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUyeler"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user"></i>
                    <span>Üye Yönetimi</span>
                </a>
                <div id="collapseUyeler" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo URL . "/panel/uyeler"; ?>">Üyeler</a>
                        <a class="collapse-item" href="<?php echo URL . "/panel/musteriyorumlar"; ?>">Üye Yorumları</a>

                    </div>
                </div>
            </li>
        <?php
        endif;

        if ($this->urunYonetim == 1):
            ?>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL . "/panel/urunler"; ?>">
                    <i class="fas  fa-award"></i>
                    <span>Ürün Yönetimi</span></a>
            </li>
        <?php
        endif;

        if ($this->muhasebeYonetim == 1):
            ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMuhasebe"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Muhasebe</span>
                </a>
                <div id="collapseMuhasebe" class="collapse" aria-labelledby="headingTwo"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Raporlar</a>
                        <a class="collapse-item" href="<?php echo URL . "/panel/bankabilgileri"; ?>">Banka Bilgileri</a>

                    </div>
                </div>
            </li>

        <?php
        endif;


        if ($this->bultenYonetim == 1):
            ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL . "/panel/bulten"; ?>">
                    <i class="fas  fa-envelope-square"></i>
                    <span>Bülten Yönetimi</span></a>
            </li>

        <?php
        endif;

        if ($this->yoneticiYonetim == 1):
            ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo URL . "/panel/yonetici"; ?>">
                    <i class="fas  fa-lock"></i>
                    <span>Yönetici Yönetimi</span></a>
            </li>


        <?php
        endif;

        if ($this->sistemayarYonetim == 1):
            ?>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAyar"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-wrench"></i>
                    <span>Sistem Ayarları</span>
                </a>
                <div id="collapseAyar" class="collapse" aria-labelledby="headingTwo"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo URL . "/panel/sistemayar"; ?>">Ayarlar</a>
                        <a class="collapse-item" href="<?php echo URL . "/panel/sistembakim"; ?>">Bakım</a>
                        <a class="collapse-item" href="<?php echo URL . "/panel/yedek"; ?>">Yedek</a>
                    </div>
                </div>
            </li>





        <?php
        endif;
    } // MENU KONTROL

    function YetkiKontrol($alan)
    {
        if ($this->$alan != 1) :
            header("Location:" . URL . "/panel");
            exit();
        endif;


    }
    function KategoriAl($requrestedData,$tables,$condition){

            return $this->db->JoinProcess($requrestedData,$tables,$condition);


    }

    function tekliVerial($tabloisim){
        return $this->db->listele($tabloisim);

    }

    function joinislemi($requrestedData,$tables,$condition){
        return $this->db->JoinProcess($requrestedData,$tables,$condition);
    }


    function Verial($tabloisim,$kosul) {

        return $this->db->listele($tabloisim,$kosul);

    }
    function BreadCrumb($analink,$anaisim,$bulunansayfa){
        echo '<div class="col-xl-12 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2">
         <a href="'.URL.'/panel/'.$analink.'">'.$anaisim.'</a> / '.$bulunansayfa.'

        </div>';

    }



}


?>