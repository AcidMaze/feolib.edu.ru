<?php

    use yii\helpers\Html;
    $this->title = 'Ничего не найдено';
    use yii\helpers\Url;
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>
                К сожалению по выбраной дате ничего не найденно
            </h2>
            <p class = 'p_style-4'>
                <a href="<?=Url::to(['content/events']);?>">Вернуться назад</a></li>
            </p>
            <button type = "button" class="btn btn-green" data-toggle = "modal" data-target="#exampleModal">
                                                    Сертификат
        </div>
    </div>
</div>
