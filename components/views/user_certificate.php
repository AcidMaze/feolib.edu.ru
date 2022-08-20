<?php

    use yii\bootstrap4\Modal;
?>
<div class="modal fade" id = "infoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="container col-lg-12 modal-dialog" role="document">
        <div class = "row card-invite mx-auto modal-content">
            <div class = "modal-header card-сertificate-title">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class = "card-сertificate-title-circle">
                    <span class="iconify icon-book" data-icon="akar-icons:book"></span>
                </div>
            </div>
            <article class="modal-body card-body-сertificate mx-auto">
                <div class="row m-1">
                    <div class="col-12 pt-5">
                        <p class = "pt-2 my-auto p_style-12">
                            <?php $uniqueID = Yii::$app->request->cookies->getValue('uniqueID');
                                    $name = $_SESSION['user'][$uniqueID]['name']; 
                            ?>
                            СЕРТИФИКАТ <br/>№ <?=$model->id?>
                        </p>
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-12 pt-2">
                        <p class = "pt-3 my-auto p_style-17">
                            <?=$name?>
                        </p>
                    </div>
                </div>
                <div class="row m-1">
                    <div class="col-12 pt-1">
                        <p class = "pt-3 my-auto p_style-16">
                            <?=$event->title?>
                        </p>
                    </div>
                </div>
                <div class="row m-1">
                    <div class="col-12 pt-5">
                        <p class = "pt-1 my-auto p_style-13">
                            <?=$event->place?>
                        </p>
                        <p class = "pt-3 my-auto p_style-15">
                            <?=$event->date?>
                        </p>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>

