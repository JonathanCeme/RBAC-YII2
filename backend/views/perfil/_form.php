<?php
    /*  --> _form.php, que es un parcial. Un parcial, que en Yii 2 se
    designa con un guión bajo enfrente del nombre de archivo, es una vista que es incluida en otra vista,
    en este caso a través de:
    <?= $this->render('_form', [ 'model' => $model, ])? */

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    
    /* @var $this yii\web\View */
    /* @var $model frontend\models\Perfil */
    /* @var $form yii\widgets\ActiveForm */

    /* <?= es la sentencia abreviada de <?php echo */

    /* Dos cosas a tener en cuenta. Insertamos el método dropDownList method usando $model->generoLista,
    usando un método mágico get, de ahí la g minúscula en genero. Podemos hacer esto gracias el método
    getGeneroLista que agregamos a Perfil en un capítulo anterior.
 */
    ?>
    
    <div class="perfil-form">
    
        <?php $form = ActiveForm::begin(); ?>
    
        <?= $form->field($model, 'nombre')->textInput(['maxlength' => 45]) ?> 
    
        <?= $form->field($model, 'apellido')->textInput(['maxlength' => 45]) ?>
    
        <?= $form->field($model, 'fecha_nacimiento')->textInput() ?>
        * por favor use el formato YYYY-MM-DD
    
        <?= $form->field($model, 'genero_id')->dropDownList($model->generoLista, ['prompt' => 'Por favor Seleccione Uno' ]);?>
    
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    
        <?php ActiveForm::end(); ?>
    
    </div>