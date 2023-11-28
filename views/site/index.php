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
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
        </div>

    </div>
</div>