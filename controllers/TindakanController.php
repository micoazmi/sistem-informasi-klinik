<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use app\models\Tindakan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TindakanController implements the CRUD actions for Tindakan model.
 */
class TindakanController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // Only logged-in users can access
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->role === 'admin'; // Check if user is admin
                        }
                    ],
                ],
                'denyCallback' => function () {
                    throw new \yii\web\ForbiddenHttpException('You are not allowed to access this page.');
                },
            ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Tindakan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tindakan::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'tindakan_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tindakan model.
     * @param int $tindakan_id Tindakan ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tindakan_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($tindakan_id),
        ]);
    }

    /**
     * Creates a new Tindakan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tindakan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'tindakan_id' => $model->tindakan_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tindakan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $tindakan_id Tindakan ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($tindakan_id)
    {
        $model = $this->findModel($tindakan_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tindakan_id' => $model->tindakan_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tindakan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $tindakan_id Tindakan ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($tindakan_id)
    {
        $this->findModel($tindakan_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tindakan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $tindakan_id Tindakan ID
     * @return Tindakan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tindakan_id)
    {
        if (($model = Tindakan::findOne(['tindakan_id' => $tindakan_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
