<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Acerca de';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    body {
        background-image: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    .about-container {
        background: rgba(255,255,255,0.85);
        border-radius: 15px;
        padding: 40px 30px;
        margin-top: 60px;
        box-shadow: 0 8px 32px 0 rgba(31,38,135,0.37);
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<div class="about-container text-center">
    <h1 class="display-4 mb-4"><?= Html::encode($this->title) ?></h1>
    <p class="lead">Plantilla avanzada de Yii2 realizada por el equipo.</p>
    <hr>
    <p>Puedes personalizar este archivo para modificar el contenido de la página.</p>
    <code><?= __FILE__ ?></code>
</div>
