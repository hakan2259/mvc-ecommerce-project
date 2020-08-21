<?php require 'views/YonPanel/header.php'; ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->


        <div class="row">
            <div class="col-xl-12 col-md-12 mb-12 text-center">

                <?php

                if (isset($veri["bilgi"])) :


                    if (is_array($veri["bilgi"])) :

                        foreach ($veri["bilgi"] as $deger) :


                            echo '<div class="alert alert-danger mt-5">' . $deger . '</div>';


                        endforeach;

                    else:

                        echo $veri["bilgi"];
                    endif;


                endif;

                if (isset($veri["Urunguncelle"])) :

                    ?>
                    <!-- BAŞLIK -->

                    <div class="row text-left border-bottom-mvc mb-2">

                        <div class="col-xl-12 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2"><h1
                                    class="h3 mb-0 text-gray-800"><i class="fas fa-th basliktext"></i> ÜRÜN GÜNCELLE
                            </h1>
                        </div>

                        <?php $PanelHarici->BreadCrumb("urunler","Ürünler","Ürün Güncelleme")?>


                    </div>
                    <!-- BAŞLIK -->


                    <!--  FORMUN İSKELETİ-->

                    <div class="col-xl-12 col-md-12  text-center">


                        <div class="row text-center">

                            <div class="col-lg-10 col-xl-10 col-md-6 mx-auto">


                                <div class="row bg-gradient-beyazimsi">

                                    <div class="col-lg-12 col-md-12 col-sm-12 bg-gradient-mvc pt-2 basliktext2"><h3>Ürün
                                            Güncelleme</h3></div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="row">
                                            <!-- SOL -->
                                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 bloklararasi">
                                                <div class="row">
                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Ürün Adı
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">
                                                        <?php

                                                        Form::Olustur("1", array(
                                                            "action" => URL . "/panel/urunguncelleSon",
                                                            "method" => "POST",
                                                            "enctype" => "multipart/form-data"
                                                        ));

                                                        Form::Olustur("2", array("type" => "text", "class" => "form-control", "name" => "urunad", "value" => $veri["Urunguncelle"][0]["urunad"]));


                                                        ?>

                                                    </div>
                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Ana Kategori
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger"> <?php

                                                        Form::OlusturSelect("1", array("name" => "ana_kat_id", "class" => "form-control", "id" => "anaselect", "disabled" => "disabled"));

                                                        foreach ($veri["AnakategorilerTumu"] as $deger):

                                                            if ($deger["id"] == $veri["Urunguncelle"][0]["ana_kat_id"]):
                                                                Form::OlusturOption(array("value" => $deger["id"]), "selected", $deger["ad"]);

                                                            else:
                                                                Form::OlusturOption(array("value" => $deger["id"]), false, $deger["ad"]);
                                                            endif;


                                                        endforeach;

                                                        Form::OlusturSelect("2", null);


                                                        ?></div>


                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Çocuk Kategori
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger"> <?php

                                                        Form::OlusturSelect("1", array("name" => "cocuk_kat_id", "class" => "form-control", "id" => "cocukselect", "disabled" => "disabled"));

                                                        foreach ($veri["CocukkategorilerTumu"] as $deger):

                                                            if ($deger["id"] == $veri["Urunguncelle"][0]["cocuk_kat_id"]):
                                                                Form::OlusturOption(array("value" => $deger["id"]), "selected", $deger["ad"]);


                                                            endif;


                                                        endforeach;

                                                        Form::OlusturSelect("2", null);


                                                        ?></div>


                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Kategori<br> <span id="sifirla"> <i class="fas fa-angry fa-2x"
                                                                                            style="color: #8b0000; cursor: grabbing;"></i></span>
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger"> <?php

                                                        Form::OlusturSelect("1", array("name" => "katid", "class" => "form-control", "id" => "altselect", "disabled" => "disabled"));

                                                        foreach ($veri["data2"] as $deger):

                                                            if ($deger["id"] == $veri["Urunguncelle"][0]["katid"]):
                                                                Form::OlusturOption(array("value" => $deger["id"]), "selected", $deger["ad"]);

                                                            endif;


                                                        endforeach;

                                                        Form::OlusturSelect("2", null);


                                                        ?></div>

                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Kumaş
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">
                                                        <?php

                                                        Form::Olustur("2", array("type" => "text", "class" => "form-control", "name" => "kumas", "value" => $veri["Urunguncelle"][0]["kumas"]));


                                                        ?></div>

                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Üretim yeri
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">  <?php

                                                        Form::Olustur("2", array("type" => "text", "class" => "form-control", "name" => "uretimyeri", "value" => $veri["Urunguncelle"][0]["urtYeri"]));


                                                        ?></div>

                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Renk
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">  <?php

                                                        Form::Olustur("2", array("type" => "text", "class" => "form-control", "name" => "renk", "value" => $veri["Urunguncelle"][0]["renk"]));


                                                        ?></div>

                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Fiyat
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">  <?php

                                                        Form::Olustur("2", array("type" => "text", "class" => "form-control", "name" => "fiyat", "value" => $veri["Urunguncelle"][0]["fiyat"]));


                                                        ?></div>

                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Stok
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">  <?php

                                                        Form::Olustur("2", array("type" => "text", "class" => "form-control", "name" => "stok", "value" => $veri["Urunguncelle"][0]["stok"]));


                                                        ?></div>

                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Durum
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">
                                                        <?php

                                                        Form::OlusturSelect("1", array("name" => "durum", "class" => "form-control"));


                                                        Form::OlusturOption(array("value" => "0"), $veri["Urunguncelle"][0]["durum"] == 0 ? "selected" : false, "Standart");
                                                        Form::OlusturOption(array("value" => "1"), $veri["Urunguncelle"][0]["durum"] == 1 ? "selected" : false, "En çok Satanlar");
                                                        Form::OlusturOption(array("value" => "2"), $veri["Urunguncelle"][0]["durum"] == 2 ? "selected" : false, "Öne çıkanlar");


                                                        Form::OlusturSelect("2", null);


                                                        ?>


                                                    </div>


                                                    <div class="col-lg-4 col-xl-4 col-md-9 col-sm-12">
                                                        <img src="<?php echo URL . '/views/design/images/' . $veri["Urunguncelle"][0]["res1"]; ?>"
                                                             class="img-fluid"/>
                                                        <?php Form::Olustur("2", array("type" => "file", "class" => "form-control", "name" => "res1")); ?>


                                                    </div>
                                                    <div class="col-lg-4 col-xl-4 col-md-9 col-sm-12">
                                                        <img src="<?php echo URL . '/views/design/images/' . $veri["Urunguncelle"][0]["res2"]; ?>"
                                                             class="img-fluid"/>
                                                        <?php Form::Olustur("2", array("type" => "file", "class" => "form-control", "name" => "res2")); ?>
                                                    </div>
                                                    <div class="col-lg-4 col-xl-4 col-md-9 col-sm-12 ">
                                                        <img src="<?php echo URL . '/views/design/images/' . $veri["Urunguncelle"][0]["res3"]; ?>"
                                                             class="img-fluid"/>
                                                        <?php Form::Olustur("2", array("type" => "file", "class" => "form-control", "name" => "res3")); ?>
                                                    </div>


                                                </div>


                                            </div>
                                            <!-- SOL -->

                                            <!-- SAĞ -->
                                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 ">
                                                <div class="row">

                                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeElemanlarDiger">
                                                        Ürün Açıklama
                                                    </div>
                                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeElemanlarDiger">
                                                        <?php Form::Olustur("3", array("class" => "form-control", "name" => "urunaciklama", "rows" => 4), $veri["Urunguncelle"][0]["aciklama"]); ?>   </div>


                                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeElemanlarDiger">
                                                        Ürün Özellik
                                                    </div>
                                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeElemanlarDiger"> <?php Form::Olustur("3", array("class" => "form-control", "name" => "urunozellik", "rows" => 4), $veri["Urunguncelle"][0]["ozellik"]); ?> </div>

                                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeElemanlarDiger">
                                                        Ürün Ekstra Bilgi
                                                    </div>
                                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeElemanlarDiger"><?php Form::Olustur("3", array("class" => "form-control", "name" => "urunekstra", "rows" => 4), $veri["Urunguncelle"][0]["ekstraBilgi"]); ?> </div>


                                                </div>
                                            </div>
                                            <!-- SAĞ -->

                                        </div> <!-- İÇ ROW --></div> <!-- İÇ ANASI -->


                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeBtn">

                                        <?php
                                        Form::Olustur("2", array("type" => "hidden", "value" => $veri["Urunguncelle"][0]["id"], "class" => "btn btn-success", "name" => "kayitid"));

                                        Form::Olustur("2", array("type" => "submit", "value" => "ÜRÜN GÜNCELLEME", "class" => "btn btn-success"));


                                        Form::Olustur("kapat"); ?>

                                    </div>


                                </div> <!-- ROWWW -->


                            </div>


                        </div>
                    </div>


                <?php


                endif;

                //***********************************************************
                if (isset($veri["Urunekleme"])) :


                    ?>

                    <!-- BAŞLIK -->

                    <div class="row text-left border-bottom-mvc mb-2">

                        <div class="col-xl-12 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2"><h1
                                    class="h3 mb-0 text-gray-800"><i class="fas fa-th basliktext"></i> ÜRÜN EKLEME </h1>
                        </div>
                        <?php $PanelHarici->BreadCrumb("urunler","Ürünler","Ürün Ekleme")?>


                    </div>
                    <!-- BAŞLIK -->


                    <!--  FORMUN İSKELETİ-->

                    <div class="col-xl-12 col-md-12  text-center">


                        <div class="row text-center">

                            <div class="col-lg-10 col-xl-10 col-md-6 mx-auto">


                                <div class="row bg-gradient-beyazimsi">

                                    <div class="col-lg-12 col-md-12 col-sm-12 bg-gradient-mvc pt-2 basliktext2"><h3>Ürün
                                            Ekleme</h3></div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="row">
                                            <!-- SOL -->
                                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 bloklararasi">
                                                <div class="row">
                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Ürün Adı
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">
                                                        <?php

                                                        Form::Olustur("1", array(
                                                            "action" => URL . "/panel/urunekle",
                                                            "method" => "POST",
                                                            "enctype" => "multipart/form-data"
                                                        ));

                                                        Form::Olustur("2", array("type" => "text", "class" => "form-control", "name" => "urunad"));


                                                        ?>

                                                    </div>


                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Kategori
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger"> <?php

                                                        Form::OlusturSelect("1", array("name" => "katid", "class" => "form-control"));

                                                        foreach ($veri["data2"] as $deger):
                                                            Form::OlusturOption(array("value" => $deger["id"]), false, $deger["ad"]);

                                                        endforeach;

                                                        Form::OlusturSelect("2", null);


                                                        ?></div>


                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Kumaş
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">
                                                        <?php

                                                        Form::Olustur("2", array("type" => "text", "class" => "form-control", "name" => "kumas"));


                                                        ?></div>

                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Üretim yeri
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">  <?php

                                                        Form::Olustur("2", array("type" => "text", "class" => "form-control", "name" => "uretimyeri"));


                                                        ?></div>

                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Renk
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">  <?php

                                                        Form::Olustur("2", array("type" => "text", "class" => "form-control", "name" => "renk"));


                                                        ?></div>

                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Fiyat
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">  <?php

                                                        Form::Olustur("2", array("type" => "text", "class" => "form-control", "name" => "fiyat"));


                                                        ?></div>

                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Stok
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">  <?php

                                                        Form::Olustur("2", array("type" => "text", "class" => "form-control", "name" => "stok"));


                                                        ?></div>

                                                    <div class="col-lg-3 col-xl-3 col-md-3 col-sm-12 uruneklemeElemanlar">
                                                        Durum
                                                    </div>
                                                    <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">
                                                        <?php

                                                        Form::OlusturSelect("1", array("name" => "durum", "class" => "form-control"));


                                                        Form::OlusturOption(array("value" => "0"), false, "Standart");
                                                        Form::OlusturOption(array("value" => "1"), false, "En çok Satanlar");
                                                        Form::OlusturOption(array("value" => "2"), false, "Öne çıkanlar");


                                                        Form::OlusturSelect("2", null);


                                                        ?>


                                                    </div>

                                                    <div class="col-lg-4 col-xl-4 col-md-9 col-sm-12">
                                                        <?php Form::Olustur("2", array("type" => "file", "class" => "form-control", "name" => "res[]")); ?>


                                                    </div>
                                                    <div class="col-lg-4 col-xl-4 col-md-9 col-sm-12"> <?php Form::Olustur("2", array("type" => "file", "class" => "form-control", "name" => "res[]")); ?> </div>
                                                    <div class="col-lg-4 col-xl-4 col-md-9 col-sm-12 "> <?php Form::Olustur("2", array("type" => "file", "class" => "form-control", "name" => "res[]")); ?> </div>


                                                </div>


                                            </div>
                                            <!-- SOL -->

                                            <!-- SAĞ -->
                                            <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 ">
                                                <div class="row">

                                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeElemanlarDiger">
                                                        Ürün Açıklama
                                                    </div>
                                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeElemanlarDiger">
                                                        <?php Form::Olustur("3", array("class" => "form-control", "name" => "urunaciklama", "rows" => 4)); ?>   </div>


                                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeElemanlarDiger">
                                                        Ürün Özellik
                                                    </div>
                                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeElemanlarDiger"> <?php Form::Olustur("3", array("class" => "form-control", "name" => "urunozellik", "rows" => 4)); ?> </div>

                                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeElemanlarDiger">
                                                        Ürün Ekstra Bilgi
                                                    </div>
                                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeElemanlarDiger"><?php Form::Olustur("3", array("class" => "form-control", "name" => "urunekstra", "rows" => 4)); ?> </div>


                                                </div>
                                            </div>
                                            <!-- SAĞ -->

                                        </div> <!-- İÇ ROW --></div> <!-- İÇ ANASI -->


                                    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeBtn">

                                        <?php

                                        Form::Olustur("2", array("type" => "submit", "value" => "ÜRÜN EKLE", "class" => "btn btn-success"));


                                        Form::Olustur("kapat"); ?>

                                    </div>


                                </div> <!-- ROWWW -->


                            </div>


                        </div>
                    </div>

                    <!--  FORMUN İSKELETİ-->


                <?php


                endif;

                //**************************************************************


                if (isset($veri["data"])) :


                ?>


                <!-- BAŞLIK -->

                <div class="row text-left border-bottom-mvc mb-2">

                    <div class="col-lg-2 col-xl-2 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2"><h1
                                class="h3 mb-0 text-gray-800"><i class="fas fa-th basliktext"></i>ÜRÜNLER</h1></div>


                    <div class="col-lg-1 col-xl-1 col-md-12 mb-12 pt-1">


                        <div class="dropdown show">
                            <a class="btn btn-sm btn-mvc dropdown-toggle" href="" role="button"
                               id="dropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                YÖNETİM
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?php echo URL . "/panel/Urunekleme"; ?>">
                                    <i class="fas fa-plus"> Urun Ekleme</i>
                                </a>

                                <a class="dropdown-item" href="<?php echo URL . "/panel/TopluUrunEkleme"; ?>">
                                    <i class="fas fa-upload "> Toplu Urun Ekleme</i>
                                </a>

                                <a class="dropdown-item" href="<?php echo URL . "/panel/TopluUrunGuncelle"; ?>">
                                    <i class="fas fa-retweet "> Toplu Urun Guncelleme</i>
                                </a>

                                <a class="dropdown-item" href="<?php echo URL . "/panel/TopluUrunSilme"; ?>">
                                    <i class="fas fa-trash-alt "> Toplu Urun Silme</i>
                                </a>
                            </div>

                        </div>
                    </div>


                    <div class="col-lg-9 col-xl-9 col-md-12 mb-12 text-right">
                        <div class="row">

                            <div class="col-xl-2 ">
                                <?php
                                Form::Olustur("1", array(
                                    "action" => URL . "/panel/katgoregetir",
                                    "method" => "POST"
                                ));

                                Form::OlusturSelect("1", array("name" => "ana_kat_id", "class" => "form-control", "id" => "anaekranselect"));

                                foreach ($veri["data2"] as $deger):

                                    Form::OlusturOption(array("value" => $deger["id"]), false, $deger["ad"]);


                                endforeach;


                                Form::OlusturSelect("2", null);


                                ?>

                            </div>

                            <div class="col-xl-2 ">
                                <?php
                                Form::OlusturSelect("1", array("name" => "cocuk_kat_id", "class" => "form-control", "id" => "cocukekranselect"));


                                Form::OlusturOption(array("value" => "0"), false, "Seçiniz");


                                Form::OlusturSelect("2", null);


                                ?>
                            </div>


                            <div class="col-xl-2 ">
                                <?php
                                Form::OlusturSelect("1", array("name" => "katid", "class" => "form-control", "id" => "katidekranselect"));


                                Form::OlusturOption(array("value" => "0"), false, "Seçiniz");


                                Form::OlusturSelect("2", null);


                                ?>
                            </div>

                            <div class="col-xl-2 ">

                                <?php

                                Form::Olustur("2", array("type" => "submit", "value" => "GETİR", "class" => "btn btn-sm btn-mvc btn-block mt-1"));
                                Form::Olustur("kapat");
                                ?>
                            </div>

                            <div class="col-xl-3">
                                <?php

                                Form::Olustur("1", array(
                                    "action" => URL . "/panel/urunarama",
                                    "method" => "POST"
                                ));


                                Form::Olustur("2", array("type" => "text", "name" => "arama", "class" => "form-control", "placeholder" => "Kriter Giriniz"));

                                ?>
                            </div>
                            <div class="col-xl-1">

                                <?php

                                Form::Olustur("2", array("type" => "submit", "value" => "ARA", "class" => "btn btn-sm btn-mvc btn-block mt-1"));

                                Form::Olustur("kapat"); ?>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- BAŞLIK -->


                <!-- SİPARİŞİN İSKELETİ BAŞLIYOR -->
                <div class="row arkaplan p-1 mt-2 pb-0">
                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <?php
                        Form::olustur("2", array("type" => "checkbox", "class" => "float-left", "name" => "anacheck"));?>
                        <a id = "TopluUrunSilBtn" class="fas fa-trash-alt float-left ml-2" style="color: pink; cursor:pointer;"></a>


                        <span>Ürün Ad</span>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>Kategori</span>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>Bölüm</span>
                    </div>

                    <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>Kumas</span>
                    </div>

                    <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>Renk</span>
                    </div>

                    <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>Fiyat</span>

                    </div>

                    <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>Stok</span>

                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 border-right p-2 pt-3 geneltext bg-gradient-mvc">
                        <span>Satış Adeti</span>

                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 p-2 pt-3   geneltext bg-gradient-mvc">
                        <span>İşlemler</span>
                    </div>

                    <!--  ÜRÜNLER-->

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2 p-0" id="geldi">

                    </div>


                    <?php foreach ($veri["data"] as $value) : ?>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2 p-0">


                        <?php

                        echo '<div class="row border border-light" id="urunlercerceve">
							     
