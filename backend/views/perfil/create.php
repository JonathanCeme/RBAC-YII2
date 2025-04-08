<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\perfil $model */
/* Simplemente estamos eliminando la ‘s’ en Perfil. */

$this->title = 'Create Perfil';
$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
