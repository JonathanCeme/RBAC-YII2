<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Perfil;
use frontend\models\search\PerfilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermisosHelpers;
use common\models\RegistrosHelpers;

/**
 * PerfilController implements the CRUD actions for perfil model.
 */
class PerfilController extends Controller
{
    /**
     * @inheritDoc
     */
public function behaviors()
{
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'view','create', 'update', 'delete'],
                'rules' => [
                        [
                        'actions' => ['index', 'view','create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                        ],
                    
                    ],
                ],
        
            'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
                'delete' => ['post'],
                    ],
                ],
        ];
}

    /**
     * Lists all perfil models.
     *
     * @return string
     */
public function actionIndex()
{

    if ($ya_existe = RegistrosHelpers::userTiene('perfil')) {

        return $this->render('view', [

            'model' => $this->findModel($ya_existe),
        ]);

    } else {

        return $this->redirect(['create']);

    }

}

    /**
     * Displays a single perfil model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
public function actionView()
{
    if ($ya_existe = RegistrosHelpers::userTiene('perfil')) {

        return $this->render('view', [

            'model' => $this->findModel($ya_existe),

        ]);

    } else {

        return $this->redirect(['create']);

    }
}

    /**
     * Creates a new perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
public function actionCreate()
{
    $model = new Perfil;
    
    $model->user_id = \Yii::$app->user->identity->id;      
    
    if ($ya_existe = RegistrosHelpers::userTiene('perfil')) {

        return $this->render('view', [

                'model' => $this->findModel($ya_existe),

            ]);
    
    } elseif ($model->load(Yii::$app->request->post()) && $model->save()){
                        
        return $this->redirect(['view']);
                        
    } else {
                
        return $this->render('create', [

                'model' => $model,

                ]);
    }
}

    /**
     * Updates an existing perfil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate()
    {
            
        if($model =  Perfil::find()->where(['user_id' => 
            Yii::$app->user->identity->id])->one()) {
            
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                
                return $this->redirect(['view']);
            
            } else {
                
                return $this->render('update', [
                    'model' => $model, 
                ]);
            }
        
        } else {
                
            throw new NotFoundHttpException('No Existe el Perfil.');
                
        }
    }

    /**
     * Deletes an existing perfil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
{
        
    $model =  Perfil::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
            
    $this->findModel($model->id)->delete();
        
    return $this->redirect(['site/index']);
}

    /**
     * Finds the perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = perfil::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
