<?php

/* @var $this yii\web\View */
/* @var $model common\models\Tarefa */

$this->title = $model->voo->designacao. ' Update Tarefa: ' . $model->designacao;
$this->params['breadcrumbs'][] = ['label' => 'Tarefas', 'url' => ['index','vooid'=>$voo->id]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?=$this->render('_form_update', [
                        'model' => $model
                    ]) ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>