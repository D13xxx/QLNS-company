<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QuaTrinhNghiPhep;

/**
 * QuaTrinhNghiPhepSearch represents the model behind the search form of `app\models\QuaTrinhNghiPhep`.
 */
class QuaTrinhNghiPhepSearch extends QuaTrinhNghiPhep
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nhan_su_id', 'loai_hinh_nghi_phep_id'], 'integer'],
            [['tu_ngay', 'den_ngay', 'ly_do'], 'safe'],
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
        $query = QuaTrinhNghiPhep::find();

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
            'nhan_su_id' => $this->nhan_su_id,
            'loai_hinh_nghi_phep_id' => $this->loai_hinh_nghi_phep_id,
            //'tu_ngay' => $this->tu_ngay,
            //'den_ngay' => $this->den_ngay,
        ]);

        $query->andFilterWhere(['like', 'ly_do', $this->ly_do]);

        if(!empty($params['QuaTrinhNghiPhepSearch']['tu_ngay'])){
            $query->andFilterWhere(['like','tu_ngay',Dungchung::convert_to_date($this->tu_ngay)]);
        }
        if(!empty($params['QuaTrinhNghiPhepSearch']['den_ngay'])){
            $query->andFilterWhere(['like','den_ngay',Dungchung::convert_to_date($this->den_ngay)]);
        }

        return $dataProvider;
    }
}
