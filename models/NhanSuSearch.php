<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NhanSu;

/**
 * NhanSuSearch represents the model behind the search form of `app\models\NhanSu`.
 */
class NhanSuSearch extends NhanSu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nghi_viec','gioi_tinh', 'que_quan_tinh_id', 'que_quan_huyen_id', 'que_quan_xa_id', 'dan_toc_id', 'ton_giao_id', 'chuc_vu_id',  'phong_ban_id', 'bac_luong', 'trinh_do_chuyen_mon_id',], 'integer'],
            [['ho_ten' ,'ten_khac', 'ngay_sinh', 'que_quan','ho_khau_thuong_tru', 'noi_o_hien_nay', 'nghe_nghiep_khi_tuyen', 'ngay_tuyen_dung', 'co_quan_tuyen_dung', 'cong_viec_chinh', 'ngay_huong', 'trinh_do_pho_thong', 'chuyen_nghanh', 'ngoai_ngu', 'tin_hoc','so_chung_minh_nhan_dan', 'ngay_cap', 'so_so_bhxh', 'anh_nhan_vien'], 'safe'],
            [['he_so', 'phu_cap_chuc_vu', 'phu_cap_khac'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = NhanSu::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'ngay_sinh' => $this->ngay_sinh,
            'gioi_tinh' => $this->gioi_tinh,
            'que_quan_tinh_id' => $this->que_quan_tinh_id,
            'que_quan_huyen_id' => $this->que_quan_huyen_id,
            'que_quan_xa_id' => $this->que_quan_xa_id,
            'dan_toc_id' => $this->dan_toc_id,
            'ton_giao_id' => $this->ton_giao_id,
            'ngay_tuyen_dung' => $this->ngay_tuyen_dung,
            'chuc_vu_id' => $this->chuc_vu_id,
            'chuc_danh' => $this->chuc_danh,
            'phong_ban_id' => $this->phong_ban_id,
            'bac_luong' => $this->bac_luong,
            'he_so' => $this->he_so,
            'ngay_huong' => $this->ngay_huong,
            'phu_cap_chuc_vu' => $this->phu_cap_chuc_vu,
            'phu_cap_khac' => $this->phu_cap_khac,
      
            'ngay_cap' => $this->ngay_cap,
            'nghi_viec'=>$this->nghi_viec,
        ]);

        $query->andFilterWhere(['like', 'ho_ten', $this->ho_ten])
            ->andFilterWhere(['like', 'ten_khac', $this->ten_khac])
            ->andFilterWhere(['like', 'que_quan', $this->que_quan])
            ->andFilterWhere(['like', 'ho_khau_thuong_tru', $this->ho_khau_thuong_tru])
            ->andFilterWhere(['like', 'noi_o_hien_nay', $this->noi_o_hien_nay])
            ->andFilterWhere(['like', 'nghe_nghiep_khi_tuyen', $this->nghe_nghiep_khi_tuyen])
            ->andFilterWhere(['like', 'co_quan_tuyen_dung', $this->co_quan_tuyen_dung])
            ->andFilterWhere(['like', 'cong_viec_chinh', $this->cong_viec_chinh])
            ->andFilterWhere(['like', 'trinh_do_pho_thong', $this->trinh_do_pho_thong])
            ->andFilterWhere(['like', 'chuyen_nghanh', $this->chuyen_nghanh])
            ->andFilterWhere(['like', 'ngoai_ngu', $this->ngoai_ngu])
            ->andFilterWhere(['like', 'tin_hoc', $this->tin_hoc])
            
            ->andFilterWhere(['like', 'so_chung_minh_nhan_dan', $this->so_chung_minh_nhan_dan])
            ->andFilterWhere(['like', 'so_so_bhxh', $this->so_so_bhxh])
            ->andFilterWhere(['like', 'anh_nhan_vien', $this->anh_nhan_vien])

            ->andFilterWhere(['like', 'than_nhan_o_nuoc_ngoai', $this->than_nhan_o_nuoc_ngoai]);
        if(!empty($params['NhanSuSearch']['ngay_sinh'])){
            $query->andFilterWhere(['ngay_sinh'=>Dungchung::convert_to_date($this->ngay_sinh)]);
        }
        return $dataProvider;
    }
}