<div class="col-lg-2 col-xl-2 col-md-12 col-sm-12 text-dark kalinyap p-2">';

                        Form::olustur("2", array("type" => "checkbox", "value"=> $value["id"],"class" => "float-left ml-2", "name" => "silmecheck"));
                        echo $value["urunad"] . '</div>

<div class="col-lg-2 col-xl-2 col-md-12 col-sm-12 text-dark kalinyap p-2">';
                        $bilgicik = $PanelHarici->KategoriAl(
                            array(
                                "ana_kategori.ad As anakatad",
                                "cocuk_kategori.ad As cocukkatad",
                                "alt_kategori.ad As altkatad"
                            ),
                            array(
                                "ana_kategori",
                                "cocuk_kategori",
                                "alt_kategori"

                            ),
                            (
                                "(ana_kategori.id=" . $value['ana_kat_id'] . ") 
                                 AND (cocuk_kategori.id=" . $value['cocuk_kat_id'] . ") AND (alt_kategori.id=" . $value['katid'] . ")"
                            )


                        );
                        //Buraya bak

                        echo $bilgicik[0]["anakatad"] . "-" . $bilgicik[0]["cocukkatad"] . "-" . $bilgicik[0]["altkatad"];

                        echo '</div>

<div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 text-dark kalinyap p-2">';

                        echo $value["durum"] == 0 ? "<span class='text-info'>Standart</span>" : "";
                        echo $value["durum"] == 1 ? "<span class='text-danger'>En Çok Satan</span>" : "";
                        echo $value["durum"] == 2 ? "<span class='text-success'>Öne Çıkanlar</span>" : "";


                        echo '</div>
