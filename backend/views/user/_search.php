<?php

    use common\models\User;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    /* @var $this yii\web\View */
    /* @var $model backend\models\search\UserSearch */
    /* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id')?>

    <?php echo $form->field($model, 'username')?>

<?php echo $form->field($model, 'email') ?>

<?php echo $form->field($model, 'rol_id')->dropDownList(User::getRolLista(), ['prompt' => 'Por Favor Elija Uno']);?>

<?php echo $form->field($model, 'tipo_usuario_id')->dropDownList(User::getTipoUsuarioLista(), ['prompt' => 'Por Favor Elija Uno']);?>

<?php echo $form->field($model, 'estado_id')->dropDownList($model->estadoLista, ['prompt' => 'Por Favor Elija Uno']);?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary'])?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>