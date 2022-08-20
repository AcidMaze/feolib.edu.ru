<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\grid\GridView;
    $this->title = 'Список всех мероприятий';
?>
<div class="container mt-5 mb-5 col-lg-11">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title:ntext',
            'place:ntext',
            'text:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия', 
                'headerOptions' => ['width' => '100'],
                'template' => '{update} {delete}{link}',
            ],
        ],
    ]); ?>
</div>
