<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\perfil $model */

$this->title = 'Actualizar perfil de : ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
