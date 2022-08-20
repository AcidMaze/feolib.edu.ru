<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use miloschuman\highcharts\Highcharts;
    use miloschuman\highcharts\SeriesDataHelper;
    $data = $dataProvider->getModels();
    $dataProvider1 = new \yii\data\ArrayDataProvider(['allModels' => $data]);
    $this->title = 'Статистика';
?>
<div class="container mt-5 mb-5 col-lg-11">
    <div class="row main-title-block">
        <div class="col-md-6 my-auto">
            <div class="float-left">
                <h1 class = "h1_style-1">
                    Статистика
                </h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 my-auto mx-auto">
            <?=
                Highcharts::widget([
                    'options' => [
                        'title' => ['text' => $model->title],
                        'xAxis' => [
                            
                            'categories' => new SeriesDataHelper($dataProvider1, ['date']),
                        ],
                        'yAxis' => [
                            'type' => 'datetime',
                            'title' => ['text' => 'Количество регистраций в день']
                        ],
                        'series' => [
                            [
                                'type' => 'spline',
                                'name' => 'Количество посетителей',
                                'data' => new SeriesDataHelper($dataProvider1, ['date:datetime']),
                            ],
                        ]
                    ]
                ]);
            ?>
        </div>
    </div>
    
</div>
