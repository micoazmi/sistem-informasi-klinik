<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use app\models\Obat;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObatController implements the CRUD actions for Obat model.
 */
class ObatController extends Controller
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
     * Lists all Obat models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Obat::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'obat_id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Obat model.
     * @param int $obat_id Obat ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($obat_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($obat_id),
        ]);
    }

    /**
     * Creates a new Obat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Obat();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'obat_id' => $model->obat_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Obat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $obat_id Obat ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($obat_id)
    {
        $model = $this->findModel($obat_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'obat_id' => $model->obat_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Obat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $obat_id Obat ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($obat_id)
    {
        $this->findModel($obat_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Obat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $obat_id Obat ID
     * @return Obat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($obat_id)
    {
        if (($model = Obat::findOne(['obat_id' => $obat_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
