<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use yii\bootstrap4\Modal;
    use kartik\date\DatePicker;
    $this->title = 'Редактирование профиля';
?>
<div class="container mt-5 mb-5 col-lg-8">
    <?php $form = ActiveForm::begin(['id' => 'update_user-form','options' => ['class' => 'mx-auto card-edit']])?>
            <div class = "card-reg-title">
                <div class = "card-reg-title-circle">
                    <span class="iconify icon-book" data-icon="akar-icons:book"></span>
                </div>
            </div>
            <article class="card-body-edit mx-auto">
                <form>
                    <div class="row m-1">
                        <div class="col-12 pt-3">
                            <p class = "pt-3 my-auto p_style-11">
                                РЕДАКТИРОВАТЬ ПРОФИЛЬ
                            </p>
                            <br/>
                        </div>
                        <div class="form-group col-lg-12">
                            <?= $form->field($model, 'name')->textInput(
                                ['style' => 'height: 40px', 'type' => 'text', 
                                'value' => $model->name,
                                'placeholder' => 'ФИО', 
                                'class'=>'form-control'])->label(false); ?>
                        </div>
                        <div class="col-6 mx-auto">
                                <?= $form->field($model, 'sex')->dropDownList(['1' => 'Мужской', '2' => 'Женский'], ['value' => $model->sex, 'class'=>'form-control card-reg-form-control'])->label(false); ?>
                        </div>
                        <div class="col-6 mx-auto">
                            <?= $form->field($model, 'phone')->textInput(['type' => 'text', 'value' => $model->phone,'placeholder' => 'Моб. телефон', 'class'=>'form-control card-reg-form-control'])->label(false); ?>
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
                                'options' => ['placeholder' => 'Укажите дату рождения'],
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
                            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-green btn-block']) ?>
                        </div>
                    </div>
                </form>
        </article>
    <?php ActiveForm::end(); ?>
</div>