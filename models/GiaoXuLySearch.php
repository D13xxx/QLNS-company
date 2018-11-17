<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GiaoXuLy;
use app\models\NhanSu;

/**
 * GiaoXuLySearch represents the model behind the search form of `app\models\GiaoXuLy`.
 */
class GiaoXuLySearch extends GiaoXuLy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'chuc_vu_id', 'phong_ban_id', 'ho_so_id', 'nhan_su_id'], 'integer'],
            [['dien_giai', 'dinh_kem', 'ngay_bat_dau', 'ngay_ket_thuc'], 'safe'],
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
        $query = GiaoXuLy::find();

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
            'chuc_vu_id' => $this->chuc_vu_id,
            'phong_ban_id' => $this->phong_ban_id,
            'ho_so_id' => $this->ho_so_id,
            'nhan_su_id' => $this->nhan_su_id,
            'ngay_bat_dau' => $this->ngay_bat_dau,
            'ngay_ket_thuc' => $this->ngay_ket_thuc,
        ]);

        $query->andFilterWhere(['like', 'dien_giai', $this->dien_giai])
            ->andFilterWhere(['like', 'dinh_kem', $this->dinh_kem]);

        return $dataProvider;
    }
}
