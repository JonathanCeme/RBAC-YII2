<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfil-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- Bootstrap 5 Accordion reemplazando Collapse::widget -->
    <div class="accordion mb-4" id="perfilAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSearch">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSearch" aria-expanded="false" aria-controls="collapseSearch">
                    Buscar
                </button>
            </h2>
            <div id="collapseSearch" class="accordion-collapse collapse" aria-labelledby="headingSearch" data-bs-parent="#perfilAccordion">
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
            ['attribute' => 'perfilIdLink', 'format' => 'raw'],
            ['attribute' => 'userLink', 'format' => 'raw'],
            'nombre',
            'apellido',
            'fecha_nacimiento',
            'generoNombre',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
