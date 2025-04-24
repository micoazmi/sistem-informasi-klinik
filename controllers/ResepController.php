<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use app\models\Resep;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResepController implements the CRUD actions for Resep model.
 */
class ResepController extends Controller
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
                            return Yii::$app->user->identity->role === 'dokter'; // Check if user is admin
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
     * Lists all Resep models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Resep::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'resep_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Resep model.
     * @param int $resep_id Resep ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($resep_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($resep_id),
        ]);
    }

    /**
     * Creates a new Resep model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Resep();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'resep_id' => $model->resep_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Resep model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $resep_id Resep ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($resep_id)
    {
        $model = $this->findModel($resep_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'resep_id' => $model->resep_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Resep model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $resep_id Resep ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($resep_id)
    {
        $this->findModel($resep_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Resep model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $resep_id Resep ID
     * @return Resep the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($resep_id)
    {
        if (($model = Resep::findOne(['resep_id' => $resep_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
