<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 14/06/2018
 * Time: 9:34 AM
 */

namespace app\controllers;
use yii\web\UploadedFile;
use app\models\ChucVu;
use app\models\ChucVuSearch;
use app\models\DanToc;
use app\models\DanTocSearch;
use app\models\Dungchung;
use app\models\LoaiHinhNghiPhep;
use app\models\LoaiHinhNghiPhepSearch;
use app\models\NhanSu;
use app\models\PhongBan;
use app\models\PhongBanSearch;
use app\models\QuanHuyen;
use app\models\QuanHuyenSearch;
use app\models\TonGiao;
use app\models\TonGiaoSearch;
use app\models\TrinhDoChuyenMon;
use app\models\TrinhDoChuyenMonSearch;
use app\models\XaPhuong;
use app\models\XaPhuongSearch;
use Yii;
use app\models\TinhThanh;
use app\models\TinhThanhSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\HttpException;
//use yii\web\UploadedFile;

class DanhMucChungController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'xoa-tinh-thanh' => ['post'],
                    'xoa-quan-huyen'=>['post'],
                    'xoa-xa-phuong' => ['post'],
                    'xoa-phong-ban'=>['post'],
                    'xoa-chuc-vu'=>['post'],
                    'xoa-dan-toc'=>['post'],
                    'xoa-ton-giao'=>['post'],
                    'xoa-trinh-do'=>['post'],
                    'xoa-ly-luan-chinh-tri'=>['post'],
                    'xoa-quan-ly-nha-nuoc' => ['post'],
                    'xoa-gia-dinh-chinh-sach'=>['post'],
                    'xoa-quan-he-gia-dinh'=>['post'],
                    'xoa-loai-hinh-nghi-phep'=>['post'],
                ],
            ],
        ];
    }
    public function beforeAction($action)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/login');
        }
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
            return true;
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    public function actionIndex()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
           return $this->render('index');
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
        
    }

    //Bắt đầu chức năng Tỉnh thành
    public function actionTinhThanh()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new TinhThanhSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
             $dataProvider->query->orderBy(['ma'=>SORT_ASC]);

             return $this->render('tinh-thanh', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }


    public function actionXemTinhThanh($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-tinh-thanh', [
                 'model' => $this->findModelTinhThanh($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }


    public function actionThemTinhThanh()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new TinhThanh();
             if ($model->load(Yii::$app->request->post())) {
                 if($this->checkMaTinhThanh($model->ma)){
                     Yii::$app->session->setFlash('error','Mã tỉnh thành này đã có rồi, vui lòng nhập lại');
                     return $this->render('them-tinh-thanh',['model'=>$model]);
                 }
                 if(TinhThanh::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên tỉnh thành này đã có rồi, vui lòng nhập lại');
                     return $this->render('them-tinh-thanh',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Thêm tỉnh thành mới thành công');
                 return $this->redirect(['xem-tinh-thanh', 'id' => $model->id]);
             }

             return $this->render('them-tinh-thanh', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }


    public function actionSuaTinhThanh($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelTinhThanh($id);
             $maCu=$model->ma;
             if ($model->load(Yii::$app->request->post())) {
                 if($model->ma!==$maCu)
                 {
                     if($this->checkMaTinhThanh($model->ma)){
                         Yii::$app->session->setFlash('error','Mã tỉnh thành này đã có rồi, vui lòng nhập lại');
                         return $this->render('sua-tinh-thanh',['model'=>$model]);
                     }
                 } else {
                     $model->ma=$maCu;
                 }
                 if(TinhThanh::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên tỉnh thành này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-tinh-thanh',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Sửa thông tin Tỉnh thành thành công');
                 return $this->redirect(['xem-tinh-thanh', 'id' => $model->id]);
             }

             return $this->render('sua-tinh-thanh', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    public function actionXoaTinhThanh($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelTinhThanh($id)->delete();

             return $this->redirect(['tinh-thanh']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }


    protected function findModelTinhThanh($id)
    {
        if (($model = TinhThanh::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function checkMaTinhThanh($str)
    {
        if(TinhThanh::find()->where(['ma'=>$str])->count()>0)
        {
            return true;
        }
        return false;
    }
    //Kết thúc chức năng Tỉnh thành

    //Bắt đầu các chức năng Quận huyện
    public function actionQuanHuyen()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new QuanHuyenSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
             $dataProvider->query->orderBy(['ma'=>SORT_ASC,'tinh_thanh_id'=>SORT_ASC]);

             return $this->render('quan-huyen', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXemQuanHuyen($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-quan-huyen', [
                 'model' => $this->findModelQuanHuyen($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionThemQuanHuyen()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new QuanHuyen();

             if ($model->load(Yii::$app->request->post())) {
                 if($model->tinh_thanh_id==''||$model->tinh_thanh_id==null){
                     Yii::$app->session->setFlash('error','Quận huyện này không thuộc Tỉnh thành nào, vui lòng chọn Tỉnh thành');
                     return $this->render('them-quan-huyen', [
                         'model' => $model,
                     ]);
                 }
                 if($this->CheckMaQuanHuyen($model->ma)){
                     Yii::$app->session->setFlash('error','Mã quận huyện này đã có rồi, vui lòng kiểm tra lại.');
                     return $this->render('them-quan-huyen', [
                         'model' => $model,
                     ]);
                 }
                 if(QuanHuyen::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên quận thành này đã có rồi, vui lòng nhập lại');
                     return $this->render('them-quan-huyen',['model'=>$model]);
                 }
                 if($model->save()){
                     Yii::$app->session->setFlash('success','Thêm Quận huyện mới thành công.');
                     return $this->redirect(['xem-quan-huyen', 'id' => $model->id]);
                 }
             }

             return $this->render('them-quan-huyen', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionSuaQuanHuyen($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelQuanHuyen($id);
             $maQuanHuyenCu = $model->ma;
             $tenQuanHuyenCu= $model->ten;

             if ($model->load(Yii::$app->request->post())) {
                 if($model->tinh_thanh_id==''||$model->tinh_thanh_id==null){
                     Yii::$app->session->setFlash('error','Quận huyện này không thuộc Tỉnh thành nào, vui lòng chọn Tỉnh thành');
                     return $this->render('sua-quan-huyen', [
                         'model' => $model,
                     ]);
                 }
                 if($model->ma != $maQuanHuyenCu) {
                     if($this->CheckMaQuanHuyen($model->ma)){
                         Yii::$app->session->setFlash('error','Mã quận huyện này đã có rồi, vui lòng kiểm tra lại.');
                         return $this->render('sua-quan-huyen', [
                             'model' => $model,
                         ]);
                     }
                 }
                 if(QuanHuyen::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên quận thành này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-quan-huyen',['model'=>$model]);
                 }
                 if($model->save()){
                     Yii::$app->session->setFlash('success','Thay đổi thông tin Quận huyện thành công.');
                     return $this->redirect(['xem-quan-huyen', 'id' => $model->id]);
                 }
                 return $this->redirect(['xem-quan-huyen', 'id' => $model->id]);
             }

             return $this->render('sua-quan-huyen', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXoaQuanHuyen($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelQuanHuyen($id)->delete();

             return $this->redirect(['quan-huyen']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    protected function findModelQuanHuyen($id)
    {
        if (($model = QuanHuyen::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function CheckMaQuanHuyen($str)
    {
        if(QuanHuyen::find()->where(['ma'=>$str])->count()>0){
            return true;
        }
        return false;
    }

    public function actionDanhSachQuanHuyen($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $rows = QuanHuyen::find()->where(['tinh_thanh_id' => $id])->all();

             if(count($rows)>0){
                 foreach($rows as $row){
                     echo "<option value='$row->id'>$row->ten</option>";
                 }
             }
             else{
                 echo "<option>Không tìm thấy Quận huyện nào.</option>";
             }
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    //Kết thúc các chức năng Quận huyên


    //Danh sách sổ
    public function actionDanhSachSo($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $rows = So::find()->where(['nhom_so_id' => $id])->all();

             if(count($rows)>0){
				 echo "<option value='' ></option>";
                 foreach($rows as $row){
                     echo "<option value='$row->id'>$row->ten</option>";
                 }
             }
             else{
                 echo "<option>Không tìm thấy sổ nào.</option>";
             }
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    //    Danh sách chức vụ
    public function actionDanhSachChucVu($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $rows = ChucVu::find()->where(['phong_ban_id' => $id])->all();

             if(count($rows)>0){
                 foreach($rows as $row){
                     echo "<option value='$row->id'>$row->ten_day_du</option>";
                 }
             }
             else{
                 echo "<option>Không tìm thấy phòng ban nào nào.</option>";
             }
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }
    public function actionDanhSachNhanSu($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $rows = NhanSu::find()->where(['phong_ban_id' => $id])->all();
             if(count($rows)>0){
                 foreach($rows as $row){
                     echo "<option value='$row->id'>$row->ho_ten</option>";
                 }
             }
             else{
                 echo "<option>Không tìm thấy nhân sự.</option>";
             }
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }

    //Bắt đầu các chức năng Xã Phường
    public function actionXaPhuong()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new XaPhuongSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
             $dataProvider->query->orderBy(['tinh_thanh_id'=>SORT_ASC,'quan_huyen_id'=>SORT_ASC]);

             return $this->render('xa-phuong', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXemXaPhuong($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-xa-phuong', [
                 'model' => $this->findModelXaPhuong($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    private function checkXaPhuong($str)
    {
        if(XaPhuong::find()->where(['ma'=>$str])->count()>0){
            return true;
        }
        return false;
    }

    public function actionThemXaPhuong()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new XaPhuong();

             if ($model->load(Yii::$app->request->post())) {
                 if($model->tinh_thanh_id==''||$model->tinh_thanh_id==null||$model->quan_huyen_id==''||$model->quan_huyen_id==null){
                     Yii::$app->session->setFlash('error','Xã phường không thuộc Tỉnh thành hoặc Quận huyện nào, vui lòng lựa chọn');
                     return $this->render('them-xa-phuong', [
                         'model' => $model,
                     ]);
                 }
                 if($this->checkXaPhuong($model->ma)){
                     Yii::$app->session->setFlash('error','Mã Xã phường này đã có rồi, vui lòng nhập lại');
                     return $this->render('them-xa-phuong', [
                         'model' => $model,
                     ]);
                 }
                 if(XaPhuong::find()->where(['and',['ten'=>$model->ten],['tinh_thanh_id'=>$model->tinh_thanh_id],['quan_huyen_id'=>$model->quan_huyen_id]])->count()>0){
                     Yii::$app->session->setFlash('error','Tên Xã phường thuộc Tỉnh thành - Quận huyện này đã có, vui lòng nhập lại');
                     return $this->render('them-xa-phuong', [
                         'model' => $model,
                     ]);
                 }
                 if($model->save()){
                     Yii::$app->session->setFlash('success','Thêm Xã phường mới thành công.');
                     return $this->redirect(['xem-xa-phuong', 'id' => $model->id]);
                 }
             }

             return $this->render('them-xa-phuong', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionSuaXaPhuong($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelXaPhuong($id);
             $maXaPhuongCu=$model->ma;
             $tenXaPhuongCu=$model->ten;

             if ($model->load(Yii::$app->request->post())) {
                 if($model->tinh_thanh_id==''||$model->tinh_thanh_id==null||$model->quan_huyen_id==''||$model->quan_huyen_id==null){
                     Yii::$app->session->setFlash('error','Xã phường không thuộc Tỉnh thành hoặc Quận huyện nào, vui lòng lựa chọn');
                     return $this->render('sua-xa-phuong', [
                         'model' => $model,
                     ]);
                 }
                 if($model->ma !=$maXaPhuongCu){
                     if($this->checkXaPhuong($model->ma)){
                         Yii::$app->session->setFlash('error','Mã Xã phường này đã có rồi, vui lòng nhập lại');
                         return $this->render('sua-xa-phuong', [
                             'model' => $model,
                         ]);
                     }
                 }
                 if($model->ten != $tenXaPhuongCu){
                     if(XaPhuong::find()->where(['and',['ten'=>$model->ten],['tinh_thanh_id'=>$model->tinh_thanh_id],['quan_huyen_id'=>$model->quan_huyen_id]])->count()>0){
                         Yii::$app->session->setFlash('error','Tên Xã phường thuộc Tỉnh thành - Quận huyện này đã có, vui lòng nhập lại');
                         return $this->render('sua-xa-phuong', [
                             'model' => $model,
                         ]);
                     }
                 }
                 if($model->save()){
                     Yii::$app->session->setFlash('success','Sửa thông tin Xã phường thành công');
                     return $this->redirect(['xem-xa-phuong', 'id' => $model->id]);
                 }

             }

             return $this->render('sua-xa-phuong', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXoaXaPhuong($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelXaPhuong($id)->delete();

             return $this->redirect(['xa-phuong']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    protected function findModelXaPhuong($id)
    {
        if (($model = XaPhuong::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionDanhSachXaPhuong($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $rows = XaPhuong::find()->where(['quan_huyen_id' => $id])->all();

             if(count($rows)>0){
                 foreach($rows as $row){
                     echo "<option value='$row->id'>$row->ten</option>";
                 }
             }
             else{
                 echo "<option>Không tìm thấy Phường xã nào.</option>";
             }
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    //Kết thúc các chức năng Xã phường

    //Bắt đầu các chức năng Phòng ban
    public function actionPhongBan()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new PhongBanSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

             return $this->render('phong-ban', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXemPhongBan($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-phong-ban', [
                 'model' => $this->findModelPhongBan($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionThemPhongBan()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new PhongBan();

             if ($model->load(Yii::$app->request->post())) {
                 if(PhongBan::find()->where(['ten_viet_tat'=>$model->ten_viet_tat])->count()>0){
                     Yii::$app->session->setFlash('error','Tên viết tắt này đã có, vui lòng nhập lại');
                     return $this->render('sua-phong-ban', [
                         'model' => $model,
                     ]);
                 }
                 if($model->ten_day_du==''||$model->ten_day_du==null||$model->ten_viet_tat==''||$model->ten_viet_tat==null){
                     Yii::$app->session->setFlash('error','Vui lòng điển đầy đủ thông tin trước khi hoàn thành');
                     return $this->render('them-phong-ban', [
                         'model' => $model,
                     ]);
                 }
                 if(PhongBan::find()->where(['ten_day_du'=>$model->ten_day_du])->count()>0){
                     Yii::$app->session->setFlash('error','Tên đầy đủ này đã có, vui lòng nhập lại');
                     return $this->render('them-phong-ban', [
                         'model' => $model,
                     ]);
                 }
                 if($model->save()){
                     Yii::$app->session->setFlash('success','Thêm phòng ban mới thành công.');
                     return $this->redirect(['xem-phong-ban', 'id' => $model->id]);
                 }
             }
             return $this->render('them-phong-ban', [
                 'model' => $model,
             ]);
         } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

     }   
    public function actionSuaPhongBan($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelPhongBan($id);
             $tenVietTatCu=$model->ten_viet_tat;
             if ($model->load(Yii::$app->request->post())) {
                 if($model->ten_viet_tat!==$tenVietTatCu)
                 {
                     if($this->checkTenVietTatpPhongBan($model->ten_viet_tat)){
                         Yii::$app->session->setFlash('error','Tên viết tắt này đã có rồi, vui lòng nhập lại');
                         return $this->render('sua-phong-ban',['model'=>$model]);
                     }
                 } else {
                     $model->ten_viet_tat=$tenVietTatCu;
                 }
                 if(PhongBan::find()->where(['ten_day_du'=>$model->ten_day_du])->count()>0){
                     Yii::$app->session->setFlash('error','Tên đầy đủ đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-phong-ban',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Sửa thông tin phòng ban thành công');
                 return $this->redirect(['xem-phong-ban', 'id' => $model->id]);
             }
             return $this->render('sua-phong-ban', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }
    protected function checkTenVietTatpPhongBan($str)
    {
        if(ChucVu::find()->where(['ten_viet_tat'=>$str])->count()>0)
        {
            return true;
        }
        return false;
    }
    protected function checkTenDayDuPhongBan($str)
    {
        if(ChucVu::find()->where(['ten_day_du'=>$str])->count()>0)
        {
            return true;
        }
        return false;
    }

    public function actionXoaPhongBan($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
            $this->findModelPhongBan($id)->delete();

            return $this->redirect(['phong-ban']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }
    protected function findModelPhongBan($id)
    {
        if (($model = PhongBan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Kết thúc các chức năng Phòng ban

    //Bắt đầu các chức năng chức vụ
    public function actionChucVu()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new ChucVuSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

             return $this->render('chuc-vu', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXemChucVu($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
            return $this->render('xem-chuc-vu', [
                'model' => $this->findModelChucVu($id),
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionThemChucVu()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new ChucVu();

             if ($model->load(Yii::$app->request->post())) {

                 if($model->ten_day_du==''||$model->ten_day_du==null||$model->ten_viet_tat==''||$model->ten_viet_tat==null){
                     Yii::$app->session->setFlash('error','Vui lòng điển đầy đủ thông tin trước khi hoàn thành');
                     return $this->render('them-chuc-vu', [
                         'model' => $model,
                     ]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Thêm chức vụ mới thành công');
                 return $this->redirect(['xem-chuc-vu', 'id' => $model->id]);
             }
             return $this->render('them-chuc-vu', [
                 'model' => $model,
             ]);
         } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }
    public function actionSuaChucVu($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelChucVu($id);

             $tenVietTatCu=$model->ten_viet_tat;
             if ($model->load(Yii::$app->request->post()))
             {
                 if($model->ten_viet_tat!==$tenVietTatCu)
                 {
                     if($this->checkTenVietTat($model->ten_viet_tat))
                     {
                         Yii::$app->session->setFlash('error','Tên viết tắt này đã có rồi, vui lòng nhập lại');
                         return $this->render('sua-chuc-vu',['model'=>$model]);
                     }
                 } else
                 {
                     $model->ten_viet_tat=$tenVietTatCu;
                 }
                 if(ChucVu::find()->where(['ten_day_du'=>$model->ten_day_du])->count()>0)
                 {
                     Yii::$app->session->setFlash('error','Tên đầy đủ này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-chuc-vu',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Sửa chức vụ thành thành công');
                 return $this->redirect(['xem-chuc-vu', 'id' => $model->id]);
             }
             return $this->render('sua-chuc-vu', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    protected function checkTenVietTat($str)
    {
        if(ChucVu::find()->where(['ten_viet_tat'=>$str])->count()>0)
        {
            return true;
        }
        return false;
    }
    public function actionXoaChucVu($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelChucVu($id)->delete();

             return $this->redirect(['chuc-vu']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    protected function findModelChucVu($id)
    {
        if (($model = ChucVu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Kết thúc các chức năng Chức vụ

    //Bắt đầu các chức năng Dân tộc
    public function actionDanToc()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new DanTocSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

             return $this->render('dan-toc', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXemDanToc($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-dan-toc', [
                 'model' => $this->findModelDanToc($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionThemDanToc()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new DanToc();
             if ($model->load(Yii::$app->request->post())) {
                 if(DanToc::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên dân tộc này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-dan-toc',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Thêm dân tộc mới thành công.');
                 return $this->redirect(['xem-dan-toc', 'id' => $model->id]);
             }

             return $this->render('them-dan-toc', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionSuaDanToc($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelDanToc($id);
             if ($model->load(Yii::$app->request->post()) ) {
                 if(DanToc::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên dân tộc này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-dan-toc',['model'=>$model]);
                 }
                 $model->save();
                 return $this->redirect(['xem-dan-toc', 'id' => $model->id]);
             }

             return $this->render('sua-dan-toc', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXoaDanToc($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelDanToc($id)->delete();

             return $this->redirect(['dan-toc']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    protected function findModelDanToc($id)
    {
        if (($model = DanToc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Kết thúc các chức năng Dân tộc

    //Bắt đầu các chức năng Tôn giáo
    public function actionTonGiao()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new TonGiaoSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

             return $this->render('ton-giao', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXemTonGiao($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-ton-giao', [
                 'model' => $this->findModelTonGiao($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionThemTonGiao()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new TonGiao();
             if ($model->load(Yii::$app->request->post())) {
                 if(TonGiao::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên tôn giáo này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-ton-giao',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Thêm tôn giáo mới thành công.');
                 return $this->redirect(['xem-ton-giao', 'id' => $model->id]);
             }

             return $this->render('them-ton-giao', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionSuaTonGiao($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelTonGiao($id);

             if ($model->load(Yii::$app->request->post()) ) {
                 if(TonGiao::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên tôn giáo này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-ton-giao',['model'=>$model]);
                 }
                 $model->save();
                 return $this->redirect(['xem-ton-giao', 'id' => $model->id]);
             }

             return $this->render('sua-ton-giao', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXoaTonGiao($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelTonGiao($id)->delete();

             return $this->redirect(['ton-giao']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    protected function findModelTonGiao($id)
    {
        if (($model = TonGiao::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Kết thúc các chức năng Tôn giáo

    //Bắt đầu các chức năng Trình độ chuyên môn
    public function actionTrinhDo()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new TrinhDoChuyenMonSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

             return $this->render('trinh-do', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXemTrinhDo($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-trinh-do', [
                 'model' => $this->findModelTrinhDo($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionThemTrinhDo()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new TrinhDoChuyenMon();

             if ($model->load(Yii::$app->request->post())) {
                 if(TrinhDoChuyenMon::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên trình độ này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-trinh-do',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Thêm trình độ chuyên môn mới thành công');
                 return $this->redirect(['xem-trinh-do', 'id' => $model->id]);

             }
             return $this->render('them-trinh-do', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionSuaTrinhDo($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){

             if ($model->load(Yii::$app->request->post())) {
                 if(TrinhDoChuyenMon::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên trình độ này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-trinh-do',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Sửa trình độ chuyên môn thành công');
                 return $this->redirect(['xem-trinh-do', 'id' => $model->id]);
             }

             return $this->render('sua-trinh-do', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
        $model = $this->findModelTrinhDo($id);

    }
    public function actionXoaTrinhDo($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelTrinhDo($id)->delete();

             return $this->redirect(['trinh-do']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    protected function findModelTrinhDo($id)
    {
        if (($model = TrinhDoChuyenMon::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Kết thúc các chức năng Trình độ chuyên môn

    //Bắt đầu các chức năng Lý luận chính trị
    public function actionLyLuanChinhTri()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new LyLuanChinhTriSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

             return $this->render('ly-luan-chinh-tri', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXemLyLuanChinhTri($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-ly-luan-chinh-tri', [
                 'model' => $this->findModelLyLuanChinhTri($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionThemLyLuanChinhTri()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new LyLuanChinhTri();

             if ($model->load(Yii::$app->request->post())) {
                 if(LyLuanChinhTri::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên luận chính trị này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-ly-luan-chinh-tri',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Sửa luận chính trị chuyên môn thành công');
                 return $this->redirect(['xem-ly-luan-chinh-tri', 'id' => $model->id]);
             }

             return $this->render('them-ly-luan-chinh-tri', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionSuaLyLuanChinhTri($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelLyLuanChinhTri($id);

             if ($model->load(Yii::$app->request->post())) {
                 if(LyLuanChinhTri::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên trình độ này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-ly-luan-chinh-tri',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Sửa luận chính trị chuyên môn thành công');
                 return $this->redirect(['xem-ly-luan-chinh-tri', 'id' => $model->id]);
             }

             return $this->render('sua-ly-luan-chinh-tri', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXoaLyLuanChinhTri($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelLyLuanChinhTri($id)->delete();

             return $this->redirect(['ly-luan-chinh-tri']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    protected function findModelLyLuanChinhTri($id)
    {
        if (($model = LyLuanChinhTri::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Kết thúc các chức năng Lý luận chính trị

    //Bắt đầu các chức năng Quản lý nhà nước
    public function actionQuanLyNhaNuoc()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new QuanLyNhaNuocSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

             return $this->render('quan-ly-nha-nuoc', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXemQuanLyNhaNuoc($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-quan-ly-nha-nuoc', [
                 'model' => $this->findModelQuanLyNhaNuoc($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionThemQuanLyNhaNuoc()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new QuanLyNhaNuoc();

             if ($model->load(Yii::$app->request->post())) {
                 if(QuanLyNhaNuoc::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên quản lý nhà nước này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-quan-ly-nha-nuoc',['model'=>$model]);
                 }
                 $model->save();

                 Yii::$app->session->setFlash('success','Thêm quản lý nhà nước thành công');
                 return $this->redirect(['xem-quan-ly-nha-nuoc', 'id' => $model->id]);
             }

             return $this->render('them-quan-ly-nha-nuoc', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionSuaQuanLyNhaNuoc($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelQuanLyNhaNuoc($id);

             if ($model->load(Yii::$app->request->post())) {
                 if(QuanLyNhaNuoc::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên quản lý nhà nước này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-quan-ly-nha-nuoc',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Sửa quản lý nhà nước thành công');
                 return $this->redirect(['xem-quan-ly-nha-nuoc', 'id' => $model->id]);
             }

             return $this->render('sua-quan-ly-nha-nuoc', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXoaQuanLyNhaNuoc($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelQuanLyNhaNuoc($id)->delete();

             return $this->redirect(['quan-ly-nha-nuoc']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    protected function findModelQuanLyNhaNuoc($id)
    {
        if (($model = QuanLyNhaNuoc::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Kết thúc các chức năng Quản lý nhà nước

    //Bắt đầu các chức năng Gia đình chính sách
    public function actionGiaDinhChinhSach()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new GiaDinhChinhSachSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

             return $this->render('gia-dinh-chinh-sach', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXemGiaDinhChinhSach($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-gia-dinh-chinh-sach', [
                 'model' => $this->findModelGiaDinhChinhSach($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionThemGiaDinhChinhSach()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new GiaDinhChinhSach();

             if ($model->load(Yii::$app->request->post())) {
                 if(GiaDinhChinhSach::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên gia đình chính sách này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-gia-dinh-chinh-sach',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','thêm gia đình chính sách thành công');
                 return $this->redirect(['xem-gia-dinh-chinh-sach', 'id' => $model->id]);
             }

             return $this->render('them-gia-dinh-chinh-sach', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionSuaGiaDinhChinhSach($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelGiaDinhChinhSach($id);

             if ($model->load(Yii::$app->request->post())) {
                 if(GiaDinhChinhSach::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên gia đình chính sách này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-gia-dinh-chinh-sach',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Sửa thông tin gia đình chính sách thành công');
                 return $this->redirect(['xem-gia-dinh-chinh-sach', 'id' => $model->id]);
             }

             return $this->render('sua-gia-dinh-chinh-sach', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionXoaGiaDinhChinhSach($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelGiaDinhChinhSach($id)->delete();

             return $this->redirect(['gia-dinh-chinh-sach']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    protected function findModelGiaDinhChinhSach($id)
    {
        if (($model = GiaDinhChinhSach::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Kết thúc các chức năng Gia đình chính sách

    //Bắt đầu các chức năng Quan Hệ Gia Đình
    public function actionQuanHeGiaDinh()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new MoiQuanHeGiaDinhSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

             return $this->render('quan-he-gia-dinh', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXemQuanHeGiaDinh($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-quan-he-gia-dinh', [
                 'model' => $this->findModelQuanHeGiaDinh($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionThemQuanHeGiaDinh()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new MoiQuanHeGiaDinh();

             if ($model->load(Yii::$app->request->post())) {
                 if(MoiQuanHeGiaDinh::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên quan hệ này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-quan-he-gia-dinh',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','thêm mới quan hệ  thành công');
                 return $this->redirect(['xem-quan-he-gia-dinh', 'id' => $model->id]);
             }

             return $this->render('them-quan-he-gia-dinh', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionSuaQuanHeGiaDinh($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelQuanHeGiaDinh($id);

             if ($model->load(Yii::$app->request->post())) {
                 if(MoiQuanHeGiaDinh::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên quan hệ này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-quan-he-gia-dinh',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Sửa thông tin gia đình chính sách thành công');
                 return $this->redirect(['xem-quan-he-gia-dinh', 'id' => $model->id]);
             }

             return $this->render('sua-quan-he-gia-dinh', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    public function actionXoaQuanHeGiaDinh($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelQuanHeGiaDinh($id)->delete();

             return $this->redirect(['quan-he-gia-dinh']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }
    protected function findModelQuanHeGiaDinh($id)
    {
        if (($model = MoiQuanHeGiaDinh::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Kết thúc các chức năng Quan hệ gia đình

    //Bắt đầu các chức năng Loại hình nghỉ phép
    public function actionLoaiHinhNghiPhep()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new LoaiHinhNghiPhepSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

             return $this->render('loai-hinh-nghi-phep', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionXemLoaiHinhNghiPhep($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-loai-hinh-nghi-phep', [
                 'model' => $this->findModelLoaiHinhNghiePhep($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionThemLoaiHinhNghiPhep()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new LoaiHinhNghiPhep();

             if ($model->load(Yii::$app->request->post())) {
                 if(LoaiHinhNghiPhep::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên loại hình nghỉ phép này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-loai-hinh-nghi-phep',['model'=>$model]);
                 }
                 if($model->ten==''||$model->ten==null){
                     Yii::$app->session->setFlash('error','Vui lòng điển đầy đủ thông tin trước khi hoàn thành');
                     return $this->render('sua-loai-hinh-nghi-phep', [
                         'model' => $model,
                     ]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','thêm mới loại hình nghỉ phép  thành công');
                 return $this->redirect(['xem-loai-hinh-nghi-phep', 'id' => $model->id]);
             }

             return $this->render('them-loai-hinh-nghi-phep', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionSuaLoaiHinhNghiPhep($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelLoaiHinhNghiePhep($id);

             if ($model->load(Yii::$app->request->post())) {
                 if(LoaiHinhNghiPhep::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên loại hình này đã có rồi, vui lòng nhập lại');
                     return $this->render('sua-loai-hinh-nghi-phep',['model'=>$model]);
                 }
                 $model->save();
                 Yii::$app->session->setFlash('success','Sửa thông tin gia đình chính sách thành công');
                 return $this->redirect(['xem-loai-hinh-nghi-phep', 'id' => $model->id]);
             }

             return $this->render('sua-loai-hinh-nghi-phep', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    public function actionXoaLoaiHinhNghiPhep($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelLoaiHinhNghiePhep($id)->delete();

             return $this->redirect(['loai-hinh-nghi-phep']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    protected function findModelLoaiHinhNghiePhep($id)
    {
        if (($model = LoaiHinhNghiPhep::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Kết thúc các chức năng Loại hình nghỉ phép

    //bắt đầu nhóm sổ
    public function actionNhomSo()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new NhomSoSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

             return $this->render('nhom-so', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Displays a single NhomSo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionXemNhomSo($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-nhom-so', [
                 'model' => $this->findModelNhomSo($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Creates a new NhomSo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionThemNhomSo()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new NhomSo();

             if ($model->load(Yii::$app->request->post())) {
                 if(NhomSo::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên nhóm sổ này đã có rồi, vui lòng nhập lại');
                     return $this->render('them-nhom-so',['model'=>$model]);
                 }
                 if ($model->save()){
                     return $this->redirect(['xem-nhom-so', 'id' => $model->id]);

                 }
             }

             return $this->render('them-nhom-so', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Updates an existing NhomSo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSuaNhomSo($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelNhomSo($id);

             if ($model->load(Yii::$app->request->post()) && $model->save()) {
                 return $this->redirect(['xem-nhom-so', 'id' => $model->id]);
             }

             return $this->render('sua-nhom-so', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Deletes an existing NhomSo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionXoaNhomSo($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelNhomSo($id)->delete();

             return $this->redirect(['nhom-so']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    protected function findModelNhomSo($id)
    {
        if (($model = NhomSo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    //Kết thúc nhóm sổ

    //bắt đầu sổ
    public function actionSo()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $searchModel = new SoSearch();
             $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

             return $this->render('so', [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Displays a single So model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionXemSo($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-so', [
                 'model' => $this->findModelSo($id),
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Creates a new So model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionThemSo()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = new So();

             if ($model->load(Yii::$app->request->post())) {
                 if(So::find()->where(['ten'=>$model->ten])->count()>0){
                     Yii::$app->session->setFlash('error','Tên sổ này đã có rồi, vui lòng nhập lại');
                     return $this->render('them-so',['model'=>$model]);
                 }
                 if ($model->save()){
                     return $this->redirect(['xem-so', 'id' => $model->id]);
                 }
             }

             return $this->render('them-so', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Updates an existing So model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSuaSo($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $model = $this->findModelSo($id);

             if ($model->load(Yii::$app->request->post()) && $model->save()) {
                 return $this->redirect(['xem-so', 'id' => $model->id]);
             }

             return $this->render('sua-so', [
                 'model' => $model,
             ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Deletes an existing So model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionXoaSo($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             $this->findModelSo($id)->delete();

             return $this->redirect(['so']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }

    }

    /**
     * Finds the So model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return So the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelSo($id)
    {
        if (($model = So::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //Kết thúc sổ
//    loại hồ sơ
    public function actionLoaiHoSo()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
            $searchModel = new LoaiHoSoSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('loai-ho-so', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
        
    }
    public function actionXemLoaiHoSo($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
             return $this->render('xem-loai-ho-so', [
                'model' => $this->findModelLoaiHoSo($id),
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
       
    }
    public function actionThemLoaiHoSo()
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
            $model = new LoaiHoSo();
            if ($model->load(Yii::$app->request->post())) {
                $model->save();
                Yii::$app->session->setFlash('success','Thêm loại hồ sơ mới thành công');
                return $this->redirect(['xem-loai-ho-so', 'id' => $model->id]);
            }
            return $this->render('them-loai-ho-so', [
                'model' => $model,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
    }
    public function actionSuaLoaiHoSo($id)
    {
        if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
            $model = $this->findModelLoaiHoSo($id);
            $maCu=$model->ma;
            if ($model->load(Yii::$app->request->post()))
            {
                if($model->ma!==$maCu)
                {
                    if($this->checkMa($model->ma))
                    {
                        Yii::$app->session->setFlash('error','Mã này đã có rồi, vui lòng nhập lại');
                        return $this->render('sua-loai-ho-so',['model'=>$model]);
                    }
                } else
                {
                    $model->ma=$maCu;
                }
                if(LoaiHoSo::find()->where(['ten'=>$model->ten])->count()>0)
                {
                    Yii::$app->session->setFlash('error','Tên đầy đủ này đã có rồi, vui lòng nhập lại');
                    return $this->render('sua-loai-ho-so',['model'=>$model]);
                }
                $model->save();
                Yii::$app->session->setFlash('success','Sửa loại hồ sơ thành thành công');
                return $this->redirect(['xem-loai-ho-so', 'id' => $model->id]);
            }
            return $this->render('sua-loai-ho-so', [
                'model' => $model,
            ]);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
   
    }
    protected function checkMa($str)
    {
        if(LoaiHoSo::find()->where(['ma'=>$str])->count()>0)
        {
            return true;
        }
        return false;
    }
    public function actionXoaLoaiHoSo($id)
    {
         if(Yii::$app->user->can('Admin')||Yii::$app->user->can('DMC')){
            $this->findModelLoaiHoSo($id)->delete();

        return $this->redirect(['loai-ho-so']);
        } else {
            throw new HttpException(403,'Bạn không có quyền hạn để sử dụng chức năng này');
            return false;
        }
        
    }
    protected function findModelLoaiHoSo($id)
    {
        if (($model = LoaiHoSo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



}