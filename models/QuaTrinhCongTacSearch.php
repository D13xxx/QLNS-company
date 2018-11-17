<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QuaTrinhCongTac;

/**
 * QuaTrinhCongTacSearch represents the model behind the search form of `app\models\QuaTrinhCongTac`.
 */
class QuaTrinhCongTacSearch extends QuaTrinhCongTac
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nhan_su_id', 'chu_vu_id'], 'integer'],
            [['tu_ngay', 'den_ngay', 'qua_trinh_cong_tac', 'bien_che', 'chuc_danh'], 'safe'],
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
        $query = QuaTrinhCongTac::find();

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
            'tu_ngay' => $this->tu_ngay,
            'den_ngay' => $this->den_ngay,
            'chu_vu_id' => $this->chu_vu_id,
        ]);

        $query->andFilterWhere(['like', 'qua_trinh_cong_tac', $this->qua_trinh_cong_tac])
            ->andFilterWhere(['like', 'bien_che', $this->bien_che])
            ->andFilterWhere(['like', 'chuc_danh', $this->chuc_danh]);

        return $dataProvider;
    }
}
