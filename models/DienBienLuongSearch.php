<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DienBienLuong;

/**
 * DienBienLuongSearch represents the model behind the search form of `app\models\DienBienLuong`.
 */
class DienBienLuongSearch extends DienBienLuong
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nhan_su_id'], 'integer'],
            [['ngay_thang', 'ma_ngach', 'ngach_cong_chu', 'bac_luong', 'muc_huong', 'loai_nang_luong', 'so_quyet_dinh'], 'safe'],
            [['he_so_luong'], 'number'],
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
        $query = DienBienLuong::find();

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
            'ngay_thang' => $this->ngay_thang,
            'he_so_luong' => $this->he_so_luong,
            'nhan_su_id' => $this->nhan_su_id,
        ]);

        $query->andFilterWhere(['like', 'ma_ngach', $this->ma_ngach])
            ->andFilterWhere(['like', 'ngach_cong_chu', $this->ngach_cong_chu])
            ->andFilterWhere(['like', 'bac_luong', $this->bac_luong])
            ->andFilterWhere(['like', 'muc_huong', $this->muc_huong])
            ->andFilterWhere(['like', 'loai_nang_luong', $this->loai_nang_luong])
            ->andFilterWhere(['like', 'so_quyet_dinh', $this->so_quyet_dinh]);

        return $dataProvider;
    }
}
