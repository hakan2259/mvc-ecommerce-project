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

                        echo $veri["yonlen"];

                    endforeach;

                else:

                    echo $veri["bilgi"];
                endif;


            endif;

            if (isset($veri["veritabaniyedek"])) :


                ?>

                <!-- BAŞLIK -->

                <div class="row text-left border-bottom-mvc mb-2">

                    <div class="col-xl-12 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2"><h1
                                class="h3 mb-0 text-gray-800"><i class="fas fa-th basliktext"></i> VERİTABANI YEDEK ALMA
                             </h1></div>


                </div>
                <!-- BAŞLIK -->


                <!--  FORMUN İSKELETİ-->

                <div class="col-xl-12 col-md-12  text-center">


                    <div class="row text-center">

                        <div class="col-lg-10 col-xl-10 col-md-6 mx-auto">


                            <div class="row bg-gradient-beyazimsi">

                                <div class="col-lg-12 col-md-12 col-sm-12 bg-gradient-mvc pt-2 basliktext2"><h3>
                                        Veritabanı Yedek Al</h3></div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <!-- SOL -->
                                        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 bloklararasi">
                                            <div class="row">

                                                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeElemanlarDiger">
                                                    <?php

                                                    Form::Olustur("1", array(
                                                        "action" => URL . "/panel/yedekal",
                                                        "method" => "POST",

                                                    ));

                                                    echo "Local'e kaydet : ";
                                                    Form::Olustur("2", array("type" => "radio", "value" => "Local","name" => "YedekTercih"),false,"checked");
                                                    echo '<br>';
                                                    echo "Pc'ye kaydet : ";
                                                    Form::Olustur("2", array("type" => "radio", "value" => "Pc","name" => "YedekTercih"));
                                                    ?>

                                                </div>


                                            </div>


                                        </div>
                                        <!-- SOL -->



                                    </div> <!-- İÇ ROW --></div> <!-- İÇ ANASI -->


                                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeBtn">

                                    <?php


                                    Form::Olustur("2", array("type" => "submit", "value" => "YEDEĞİ AL", "class" => "btn btn-success","name" => "sistemBtn"));


                                    Form::Olustur("kapat"); ?>

                                </div>

                                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeBtn">
<?php
  $degerler= $PanelHarici->tekliVerial("ayarlar");
                                 echo '  <span class="text-center">Yedek Alma Zamanı : '.$degerler[0]["yedekzaman"].'  </span>

                                </div>';
                                 ?>


                            </div> <!-- ROWWW -->


                        </div>


                    </div>
                </div>


            <?php


            endif;

            //***********************************************************

            //**************************************************************

?>





        </div>
        <!-- /.row bitiyor -->

    </div>
    <!-- /.container-fluid -->





<?php require 'views/YonPanel/footer.php'; ?>