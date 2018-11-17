<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CongViec;

/**
 * CongViecSearch represents the model behind the search form of `app\models\CongViec`.
 */
class CongViecSearch extends CongViec
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nguoi_lap', 'nguoi_thuc_hien', 'trang_thai'], 'integer'],
            [['ten', 'noi_dung', 'ngay_lap', 'ngay_bat_dau', 'ngay_ket_thuc','ngay_hoan_thanh','ngay_xac_minh_hoan_thanh','yeu_cau_cong_viec'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = CongViec::find();

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
            'nguoi_lap' => $this->nguoi_lap,
            'ngay_lap' => $this->ngay_lap,
//            'ngay_bat_dau' => $this->ngay_bat_dau,
//            'ngay_ket_thuc' => $this->ngay_ket_thuc,
            'nguoi_thuc_hien' => $this->nguoi_thuc_hien,
            'trang_thai' => $this->trang_thai,
        ]);

        $query->andFilterWhere(['like', 'ten', $this->ten])
            ->andFilterWhere(['like','yeu_cau_cong_viec',$this->yeu_cau_cong_viec])
            ->andFilterWhere(['like', 'noi_dung', $this->noi_dung]);
        if(!empty($params['CongViecSearch']['ngay_bat_dau'])){
            $query->andFilterWhere(['like','ngay_bat_dau',Dungchung::convert_to_date($this->ngay_bat_dau)]);
        }
        if(!empty($params['CongViecSearch']['ngay_ket_thuc'])){
            $query->andFilterWhere(['like','ngay_ket_thuc',Dungchung::convert_to_date($this->ngay_ket_thuc)]);
        }
        if(!empty($params['CongViecSearch']['ngay_hoan_thanh'])){
            $query->andFilterWhere(['like','ngay_hoan_thanh',Dungchung::convert_to_date($this->ngay_hoan_thanh)]);
        }
        if(!empty($params['CongViecSearch']['ngay_xac_minh_hoan_thanh'])){
            $query->andFilterWhere(['like','ngay_xac_minh_hoan_thanh',Dungchung::convert_to_date($this->ngay_xac_minh_hoan_thanh)]);
        }
        return $dataProvider;
    }
}
