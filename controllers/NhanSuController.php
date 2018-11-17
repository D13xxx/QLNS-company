<?php

namespace app\controllers;

use app\models\DienBienKyLuat;
use app\models\DienBienKyLuatSearch;
use app\models\DienBienLuong;
use app\models\DienBienLuongSearch;
use app\models\DienBienPhuCap;
use app\models\DienBienPhuCapSearch;
use app\models\Dungchung;
use app\models\LoaiHinhNghiPhep;
use app\models\LuanChuyen;
use app\models\LuanChuyenSearch;
use app\models\PhongBan;
use app\models\PhongBanSearch;
use app\models\QuanHuyen;
use app\models\QuaTrinhCongTac;
use app\models\QuaTrinhCongTacSearch;
use app\models\QuaTrinhDaoTaoBoiDuong;
use app\models\QuaTrinhDaoTaoBoiDuongSearch;
use app\models\QuaTrinhNghiPhep;
use app\models\QuaTrinhNghiPhepSearch;
use app\models\TinhThanh;
use app\models\TrinhDoChuyenMon;
use app\models\User;
use app\models\XaPhuong;
use app\models\TaoTaiKhoanForm as TaoTaiKhoan;
use Yii;
use app\models\NhanSu;
use app\models\NhanSuSearch;
use app\models\AuthItem;
use app\models\AuthItemSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * NhanSuController implements the CRUD actions for NhanSu model.
 */
