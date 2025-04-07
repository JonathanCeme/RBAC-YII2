<?php
namespace common\models;
use common\models\ValorHelpers;
use yii;
use yii\web\Controller;
use yii\helpers\Url;

/* 

Recuerde, todos estos métodos helper son públicos y estáticos de modo que pueden ser llamados así:
PermisosHelpers::requerirUpgradeA(‘Pago’); 

*/

class PermisosHelpers
{
    public static function requerirUpgradeA($tipo_usuario_nombre)
    {
        if (!ValorHelpers::tipoUsuarioCoincide($tipo_usuario_nombre)) {
            return Yii::$app->getResponse()->redirect(Url::to(['upgrade/index']));
        }
    }

    /*  Los siguientes 2 métodos, requerirEstado y requerirRol simplemente llaman a los métodos ya
    existentes estadoCoincide y rolCoincide de ValorHelper y no son absolutamente necesarios, ya que
    no hacen nada nuevo. 
    */
    public static function requerirEstado($estado_nombre)
    {
        return ValorHelpers::estadoCoincide($estado_nombre);
    }

    public static function requerirRol($rol_nombre)
    {
        return ValorHelpers::rolCoincide($rol_nombre);
    }

    /* Luego, construí un método requerirMinimoRol con el operador >=, así que si quisiera por ejemplo
    que los roles Admin ySuperUsuario fueran capaces de acceder al backend, podría controlar el acceso
    al backend con este método */
    
    public static function requerirMinimoRol($rol_nombre, $userId=null)
    {
        if (ValorHelpers::esRolNombreValido($rol_nombre)){ //Primero comprobamos para ver esRolNombreValido:
            /* Si eso falla, inmediatamente devuelve falso. Si está bien, entonces comprobamos para ver si hemos
            ingresado una $userId: */
            if ($userId == null) {
                $userRolValor = ValorHelpers::getUsersRolValor();
                /* Si es nulo, llama a getUsersRolValor sin entregar la $userId y establece el resultado a $userRolValor.
                Esto asume que el usuario ha iniciado sesión y el método getUsersRolValor manejará este escenario.
                
                Si noesnulo,yhemosingresadounvalorpara$userId,entonceselmétodogetUsersRolValortambién
                manejará ese escenario.

                */
            } else {
                $userRolValor = ValorHelpers::getUsersRolValor($userId);
            }
            /* Luego realizamos una simple comprobación con >= para ver si el usuario cumple los requerirMini
                moRol que hemos ingresado:*/ 
            return $userRolValor >= ValorHelpers::getRolValor($rol_nombre) ? true : false;
        } else {
            return false;
        }
    }

    /* El último método, toma dos parámetros, nombre de modelo e id de modelo. Luego realiza una
    consulta para ver si el usuario actual es el propietario de ese registro específico. */
    public static function userDebeSerPropietario($model_nombre, $model_id)
    {
        $connection = \Yii::$app->db;
        $userid = Yii::$app->user->identity->id;
        $sql = "SELECT id FROM $model_nombre WHERE user_id=:userid AND id=:model_id";
        $command = $connection->createCommand($sql);
        $command->bindValue(":userid", $userid);
        $command->bindValue(":model_id", $model_id);
        if($result = $command->queryOne()) {
            return true;
        } else {
            return false;
        }
    }
}