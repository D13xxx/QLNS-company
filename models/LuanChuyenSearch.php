<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LuanChuyen;

/**
 * LuanChuyenSearch represents the model behind the search form of `app\models\LuanChuyen`.
 */
class LuanChuyenSearch extends LuanChuyen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nhan_su_id', 'phong_ban_cu', 'phong_ban_moi'], 'integer'],
            [['ngay_dieu_chinh', 'ngay_ap_dung', 'so_quyet_dinh'], 'safe'],
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
        $query = LuanChuyen::find();

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
            'phong_ban_cu' => $this->phong_ban_cu,
            'phong_ban_moi' => $this->phong_ban_moi,
            'ngay_dieu_chinh' => $this->ngay_dieu_chinh,
            'ngay_ap_dung' => $this->ngay_ap_dung,
        ]);

        $query->andFilterWhere(['like', 'so_quyet_dinh', $this->so_quyet_dinh]);

        return $dataProvider;
    }
}
