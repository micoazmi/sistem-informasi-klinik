<?php

namespace app\controllers;
use Yii;
use app\models\Wilayah;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * WilayahController implements the CRUD actions for Wilayah model.
 */
class WilayahController extends Controller
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
     * Lists all Wilayah models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Wilayah::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'wilayah_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Wilayah model.
     * @param int $wilayah_id Wilayah ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($wilayah_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($wilayah_id),
        ]);
    }

    /**
     * Creates a new Wilayah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Wilayah();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'wilayah_id' => $model->wilayah_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Wilayah model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $wilayah_id Wilayah ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($wilayah_id)
    {
        $model = $this->findModel($wilayah_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'wilayah_id' => $model->wilayah_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Wilayah model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $wilayah_id Wilayah ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($wilayah_id)
    {
        $this->findModel($wilayah_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Wilayah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $wilayah_id Wilayah ID
     * @return Wilayah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($wilayah_id)
    {
        if (($model = Wilayah::findOne(['wilayah_id' => $wilayah_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
