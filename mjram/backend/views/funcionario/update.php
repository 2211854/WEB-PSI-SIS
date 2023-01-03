<?php

/* @var $this yii\web\View */
/* @var $modelFuncionario common\models\Funcionario */
/* @var $modelUtilizador common\models\Utilizador */
/* @var $modelUser common\models\User */

$this->title = 'Update Funcionario: ' . $modelFuncionario->id;
$this->params['breadcrumbs'][] = ['label' => 'Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?=$this->render('_form_update', [
                        'modelFuncionario' => $modelFuncionario,
                        'modelUtilizador' => $modelUtilizador,
                        'roles' => $roles,
                        'prerole'=> $prerole,
                    ]) ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>