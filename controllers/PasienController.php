<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use app\models\Pasien;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PasienController implements the CRUD actions for Pasien model.
 */
class PasienController extends Controller
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
                            return in_array(Yii::$app->user->identity->role, ['admin', 'dokter']);
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
     * Lists all Pasien models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Pasien::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'pasien_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pasien model.
     * @param int $pasien_id Pasien ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pasien_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pasien_id),
        ]);
    }

    /**
     * Creates a new Pasien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pasien();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'pasien_id' => $model->pasien_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pasien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pasien_id Pasien ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pasien_id)
    {
        $model = $this->findModel($pasien_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pasien_id' => $model->pasien_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pasien model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pasien_id Pasien ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pasien_id)
    {
        $this->findModel($pasien_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pasien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pasien_id Pasien ID
     * @return Pasien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pasien_id)
    {
        if (($model = Pasien::findOne(['pasien_id' => $pasien_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
