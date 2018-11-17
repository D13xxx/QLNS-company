<?php


namespace app\models;;
use yii\db\Query;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use Yii;
//use yii\web\HttpException;

class Dungchung extends \yii\base\Model
{
    
    public static function convert_number_to_words($number) {
        $hyphen      = ' ';
        $conjunction = '  ';
        $separator   = ' ';
        $negative    = 'âm ';
        $decimal     = ' phẩy ';
        $dictionary  = array(
        0                   => 'không',
        1                   => 'một',
        2                   => 'hai',
        3                   => 'ba',
        4                   => 'bốn',
        5                   => 'năm',
        6                   => 'sáu',
        7                   => 'bảy',
        8                   => 'tám',
        9                   => 'chín',
        10                  => 'mười',
        11                  => 'mười một',
        12                  => 'mười hai',
        13                  => 'mười ba',
        14                  => 'mười bốn',
        15                  => 'mười năm',
        16                  => 'mười sáu',
        17                  => 'mười bảy',
        18                  => 'mười tám',
        19                  => 'mười chín',
        20                  => 'hai mươi',
        30                  => 'ba mươi',
        40                  => 'bốn mươi',
        50                  => 'năm mươi',
        60                  => 'sáu mươi',
        70                  => 'bảy mươi',
        80                  => 'tám mươi',
        90                  => 'chín mươi',
        100                 => 'trăm',
        1000                => 'nghìn',
        1000000             => 'triệu',
        1000000000          => 'tỷ',
        1000000000000       => 'nghìn tỷ',
        1000000000000000    => 'nghìn triệu triệu',
        1000000000000000000 => 'tỷ tỷ'
        );
    if (!is_numeric($number)) {
        return false;
    }
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
        'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
        E_USER_WARNING
        );
        return false;
    }
    if ($number < 0) {
        return $negative . Dungchung::convert_number_to_words(abs($number));
    }
    $string = $fraction = null;
        if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }
    switch (true) {
    case $number < 21:
        $string = $dictionary[$number];
    break;
    case $number < 100:
        $tens   = ((int) ($number / 10)) * 10;
        $units  = $number % 10;
        $string = $dictionary[$tens];
        if ($units) {
            $string .= $hyphen . $dictionary[$units];
        }
    break;
    case $number < 1000:
        $hundreds  = $number / 100;
        $remainder = $number % 100;
        $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
        if ($remainder) {
            $string .= $conjunction . Dungchung::convert_number_to_words($remainder);
        }
    break;
    default:
        $baseUnit = pow(1000, floor(log($number, 1000)));
        $numBaseUnits = (int) ($number / $baseUnit);
        $remainder = $number % $baseUnit;
        $string = Dungchung::convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
        if ($remainder) {
            $string .= $remainder < 100 ? $conjunction : $separator;
            $string .= Dungchung::convert_number_to_words($remainder);
        }
        break;
    }
    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }
        return $string;
}
    
    public static function convert_to_date($string)
    {
        if($string!=Null||$string!='')
        {
            $mangdulieu=explode('/',$string);
            $soluongphantu=count($mangdulieu);
            if($soluongphantu<1 || $soluongphantu>3)
            {
                return FALSE;
            } else {
                if($soluongphantu==1)
                {
                    $ngay=$mangdulieu[0];
                    $thang=date("m");
                    $nam=date("Y");
                    $gio=date("H");
                    $phut=date("i");
                    $giay=date("s");
                }
                if($soluongphantu==2)
                {
                    $ngay=$mangdulieu[0];
                    $thang=$mangdulieu[1];
                    $nam=date("Y");
                    $gio=date("H");
                    $phut=date("i");
                    $giay=date("s");
                }
                if($soluongphantu==3)
                {
                    $ngay=$mangdulieu[0];
                    $thang=$mangdulieu[1];
                    if(strlen($mangdulieu[2])>4){
                        $nam= substr($mangdulieu[2], 0,4);
                        $mangGio= explode(':', trim(substr($mangdulieu[2], 5)));
                        $phantugio=count($mangGio);
                        if($phantugio<1 || $phantugio>3)
                        {
                            $gio='00';
                            $phut='00';
                            $giay='00';
                        } else {
                            if($phantugio==1)
                            {
                                if(int($gio)<0 || int($gio)>23)
                                {
                                    $gio='00';
                                }
                                $gio=$mangGio[0];
                                $phut='00';
                                $giay='00';
                            }
                            if($phantugio==2)
                            {
                                if(int($gio)<0 || int($gio)>23)
                                {
                                    $gio='00';
                                }
                                $gio=$mangGio[0];
                                if(int($phut)<0||int($phut)>59)
                                {
                                    $phut='00';
                                }
                                $phut=$mangGio[1];
                                $giay='00';
                            }
                            if($phantugio==3)
                            {
                                if(int($gio)<0 || int($gio)>23)
                                {
                                    $gio='00';
                                }
                                $gio=$mangGio[0];
                                if(int($phut)<0||int($phut)>59)
                                {
                                    $phut='00';
                                }
                                $phut=$mangGio[1];
                                if(int($giay)<0 || int($giay)>59)
                                {
                                    $giay='00';
                                }
                                $giay=$mangGio[2];
                            }
                        }
                    } else {
                        $nam=$mangdulieu[2];
                        $gio='00';
                        $phut='00';
                        $giay='00';
                    }
                }
            }
            if((strlen($ngay)!==2)||(strlen($thang)!==2)||(strlen($nam)!==4))
            {
                return FALSE;
            }
            if(checkdate($thang, $ngay, $nam))
            {
                return $nam.'-'.$thang.'-'.$ngay.' '.$gio.':'.$phut.':'.$giay;
            } else {
                return FALSE;
            }
        }
        return FALSE;
    }
    
    public static function SinhMa($tiento,$bangdulieu)
    {
        if(($tiento!==''||$tiento!==NULL)&&($bangdulieu!==''||$bangdulieu!==NULL))
        {
            $connection = \Yii::$app->db;
            $sql="SELECT max(id)+1 as ids FROM ".$bangdulieu;
            $command=$connection->createCommand($sql);
            $mangdulieu=$command->queryScalar();
            if($mangdulieu==''||$mangdulieu==NULL)
            {
                return $tiento.'00001';
            }
            return $tiento.str_pad($mangdulieu, 5, '0', STR_PAD_LEFT);
        }
    }

    public static function SinhMaHoSo($truongDuLieu,$bangdulieu,$dieuKienTimKiem='')
    {
        $connection = \Yii::$app->db;
        if ($dieuKienTimKiem==''){
                return '1';
        }else{
            $sql = "SELECT max($truongDuLieu)+1 as ids FROM " . $bangdulieu . " where ". $dieuKienTimKiem;
        }
        $command = $connection->createCommand($sql);
        $mangdulieu = $command->queryScalar();
        if ($mangdulieu == '' || $mangdulieu == NULL) {
            return '1';
        }
        return $mangdulieu;
    }

    public static function TaoMaSlug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }

    public static function checkPermission($tenQuyen)
    {
        if(!empty($tenQuyen)){
            $controller=Yii::$app->controller->id;
            $action= Yii::$app->controller->action->id;
            $urlQuyen= '/'.$controller.'/'.$action;
            //$nguoiDung= User::find()->where(['id'=>Yii::$app->user->id])->one();
            if(AuthAssignment::find()->where(['and',['user_id'=>Yii::$app->user->id],['item_name'=>$urlQuyen]])->count()>0){
                $quyenHan=AuthAssignment::find()->where(['and',['user_id'=>Yii::$app->user->id],['item_name'=>$urlQuyen]])->one();
                if(strtolower($tenQuyen)=='is_view'){
                    if($quyenHan->is_view==true){
                        return true;
                    } else {
                        throw new HttpException(403,'Bạn không có quyền để truy cập chức năng này');
                    }
                }
                if(strtolower($tenQuyen)=='is_delete'){
                    if($quyenHan->is_delete==true){
                        return true;
                    } else {
                        throw new HttpException(403,'Bạn không có quyền để truy cập chức năng này');
                    }
                }
                if(strtolower($tenQuyen)=='is_created'){
                    if($quyenHan->is_created==true){
                        return true;
                    } else {
                        throw new HttpException(403,'Bạn không có quyền để truy cập chức năng này');
                    }
                }
                if(strtolower($tenQuyen)=='is_update'){
                    if($quyenHan->is_update==true){
                        return true;
                    } else {
                        throw new HttpException(403,'Bạn không có quyền để truy cập chức năng này');
                    }
                }
                if(strtolower($tenQuyen)=='is_export'){
                    if($quyenHan->is_export==true){
                        return true;
                    } else {
                        throw new HttpException(403,'Bạn không có quyền để truy cập chức năng này');
                    }
                }
            } else {
                throw new HttpException(403,'Bạn không có quyền hạn để truy cập');
            }

        } else {
            throw new NotFoundHttpException('Tên quyền hạn không hợp lệ');
        }
    }
}