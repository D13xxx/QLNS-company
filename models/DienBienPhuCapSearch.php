<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DienBienPhuCap;

/**
 * DienBienPhuCapSearch represents the model behind the search form of `app\models\DienBienPhuCap`.
 */
class DienBienPhuCapSearch extends DienBienPhuCap
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nhan_su_id'], 'integer'],
            [['ten', 'muc_huong', 'tu_ngay', 'den_ngay', 'so_quyet_dinh'], 'safe'],
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
        $query = DienBienPhuCap::find();

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
            'tu_ngay' => $this->tu_ngay,
            'den_ngay' => $this->den_ngay,
            'nhan_su_id' => $this->nhan_su_id,
        ]);

        $query->andFilterWhere(['like', 'ten', $this->ten])
            ->andFilterWhere(['like', 'muc_huong', $this->muc_huong])
            ->andFilterWhere(['like', 'so_quyet_dinh', $this->so_quyet_dinh]);

        return $dataProvider;
    }
}
