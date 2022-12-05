<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\ItemVenda $model */

$this->title = $model->passaporte;
$this->params['breadcrumbs'][] = ['label' => 'Item Vendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="item-venda-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'passaporte' => $model->passaporte, 'id_voo' => $model->id_voo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'passaporte' => $model->passaporte, 'id_voo' => $model->id_voo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'passaporte',
            'id_venda',
            'id_classe',
            'id_voo',
        ],
    ]) ?>

</div>