class NhanSuController extends Controller
{
    /**
     * @inheritdoc
     */

    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/login');
        }

        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('NV')||Yii::$app->user->can('TP')){
            return true;
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'nghi-viec' => ['POST'],
                    'hoan-tac' => ['POST'],
                    'xoa-dao-tao-boi-duong'=>['POST'],
                ],
            ],
        ];
    }


    /**
     * Lists all NhanSu models.
     * @return mixed
     */
    public function actionIndex()
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')||Yii::$app->user->can('TP-NS')||Yii::$app->user->can('PP-NS')||Yii::$app->user->can('NV-NS')){
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('NV')||Yii::$app->user->can('TP')){
        //if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')||Yii::$app->user->can('TP-NS')||Yii::$app->user->can('PP-NS')||Yii::$app->user->can('NV-NS')){
            if(NhanSu::find()->where(['user_id'=>Yii::$app->user->id])->count()>0){
                $nhanSu=NhanSu::find()->where(['user_id'=>Yii::$app->user->id])->one();
                $phongBan=$nhanSu->phong_ban_id;
            } else {
                $phongBan='';
            }

            $searchModel = new PhongBanSearch();
            if($phongBan==''||$phongBan==null){
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            } else {
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                $dataProvider->query->andWhere(['id'=>$phongBan]);
            }

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
//        } else {
//            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
//            return false;
//        }
    }

    /**
     * Displays a single NhanSu model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')||Yii::$app->user->can('TP-NS')||Yii::$app->user->can('PP-NS')||Yii::$app->user->can('NV-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('NV')||Yii::$app->user->can('TP')){
            $model=$this->findModel($id);
            $modelQTBD = QuaTrinhDaoTaoBoiDuong::find()->where(['nhan_su_id'=> $model->id])->all();
            $modelQTCT = QuaTrinhCongTac::find()->where(['nhan_su_id'=> $model->id])->all();
            $modelDBL = DienBienLuong::find()->where(['nhan_su_id'=> $model->id])->all();
            return $this->render('view', [
                'model' => $this->findModel($id),
                'modelQTCT' => $modelQTCT,
                'modelQTBD' =>$modelQTBD ,
                'modelDBL' => $modelDBL,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Creates a new NhanSu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('NV')||Yii::$app->user->can('TP')){
            $model = new NhanSu();
            if ($model->load(Yii::$app->request->post()))
            {
                if(Date("Y")-date("Y",strtotime(Dungchung::convert_to_date($model->ngay_sinh)))<16){
                    Yii::$app->session->setFlash('error','Tuổi của nhân viên nhở hơn 16 tuổi, vui lòng kiểm tra lại năm sinh');
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }

                if(NhanSu::find()->where(['so_chung_minh_nhan_dan'=>$model->so_chung_minh_nhan_dan])->count()>0){
                    Yii::$app->session->setFlash('error','Bạn bị trùng số chứng minh thư, vui lòng nhập lại');
                    return $this->render('create',['model'=>$model]);
                }
                $anhNhanVien=UploadedFile::getInstance($model,'anh_nhan_vien');
                if(!is_null($anhNhanVien)){
                    $tam=$anhNhanVien->name;
                    Yii::$app->params['uploadAnh']=Yii::$app->basePath.'/web/images/nhan-su/';
                    $path=Yii::$app->params['uploadAnh'].$tam;
                    $model->anh_nhan_vien=$tam;
                    $anhNhanVien->saveAs($path);
                }

                if(Dungchung::convert_to_date($model->ngay_sinh)==false)
                {
                    Yii::$app->session->setFlash('error','Định dạng ngày sinh không đúng, vui lòng nhập lại');
                    return $this->render('create',['model'=>$model]);
                } else {
                    $model->ngay_sinh=Dungchung::convert_to_date($model->ngay_sinh);
                }

                if($model->que_quan_xa_id!=''||$model->que_quan_xa_id!=null){
                    $phuongXa=XaPhuong::find()->where(['id'=>$model->que_quan_xa_id])->one();
                    $tenXa=$phuongXa->ten;

                } else {

                    $tenXa='';
                }

                if($model->que_quan_huyen_id!=''||$model->que_quan_huyen_id!=null){
                    $quanHuyen=QuanHuyen::find()->where(['id'=>$model->que_quan_huyen_id])->one();
                    $tenQuan=$quanHuyen->ten;
                } else {
                    $tenQuan='';
                }

                if($model->que_quan_tinh_id!=''||$model->que_quan_tinh_id!=null){
                    $tinhThanh=TinhThanh::find()->where(['id'=>$model->que_quan_tinh_id])->one();
                    $tenTinh=$tinhThanh->ten;
                } else {
                    $tenTinh='';
                }

                if($model->que_quan_xa_id==''||$model->que_quan_xa_id==null){
                    $model->que_quan= $quanHuyen->ten . ' - ' . $tinhThanh->ten;
                } else {
                    $model->que_quan= $phuongXa->ten .' - '.$quanHuyen->ten.' - '.$tinhThanh->ten;
                }


                if($model->ngay_huong!=''||$model->ngay_huong!=null){
                    if(Dungchung::convert_to_date($model->ngay_huong)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày hưởng phụ cập có lỗi, vui lòng nhập lại');
                        return $this->render('create',['model'=>$model]);
                    } else {
                        $model->ngay_huong=Dungchung::convert_to_date($model->ngay_huong);
                    }
                }

				if($model->ton_giao_id==''||$model->ton_giao_id==null){
					Yii::$app->session->setFlash('error','Tôn giáo không được để trống, Vui lòng kiểm tra lại.');
                    return $this->render('create',['model'=>$model]);
				}
				
				if($model->dan_toc_id==''||$model->dan_toc_id==null){
					Yii::$app->session->setFlash('error','Dân tộc không được để trống, Vui lòng kiểm tra lại.');
                    return $this->render('create',['model'=>$model]);
				}
				if($model->phong_ban_id==''||$model->phong_ban_id==null){
					Yii::$app->session->setFlash('error','Phòng ban không được để trống, Vui lòng kiểm tra lại.');
                    return $this->render('create',['model'=>$model]);
				}
				if($model->chuc_vu_id==''||$model->chuc_vu_id==null){
					Yii::$app->session->setFlash('error','Chức vụ không được để trống, Vui lòng kiểm tra lại.');
                    return $this->render('create',['model'=>$model]);
				}
                if($model->ngay_vao_dang!=''||$model->ngay_vao_dang!=null){
                    if(Dungchung::convert_to_date($model->ngay_vao_dang)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày vào đảng có lỗi, vui lòng nhập lại');
                        return $this->render('create',['model'=>$model]);
                    } else {
                        $model->ngay_vao_dang=Dungchung::convert_to_date($model->ngay_vao_dang);
                    }
                }

                if($model->ngay_chinh_thuc!=''||$model->ngay_chinh_thuc!=null){
                    if(Dungchung::convert_to_date($model->ngay_chinh_thuc)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày chính thức có lỗi, vui lòng nhập lại');
                        return $this->render('create',['model'=>$model]);
                    } else {
                        $model->ngay_chinh_thuc=Dungchung::convert_to_date($model->ngay_chinh_thuc);
                    }
                }

                if($model->ngay_tham_gia_to_chuc_chinh_tri_xa_hoi!=''||$model->ngay_tham_gia_to_chuc_chinh_tri_xa_hoi!=null){
                    if(Dungchung::convert_to_date($model->ngay_tham_gia_to_chuc_chinh_tri_xa_hoi)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày tham gia tổ chức chính trị có lỗi, vui lòng nhập lại');
                        return $this->render('create',['model'=>$model]);
                    } else {
                        $model->ngay_tham_gia_to_chuc_chinh_tri_xa_hoi=Dungchung::convert_to_date($model->ngay_tham_gia_to_chuc_chinh_tri_xa_hoi);
                    }
                }

                if($model->ngay_nhap_ngu!=''||$model->ngay_nhap_ngu!=null){
                    if(Dungchung::convert_to_date($model->ngay_nhap_ngu)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày nhập ngũ có lỗi, vui lòng nhập lại');
                        return $this->render('create',['model'=>$model]);
                    } else {
                        $model->ngay_nhap_ngu=Dungchung::convert_to_date($model->ngay_nhap_ngu);
                    }
                }

                if($model->ngay_xuat_ngu!=''||$model->ngay_xuat_ngu!=null){
                    if(Dungchung::convert_to_date($model->ngay_xuat_ngu)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày xuất ngũ có lỗi, vui lòng nhập lại');
                        return $this->render('create',['model'=>$model]);
                    } else {
                        $model->ngay_xuat_ngu=Dungchung::convert_to_date($model->ngay_xuat_ngu);
                    }
                }
                $model->ngay_cap=Dungchung::convert_to_date($model->ngay_cap);

                $model->nghi_viec=0;

                $model->ngay_tuyen_dung=Dungchung::convert_to_date($model->ngay_tuyen_dung);

                if($model->save()){
//                    $model->save();
                    Yii::$app->session->setFlash('success','Thêm nhân sự mới thành công.');
                    return $this->redirect(['update', 'id' => $model->id]);
                } else {
                    Yii::$app->session->setFlash('error','Thêm nhân sự mới thất bại, kiểm tra lại các trường dữ liệu');
                    return $this->render('create',['model'=>$model]);
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
     * Updates an existing NhanSu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function checkSoChungMinhThu($str)
    {
        if(NhanSu::find()->where(['so_chung_minh_nhan_dan'=>$str])->count()>0){
            return true;
        }
        return false;
    }
    public function actionUpdate($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $model = $this->findModel($id);
            $anhNhanVienCu=$model->anh_nhan_vien;
            $chungMinhThuCu = $model->so_chung_minh_nhan_dan;
            $searchDTBD=new QuaTrinhDaoTaoBoiDuongSearch();
            $dataProviderDTBD=$searchDTBD->search(Yii::$app->request->queryParams);
            if ($model->load(Yii::$app->request->post())) {
                if ($model->so_chung_minh_nhan_dan!==$chungMinhThuCu) {
                    if($this->checkSoChungMinhThu($model->so_chung_minh_nhan_dan)){
                        YYii::$app->session->setFlash('error','Số chưng minh thư này đã có rồi, vui lòng nhập lại');
                        return $this->render('update', [
                            'model' => $model,
                            'searchDTBD'=> $searchDTBD,
                            'dataDTBD'=> $dataProviderDTBD,
                        ]);
                    }
                }
                else {
                    $model->so_chung_minh_nhan_dan = $chungMinhThuCu;
                }
                $anhNhanVien=UploadedFile::getInstance($model,'anh_nhan_vien');
				if($model->ton_giao_id==''||$model->ton_giao_id==null){
					Yii::$app->session->setFlash('error','Tôn giáo không được để trống, Vui lòng kiểm tra lại.');
                    return $this->render('create',['model'=>$model]);
				}
				
				if($model->dan_toc_id==''||$model->dan_toc_id==null){
					Yii::$app->session->setFlash('error','Dân tộc không được để trống, Vui lòng kiểm tra lại.');
                    return $this->render('create',['model'=>$model]);
				}
                if(!is_null($anhNhanVien)){
                    $tam=$anhNhanVien->name;
                    Yii::$app->params['uploadAnh']=Yii::$app->basePath.'/web/images/nhan-su/';
                    $path=Yii::$app->params['uploadAnh'].$tam;
                    $model->anh_nhan_vien=$tam;
                    $anhNhanVien->saveAs($path);
                } else {
                    $model->anh_nhan_vien=$anhNhanVienCu;
                }
                $model->ngay_sinh=Dungchung::convert_to_date($model->ngay_sinh);

                if($model->que_quan_xa_id!=''||$model->que_quan_xa_id!=null){
                    $phuongXa=XaPhuong::find()->where(['id'=>$model->que_quan_xa_id])->one();
                    $tenXa=$phuongXa->ten;
                } else {
                    $tenXa='';
                }
                if($model->que_quan_huyen_id!=''||$model->que_quan_huyen_id!=null){
                    $quanHuyen=QuanHuyen::find()->where(['id'=>$model->que_quan_huyen_id])->one();
                    $tenQuan=$quanHuyen->ten;
                } else {
                    $tenQuan='';
                }
                if($model->que_quan_tinh_id!=''||$model->que_quan_tinh_id!=null){
                    $tinhThanh=TinhThanh::find()->where(['id'=>$model->que_quan_tinh_id])->one();
                    $tenTinh=$tinhThanh->ten;
                } else {
                    $tenTinh='';
                }
                if($model->que_quan_xa_id==''||$model->que_quan_xa_id==null){
                    $model->que_quan= $tenQuan . ' - ' . $tenTinh;
                } else {
                    $model->que_quan= $tenXa .' - '.$tenQuan . ' - ' . $tenTinh;
                }
                if($model->ngay_huong!=''||$model->ngay_huong!=null){
                    if(Dungchung::convert_to_date($model->ngay_huong)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày hưởng phụ cập có lỗi, vui lòng nhập lại');
                    } else {
                        $model->ngay_huong=Dungchung::convert_to_date($model->ngay_huong);
                    }
                }

                if($model->ngay_vao_dang!=''||$model->ngay_vao_dang!=null){
                    if(Dungchung::convert_to_date($model->ngay_vao_dang)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày vào đảng có lỗi, vui lòng nhập lại');
                    } else {
                        $model->ngay_vao_dang=Dungchung::convert_to_date($model->ngay_vao_dang);
                    }
                }

                if($model->ngay_chinh_thuc!=''||$model->ngay_chinh_thuc!=null){
                    if(Dungchung::convert_to_date($model->ngay_chinh_thuc)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày chính thức có lỗi, vui lòng nhập lại');
                    } else {
                        $model->ngay_chinh_thuc=Dungchung::convert_to_date($model->ngay_chinh_thuc);
                    }
                }

                if($model->ngay_tham_gia_to_chuc_chinh_tri_xa_hoi!=''||$model->ngay_tham_gia_to_chuc_chinh_tri_xa_hoi!=null){
                    if(Dungchung::convert_to_date($model->ngay_tham_gia_to_chuc_chinh_tri_xa_hoi)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày tham gia tổ chức chính trị có lỗi, vui lòng nhập lại');
                    } else {
                        $model->ngay_tham_gia_to_chuc_chinh_tri_xa_hoi=Dungchung::convert_to_date($model->ngay_tham_gia_to_chuc_chinh_tri_xa_hoi);
                    }
                }

                if($model->ngay_nhap_ngu!=''||$model->ngay_nhap_ngu!=null){
                    if(Dungchung::convert_to_date($model->ngay_nhap_ngu)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày nhập ngũ có lỗi, vui lòng nhập lại');
                    } else {
                        $model->ngay_nhap_ngu=Dungchung::convert_to_date($model->ngay_nhap_ngu);
                    }
                }

                if($model->ngay_xuat_ngu!=''||$model->ngay_xuat_ngu!=null){
                    if(Dungchung::convert_to_date($model->ngay_xuat_ngu)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày xuất ngũ có lỗi, vui lòng nhập lại');
                    } else {
                        $model->ngay_xuat_ngu=Dungchung::convert_to_date($model->ngay_xuat_ngu);
                    }
                }
                if($model->ngay_cap!=''||$model->ngay_cap!=null){
                    if(Dungchung::convert_to_date($model->ngay_cap)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày xuất ngũ có lỗi, vui lòng nhập lại');
                    } else {
                        $model->ngay_cap=Dungchung::convert_to_date($model->ngay_cap);
                    }
                }
                if($model->ngay_tuyen_dung!=''||$model->ngay_tuyen_dung!=null){
                    if(Dungchung::convert_to_date($model->ngay_tuyen_dung)==false)
                    {
                        Yii::$app->session->setFlash('error','Ngày xuất ngũ có lỗi, vui lòng nhập lại');
                    } else {
                        $model->ngay_tuyen_dung=Dungchung::convert_to_date($model->ngay_tuyen_dung);
                    }
                }


                if($model->save()){
                    Yii::$app->session->setFlash('success','Cập nhất thông tin cán bộ nhân viên thành công.');
                    return $this->redirect(['update', 'id' => $model->id]);
                }
            }

            return $this->render('update', [
                'model' => $model,
                'searchDTBD'=> $searchDTBD,
                'dataDTBD'=> $dataProviderDTBD,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Deletes an existing NhanSu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Finds the NhanSu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NhanSu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NhanSu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    //Bắt đầu các chức năng Quá trình đào tạo bồi dưỡng
    public function actionQuaTrinhDaoTaoBoiDuong($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')||Yii::$app->user->can('TP-NS')||Yii::$app->user->can('PP-NS')||Yii::$app->user->can('NV-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('NV')||Yii::$app->user->can('TP')){
            $model= $this->findModel($id);
            $searchModel = new QuaTrinhDaoTaoBoiDuongSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->filterWhere(['nhan_su_id'=>$id]);

            return $this->render('dao-tao-boi-duong', [
                'model'=>$model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionThemMoiDaoTaoBoiDuong($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('NV')||Yii::$app->user->can('TP')){
            $model = new QuaTrinhDaoTaoBoiDuong();

            if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
                $model->tu_ngay=Dungchung::convert_to_date($model->tu_ngay);
                $model->den_ngay=Dungchung::convert_to_date($model->den_ngay);
                $model->nhan_su_id=$id;

                if($model->save()){
                    Yii::$app->session->setFlash('Thêm quá trình đào tạo, bồi dưỡng thành công');
                    return $this->redirect(['qua-trinh-dao-tao-boi-duong','id'=>$id]);
                }
            }
            //print_r($model); exit();
            return $this->renderAjax('them_moi_dao_tao_boi_duong', [
                'model' => $model,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionSuaDaoTaoBoiDuong($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('NV')||Yii::$app->user->can('TP')){
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')||Yii::$app->user->can('TP-NS')||Yii::$app->user->can('PP-NS')||Yii::$app->user->can('NV-NS')){
            $model = $this->findModelDTBD($id);
            $nhanvienID=$model->nhan_su_id;
            if ($model->load(Yii::$app->request->post())) {
                $model->tu_ngay=Dungchung::convert_to_date($model->tu_ngay);
                $model->den_ngay=Dungchung::convert_to_date($model->den_ngay);
                $model->save();
                Yii::$app->session->setFlash('Sửa quá trình đào tạo, bồi dưỡng thành công');
                return $this->redirect(['qua-trinh-dao-tao-boi-duong','id'=>$nhanvienID]);
            }

            return $this->renderAjax('sua-dao-tao-boi-duong', [
                'model' => $model,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXoaDaoTaoBoiDuong($id,$nhanvien)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
            $tam=Yii::$app->getRequest()->getQueryParams();
            $nhanvien=($tam['nhanvien']);

            $this->findModelDTBD($id)->delete();

            return $this->redirect(['qua-trinh-dao-tao-boi-duong','id'=>$nhanvien]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    protected function findModelDTBD($id)
    {
        if (($model = QuaTrinhDaoTaoBoiDuong::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    // Kết thúc các chức năng Quá trình đào tạo bồi dưỡng

    //Bắt đầu các chức năng Quá trình công tác
    public function actionQuaTrinhCongTac($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('NV')||Yii::$app->user->can('TP')){
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
            $model= $this->findModel($id);
            $searchModel = new QuaTrinhCongTacSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->filterWhere(['nhan_su_id'=>$id]);

            return $this->render('qua-trinh-cong-tac', [
                'model'=>$model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }
    public function actionThemQuaTrinhCongTac($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('NV')||Yii::$app->user->can('TP')){
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')||Yii::$app->user->can('TP-NS')||Yii::$app->user->can('PP-NS')||Yii::$app->user->can('NV-NS')){
            $model = new QuaTrinhCongTac();

            if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
                $model->tu_ngay=Dungchung::convert_to_date($model->tu_ngay);
                $model->den_ngay=Dungchung::convert_to_date($model->den_ngay);
                $model->nhan_su_id=$id;

                if($model->save()){
                    Yii::$app->session->setFlash('Thêm quá trình công tác thành công');
                    return $this->redirect(['qua-trinh-cong-tac','id'=>$id]);
                }
            }

            return $this->renderAjax('them-qua-trinh-cong-tac', [
                'model' => $model,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }
    public function actionSuaQuaTrinhCongTac($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
            $model = $this->findModelQTCT($id);
            $nhanvienID=$model->nhan_su_id;

            if ($model->load(Yii::$app->request->post())) {
                //Yii::$app->session->setFlash('Sửa quá trình đào tạo, bồi dưỡng thành công');
                $model->tu_ngay=Dungchung::convert_to_date($model->tu_ngay);
                $model->den_ngay=Dungchung::convert_to_date($model->den_ngay);
                $model->save();
                return $this->redirect(['index','id'=>$nhanvienID]);
            }

            return $this->renderAjax('sua-qua-trinh-cong-tac', [
                'model' => $model,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }
    public function actionXoaQuaTrinhCongTac($id,$nhanvien)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $tam=Yii::$app->getRequest()->getQueryParams();
            $nhanvien=($tam['nhanvien']);

            $this->findModelQTCT($id)->delete();

            return $this->redirect(['qua-trinh-cong-tac','id'=>$nhanvien]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }
    protected function findModelQTCT($id)
    {
        if (($model = QuaTrinhCongTac::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Kết thúc các chức năng Quá trình công tác


    //Kết thúc các chức năng Quá trình lương


    //Bắt đầu các chức năng Nghi phép
    public function actionQuaTrinhNghiPhep($id)
    {
//        if(Yii::$app->user->can('Admin')|Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')||Yii::$app->user->can('TP-NS')||Yii::$app->user->can('PP-NS')||Yii::$app->user->can('NV-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('NV')||Yii::$app->user->can('TP')){
            $model= $this->findModel($id);
            $searchModel = new QuaTrinhNghiPhepSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->filterWhere(['nhan_su_id'=>$id]);

            return $this->render('qua-trinh-nghi-phep', [
                'model'=>$model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    public function actionThemNghiPhep($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('NV')||Yii::$app->user->can('TP')){
            $model = new QuaTrinhNghiPhep();

            if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
                $model->tu_ngay=Dungchung::convert_to_date($model->tu_ngay);
                $model->den_ngay=Dungchung::convert_to_date($model->den_ngay);
                $model->nhan_su_id=$id;

                if($model->save()){
                    Yii::$app->session->setFlash('Thêm quá trình nghỉ phép thành công');
                    return $this->redirect(['qua-trinh-nghi-phep','id'=>$id]);
                }
            }

            return $this->renderAjax('them-nghi-phep', [
                'model' => $model,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }


    public function actionSuaNghiPhep($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $model = $this->findModelNghiPhep($id);
            $nhanvienID=$model->nhan_su_id;
            if ($model->load(Yii::$app->request->post())) {
                $model->tu_ngay=Dungchung::convert_to_date($model->tu_ngay);
                $model->den_ngay=Dungchung::convert_to_date($model->den_ngay);
                $model->save();
                Yii::$app->session->setFlash('Sửa quá trình nghỉ phép thành công');
                return $this->redirect(['qua-trinh-nghi-phep','id'=>$nhanvienID]);
            }

            return $this->renderAjax('sua-nghi-phep', [
                'model' => $model,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    /**
     * Deletes an existing QuaTrinhNghiPhep model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionXoaNghiPhep($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $this->findModelNghiPhep($id)->delete();

            return $this->redirect(['qua-trinh-nghi-phep']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    protected function findModelNghiPhep($id)
    {
        if (($model = QuaTrinhNghiPhep::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Kết thúc các chức năng nghỉ phép

    //Bắt đầu chức năng Luân chuyển cán bộ
    public function actionLuanChuyenCanBo()
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $searchModel = new PhongBanSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('luan-chuyen-can-bo', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    public function actionLuanChuyen($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $model=$this->findModel($id);

            $searchLC=new LuanChuyenSearch();
            $dataLuanChuyen=$searchLC->search(Yii::$app->request->queryParams);
            $dataLuanChuyen->query->filterWhere(['nhan_su_id'=>$id]);

            return $this->render('luan-chuyen',[
                'model'=>$model,
                'searchLuanChuyen'=>$searchLC,
                'dataLuanChuyen'=>$dataLuanChuyen,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionThemLuanChuyen($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $model= new LuanChuyen();
            $modelNS=$this->findModel($id);

            if($model->load(Yii::$app->request->post())){
                $model->nhan_su_id= $modelNS->id;
                $model->phong_ban_cu=$modelNS->phong_ban_id;
                $model->ngay_dieu_chinh=date("Y-m-d");
                $model->ngay_ap_dung=Dungchung::convert_to_date($model->ngay_ap_dung);
                $phongBanMoi=$model->phong_ban_moi;
                if($model->save()){
                    $modelNS->phong_ban_id=$phongBanMoi;
                    //print_r($modelNS); exit();
                    $modelNS->save();
                }
                return $this->redirect(['luan-chuyen-can-bo','id'=>$id]);
            }

            return $this->renderAjax('them-luan-chuyen',[
                'model'=>$model,
                'modelNS'=>$modelNS,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionSuaLuanChuyen($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $model=$this->findModelLuanChuyen($id);
            $modelNS=$this->findModel($model->nhan_su_id);

            if($model->load(Yii::$app->request->post())){
                $model->ngay_dieu_chinh=date("Y-m-d");
                $model->ngay_ap_dung=Dungchung::convert_to_date($model->ngay_ap_dung);
                $model->save();
                return $this->redirect(['luan-chuyen-can-bo','id'=>$modelNS->id]);
            }

            return $this->renderAjax('sua-luan-chuyen',[
                'model'=>$model,
                'modelNS'=>$modelNS,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    public function actionXoaLuanChuyen($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $tam=Yii::$app->getRequest()->getQueryParams();
            $nhanvien=($tam['nhanvien']);

            $this->findModelLuanChuyen($id)->delete();

            return $this->redirect(['luan-chuyen','id'=>$nhanvien]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    protected function findModelLuanChuyen($id)
    {
        if(($model=LuanChuyen::findOne($id))!==null){
            return $model;
        }

        throw new NotFoundHttpException('Không tìm thấy dữ liệu');
    }
    //Kết thúc chức năng Luân chuyển cán bộ

    //Bắt đầu chức năng Bổ nhiệm cán bộ
    public function actionBoNhiemCanBo()
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $searchModel = new PhongBanSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('bo-nhiem-can-bo', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionBoNhiem($id){

//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $model=$this->findModel($id);

            if($model->load(Yii::$app->request->post())){

                if($model->save()){
                    Yii::$app->session->setFlash('success','Bổ nhiệm chức vụ cho nhân viên thành công');
                    return $this->redirect('bo-nhiem-can-bo');
                }

            }
            return $this->render('bo-nhiem',['model'=>$model]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    //Kết thúc chức năng Bổ nhiệm cán bộ
    //Chức năng miễn nhiễm cán bộ
    public function actionMienNhiemCanBo()
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $searchModel = new PhongBanSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('mien-nhiem-can-bo', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    public function actionMienNhiem($id){

//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $model=$this->findModel($id);

            if($model->load(Yii::$app->request->post())){

                if($model->save()){
                    Yii::$app->session->setFlash('success','Miễn nhiệm chức vụ cho nhân viên thành công');
                    return $this->redirect('mien-nhiem-can-bo');
                }

            }
            // echo 'vao r'; die();
            return $this->render('mien-nhiem',['model'=>$model]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }


    }
    //Kết thúc miễn nhiếm cán bộ

    //Bắt đầu chứng năng CBNV đã nghỉ việc
    public function actionNghiViec($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')|Yii::$app->user->can('PVT-NS')||Yii::$app->user->can('TP-NS')||Yii::$app->user->can('PP-NS')||Yii::$app->user->can('NV-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $model=$this->findModel($id);
            $model->nghi_viec=1;
            if($model->save()){
                return $this->redirect(['index']);
            }
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    public function actionDaNghiViec()
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')||Yii::$app->user->can('TP-NS')||Yii::$app->user->can('PP-NS')||Yii::$app->user->can('NV-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('NV')||Yii::$app->user->can('TP')){
            $searchModel=new NhanSuSearch();
            $dataProvider=$searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->andWhere(['nghi_viec'=>1]);

            return $this->render('da-nghi-viec',[
                'searchModel'=>$searchModel,
                'dataProvider'=>$dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionXemNghiViec($id)
    {

//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')||Yii::$app->user->can('TP-NS')||Yii::$app->user->can('PP-NS')||Yii::$app->user->can('NV-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('NV')||Yii::$app->user->can('TP')){
            $model=$this->findModel($id);

            $searchDTBD=new QuaTrinhDaoTaoBoiDuongSearch();
            $dataDTBD= $searchDTBD->search(Yii::$app->request->queryParams);
            $dataDTBD->query->andFilterWhere(['nhan_su_id'=>$id]);
            $dataDTBD->sort=false;

            $searchQTCT= new QuaTrinhCongTacSearch();
            $dataQTCT=$searchQTCT->search(Yii::$app->request->queryParams);
            $dataQTCT->query->andFilterWhere(['nhan_su_id'=>$id]);
            $dataQTCT->sort=false;



            //Quá trình lương
            $searchLuong = new DienBienLuongSearch();
            $dataLuong = $searchLuong->search(Yii::$app->request->queryParams);
            $dataLuong->query->filterWhere(['nhan_su_id'=>$id]);
            $dataLuong->sort=false;

            $searchPC=new DienBienPhuCapSearch();
            $dataPC= $searchPC->search(Yii::$app->request->queryParams);
            $dataPC->query->filterWhere(['nhan_su_id'=>$id]);
            $dataPC->sort=false;


            return $this->render('xem-nghi-viec',[
                'model'=>$model,
                'searchDTBD'=>$searchDTBD,
                'dataDTBD'=>$dataDTBD,
                'searchQTCT'=>$searchQTCT,
                'dataQTCT'=>$dataQTCT,
                'searchLuong'=>$searchLuong,
                'dataLuong'=>$dataLuong,
                'searchPC'=>$searchPC,
                'dataPC'=>$dataPC,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionHoanTac($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('VT-NS')||Yii::$app->user->can('PVT-NS')||Yii::$app->user->can('TP-NS')||Yii::$app->user->can('PP-NS')||Yii::$app->user->can('NV-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $model=$this->findModel($id);
            $model->nghi_viec=0;
            if($model->save()){
                return $this->redirect(['da-nghi-viec']);
            }
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }
    //Kết thúc chức năng CBNV đã nghỉ việc



    //Bắt đầu chức năng Tạo tài khoản cho nhân sự
    public function actionTaoTaiKhoan($id)
    {
//        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('TP-NS')){
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('NS')||Yii::$app->user->can('TP')){
            $model= new TaoTaiKhoan();
            $modelUse= $this->findModel($id);
            if ($model->load(Yii::$app->getRequest()->post())) {

                $model->phong_ban_id=$modelUse->phong_ban_id;
                $model->fullname=$modelUse->ho_ten;
                if ($user = $model->signup()) {
                    $modelUse->user_id=$user->id;
                    $modelUse->save();
                    return $this->redirect('index');
                }
            }

            return $this->render('tao-tai-khoan',[
                'model'=>$model,
                'modelUse'=>$modelUse,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    //Kết thúc chức năng tạo tài khoản cho Nhân sự
}
