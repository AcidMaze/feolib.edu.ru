<?php
/** @var yii\web\View $this */
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\LinkPager;
    use app\components\UserCertificateWidget;
    use yii\bootstrap4\Carousel;
    $this->title = 'Мой профиль';
    
?>
<div class="container">   
    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card" style = "border: 1px solid #57B92D; border-radius: 15px;">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <?php
                            $base = Yii::$app->request->baseUrl;
                            $changeImg = Url::to(['changeimg']);
                            if($user->img == null)
                            {
                                $img = "$base/images/default_profile.png";
                            }
                            else
                            {
                                $img = 'data:image/jpg;base64,'.base64_encode($user->img);
                            }
                            echo "
                                <div class = 'circle-image-user'>
                                    <img src='$img'>
                                </div>
                                <div class = 'mt-3'>
                                    <p class = 'p_style-5'>$user->name</p>
                                </div>
                                <div class='col-md-12 'mt-3' >
                                    <a class = 'btn btn-green' href = '$changeImg'>Изменить фотографию</a>
                                </div>
                            ";
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 mb-4">
            <div class="card" style = "border: 1px solid #57B92D; border-radius: 15px;">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <p class="mb-0 p_style-4">Мои ближайщие мероприятия</p>
                    </div>
                        <?php
                            if($user->address == null) $address = "Укажите свой адресс проживания";
                            else $address = $user->address;
                            if($user->age_date == null) $age_date = "Укажите дату рождения";
                            else $age_date = $user->age_date;
                            if($user->sex == 1) $sex = "Мужской";
                            else $sex = "Женский";
                            foreach ($models as $model) {
                                $url = Url::to(['sertificate', 'id' => $model->EventId, 'serfid' => $model->id]);
                                echo "
                                    <hr/>
                                    <div class='row'>
                                        <div class='col-md-2'>
                                            $model->UserEventDate
                                        </div>
                                        <div class='col-md-4'>
                                            $model->UserEventTitle
                                        </div>
                                        <div class='col-md-3'>
                                            $model->UserEventPlace
                                        </div>
                                        <div class='col-md-2'>
                                            <a class = 'btn btn-green' type = 'button' href = '$url'>Сертификат</a>
                                        </div> 
                                    </div>
                                ";
                            }
                        ?>
                </div>
                <div class="row">
                    <div class="mx-auto">
                        <h4>
                            <?=  
                                LinkPager::widget([
                                    'pagination' => $pages,
                                ]);
                            ?>
                        </h4>
                    </div>
                </div> 
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-3" style = "border: 1px solid #57B92D; border-radius: 15px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <p class="mb-0 p_style-5">Пол</p>
                        </div>
                        <div class="col-md-3 text-secondary">
                            <?=$sex?>
                        </div>
                        <div class="col-md-2">
                            <h6 class="mb-0 p_style-5">Паспорт</h6>
                        </div>
                        <div class="col-md-4 text-secondary">
                            <?=$user->passport?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="mb-0 p_style-5">Моб. телефон</h6>
                        </div>
                        <div class="col-md-3 text-secondary">
                            <?=$user->phone?>
                        </div>
                        <div class="col-md-2">
                            <h6 class="mb-0 p_style-5">Email</h6>
                        </div>
                        <div class="col-md-4 text-secondary">
                            <?=$user->email?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h6 class="mb-0 p_style-5">Дата рождения</h6>
                        </div>
                        <div class="col-md-3 text-secondary">
                            <?=$age_date?>
                        </div>
                        <div class="col-md-2">
                            <h6 class="mb-0 p_style-5">Адресс</h6>
                        </div>
                        <div class="col-md-4 text-secondary">
                            <?=$address?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <a class = "btn btn-green" href = "<?=Url::to(['editprofile']);?>">Редактировать</a>
                        <div class="col-md-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= UserCertificateWidget::widget([]) ?>

<?=
    Carousel::widget([
        'items' => [],
        'options' => ['style' => 'display:none'],
        'controls' => [
            '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
            '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
        ]
    ]);
?>