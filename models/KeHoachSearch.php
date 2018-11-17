<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\KeHoach;

/**
 * KeHoachSearch represents the model behind the search form of `app\models\KeHoach`.
 */
class KeHoachSearch extends KeHoach
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nguoi_tao', 'chuc_vu_id', 'nguoi_ky', 'loai_hinh', 'trang_thai'], 'integer'],
            [['so_hieu', 'noi_dung', 'ngay_tao'], 'safe'],
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
        $query = KeHoach::find();

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
            'nguoi_tao' => $this->nguoi_tao,
            'ngay_tao' => $this->ngay_tao,
            'chuc_vu_id' => $this->chuc_vu_id,
            'nguoi_ky' => $this->nguoi_ky,
            'loai_hinh' => $this->loai_hinh,
            'trang_thai' => $this->trang_thai,
        ]);

        $query->andFilterWhere(['like', 'so_hieu', $this->so_hieu])
            ->andFilterWhere(['like', 'noi_dung', $this->noi_dung]);

        return $dataProvider;
    }
}
