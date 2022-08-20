<?php
/** @var yii\web\View $this */
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\widgets\LinkPager;
    use yii\bootstrap4\Carousel;
    use app\components\CertificateWidget;
    $this->title = $event->title;
?>
<div class="container">
    <div class = "row">
        <div class="mt-5 mb-5 col-lg-12 event-info-block">
            <div class="mx-auto col-md-6">
                <p class = "pt-2 my-auto p_style-4">
                    <?=$event->title?>
                </p>
                <p class = "my-auto p_style-5">
                    <?=$event->place?>
                </p >
                <p class = "pt-2 my-auto p_style-6">
                    <?=$event->text?>
                </p >
            </div>
            <div class="mx-auto col-md-6 event-info-img">
                <div class = 'cart-event-date-block'>
                    <p class = 'event-date-p badge badge-pill badge-date'><?=$event->date?></p>
                </div>
                <?php
                    if($event->status == 1){
                        echo"
                            <div class = 'cart-event-status-block'>
                                <p class = 'event-status-p badge badge-pill badge-status-1'>Актуально</p>
                            </div>
                        ";
                    }
                    else {
                        echo"
                            <div class = 'cart-event-status-block'>
                                <p class = 'event-status-p badge badge-pill badge-status-2'>Завершено</p>
                            </div>
                        ";
                    }
                ?>
                <?=
                    Carousel::widget([
                        'items' => $img_items,
                        'options' => ['class' => 'carousel slide', 'data-interval' => '4000'],
                        'controls' => [
                            '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                            '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
                        ]
                    ]);
                ?>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class="my-auto col-lg-12 pl-3">
        <?php
  
            $url_stats = Url::to(['admin/statistics', 'id' => $event->id]); 
            if($_SESSION['user'][Yii::$app->request->cookies->getValue('uniqueID')]['adminlvl'] == 1)
            {
                echo"
                    <a href = '$url_stats' type='button' class='btn btn-green'>
                        <i class='bi bi-bar-chart-fill'></i>
                    </a>
                ";
            }
            if($event->status == 1)
            {
                if(Yii::$app->request->cookies->has('uniqueID'))
                {
                    echo'
                        <button type="button" class="btn btn-green" data-toggle="modal" data-id = "<?=$event->id?>" data-target="#inviteModal">
                            Принять участие
                        </button>
                    ';
                }
                else{

                    echo '
                        <h6>Авторизируйтесь чтобы принять участие.</h6>
                    ';
                }
            }
            else
            {
                echo '
                    <h6>Мероприятие окончено. Вы не можете принять участие.</h6>
                ';  
            }
        ?>
        </div>
    </div>
</div>
<?= CertificateWidget::widget([]) ?>