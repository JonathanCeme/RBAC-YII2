<?php
namespace common\models;

use common\models\RegistrosHelpers;
use Yii;

class MailCall
{
    public static function enviarElMail($mensaje_id)
    {
        return Yii::$app->mailer->compose()
            ->setTo(\Yii::$app->user->identity->email)
            ->setFrom(['no-reply@yii2build.com' => 'Yii 2 Build'])
            ->setSubject(RegistrosHelpers::obtenerMensajeAsunto($mensaje_id))
            ->setTextBody(RegistrosHelpers::obtenerMensajeCuerpo($mensaje_id))
            ->send();
    }

    public static function onMailableAction($accion_nombre, $controlador_nombre)
    {
        if ($mensaje_id = RegistrosHelpers::encontrarEstadoMensaje($accion_nombre, $controlador_nombre)) {

            static::enviarElMail($mensaje_id);

        }

    }
}
