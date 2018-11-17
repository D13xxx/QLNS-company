<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\XaPhuong;

/**
 * XaPhuongSearch represents the model behind the search form of `app\models\XaPhuong`.
 */
class XaPhuongSearch extends XaPhuong
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'quan_huyen_id','tinh_thanh_id'], 'integer'],
            [['ma', 'ten'], 'safe'],
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
        $query = XaPhuong::find();

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
            'quan_huyen_id' => $this->quan_huyen_id,
            'tinh_thanh_id'=>$this->tinh_thanh_id,
        ]);

        $query->andFilterWhere(['like', 'ma', $this->ma])
            ->andFilterWhere(['like', 'ten', $this->ten]);

        return $dataProvider;
    }
}
