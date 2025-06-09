<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermisosHelpers;

/**
 * @var yii\web\View $this
 * @var frontend\models\Perfil $model
 */
/* Perfiles --> perfil */
$this->title = "Perfil de " . $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<style>
    body {
        background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>
<div class="perfil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?Php

        //esto no es necesario pero está aquí como ejemplo

        if (PermisosHelpers::userDebeSerPropietario('perfil', $model->id)) {

            echo Html::a('Update', ['update', 'id' => $model->id],
                                    ['class' => 'btn btn-primary']);
        } ?>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>

    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'user.username',
            'nombre',
            'apellido',
            'fecha_nacimiento',
            'genero.genero_nombre',
            'created_at',
            'updated_at',
            //'user_id',
        ],
    ]) ?>

</div>