<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_mensaje".
 *
 * @property int $id
 * @property string $controlador_nombre
 * @property string $accion_nombre
 * @property string $estado_mensaje_nombre
 * @property string $asunto
 * @property string $cuerpo
 * @property string $estado_mensaje_descripcion
 * @property string $created_at
 * @property string $updated_at
 */
class EstadoMensaje extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado_mensaje';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['controlador_nombre', 'accion_nombre', 'estado_mensaje_nombre', 'asunto', 'cuerpo', 'estado_mensaje_descripcion', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['controlador_nombre', 'accion_nombre', 'estado_mensaje_nombre'], 'string', 'max' => 105],
            [['asunto', 'estado_mensaje_descripcion'], 'string', 'max' => 255],
            [['cuerpo'], 'string', 'max' => 2025],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'controlador_nombre' => 'Controlador Nombre',
            'accion_nombre' => 'Accion Nombre',
            'estado_mensaje_nombre' => 'Estado Mensaje Nombre',
            'asunto' => 'Asunto',
            'cuerpo' => 'Cuerpo',
            'estado_mensaje_descripcion' => 'Estado Mensaje Descripcion',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

}
