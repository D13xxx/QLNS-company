<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'QUẢN LÝ NHÂN SỰ',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top navbar-default',
        ],
    ]);
    if(Yii::$app->user->isGuest){
        $itemMenu=[
            ['label'=>'Đăng nhập hệ thống','url'=>['/site/login']]
        ];
    } else {
        $itemMenu=[
            ['label'=>'Quản lý Nhân sự','url'=>['/nhan-su/index']],
            ['label'=>'Công việc','url'=>['/cong-viec/quan-ly-cong-viec-giao']],
            ['label'=>'Kế hoạch - Thông báo','url'=>['/ke-hoach/index']],
            ['label'=>'Hệ thống','url'=>['/danh-muc-chung']],
            ['label'=>'Tài khoản ('.ucfirst(Yii::$app->user->identity->fullname).')','url'=>'#','items'=>[
                ['label' => 'Thông tin tài khoản', 'url' =>['/user/view?id=' . Yii::$app->user->id]],
                '<li class="divider"></li>',
                ['label'=>'Đổi mật khẩu','url'=>['/site/change-password']],
                '<li class="divider"></li>',
                ['label'=>'Đăng xuất hệ thống','url'=>['/site/logout'],'linkOptions' => ['data-method' => 'post']],
            ]],
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $itemMenu
    ]);
    NavBar::end();
    ?>
    <?php
        if ((Yii::$app->controller->id=='user')){
            ?>
            <div class="container col-md-12">
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        <?php }
        elseif ((Yii::$app->controller->id=='site') && (Yii::$app->controller->action->id=='index')){?>
            <?= $this->render('../site/index')?>
        <?php }
        elseif ((Yii::$app->controller->id=='site')||(Yii::$app->controller->id=='nhan-su')&&(Yii::$app->controller->action->id=='update')||(Yii::$app->controller->action->id=='create')){?>
            <div class="container col-md-12">
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
            <?php }
         else {?> 
            <div class="container col-md-12">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <div class="row">
                    <div class="col-sm-2">
                        <?= $this->render('menu-left')?>
                    </div>
                    <div class="col-sm-10">
                        <?= Alert::widget() ?>
                        <?= $content ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
<div class="clearfix"></div>
<footer class="footer">
    <div class="container">
        <p class="pull-right">Development by: Ngô Văn Điệp</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
