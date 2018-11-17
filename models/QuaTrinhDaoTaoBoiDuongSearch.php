<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QuaTrinhDaoTaoBoiDuong;

/**
 * QuaTrinhDaoTaoBoiDuongSearch represents the model behind the search form of `app\models\QuaTrinhDaoTaoBoiDuong`.
 */
class QuaTrinhDaoTaoBoiDuongSearch extends QuaTrinhDaoTaoBoiDuong
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nhan_su_id','trinh_do_id'], 'integer'],
            [['ten_truong', 'chuyen_nganh', 'tu_ngay', 'den_ngay', 'hinh_thuc_dao_tao', 'van_bang'], 'safe'],
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
        $query = QuaTrinhDaoTaoBoiDuong::find();

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
            'trinh_do_id'=>$this->trinh_do_id,
        ]);

        $query->andFilterWhere(['like', 'ten_truong', $this->ten_truong])
            ->andFilterWhere(['like', 'chuyen_nganh', $this->chuyen_nganh])
            ->andFilterWhere(['like', 'hinh_thuc_dao_tao', $this->hinh_thuc_dao_tao])
            ->andFilterWhere(['like', 'van_bang', $this->van_bang]);

        return $dataProvider;
    }
}
