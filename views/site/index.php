<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
/** @var app\models\User $model */

$this->title = 'Главная';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">ХИМЧИСТКА ЧИСТИТ ВАШИ ВЕЩИ!</h1>


    </div>

    <div class="body-content">

        <div class="row d-flex justify-content-around">
            <div class="col-lg-4 mb-3">

                <h2>Ты администратор?</h2>

                <p>ИДИ РАБОТАЙ</p>

                <?= Html::a('Список пользователей', ['user/index', ], ['class' => 'btn btn-primary']) ?><br><br>
                <?= Html::a('Список заказов', ['order/index', ], ['class' => 'btn btn-primary']) ?>
            </div>
            <div class="col-lg-4 mb-3">
                <h2>Ты пользователь?</h2>

                <p>У нас самая классная химчистка, давай делай заказ!!!</p>
                <?= Html::a('Сделать заказ', ['order/create', ], ['class' => 'btn btn-primary']) ?><br><br>
                <?= Html::a('Список заказов', ['order/index', ], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

    </div>
</div>
