<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CongViecTienDo;

/**
 * CongViecTienDoSearch represents the model behind the search form of `app\models\CongViecTienDo`.
 */
class CongViecTienDoSearch extends CongViecTienDo
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nguoi_lap', 'tien_do', 'cong_viec_id'], 'integer'],
            [['noi_dung', 'ngay_lap', 'tep_dinh_kem'], 'safe'],
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
        $query = CongViecTienDo::find();

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
            'nguoi_lap' => $this->nguoi_lap,
            //'ngay_lap' => $this->ngay_lap,
            'tien_do' => $this->tien_do,
            'cong_viec_id' => $this->cong_viec_id,
        ]);

        $query->andFilterWhere(['like', 'noi_dung', $this->noi_dung])
            ->andFilterWhere(['like', 'tep_dinh_kem', $this->tep_dinh_kem]);
        if(!empty($params['CongViecTienDoSearch']['ngay_lap'])){
            $query->andFilterWhere(['like','ngay_lap',Dungchung::convert_to_date($this->ngay_lap)]);
        }

        return $dataProvider;
    }
}
