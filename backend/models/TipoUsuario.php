<?php

namespace backend\models;

use Yii;

use common\models\User; //usa el modelo user 

/**
 * This is the model class for table "tipo_usuario".
 *
 * @property int $id
 * @property string $tipo_usuario_nombre
 * @property int $tipo_usuario_valor
 */
class TipoUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_usuario_nombre', 'tipo_usuario_valor'], 'required'],
            [['tipo_usuario_valor'], 'integer'],
            [['tipo_usuario_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo_usuario_nombre' => 'Tipo Usuario Nombre',
            'tipo_usuario_valor' => 'Tipo Usuario Valor',
        ];
    }
    //Ahora agreguemos el método getUsers para establecer la relación con los usuarios
    public function getUsers()
    {
    return $this->hasMany(User::className(), ['tipo_usuario_id' => 'id']);// relación de uno a muchos 
    //tipo_usuario_id es la clase primaria en la tabla "TipoUsuario"
    // id es la clave primaria en la tabla "User"
    } 
    }
