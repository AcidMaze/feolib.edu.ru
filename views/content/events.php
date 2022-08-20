<?php
/** @var yii\web\View $this */
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\widgets\LinkPager;
    use yii\bootstrap4\Carousel;
    $this->title = 'Мероприятия';
?>

<div class="container">
    <div class="row mt-5">
        <div class='col-lg-12'>
            <button id = 'showfilter' class = "btn btn-green check-send">Показать фильтры</button>
        </div>
        <div class = "filter-block mx-auto">
            <div class='col-lg-12'>
                <a href="<?=Url::to(['content/events', 'filter'=> 1]);?>" class = "btn btn-green mb-1">Актуальные</a>
                <a href="<?=Url::to(['content/events', 'filter'=> 2]);?>" class = "btn btn-green mb-1">Сначало новые</a>
                <a href="<?=Url::to(['content/events', 'filter'=> 3]);?>" class = "btn btn-blue mb-1">Сначало старые</a>
                <a href="<?=Url::to(['content/events', 'filter'=> 4]);?>" class = "btn btn-red mb-1">Заверешённые</a>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <?php
            foreach ($models as $model) {
                $img = base64_encode($model->title_img);
                $url = Url::to(['event', 'id' => $model->id]);
                echo "
                    <div class='col-lg-4 mb-3'>
                        <a href = '$url' style = 'text-decoration: none;'>
                            <div class = 'cart-event mx-auto'>
                                <div class='cart-event-img mb-2' style = 'background-image: url(data:image/jpg;base64,$img);'>
                                    <div class = 'cart-event-date-block-2'>
                                        <p class = 'event-date-p badge badge-pill badge-date'>$model->date</p>
                                    </div>   
                                    <span>$model->title</span>
                                </div>
                            </div>
                        </a>
                    </div>
                ";
            }
        ?>
    </div>
    <div class="row mt-1">
        <div class="mx-auto">
            <h2>
                <?=  
                    LinkPager::widget([
                        'pagination' => $pages,
                    ]);
                ?>
            </h2>
        </div>
    </div>
</div>

