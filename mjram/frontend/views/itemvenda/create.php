<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\ItemVenda $model */

$this->title = 'Create Item Venda';
$this->params['breadcrumbs'][] = ['label' => 'Item Vendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-venda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
