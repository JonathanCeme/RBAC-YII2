<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- Bootstrap 5 Accordion para búsqueda -->
    <div class="accordion mb-4" id="userAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSearch">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">
                    Buscar
                </button>
            </h2>
            <div id="collapseSearch" class="accordion-collapse collapse" aria-labelledby="headingSearch" data-bs-parent="#userAccordion">
                <div class="accordion-body">
                    <?= $this->render('_search', ['model' => $searchModel]) ?>
                </div>
            </div>
        </div>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'userIdLink', 'format' => 'raw'],
            ['attribute' => 'userLink', 'format' => 'raw'],
            ['attribute' => 'perfilLink', 'format' => 'raw'],
            'email:email',
            'rolNombre',
            'tipoUsuarioNombre',
            'estadoNombre',
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
