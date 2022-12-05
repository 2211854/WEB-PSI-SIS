<?php

use common\models\ItemVenda;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ItemvendaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Item Vendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-venda-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Item Venda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'passaporte',
            'id_venda',
            'id_classe',
            'id_voo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ItemVenda $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'passaporte' => $model->passaporte, 'id_voo' => $model->id_voo]);
                 }
            ],
        ],
    ]); ?>


</div>
