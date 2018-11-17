<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DienBienKyLuat;

/**
 * DienBienKyLuatSearch represents the model behind the search form of `app\models\DienBienKyLuat`.
 */
class DienBienKyLuatSearch extends DienBienKyLuat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nhan_su_id'], 'integer'],
            [['ngay_thang', 'so_quyet_dinh', 'noi_dung', 'hinh_thuc', 'cap_quyet_dinh'], 'safe'],
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
        $query = DienBienKyLuat::find();

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
            //'ngay_thang' => $this->ngay_thang,
            'nhan_su_id' => $this->nhan_su_id,
        ]);

        $query->andFilterWhere(['like', 'so_quyet_dinh', $this->so_quyet_dinh])
            ->andFilterWhere(['like', 'noi_dung', $this->noi_dung])
            ->andFilterWhere(['like', 'hinh_thuc', $this->hinh_thuc])
            ->andFilterWhere(['like', 'cap_quyet_dinh', $this->cap_quyet_dinh]);
        if(!empty($params['DienBienKyLuatSearch']['ngay_thang'])){
            $query->andFilterWhere(['like','ngay_thang',Dungchung::convert_to_date($this->ngay_thang)]);
        }
        return $dataProvider;
    }
}
