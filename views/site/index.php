<?php

/** @var yii\web\View $this */
    $this->title = 'Главная страница';
    use yii\bootstrap4\Carousel;
?>
<div class="container">
    <div class="row main-title-block">
        <div class="col-lg-12 mx-auto">
            <?= 
                Carousel::widget([
                    'items' => $img_items,
                    'options' => ['class' => 'carousel slide', 'data-interval' => '5000'],
                    'controls' => [
                        '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>',
                        '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>'
                    ],
                ]);
            ?>
        </div>
    </div>
    <div class = "row">
        <div class="mt-5 mb-5 col-lg-12 event-info-block">
            <div class="my-auto col-lg-8">
                <p class = "pt-2 my-auto p_style-4">
                    Городская библиотека им.Панаса Мирного
                </p>
                <p class = "pt-2 my-auto p_style-6">
                    Библиотека–филиал № 2 была открыта 30 мая 1950 года и размещалась в доме № 8 по улице. Ленина (ныне магазин «Рыбацкий»). В конце 1957 - начале 1958 гг. библиотека была переведена в новое помещение по адресу ул. Горького, 42.
                    В 1956 году библиотеке присвоено имя Панаса Мирного. 
                    В 1959 году к фондам в библиотеке открыт свободный доступ.
                    В разное время библиотекой заведовали: Волкова З.М., Шаврова А.И., Беднякова Н.Б. и др. Они, а также библиотекари Назаров П.В. (абонемент), Губа Г.К. (детский отдел), Павлова В.И. (абонемент), Жуковская Н.И. (детский отдел), Михайлова З.А. (абонемент), внесли значительный вклад в становление, работу и облик библиотеки.
                    Библиотека – единственный культурный центр старейшего района города - Карантина, центр информации,  духовного и эстетического воспитания, культурного досуга и общения читателей всех возрастов. Заведующая библиотекой О. А. Вац и библиотекарь 1 категории Н. Н. Пальчун внимательно и качественно обслуживают более 40 читателей ежедневно и выдают до 130 книг в день.
                    Фонд библиотеки составляет более 29 тыс. экземпляров. Это - художественная литература, справочно – универсальная, отраслевая, детская литература и периодические издания. Библиотека предлагает газеты: «АиФ», «Победа», «Российская газета»; журналы: «Вокруг света», «Story», «Том и Джерри».
                    В 1991 году в библиотеке был создан литературный салон «У нас по средам», которым руководила  Беднякова Н.Б.  За годы его работы  состоялось множество презентаций новых книг, творческих вечеров, интересных встреч  с поэтами, художниками, учеными. С 2010 года он преобразован в клуб интересных встреч «На Карантине».
                    Библиотека сотрудничает с МБОУ « Школа № 10», Советом ветеранов Феодосии, организацией «Русская община», ДХШ им. М.А. Волошина, ДХШ им. И.К. Айвазовского, Коктебельской детской школой искусств.
                </p >
            </div>
            <div class="mx-auto col-lg-4">
                <img width = "100%" class="img-fluid float-right" src="/images/fasad_bibki2_vyveska.jpg" alt="Фасад">
            </div>
        </div>
    </div>
    <div class = "row">
        <div class="mx-auto col-lg-6 pb-3">
            <img width = "100%" class="img-fluid float-right" src="/images/fasad_bibki2.jpg" alt="Фасад">
        </div>
        <div class="mx-auto col-lg-6 pb-3">
            <img width = "100%" class="img-fluid float-right" src="/images/fasad.jpg" alt="Фасад">
        </div>
    </div>
</div>
