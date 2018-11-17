<?php

namespace app\controllers;

use app\models\CongViecDanhGia;
use app\models\CongViecDanhGiaSearch;
use app\models\CongViecTienDo;
use app\models\CongViecTienDoSearch;
use app\models\CongViecTraLai;
use app\models\CongViecTraLaiSearch;
use app\models\Dungchung;
use app\models\NhanSu;
use app\models\User;
use Yii;
use app\models\CongViec;
use app\models\CongViecSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\web\HttpException;
/**
 * CongViecController implements the CRUD actions for CongViec model.
 */
class CongViecController extends Controller
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
                    'xoa-tien-do'=>['POST'],
                    'ban-giao-cong-viec'=>['POST'],
                    'hoan-thanh-cong-viec'=>['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CongViec models.
     * @return mixed
     */
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/login');
        }
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            return true;
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    public function actionChuaGiao()
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $searchModel = new CongViecSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->andFilterWhere(['trang_thai'=>CongViec::CV_MOI]);
            $dataProvider->query->andFilterWhere(['nguoi_lap'=>Yii::$app->user->id]);
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Displays a single CongViec model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Creates a new CongViec model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTaoCongViec()
    {
//         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-CV')||Yii::$app->user->can('PVT-CV')||Yii::$app->user->can('TP-CV')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $model = new CongViec();

            if ($model->load(Yii::$app->request->post())) {
                if(Dungchung::convert_to_date($model->ngay_bat_dau)>Dungchung::convert_to_date($model->ngay_ket_thuc)){
                    Yii::$app->session->setFlash('error','Ngày bắt đầu không thể lớn hơn ngày kết thúc, vui lòng nhập lại');
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
                $model->ngay_ket_thuc=Dungchung::convert_to_date($model->ngay_ket_thuc);
                $model->ngay_bat_dau=Dungchung::convert_to_date($model->ngay_bat_dau);
                $model->nguoi_lap=Yii::$app->user->id;
                $model->ngay_lap=date("Y-m-d");

                if($model->nguoi_thuc_hien==''||$model->nguoi_thuc_hien==null){
                    $model->trang_thai=CongViec::CV_MOI;
					
                } else {
                    $model->trang_thai=CongViec::CV_GIAOVIEC;
                    $nhansu1=NhanSu::find()->where(['id'=>$model->nguoi_thuc_hien])->one();
                    $model->nguoi_thuc_hien=$nhansu1->user_id;

                    $nhanSu= User::find()->where(['id'=>Yii::$app->user->identity->id])->one();
                    if($nhanSu->phong_ban_id!==''||$nhanSu->phong_ban_id!==null){
                        $model->phong_ban_id=$nhanSu->phong_ban_id;
                    } else {
                        $nhanVien=NhanSu::find()->where(['id'=>$model->nguoi_thuc_hien])->one();
                        $model->phong_ban_id=$nhanVien->phong_ban_id;
                    }
                }
                if($model->save()){
                    if($model->nguoi_thuc_hien==''||$model->nguoi_thuc_hien==null){
                        Yii::$app->session->setFlash('success','Tạo công việc mới thành công');
                    } else {
                        Yii::$app->session->setFlash('success','Tạo công việc mới và giao việc thành công');
                    }
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

    /**
     * Updates an existing CongViec model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDieuChinh($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT.CV')||Yii::$app->user->can('PVT.CV')||Yii::$app->user->can('TP.CV')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $model = $this->findModel($id);
			//$nguoiThucHienCu = $model->nguoi_thuc_hien;
            if ($model->load(Yii::$app->request->post())) {
                if(Dungchung::convert_to_date($model->ngay_bat_dau)>Dungchung::convert_to_date($model->ngay_ket_thuc)){
                    Yii::$app->session->setFlash('error','Ngày bắt đầu không thể lớn hơn ngày kết thúc, vui lòng nhập lại');
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }

                $model->ngay_ket_thuc=Dungchung::convert_to_date($model->ngay_ket_thuc);
                $model->ngay_bat_dau=Dungchung::convert_to_date($model->ngay_bat_dau);
                if($model->nguoi_thuc_hien==''||$model->nguoi_thuc_hien==null){
                    $model->trang_thai=CongViec::CV_MOI;					
                } else {
                    $model->trang_thai=CongViec::CV_GIAOVIEC;
					//$model->nguoi_thuc_hien=$nguoiThucHienCu;
                    
                }
                if($model->save()){
                    if($model->nguoi_thuc_hien==''||$model->nguoi_thuc_hien==null){
                        Yii::$app->session->setFlash('success','Điều chỉnh công việc thành công');
                    } else {
                        Yii::$app->session->setFlash('success','Giao việc thành công');
                    }
                    return $this->redirect(['view', 'id' => $model->id]);
                }
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
     * Deletes an existing CongViec model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT.CV')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Finds the CongViec model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CongViec the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CongViec::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findModelTienDo($id){
        if(($model=CongViecTienDo::findOne($id))!==null){
            return $model;
        }

        throw new NotFoundHttpException('Không tìm thấy tiến độ công việc này');
    }

    public function actionQuanLyCongViecGiao()
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-CV')||Yii::$app->user->can('PVT-CV')||Yii::$app->user->can('TP-CV')||Yii::$app->user->can('PP-CV')||Yii::$app->user->can('NV-CV')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $searchModel = new CongViecSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->andFilterWhere([
                'or',
                ['trang_thai'=>CongViec::CV_GIAOVIEC],
                ['trang_thai'=>CongViec::CV_DANGTIENHANH],
                ['trang_thai'=>CongViec::CV_HOANTHANH],
                ['trang_thai'=>CongViec::CV_COPHANHOI],
            ]);
            $nhanSu=User::find()->where(['id'=>Yii::$app->user->identity->id])->one();
            if($nhanSu->phong_ban_id!=''||$nhanSu->phong_ban_id!=null){
                $dataProvider->query->andFilterWhere(['phong_ban_id'=>$nhanSu->phong_ban_id]);
            }
            $dataProvider->query->andFilterWhere(['nguoi_lap'=>Yii::$app->user->id]);
            $dataProvider->query->orderBy(['trang_thai'=>SORT_ASC]);

            return $this->render('index-cong-viec-giao', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    public function actionCongViecDuocGiao()
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-CV')||Yii::$app->user->can('PVT-CV')||Yii::$app->user->can('TP-CV')||Yii::$app->user->can('PP-CV')||Yii::$app->user->can('NV-CV')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            //Phần công việc được giao
            $searchModel = new CongViecSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->andFilterWhere([
                'or',
                ['trang_thai'=>CongViec::CV_GIAOVIEC],
                ['trang_thai'=>CongViec::CV_DANGTIENHANH],
                ['trang_thai'=>CongViec::CV_COPHANHOI],
            ]);
            $dataProvider->query->andFilterWhere(['nguoi_thuc_hien'=>Yii::$app->user->id]);
            $dataProvider->query->orderBy(['trang_thai'=>SORT_ASC]);

            return $this->render('index-cong-viec-duoc-giao', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionTienDoCongViec($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-CV')||Yii::$app->user->can('PVT-CV')||Yii::$app->user->can('TP-CV')||Yii::$app->user->can('PP-CV')||Yii::$app->user->can('NV-CV')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            //Phần thêm tiến độ công việc
            $modelCongViec=$this->findModel($id);

            $searchTienDo=new CongViecTienDoSearch();
            $dataTienDo= $searchTienDo->search(Yii::$app->request->queryParams);
            $dataTienDo->query->andFilterWhere(['cong_viec_id'=>$modelCongViec->id]);
            $searchTraLai= new CongViecTraLaiSearch();
            $dataTraLai=$searchTraLai->search(Yii::$app->request->queryParams);
            $dataTraLai->query->andFilterWhere(['cong_viec_id'=>$modelCongViec->id]);

            $modelTienDo= new CongViecTienDo();

            if($modelTienDo->load(Yii::$app->request->post())){
                $modelTienDo->ngay_lap=date("Y-m-d");
                $modelTienDo->nguoi_lap=Yii::$app->user->id;

                $fileUpload=UploadedFile::getInstance($modelTienDo,'tep_dinh_kem');
                if(!is_null($fileUpload)){
                    $fileTam=$fileUpload->name;
                    Yii::$app->params['uploadPath']=Yii::$app->basePath .'/web/uploads/cong-viec/';
                    $path=Yii::$app->params['uploadPath'].$fileTam;
                    $modelTienDo->tep_dinh_kem=$fileTam;
                    $fileUpload->saveAs($path);

                }
                $modelTienDo->cong_viec_id=$modelCongViec->id;

                if($modelTienDo->save()){
                    $modelCongViec->trang_thai=CongViec::CV_DANGTIENHANH;
                    $modelCongViec->save();
                    Yii::$app->session->setFlash('success','Thêm tiến độ thành công');
                    return $this->redirect('cong-viec-duoc-giao');
                }
            }

            return $this->render('tien-do',[
                'modelCongViec'=>$modelCongViec,
                'modelTienDo'=>$modelTienDo,
                'searchTienDo'=>$searchTienDo,
                'dataTienDo'=>$dataTienDo,
                'searchTraLai'=>$searchTraLai,
                'dataTraLai'=>$dataTraLai,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionTaiTepTin($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-CV')||Yii::$app->user->can('PVT-CV')||Yii::$app->user->can('TP-CV')||Yii::$app->user->can('PP-CV')||Yii::$app->user->can('NV-CV')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $model=$this->findModelTienDo($id);
            $path=Yii::$app->basePath.'/web/uploads/cong-viec';
            $fileTai=$path.'/'.$model->tep_dinh_kem;
            //echo $fileTai; exit();
            if(file_exists($fileTai)){
                return (Yii::$app->response->SendFile($fileTai));
            } else {
                Yii::$app->session->setFlash('error','Không tồn tại tệp tin này');
                return $this->redirect(['tien-do-cong-viec','id'=>$model->cong_viec_id]);
            }
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionXoaTienDo($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-CV')||Yii::$app->user->can('PVT-CV')||Yii::$app->user->can('TP-CV')||Yii::$app->user->can('PP-CV')||Yii::$app->user->can('NV-CV')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $model=$this->findModelTienDo($id);
            $idCongVien=$model->cong_viec_id;

            $this->findModelTienDo($id)->delete();

            return $this->redirect(['tien-do-cong-viec','id'=>$idCongVien]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionXemTienDo($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-CV')||Yii::$app->user->can('PVT-CV')||Yii::$app->user->can('TP-CV')||Yii::$app->user->can('PP-CV')||Yii::$app->user->can('NV-CV')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $modelCongViec=$this->findModel($id);
            $searchTienDo=new CongViecTienDoSearch();
            $dataTienDo= $searchTienDo->search(Yii::$app->request->queryParams);
            $dataTienDo->query->andFilterWhere(['cong_viec_id'=>$modelCongViec->id]);
            $searchTraLai=new CongViecTraLaiSearch();
            $dataTraLai= $searchTraLai->search(Yii::$app->request->queryParams);
            $dataTraLai->query->andFilterWhere(['cong_viec_id'=>$id]);

            return $this->render('xem-tien-do',[
                'modelCongViec'=>$modelCongViec,
                'searchTienDo'=>$searchTienDo,
                'dataTienDo'=>$dataTienDo,
                'searchTraLai'=>$searchTraLai,
                'dataTraLai'=>$dataTraLai,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionBanGiaoCongViec($id)
    {
//       if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-CV')||Yii::$app->user->can('PVT-CV')||Yii::$app->user->can('TP-CV')||Yii::$app->user->can('PP-CV')||Yii::$app->user->can('NV-CV')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $modelCongViec=$this->findModel($id);

            $modelCongViec->trang_thai=CongViec::CV_HOANTHANH;
            $modelCongViec->ngay_hoan_thanh=date("Y-m-d");
            if($modelCongViec->save())
            {
                Yii::$app->session->setFlash('success','Đã hoàn thành công việc.');
                return $this->redirect('cong-viec-duoc-giao');
            }
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    public function actionHoanThanhCongViec($id)
    {
//       if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-CV')||Yii::$app->user->can('PVT-CV')||Yii::$app->user->can('TP-CV')||Yii::$app->user->can('PP-CV')||Yii::$app->user->can('NV-CV')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $modelCongViec=$this->findModel($id);

            $modelCongViec->trang_thai=CongViec::CV_DAHOANTHANH;
            $modelCongViec->ngay_xac_minh_hoan_thanh=date("Y-m-d");
            if($modelCongViec->save())
            {
                Yii::$app->session->setFlash('success','Đã hoàn thành công việc.');
                return $this->redirect('cong-viec-duoc-giao');
            }
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionDaHoanThanh()
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-CV')||Yii::$app->user->can('PVT-CV')||Yii::$app->user->can('TP-CV')||Yii::$app->user->can('PP-CV')||Yii::$app->user->can('NV-CV')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            //Phần công việc đã giao cho cán bộ được hoàn thành
            $searchModel = new CongViecSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $dataProvider->query->andFilterWhere([
                'or',
                ['trang_thai'=>CongViec::CV_DAHOANTHANH],
                ['trang_thai'=>CongViec::CV_HOANTHANH]
            ]);
            $nhanSu=User::find()->where(['id'=>Yii::$app->user->identity->id])->one();
            if($nhanSu->phong_ban_id!=''||$nhanSu->phong_ban_id!=null){
                $dataProvider->query->andFilterWhere(['phong_ban_id'=>$nhanSu->phong_ban_id]);
            }
            if($nhanSu->is_admin==1){
                $dataProvider->query->andFilterWhere(['or',['nguoi_lap'=>Yii::$app->user->id],['nguoi_thuc_hien'=>Yii::$app->user->id]]);
            } else {
                $dataProvider->query->andFilterWhere(['nguoi_thuc_hien'=>Yii::$app->user->id]);
            }
            $dataProvider->query->orderBy(['trang_thai'=>SORT_ASC]);

            return $this->render('index-da-hoan-thanh', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionTraLaiCongViec($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-CV')||Yii::$app->user->can('PVT-CV')||Yii::$app->user->can('TP-CV')||Yii::$app->user->can('PP-CV')||Yii::$app->user->can('NV-CV')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('CV')||Yii::$app->user->can('TP')||Yii::$app->user->can('NV')){
            $model=$this->findModel($id);
            $modelTraLai=new CongViecTraLai();
            $searchTraLai=new CongViecTraLaiSearch();
            $dataTraLai= $searchTraLai->search(Yii::$app->request->queryParams);
            $dataTraLai->query->andFilterWhere(['cong_viec_id'=>$id]);

            $searchTienDo=new CongViecTienDoSearch();
            $dataTienDo=$searchTienDo->search(Yii::$app->request->queryParams);
            $dataTienDo->query->andFilterWhere(['cong_viec_id'=>$id]);

            if($modelTraLai->load(Yii::$app->request->post())){
                if(trim($modelTraLai->ly_do_tra_lai)==''||trim($modelTraLai->ly_do_tra_lai)==null){
                    Yii::$app->session->setFlash('error','Nguyên nhân trả lại công việc này không có, vui lòng nhập lý do');
                    return $this->render('tra-lai-cong-viec',[
                        'modelCongViec'=>$model,
                        'modelTraLai'=>$modelTraLai,
                        'searchTraLai'=>$searchTraLai,
                        'dataTraLai'=>$dataTraLai,
                        'searchTienDo'=>$searchTienDo,
                        'dataTienDo'=>$dataTienDo
                    ]);
                }
                $modelTraLai->ngay_lap=date("Y-m-d");
                $modelTraLai->nguoi_lap=Yii::$app->user->id;
                $modelTraLai->cong_viec_id=$id;
                if($modelTraLai->save()){
                    $model->trang_thai=CongViec::CV_COPHANHOI;
                    $model->save();
                    Yii::$app->session->setFlash('success','Công việc đã được trả lại cho người nhận');
                    return $this->redirect('da-hoan-thanh');
                }
            }

            return $this->render('tra-lai-cong-viec',[
                'modelCongViec'=>$model,
                'modelTraLai'=>$modelTraLai,
                'searchTraLai'=>$searchTraLai,
                'dataTraLai'=>$dataTraLai,
                'searchTienDo'=>$searchTienDo,
                'dataTienDo'=>$dataTienDo
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
}
