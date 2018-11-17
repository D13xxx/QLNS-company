<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 12/06/2018
 * Time: 10:06 AM
 */
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\sidenav\SideNav;

$type = SideNav::TYPE_INFO;
$item= Yii::$app->controller->action->id;
$heading = '<i class="glyphicon glyphicon-cog"></i> Chức năng chính';
if(Yii::$app->controller->id=='nhan-su'){
    $countNS = \app\models\NhanSu::find()->count();
    $countUS = \app\models\User::find()->count();
    $countNSNV = \app\models\NhanSu::find()->where(['nghi_viec'=>1])->count();
    echo SideNav::widget([
        'type' => SideNav::TYPE_PRIMARY,
        'encodeLabels' => false,
        'heading' => $heading,
        'items' => [
            ['label' => 'Danh sách CBCN ('. ($countNS) .')', 'icon' => 'menu-right', 'url' => Url::to(['/nhan-su/index']), 'active' => ($item == 'index'||$item == 'update')],
            ['label'=>'Luân chuyển cán bộ','icon'=>'menu-right','url'=>Url::to(['/nhan-su/luan-chuyen-can-bo']),'active'=>($item=='luan-chuyen-can-bo'|| $item=='luan-chuyen')],
            ['label'=>'Bổ nhiệm cán bộ','icon'=>'menu-right','url'=>Url::to(['/nhan-su/bo-nhiem-can-bo']),'active'=>($item=='bo-nhiem-can-bo' || $item=='bo-nhiem')],
            ['label'=>'Miễn nhiệm cán bộ','icon'=>'menu-right','url'=>Url::to(['/nhan-su/mien-nhiem-can-bo']),'active'=>($item=='mien-nhiem-can-bo')],
            ['label'=>'CBNV đã nghỉ việc ('. ($countNSNV) .')','icon'=>'menu-right','url'=>Url::to(['/nhan-su/da-nghi-viec']),'active'=>($item=='da-nghi-viec')]
        ],
    ]);
}
if(Yii::$app->controller->id=='admin'){
    $countNS = \app\models\NhanSu::find()->count();
    $countNSNV = \app\models\NhanSu::find()->where(['nghi_viec'=>1])->count();
    echo SideNav::widget([
        'type' => SideNav::TYPE_PRIMARY,
        'encodeLabels' => false,
        'heading' => $heading,
        'items' => [
            ['label' => 'Danh sách CBCN ('. ($countNS) .')', 'icon' => 'menu-right', 'url' => Url::to(['/nhan-su/index']), 'active' => ($item == 'index'||$item == 'index')],
            ['label'=>'Luân chuyển cán bộ','icon'=>'menu-right','url'=>Url::to(['/nhan-su/luan-chuyen-can-bo']),'active'=>($item=='luan-chuyen-can-bo'|| $item=='luan-chuyen')],
            ['label'=>'Bổ nhiệm cán bộ','icon'=>'menu-right','url'=>Url::to(['/nhan-su/bo-nhiem-can-bo']),'active'=>($item=='bo-nhiem-can-bo' || $item=='bo-nhiem')],
            ['label'=>'Miễn nhiệm cán bộ','icon'=>'menu-right','url'=>Url::to(['/nhan-su/mien-nhiem-can-bo']),'active'=>($item=='mien-nhiem-can-bo')],
            ['label'=>'CBNV đã nghỉ việc ('. ($countNSNV) .')','icon'=>'menu-right','url'=>Url::to(['/nhan-su/da-nghi-viec']),'active'=>($item=='da-nghi-viec')],
            ['label' => 'Thống kê', 'icon' => 'th-list', 'items' => [
                ['label' => 'Theo trình độ', 'url' => Url::to(['/nhan-su/thong-ke-trinh-do']), 'active' => ($item == 'thong-ke-trinh-do'|| $item=='thong-ke-trinh-do-mot-phan' || $item=='thong-ke-trinh-do-toan-bo')],
                ['label' => 'Nghỉ theo chế độ', 'url' => Url::to(['/nhan-su/thong-ke-nghi-che-do']), 'active' => ($item == 'thong-ke-nghi-che-do'|| $item=='thong-ke-nghi-che-do-xem')],
                ['label' => 'Khen thưởng kỷ luật', 'url' => Url::to(['/nhan-su/thong-ke-khen-thuong-ky-luat']),'active'=>($item=='thong-ke-khen-thuong-ky-luat' || $item=='thong-ke-khen-thuong-ky-luat-xem')],
            ]],
        ],
    ]);
}
if(Yii::$app->controller->id=='cong-viec') {
    $countDSCV = \app\models\CongViec::find()->where(['trang_thai' => [
        \app\models\CongViec::CV_DAHOANTHANH,
        \app\models\CongViec::CV_DANGTIENHANH,
        \app\models\CongViec::CV_GIAOVIEC,
        \app\models\CongViec::CV_HOANTHANH,
        \app\models\CongViec::CV_MOI,
    ]])->count();
    $countCVDG = \app\models\CongViec::find()->where(['nguoi_thuc_hien' => '!=0'])->count();
    echo SideNav::widget([
        'type' => SideNav::TYPE_PRIMARY,
        'encodeLabels' => false,
        'heading' => $heading,
        'items' => [
            ['label' => 'Công việc chưa giao', 'icon' => 'menu-right', 'url' => Url::to(['/cong-viec/chua-giao']), 'active' => ($item == 'chua-giao')],
            ['label' => 'Công việc đã giao', 'icon' => 'menu-right', 'url' => Url::to(['/cong-viec/quan-ly-cong-viec-giao']), 'active' => ($item == 'quan-ly-cong-viec-giao')],
            ['label' => 'Công việc được giao', 'icon' => 'menu-right', 'url' => Url::to(['/cong-viec/cong-viec-duoc-giao']), 'active' => ($item == 'cong-viec-duoc-giao')],
            ['label' => 'Công việc hoàn thành', 'icon' => 'menu-right', 'url' => Url::to(['/cong-viec/da-hoan-thanh']), 'active' => ($item == 'da-hoan-thanh')],
            ['label' => 'Tạo công việc mới', 'icon' => 'menu-right', 'url' => Url::to(['/cong-viec/tao-cong-viec']), 'active' => ($item == 'tao-cong-viec')],
        ],
    ]);
}
if(Yii::$app->controller->id=='ke-hoach'){

    echo SideNav::widget([
        'type' => SideNav::TYPE_PRIMARY,
        'encodeLabels' => false,
        'heading' => $heading,
        'items' => [
            ['label' =>'Danh sách Kế hoạch - Thông báo', 'icon' => 'menu-right', 'url' => Url::to(['/ke-hoach/index']), 'active' => ($item == 'index')],
            ['label'=>'Kế hoạch - Thông báo mới','icon'=>'menu-right','url'=>Url::to(['/ke-hoach/danh-sach-ke-hoach-moi']),'active'=>($item=='/ke-hoach/danh-sach-ke-hoach-moi')],
            ['label'=>'Kế hoạch - Thông báo chờ duyệt','icon'=>'menu-right','url'=>Url::to(['/ke-hoach/danh-sach-ke-hoach-cho-duyet']),'active'=>($item=='/ke-hoach/ke-hoach-da-duyet')],
            ['label'=>'Kế hoạch - Thông báo đã duyệt','icon'=>'menu-right','url'=>Url::to(['/ke-hoach/danh-sach-ke-hoach-da-duyet']),'active'=>($item=='/ke-hoach/ke-hoach-da-duyet')],
        ],
    ]);
}
if(Yii::$app->controller->id=='danh-muc-chung'){
    $countTinhThanh = \app\models\TinhThanh::find()->count();
    $countQuanHuyen = \app\models\QuanHuyen::find()->count();
    $countXaPhuong = \app\models\XaPhuong::find()->count();
    $countPhongBan = \app\models\PhongBan::find()->count();
    $countChucVu = \app\models\ChucVu::find()->count();
    $countDanToc = \app\models\DanToc::find()->count();
    $countTonGiao = \app\models\TonGiao::find()->count();
    $countTrinhDo = \app\models\TrinhDoChuyenMon::find()->count();
    echo SideNav::widget([
        'type' => SideNav::TYPE_PRIMARY,
        'encodeLabels' => false,
        'heading' => $heading,
        'items' => [
            ['label'=>'Danh sách Tỉnh thành('. ($countTinhThanh) .')', 'icon' => 'menu-right', 'url' => Url::to(['/danh-muc-chung/tinh-thanh']), 'active' => ($item == 'tinh-thanh'||$item=='them-tinh-thanh'||$item=='sua-tinh-thanh'||$item=='xem-tinh-thanh')],
            ['label'=>'Danh sách Quận huyện('. ($countQuanHuyen) .')','icon'=>'menu-right','url'=>Url::to(['/danh-muc-chung/quan-huyen']),'active'=>($item=='quan-huyen'||$item=='them-quan-huyen'||$item=='sua-quan-huyen'||$item=='xem-quan-huyen')],
            ['label'=>'Danh sách Xã phường('. ($countXaPhuong) .')','icon'=>'menu-right','url'=>Url::to(['/danh-muc-chung/xa-phuong']),'active'=>($item=='xa-phuong'||$item=='them-xa-phuong'||$item=='sua-xa-phuong'||$item=='xem-xa-phuong')],
            ['label'=>'Danh sách Phòng ban('. ($countPhongBan) .')','icon'=>'menu-right','url'=>Url::to(['/danh-muc-chung/phong-ban']),'active'=>($item=='phong-ban'||$item=='them-phong-ban'||$item=='sua-phong-ban'||$item=='xem-phong-ban')],
            ['label'=>'Danh mục Chức vụ('. ($countChucVu) .')','icon'=>'menu-right','url'=>Url::to(['/danh-muc-chung/chuc-vu']),'active'=>($item=='chuc-vu'||$item=='them-chuc-vu'||$item=='sua-chuc-vu'||$item=='xem-chuc-vu')],
            ['label'=>'Danh mục Dân tộc('. ($countDanToc) .')','icon'=>'menu-right','url'=>Url::to(['/danh-muc-chung/dan-toc']),'active'=>($item=='dan-toc'||$item=='them-dan-toc'||$item=='sua-dan-toc'||$item=='xem-dan-toc')],
            ['label'=>'Danh mục Tôn giáo('. ($countTonGiao) .')','icon'=>'menu-right','url'=>Url::to(['/danh-muc-chung/ton-giao']),'active'=>($item=='ton-giao'||$item=='them-ton-giao'||$item=='sua-ton-giao'||$item=='xem-ton-giao')],
            ['label'=>'Danh mục Trình độ('. ($countTrinhDo) .')','icon'=>'menu-right','url'=>Url::to(['/danh-muc-chung/trinh-do']),'active'=>($item=='trinh-do'||$item=='them-trinh-do'||$item=='sua-trinh-do'||$item=='xem-trinh-do')],
            ['label'=>'Assignment','icon'=>'menu-right','url'=>Url::to(['/admin/assignment']),'active'=>($item=='assignment'||$item=='assignment'||$item=='assignment'||$item=='assignment')],
            ['label'=>'Permission','icon'=>'menu-right','url'=>Url::to(['/admin/permission']),'active'=>($item=='permission'||$item=='permission'||$item=='permission'||$item=='assignment')],
            ['label'=>'Role','icon'=>'menu-right','url'=>Url::to(['/admin/role']),'active'=>($item=='role'||$item=='role'||$item=='role'||$item=='role')],
            ['label'=>'Route','icon'=>'menu-right','url'=>Url::to(['/admin/route']),'active'=>($item=='route'||$item=='route'||$item=='assignment'||$item=='route')],
          
        ],
    ]);
}


?>

