<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use kartik\date\DatePicker;
    $this->title = 'Редактировать пользователя';
?>
<div class="container mt-5 mb-5 col-lg-8">
    <?php $form = ActiveForm::begin(['id' => 'update_user-form','options' => ['class' => 'card bg-light']])?>
        <article class="card-body mx-auto">
            <h2 class="card-title mt-3 text-center">Редактирование данных пользователя</h2>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'name')->textInput(
                        ['style' => 'height: 40px', 'type' => 'text', 
                        'value' => $model->name,
                        'placeholder' => 'ФИО', 
                        'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'phone')->textInput(
                        ['style' => 'height: 40px', 'type' => 'text', 
                        'value' => $model->phone,
                        'placeholder' => 'Email', 
                        'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'email')->textInput(
                        ['style' => 'height: 40px', 'type' => 'text', 
                        'value' => $model->email,
                        'placeholder' => 'Email', 
                        'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'address')->textInput(
                        ['style' => 'height: 40px', 'type' => 'text', 
                        'value' => $model->address,
                        'placeholder' => 'Адресс', 
                        'class'=>'form-control'])->label(false); ?>
                </div>
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'age_date')->widget(DatePicker::className(),
                    [
                        'name' => 'check_issue_date',
                        'value' => date($model->age_date),
                        'options' => ['placeholder' => 'Укажите дату'],
                        'pluginOptions' => [
                            'format' => 'yyyy-mm-dd',
                            'todayHighlight' => true
                        ]
                    ])->label(false); 
                    ?>
                </div> 
                <div class="form-group col-lg-12">
                    <?= $form->field($model, 'passport')->textInput(
                        ['style' => 'height: 40px', 'type' => 'text', 
                        'value' => $model->passport,
                        'placeholder' => 'Паспорт', 
                        'class'=>'form-control'])->label(false); ?>
                </div> 
                <div class="form-group col-lg-12">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
            </div>
        </article>
    <?php ActiveForm::end(); ?>
</div>
