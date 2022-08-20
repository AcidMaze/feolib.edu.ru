<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;
    $this->title = 'Авторизация пользователя';
?>
<div class = "container mt-5 mb-5">
    <div class = "row gutters-sm">
        <?php $form = ActiveForm::begin(['id' => 'singin-form', 'options' => ['class' => 'mx-auto card-auth']])?>
            <div class = "card-reg-title">
                <div class = "card-reg-title-circle">
                    <span class="iconify icon-book" data-icon="akar-icons:book"></span>
                </div>
            </div>
            <article class="card-body-reg mx-auto">
                <form>
                    <div class="row m-1">
                        <div class="col-12 pt-3">
                            <p class = "pt-3 my-auto p_style-11">
                                АВТОРИЗАЦИЯ
                            </p>
                        </div>
                        <div class="col-12 mx-auto pt-3">
                            <?= $form->field($model, 'email')->textInput(['type' => 'text', 'placeholder' => 'Электронная почта', 'class'=>'form-control card-reg-form-control'])->label(false); ?>
                        </div>
                        <div class="col-12 mx-auto">
                            <?= $form->field($model, 'password')->textInput(['type' => 'password', 'placeholder' => 'Пароль', 'class'=>'form-control card-reg-form-control'])->label(false); ?>
                        </div>
                        <div class="col-lg-12 pb-3">
                            <?= Html::submitButton('Войти', ['class' => 'btn btn-green btn-block']) ?>
                        </div>
                    </div>
                </form>
            </article>
        <?php ActiveForm::end(); ?>
    </div>
</div>

