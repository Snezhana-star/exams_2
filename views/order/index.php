<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['attribute' => 'id',
                'format'=>'html',
                'value' => function ($data) {
                    return \yii\helpers\Html::a($data->id,'/exams_2/web/order/view?id=' . $data->id);
                },
            ],
            'username',
            'discription',
            'servise',

            [
                'attribute' => 'date',
                'format' => ['date', 'php:d-m-Y']
            ],
            'price',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return $data->getStatusText();
                }
            ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'visible' => Yii::$app->user->identity->isAdmin()
            ],
        ],
    ]);
    ?>


</div>
