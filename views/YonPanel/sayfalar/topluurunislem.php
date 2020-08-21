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



//Toplu Urun Ekleme

if (isset($veri["topluekleme"])) :


    ?>

    <!-- BAŞLIK -->

    <div class="row text-left border-bottom-mvc mb-2">

        <div class="col-xl-12 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2"><h1
                    class="h3 mb-0 text-gray-800"><i class="fas fa-th basliktext"></i> TOPLU ÜRÜN EKLEME </h1>
        </div>
        <?php $PanelHarici->BreadCrumb("urunler","Ürünler","Toplu Ürün Ekleme")?>

    </div>
    <!-- BAŞLIK -->


    <?php

    Form::Olustur("1", array(
        "action" => URL . "/panel/TopluUrunEkleme/son",
        "method" => "POST",
        "enctype" => "multipart/form-data"
    ));
    ?>

    <!--  FORMUN İSKELETİ-->

    <div class="col-xl-12 col-md-12  text-center">


        <div class="row text-center">

            <div class="col-xl-4 col-md-6 mx-auto">


                <div class="row bg-gradient-beyazimsi">

                    <div class="col-lg-12 col-md-12 col-sm-12 bg-gradient-mvc pt-2 basliktext2"><h3>Dosyaları Yükle</h3>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 formeleman">XML DOSYASI

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <?php
                                Form::Olustur("2",array("type"=> "radio","name" => "dosyatercih","value"=>"xml"));

                                ?>
                                Xml
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <?php
                                Form::Olustur("2",array("type"=> "radio","name" => "dosyatercih","value"=>"json"));

                                ?>
                                Json
                            </div>
                        </div>
                    </div>

                    <?php echo '<div class="col-lg-12 col-md-12 col-sm-12 formeleman">';
                    Form::Olustur("2", array("type" => "file", "name" => "dosya", "control" => "form-control m-2"));
                    echo '</div>';
                    ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 formeleman">RESİMLERİN DOSYASI(ZİP)</div>

                    <?php echo '<div class="col-lg-12 col-md-12 col-sm-12 formeleman">';
                    Form::Olustur("2", array("type" => "file", "name" => "zipdosya", "control" => "form-control m-2"));
                    echo '</div>';
                    ?>


                    <div class="col-lg-12 col-md-12 col-sm-12 formeleman nocizgi"><?php

                        Form::Olustur("2", array("type" => "submit", "value" => "EKLE", "class" => "btn btn-success"));


                        Form::Olustur("kapat"); ?></div>


                </div>


            </div>


        </div>
    </div>

    <!--  FORMUN İSKELETİ-->


    </div>


    </div>
    </div>

    <!--  FORMUN İSKELETİ-->


<?php


endif;



//Toplu Urun Ekleme
?>
<?php
// Toplu Urun Guncelleme
    if (isset($veri["topluguncelle"])) :


    ?>

    <!-- BAŞLIK -->

    <div class="row text-left border-bottom-mvc mb-2">

        <div class="col-xl-12 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2"><h1
                    class="h3 mb-0 text-gray-800"><i class="fas fa-th basliktext"></i> TOPLU ÜRÜN GUNCELLE </h1>
        </div>
        <?php $PanelHarici->BreadCrumb("urunler","Ürünler","Toplu Ürün Güncelleme")?>

    </div>
    <!-- BAŞLIK -->


<?php

