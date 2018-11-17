<?php

namespace app\controllers;

use app\models\Dungchung;
use app\models\NhanSu;
use Yii;
use app\models\KeHoach;
use app\models\KeHoachSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\HttpException;

/**
 * KeHoachController implements the CRUD actions for KeHoach model.
 */
class KeHoachController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/login');
        }
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('KH')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            return true;
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    /**
     * Lists all KeHoach models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('KH')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $searchModel = new KeHoachSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionDanhSachKeHoachChoDuyet()
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('KH')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $searchModel = new KeHoachSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->where(['trang_thai'=>KeHoach::KH_CHOPHEDUYET]);

            return $this->render('danh-sach-ke-hoach-cho-duyet', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionDanhSachKeHoachMoi()
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('KH')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $searchModel = new KeHoachSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->where(['trang_thai'=>KeHoach::KH_MOI]);
            $dataProvider->query->where(['trang_thai'=>KeHoach::KH_TRALAI]);

            return $this->render('danh-sach-ke-hoach-moi', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionDanhSachKeHoachDaDuyet()
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('KH')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $searchModel = new KeHoachSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->where(['trang_thai'=>KeHoach::KH_DADUYET]);

            return $this->render('danh-sach-ke-hoach-da-duyet', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Displays a single KeHoach model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('KH')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $model=$this->findModel($id);
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Creates a new KeHoach model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('KH')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $model = new KeHoach();

            if ($model->load(Yii::$app->request->post())) {
                $model->nguoi_tao=Yii::$app->user->id;
                $model->ngay_tao=Dungchung::convert_to_date($model->ngay_tao);
                $model->trang_thai=KeHoach::KH_MOI;
                if($model->save()){
//                var_dump($model);die();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionChuyenXuLy($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('KH')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $model=$this->findModel($id);
            $model->trang_thai=KeHoach::KH_CHOPHEDUYET;
            if($model->save()){
                Yii::$app->session->setFlash('success','Chuyển duyệt thành công');
                return $this->redirect('danh-sach-ke-hoach-cho-duyet');
            }
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionKiemDuyetKeHoach($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('KH')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $model=$this->findModel($id);
            $model->trang_thai=KeHoach::KH_DADUYET;
            $model->nguoi_ky=Yii::$app->user->id;
            $model->chuc_vu_id=Yii::$app->user->id;
            if($model->save()){
                Yii::$app->session->setFlash('success','Duyệt thành công');
                return $this->redirect('danh-sach-ke-hoach-da-duyet');
            }
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionKhongKiemDuyetKeHoach($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('KH')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $model=$this->findModel($id);
            $model->trang_thai=KeHoach::KH_TRALAI;
            if($model->save()){
                Yii::$app->session->setFlash('success','Không Duyệt thành công');
                return $this->redirect('danh-sach-ke-hoach-moi');
            }
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Updates an existing KeHoach model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('KH')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Deletes an existing KeHoach model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('KH')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Finds the KeHoach model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KeHoach the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KeHoach::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
