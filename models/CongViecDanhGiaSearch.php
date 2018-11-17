<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CongViecDanhGia;

/**
 * CongViecDanhGiaSearch represents the model behind the search form of `app\models\CongViecDanhGia`.
 */
class CongViecDanhGiaSearch extends CongViecDanhGia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cong_viec_tien_do_id', 'nguoi_lap'], 'integer'],
            [['noi_dung', 'ngay_lap'], 'safe'],
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
        $query = CongViecDanhGia::find();

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
            'cong_viec_tien_do_id' => $this->cong_viec_tien_do_id,
//            'ngay_lap' => $this->ngay_lap,
            'nguoi_lap' => $this->nguoi_lap,
        ]);

        $query->andFilterWhere(['like', 'noi_dung', $this->noi_dung]);
        if(!empty($params['CongViecDanhGiaSearch']['ngay_lap'])){
            $query->andFilterWhere(['like','ngay_lap',Dungchung::convert_to_date($this->ngay_lap)]);
        }

        return $dataProvider;
    }
}
