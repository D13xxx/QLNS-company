<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\KeHoach */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kế hoạch - Thông báo', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="vi" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::getAlias('@web');?>/css/styles.css">
    <script type="text/javascript" src="<?php echo Yii::getAlias('@web');?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo Yii::getAlias('@web');?>/js/FileSaver.js"></script>
    <script type="text/javascript" src="<?php echo Yii::getAlias('@web');?>/js/jquery.wordexport.js"></script>
</head>
<body>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h4 class="panel-title">
            <button type='button' id='print-div'  class="btn btn-default "><i class="glyphicon glyphicon-download-alt"></i> Print</button>
        </h4>
    </div>
    <div class="panel-body">
        <div id="page">
            <div id="printArea" style="width: 210mm ; margin: 0 auto">
                <table style="border: none; width: 100%;">
                    <tr>
                        <td style="width: 40%; float: left">
                            <h2 style="font-weight: bold;text-align: center; font-size: 16px;">QUẢN LÝ NHÂN SỰ</h2>
                            <h4 style="text-align: center;font-size: 14px;">Số hiệu: <?=($model->so_hieu)?></h4>
                        </td>
                        <td style="width: 60%; float: left">
                            <h2 style="font-weight: bold;text-align: center; font-size: 16px;">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h2>
                            <h4 style="text-align: center;font-size: 14px;">Độc lập - Tự do - Hạnh phúc</h4>
                        </td>
                    </tr>
                </table>
                <br>
                <br>
                <table>
                    <tr>
                        <p style="width: 30%;float: right;">....., Ngày ..... Tháng .....Năm......</p>
                    </tr>
                </table>
                <table style="border: none; width: 100%;">
                    <tr>
                        <td style=" width:100% ; text-align: center;">
                            <h2 style="font-size: 20px; font-weight: bold">
                                <?php if ($model->loai_hinh==1){
                                    echo 'KẾ HOẠCH';
                                }else{
                                    echo 'THÔNG BÁO';
                                }?>
                            </h2>
                        </td>
                    </tr>
                </table>
               <p style="text-indent: 15px;"><?php echo  $model->noi_dung?></p>
                <br>
                <br>
                <table style="border: none; width: 100%;">
                    <tr>
                        <td style="float: left ; width: 30% ; text-align: center">

                        </td>
                        <td style="float: right ;width: 40% ; text-align: center">
                            <h5 style="text-align: center">Người ký</h5>
                            <span style="text-align: center;">(Ký tên, đóng dấu)</span>
                            <br>
                            <br>
                            <h2 style="text-align: center">
                                <?php if ($model->nguoi_ky==''||$model->nguoi_ky==null){
                                    echo '';
                                }else{
                                    $nguoiKy =\app\models\User::find()->where(['id'=>$model->nguoi_ky])->one();
                                    echo $nguoiKy->fullname;

                                }?></h2>
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

    jQuery(document).ready(function($) {
        $("a.word-export").click(function(event) {
            $("#printArea").wordExport();
        });
    });

    // }
</script>
</body>
</html>
