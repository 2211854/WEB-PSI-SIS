<?php

/* @var $this yii\web\View */
/* @var $modelFuncionario common\models\Funcionario */
/* @var $modelUtilizador common\models\Utilizador */
/* @var $modelUser common\models\User */

$this->title = 'Profile: ' . $modelFuncionario->username;
$this->params['breadcrumbs'][] = 'Perfil';
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?=$this->render('_form_profile', [
                        'modelFuncionario' => $modelFuncionario,
                        'modelUtilizador' => $modelUtilizador,
                        'roles' => $roles,
                        'prerole'=> $prerole,
                        'message'=> $message,
                    ]) ?>
                </div>
            </div>
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>