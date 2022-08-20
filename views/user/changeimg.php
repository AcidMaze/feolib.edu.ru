<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    use yii\bootstrap4\Modal;
    use kartik\date\DatePicker;
    $this->title = 'Изменить изображение профиля';
?>
<div class="container mt-5 mb-5 col-lg-8">
    <?php $form = ActiveForm::begin(['id' => 'update_user-form','options' => ['class' => 'mx-auto card-img']])?>
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
                                Изменить изображение профиля
                            </p>
                            <br/>
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <?= $form->field($model, 'userImgFile')->fileInput(['accept' => 'image/png,image/jpeg'])->label(false); ?>
                    </div>           
                    <div class="form-group col-lg-12">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-green btn-block']) ?>
                    </div>
                    <br/>
                </form>
        </article>
    <?php ActiveForm::end(); ?>
</div>