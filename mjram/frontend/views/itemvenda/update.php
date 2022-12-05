<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ItemVenda $model */

$this->title = 'Update Item Venda: ' . $model->passaporte;
$this->params['breadcrumbs'][] = ['label' => 'Item Vendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->passaporte, 'url' => ['view', 'passaporte' => $model->passaporte, 'id_voo' => $model->id_voo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-venda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
