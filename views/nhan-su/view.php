<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VanBanTrinhKy */

$this->title = 'Xem chi tiết hồ sơ nhân sự';
$this->params['breadcrumbs'][] = ['label' => 'Nhân sự', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="vi" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::getAlias('@web');?>/css/printreport.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::getAlias('@web');?>/css/styles.css">
    <script type="text/javascript" src="<?php echo Yii::getAlias('@web');?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::getAlias('@web');?>/js/FileSaver.js"></script>
    <script type="text/javascript" src="<?php echo Yii::getAlias('@web');?>/js/jquery.wordexport.js"></script>
</head>
<body>
<div class="van-ban-trinh-ky-view">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                <button type='button' id='print-div'  class="btn btn-default "><i class="glyphicon glyphicon-download-alt"></i> Print</button>
<!--                <input type='button'  value='Download' class="btn btn-success" onclick="Export2Doc('printArea')">-->
<!--                <a class="word-export btn btn-success" href="javascript:void(0)">Tải xuống</a>-->
            </h4>
        </div>
        <div class="panel-body">
                <div id="page">
                    <div id="printArea" style="width: 210mm ; margin: 0 auto">
                        <table style="border: none; width: 100%;">
                            <td style="width: 40%; float: left">
                                <h2 style="font-weight: bold;text-align: center; font-size: 16px;">QUẢN LÝ NHÂN SỰ</h2>
                                <h4 style="text-align: center;font-size: 14px;">HỒ SƠ NHÂN SỰ</h4>
                            </td>
                        </table>
                        <br>
                        <br>
                        <table style="border: none; width: 100%;">
                            <tr>
                                <td style=" width:100% ; text-align: center;">
                                    <h2 style="font-size: 15px; font-weight: bold">SƠ YẾU LÝ LỊCH HỒ SƠ NHÂN VIÊN</h2>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <br>
                        <table>
                            <tr>
                                <td class="td1" style="width: 20%">
                                    <?php
                                    if($model->anh_nhan_vien==''||$model->anh_nhan_vien==null){
                                        echo Html::img(Yii::getAlias('@web').'/images/nhan-su/macdinh.jpg',[
                                            'style'=>['width'=>'140px','height'=>'180px','margin'=>'0px auto']
                                        ]);
                                    } else {
                                        echo Html::img(Yii::getAlias('@web').'/images/nhan-su/'.$model->anh_nhan_vien,[
                                            'style'=>['width'=>'140px','height'=>'180px','margin'=>'0px auto']
                                        ]);
                                    }
                                    ?>

                                </td>
                                <td class="td2" style="width: 70%">
                                    1) Họ và tên khai sinh (Viết chữ in hoa): <?=($model->ho_ten)?><br><br>
                                    2) Tên gọi khác: <?= strtoupper($model->ten_khac)?><br><br>
                                    3) Ngày sinh: <?php echo date('d/m/Y',strtotime($model->ngay_sinh))?> , Giới tính(Nam/Nữ): <?php if ($model->gioi_tinh==1){
                                        echo  'Nam';
                                    }else{
                                        echo 'Nữ';
                                    } ?><br><br>
                                    4) Nơi sinh: <?php $xaPhuong =\app\models\XaPhuong::find()->where(['id'=>$model->que_quan_xa_id])->one();
                                    echo $xaPhuong->ten?>
                                    ,<?php
                                    $quanHuyen =\app\models\QuanHuyen::find()->where(['id'=>$model->que_quan_huyen_id])->one();
                                    echo $quanHuyen->ten?> , <?php
                                    $tinhThanh =\app\models\TinhThanh::find()->where(['id'=>$model->que_quan_tinh_id])->one();
                                    echo $tinhThanh->ten?><br><br>
                                    5) Quê quán: <?= $model->que_quan?>
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td style="width: 100%;">6) Dân tộc:
                                    <?php
                                    $danToc =\app\models\DanToc::find()->where(['id'=>$model->dan_toc_id])->one();
                                    echo $danToc->ten; ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    7) Tôn giáo: <?php $tonGiao =\app\models\TonGiao::find()->where(['id'=>$model->ton_giao_id])->one();
                                    echo $tonGiao->ten; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    8) Nơi đăng ký hộ khẩu thường trú: <?php if ($model->ho_khau_thuong_tru){
                                        echo '..................';
                                    }else{
                                        echo $model->ho_khau_thuong_tru;
                                    }?><br>
                                    (Số nhà, Số phố, Xóm, Thôn, Xã, Huyện, Tỉnh)
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    9) Nơi ở hiện tại: <?php if ($model->noi_o_hien_nay==''){
                                        echo '..................';
                                    }else{
                                        echo $model->noi_o_hien_nay;
                                    } ?><br>
                                    (Số nhà, Số phố, Xóm, Thôn, Xã, Huyện, Tỉnh)
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    10) Nghề nghiệp khi tuyển: <?php if ($model->nghe_nghiep_khi_tuyen==''){
                                        echo '...............';
                                    }else{
                                        echo $model->nghe_nghiep_khi_tuyen;
                                    }?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    11) Ngày tuyển dụng: <?php if($model->ngay_tuyen_dung==''){
                                        echo 'Ngày.........Tháng.......Năm...........';
                                    }else{
                                        echo date('d/m/Y',strtotime($model->ngay_tuyen_dung));}?> ,
                                    12) Cơ quan tuyển dụng: <?php if($model->co_quan_tuyen_dung==''){
                                        echo '............';
                                    }else{
                                        echo $model->co_quan_tuyen_dung;
                                    }?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    12) Chức vụ (chức danh) hiện tại: <?php
                                    $chucVu =\app\models\ChucVu::find()->where(['id'=>$model->chuc_vu_id])->one();
                                    echo $chucVu->ten_day_du;
                                    ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
  
                                    13.1 Bậc lương: <?php if($model->bac_luong==''){
                                        echo '..................';
                                    }else{
                                        echo $model->bac_luong;
                                    }?> ,13.2) Hệ số: <?php if ($model->he_so==''){
                                        echo '..................';
                                    }else{
                                        echo $model->he_so;
                                    }?>,<br>
                                    14) Ngày hướng:
                                    <?php if ($model->ngay_huong == ''){
                                        echo '................';
                                    }else {
                                        echo date('d/m/Y', strtotime($model->ngay_huong));
                                    }?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    15.1- Trình độ giáo dục phổ thông (đã tốt nghiệp lớp mấy/thuộc hệ nào):<?php if ($model->trinh_do_pho_thong==''){
                                        echo '...............';
                                    }else{
                                        echo $model->trinh_do_pho_thong;
                                    }?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    15.2- Trình độ chuyên môn cao nhất: <?php if ($model->trinh_do_chuyen_mon_id == ''){
                                        echo '.....................';
                                    }else{
                                        $trinhDoChuyenMon = \app\models\TrinhDoChuyenMon::find()->where(['id'=>$model->trinh_do_chuyen_mon_id])->one();
                                        echo $trinhDoChuyenMon->ten;
                                    } ?> <br>
                                    (TSKH, TS, Ths, cử nhân, kỹ sư, cao đẳng, trung cấp, sơ cấp, chuyên ngành)
                                </td>
                            </tr>

                            </tr>
                            <tr>
                                <td>
                                    15.5- Ngoại ngữ: <?php if ($model->ngoai_ngu==''){
                                        echo '...................';
                                    }else{
                                        echo $model->ngoai_ngu;
                                    }?>, 15.6-Tin học: <?php
                                    if($model->tin_hoc==''){
                                        echo '.....................';
                                    }else{
                                        echo $model->tin_hoc;
                                    }?><br>
                                    (Tên ngoại ngữ + Trình độ A, B, C, D......)     (Trình độ A, B, C,.......)
                                </td>
                            </tr>
  
                            <tr>
                                <td>
                                    16.1) Số chứng minh nhân dân: <?php if($model->so_chung_minh_nhan_dan==''){
                                        echo '..................';
                                    }else{
                                        echo $model->so_chung_minh_nhan_dan;
                                    }?> , 16.2) Ngày cấp:  <?php if($model->ngay_cap==''){
                                        echo 'Ngày.......Tháng......Năm.....';
                                    }else{
                                        echo date('d/m/Y',strtotime($model->ngay_cap));
                                    }?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    17) Số sổ BHXH:<?php if($model->so_so_bhxh==''){
                                        echo '..................';
                                    }else{
                                        echo $model->so_so_bhxh;
                                    }?>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table style="border: none; width: 100%;">
                            <tr>
                                <td style="float: left ; width: 30% ; text-align: center">
                                    <br>
                                    <b style="text-align: center">Người khai</b><br>
                                    <p style="text-align: center">Tôi xin cam đoan những lời khai trên đây là đúng sự thật
                                        <br>
                                    </p>
                                    <span class="text-center">(Ký tên, ghi rõ họ tên)</span>
                                <br>
                                <br>
                                <br>
                                </td>
                                <td style="float: right ;width: 40% ; text-align: center">
                                    <p class="float-right">..................,Ngày.......Tháng.......Năm...........</p>
                                    <h4 style="text-align: center; font-weight: bold">Giám đốc</h4>
                                    <h5 style="text-align: center">CBCC</h5>
                                    <span style="text-align: center;">(Ký tên, đóng dấu)</span>
                                    <br>
                                    <br>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

        </div>
        <div class="panel-footer">
            <p>
                <?= Html::a('<span class="fa fa-reply"></span> Quay lại',['index'],['class'=>'btn btn-default pull-right'])?>
            </p>
            <br>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#print-div").click(function () {
        var contents=$("#printArea").html();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html><head><title>In Phieu</title>');
        frameDoc.document.write('</head><body>');
        //Append the external CSS file.
        frameDoc.document.write('<link href="<?php echo Yii::getAlias('@web');?>/css/styles.css" rel="stylesheet" type="text/css" />');
        //Append the DIV contents.
        frameDoc.document.write(contents);
        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
    });
    //
    // $('.word-export').click(function(events){
    //     $('#printArea').wordExport();
    // });
    jQuery(document).ready(function($) {
        $("a.word-export").click(function(event) {
            $("#printArea").wordExport();
        });
    });

    // function Export2Doc(element, filename = ''){
    //     var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
    //     var postHtml = "</body></html>";
    //     var html = preHtml+document.getElementById(element).innerHTML+postHtml;
    //
    //
    //     var blob = new Blob(['\ufeff', html], {
    //         type: 'application/msword'
    //     });
    //
    //     // Specify link url
    //     var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);
    //
    //     // Specify file name
    //     filename = filename?filename+'.doc':'document.doc';
    //
    //     // Create download link element
    //     var downloadLink = document.createElement("a");
    //
    //     document.body.appendChild(downloadLink);
    //
    //     if(navigator.msSaveOrOpenBlob ){
    //         navigator.msSaveOrOpenBlob(blob, filename);
    //     }else{
    //         // Create a link to the file
    //         downloadLink.href = url;
    //
    //         // Setting the file name
    //         downloadLink.download = filename;
    //
    //         //triggering the function
    //         downloadLink.click();
    //     }
    //
    //     document.body.removeChild(downloadLink);
    // }
</script>
</body>
</html>
