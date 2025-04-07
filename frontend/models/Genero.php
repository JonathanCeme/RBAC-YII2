<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "genero".
 *
 * @property int $id
 * @property string $genero_nombre
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['genero_nombre'], 'required'],
            [['genero_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genero_nombre' => 'Genero Nombre',
        ];
    }
    public function getPerfiles()
    {
    return $this->hasMany(Perfil::className(), ['genero_id' => 'id']);//relacion de uno a muchos un genro lo puede tener muchos perfiles
    // genero_id es la clave foranea de la tabla genero
    // id es la clave primaria de la tabla user
    }
    
}
