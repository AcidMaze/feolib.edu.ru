<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\bootstrap4\Modal;
?>

<?php if (Yii::$app->session->hasFlash('inviteSubmitted')) { ?>
        <?php
            $this->registerJs(
                "$('#inviteModalSendOk').modal('show');",
                yii\web\View::POS_READY
            );
        ?>
        <div class="modal fade" id="inviteModalSendOk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="container mt-3 col-lg-12 modal-dialog" role="document">
                <div class = "row mx-auto modal-content card-сertificate">
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
                                    СЕРТИФИКАТ УЧАСТНИКА<br/>№ <?=$model->id?>
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
<?php } ?>

<div class="modal fade" id="inviteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="container mt-3 col-lg-12 modal-dialog" role="document">
        <div class = "row card-invite mx-auto modal-content">
            <?php $form = ActiveForm::begin(['id' => 'invite-form']); ?>
                <div class = "modal-header card-invite-title">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <div class = "card-invite-title-circle">
                        <span class="iconify icon-book" data-icon="akar-icons:book"></span>
                    </div>
                </div>
                <article class="modal-body card-body-invite mx-auto">
                    <div class="row m-5">
                        <p class = "pt-5 my-auto p_style-14">
                            <?=$event->title?>
                        </p>
                    </div>
                    <div class="row m-1">
                        <div class="col-12 pt-1">
                            <p class = "pt-1 my-auto p_style-13">
                                <?=$event->place?>
                            </p>
                            <p class = "pt-1 my-auto p_style-15">
                                <?=$event->date?>
                            </p>
                        </div>
                        <div class="col-12">
                            <?= $form->field($model, 'iaccept')->checkbox(['label' => 'Я не робот'])->label(false);?>
                        </div>
                        <div class="modal-footer mx-auto pt-3">
                            <div class="col-lg-5 my-auto">
                                <?= Html::resetButton('Закрыть', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) ?>
                            </div>
                            <div class="col-lg-6 my-auto">
                                <?= Html::submitInput('Принять участие', ['class' => 'btn btn-green']) ?>
                            </div>
                        </div>
                    </div>
                </article>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