<div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 text-dark kalinyap p-2">' . $value["kumas"] . '</div>
<div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 text-dark kalinyap p-2">' . $value["renk"] . '</div>
<div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 text-dark kalinyap p-2">' . number_format($value["fiyat"], 2, ".", ",") . ' ₺</div> 
<div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 text-dark kalinyap p-2">' . $value["stok"] . '</div> 
<div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 text-dark kalinyap p-2">' . $value["satisadet"] . '</div> 
     
<div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 text-dark kalinyap p-2 text-right">
<a href="' . URL . '/panel/urunGuncelle/' . $value["id"] . '" class="fas fa-edit  guncelbuton"></a></div>
				   
				<div class="col-xl-1 col-lg-1 col-md-12 col-sm-12 text-dark kalinyap p-2 text-left">               
 <a href="' . URL . '/panel/urunSil/' . $value["id"] . '" class="fas fa-trash-alt   silbuton"></a>  </div>
 </div> 
 
 
  </div>';


                        endforeach;


                        ?>

                        <!-- -->


                    </div>

                    <!-- SİPARİŞİN İSKELETİ BİTİYOR -->

                    <?php

                    if (isset($veri["search"])) {
                        $link = "/panel/urunarama/" . $Harici->seo($veri["search"]) . "/";
                    } elseif (isset($veri["katid"])) {
                        $link = "/panel/katgoregetir/" . $veri["katid"] . "/";
                    } else {
                        $link = "/panel/urunler/";
                    }
                    Pagination::Numbers($veri["totalPage"], $link);

                    endif; ?>

                </div>
                <div class="col-lg-12 col-xl-12 col-md-12 mb-12 p-2 text-center">
                    <?php
                    if (!isset($veri["bilgi"])):
                        echo '<h5 class="mb-0 pt-1 text-gray-800">Toplam Ürün :  ' . $veri["totalData"] . '</h5></div>';
                    endif;


                    ?>


                </div>


            </div>


        </div>
    </div>

    <!--  FORMUN İSKELETİ-->


    </div>
    <!-- /.row bitiyor -->

    </div>
    <!-- /.container-fluid -->


<?php require 'views/YonPanel/footer.php'; ?>