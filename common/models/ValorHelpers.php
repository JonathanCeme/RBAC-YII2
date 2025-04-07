<?php
namespace common\models;
use yii; /* Eso debe ir al principio del archivo en el que desea acceder al usuario con Yii::$app. */
use backend\models\Rol;
use backend\models\Estado;
use backend\models\TipoUsurio;
use common\models\User;
class ValorHelpers
{   
    
    public static function rolCoincide($rol_nombre)
    /*  Lo llamamos rolCoincide como si realizaramos una pregunta, así que tiene sentido que devuelva
    verdadero o falso.
    Podríamos usarlo de la siguiente manera:
    if(ValorHelpers::rolCoincide('Admin'){
        --entonces permitirle al usuario hacer esto--
    }
  */
    {
        /* Eso devolverá el nombre del rol del usuario actual, que deberá estar logueado para que esto funcione. */
        $userTieneRolNombre = Yii::$app->user->identity->rol/*= getRol() */->rol_nombre;
        /* A partir de allí realizamos una comparación de igualdad simple a través de un operador ternario
        para comprobar si coincide con el nombre de rol que le fue entregado */
        return $userTieneRolNombre == $rol_nombre ? true : false; 
    }

    
    public static function getUsersRolValor($userId=null)
    {
        /* Si no se proporciona una id de usuario, entonces asumimos que el usuario actual está logueado */

        if ($userId == null){
            $usersRolValor = Yii::$app->user->identity->rol->rol_valor;
            return isset($usersRolValor) ? $usersRolValor : false;
        }
        else /* el usuario puede no haber iniciado sesión, en cuyo caso necesitamos ingresar
                la id delusuario */ 
        {
            $user = User::findOne($userId);
            /* Eso se traduce a groso modo en SQL como:
            Select id FROM User WHERE id = $userId */

            /* Una vez que creamos una instancia de User, usamos nuestra relación con rol para terminar: */
            $usersRolValor = $user->rol->rol_valor;
            return isset($usersRolValor) ? $usersRolValor : false;
        }
    }

    /* simplemente queremos un valor de rol sin el usuario. Ingresamos el nombre del rol
    y usamos una instancia de ActiveRecord para accederlo: */
    public static function getRolValor($rol_nombre)
    {
        $rol = Rol::find('rol_valor')
            ->where(['rol_nombre' => $rol_nombre])
            ->one();
        return isset($rol->rol_valor) ? $rol->rol_valor : false;
    }

    /* Luego tenemos una breve comprobación para ver si el nombre de rol es válido, esto ayuda a prevenir
    errores de programación */
    public static function esRolNombreValido($rol_nombre)
    {
        $rol = Rol::find('rol_nombre')
            ->where(['rol_nombre' => $rol_nombre])
            ->one();
        return isset($rol->rol_nombre) ? true : false;
    }


    /* Para implementar el control de acceso, tener control sobre el estado del usuario también es
    importante: 
    El método estadoCoincide es exactamente como el método rolCoincide al comienzo de la clase,
    usando la misma técnica con relaciones*/
    public static function estadoCoincide($estado_nombre)
    {
        $userTieneEstadoName = Yii::$app->user->identity->estado->estado_nombre;
        return $userTieneEstadoName == $estado_nombre ? true : false;
    }


    /* Aquí simplemente estamos ingresando el nombre de estado para devolver la id a través de
    ActiveRecord. Esto será de utilidad cuando queramos remover la constante estado del modelo user. */
    public static function getEstadoId($estado_nombre)
    {
        $estado = Estado::find('id')
            ->where(['estado_nombre' => $estado_nombre])
            ->one();
        return isset($estado->id) ? $estado->id : false;
    }

    /* Como rolCoincide y estadoCoincide, simplemente devuelve verdadero o falso si el tipoUsuario del
    usuario coincide con el especificado en la firma. */
    public static function tipoUsuarioCoincide($tipo_usuario_nombre)
    {
        $userTieneTipoUsurioName = Yii::$app->user->identity->tipoUsuario->tipo_usuario_nombre;
        return $userTieneTipoUsurioName == $tipo_usuario_nombre ? true : false;
    }
}