Form::Olustur("1", array(
    "action" => URL . "/panel/TopluUrunGuncelle/son",
    "method" => "POST",
    "enctype" => "multipart/form-data"
));
?>

    <!--  FORMUN İSKELETİ-->

    <div class="col-xl-12 col-md-12  text-center">


        <div class="row text-center">

            <div class="col-xl-4 col-md-6 mx-auto">


                <div class="row bg-gradient-beyazimsi">

                    <div class="col-lg-12 col-md-12 col-sm-12 bg-gradient-mvc pt-2 basliktext2"><h3>Dosyaları Yükle</h3>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 formeleman">XML DOSYASI

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <?php
                                Form::Olustur("2",array("type"=> "radio","name" => "dosyatercih","value"=>"xml"));

                                ?>
                                Xml
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <?php
                                Form::Olustur("2",array("type"=> "radio","name" => "dosyatercih","value"=>"json"));

                                ?>
                                Json
                            </div>
                        </div>
                    </div>

                    <?php echo '<div class="col-lg-12 col-md-12 col-sm-12 formeleman">';
                    Form::Olustur("2", array("type" => "file", "name" => "dosya", "control" => "form-control m-2"));
                    echo '</div>';
                    ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 formeleman">RESİMLERİN DOSYASI(ZİP)</div>

                    <?php echo '<div class="col-lg-12 col-md-12 col-sm-12 formeleman">';
                    Form::Olustur("2", array("type" => "file", "name" => "zipdosya", "control" => "form-control m-2"));
                    echo '</div>';
                    ?>


                    <div class="col-lg-12 col-md-12 col-sm-12 formeleman nocizgi"><?php

                        Form::Olustur("2", array("type" => "submit", "value" => "GUNCELLE", "class" => "btn btn-success"));


                        Form::Olustur("kapat"); ?></div>


                </div>


            </div>


        </div>
    </div>

    <!--  FORMUN İSKELETİ-->


    </div>


    </div>
    </div>

    <!--  FORMUN İSKELETİ-->


<?php


endif;
// Toplu Urun Guncelleme
?>

<?php
// Toplu Urun Guncelleme
if (isset($veri["toplusilme"])) :


    ?>

    <!-- BAŞLIK -->

    <div class="row text-left border-bottom-mvc mb-2">

        <div class="col-xl-12 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2"><h1
                    class="h3 mb-0 text-gray-800"><i class="fas fa-th basliktext"></i> TOPLU ÜRÜN SİLME </h1>
        </div>

        <?php $PanelHarici->BreadCrumb("urunler","Ürünler","Toplu Ürün Silme")?>


    </div>
    <!-- BAŞLIK -->


    <?php

    Form::Olustur("1", array(
        "action" => URL . "/panel/TopluUrunSilme/son",
        "method" => "POST",
        "enctype" => "multipart/form-data"
    ));
    ?>

    <!--  FORMUN İSKELETİ-->

    <div class="col-xl-12 col-md-12  text-center">


        <div class="row text-center">

            <div class="col-xl-4 col-md-6 mx-auto">


                <div class="row bg-gradient-beyazimsi">

                    <div class="col-lg-12 col-md-12 col-sm-12 bg-gradient-mvc pt-2 basliktext2"><h3>Dosyaları Yükle</h3>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 formeleman">XML DOSYASI

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <?php
                                Form::Olustur("2",array("type"=> "radio","name" => "dosyatercih","value"=>"xml"));

                                ?>
                                Xml
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <?php
                                Form::Olustur("2",array("type"=> "radio","name" => "dosyatercih","value"=>"json"));

                                ?>
                                Json
                            </div>
                        </div>
                    </div>

                    <?php echo '<div class="col-lg-12 col-md-12 col-sm-12 formeleman">';
                    Form::Olustur("2", array("type" => "file", "name" => "dosya", "control" => "form-control m-2"));
                    echo '</div>';
                    ?>


                    <div class="col-lg-12 col-md-12 col-sm-12 formeleman nocizgi"><?php

                        Form::Olustur("2", array("type" => "submit", "value" => "SİL", "class" => "btn btn-success"));


                        Form::Olustur("kapat"); ?></div>


                </div>


            </div>


        </div>
    </div>

    <!--  FORMUN İSKELETİ-->


    </div>


    </div>
    </div>

    <!--  FORMUN İSKELETİ-->


<?php


endif;
// Toplu Urun Guncelleme
?>






    </div>
    <!-- /.row bitiyor -->

    </div>
    <!-- /.container-fluid -->


<?php require 'views/YonPanel/footer.php'; ?>