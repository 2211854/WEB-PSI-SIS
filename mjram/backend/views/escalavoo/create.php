<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EscalaVoo */

$this->title = 'Criar Escala do Voo: '.$voo->designacao;
$this->params['breadcrumbs'][] = ['label' => 'Voos', 'url' => ['voo/index']];
$this->params['breadcrumbs'][] = ['label' => 'Escala Voos', 'url' => ['index','vooid'=>$model->id_voo]];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?=$this->render('_form', [
                        'model' => $model,
                        'actionStatus' => $actionStatus,
                        'message'=> $message,
                        'first'=>$first,
                        'minimo' =>$minimo,
                    ]) ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>