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

            if (isset($veri["sistembakim"])) :


                ?>

                <!-- BAŞLIK -->

                <div class="row text-left border-bottom-mvc mb-2">

                    <div class="col-xl-12 col-md-12 mb-12 border-left-mvc text-left p-2 mb-2"><h1
                                class="h3 mb-0 text-gray-800"><i class="fas fa-th basliktext"></i> SİSTEM BAKIM
                             </h1></div>


                </div>
                <!-- BAŞLIK -->


                <!--  FORMUN İSKELETİ-->

                <div class="col-xl-12 col-md-12  text-center">


                    <div class="row text-center">

                        <div class="col-lg-10 col-xl-10 col-md-6 mx-auto">


                            <div class="row bg-gradient-beyazimsi">

                                <div class="col-lg-12 col-md-12 col-sm-12 bg-gradient-mvc pt-2 basliktext2"><h3>
                                        Sistem Bakım</h3></div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="row">
                                        <!-- SOL -->
                                        <div class="col-lg-6 col-xl-6 col-md-6 col-sm-12 bloklararasi">
                                            <div class="row">

                                                <div class="col-lg-9 col-xl-9 col-md-9 col-sm-12 uruneklemeElemanlarDiger">
                                                    <?php

                                                    Form::Olustur("1", array(
                                                        "action" => URL . "/panel/bakimyap",
                                                        "method" => "POST",

                                                    ));




                                                    ?>

                                                </div>


                                            </div>


                                        </div>
                                        <!-- SOL -->



                                    </div> <!-- İÇ ROW --></div> <!-- İÇ ANASI -->


                                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeBtn">

                                    <?php


                                    Form::Olustur("2", array("type" => "submit", "value" => "BAKIM YAP", "class" => "btn btn-success","name" => "sistemBtn"));


                                    Form::Olustur("kapat"); ?>

                                </div>

                                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 uruneklemeBtn">
<?php
  $degerler= $PanelHarici->tekliVerial("ayarlar");
                                 echo '  <span class="text-center">Sistem Bakım Zamanı : '.$degerler[0]["bakimzaman"].'  </span>
 
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