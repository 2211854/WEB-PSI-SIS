<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ocupacao */

$this->title = $model->id_aviao;
$this->params['breadcrumbs'][] = ['label' => 'Ocupacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'id_aviao' => $model->id_aviao, 'id_classe' => $model->id_classe], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id_aviao' => $model->id_aviao, 'id_classe' => $model->id_classe], [
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
                            'ocupacao',
                            'id_aviao',
                            'id_classe',
                        ],
                    ]) ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>