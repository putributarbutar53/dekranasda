<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SejarahKetua;

/**
 * SejarahKetuaSearch represents the model behind the search form of `backend\models\SejarahKetua`.
 */
class SejarahKetuaSearch extends SejarahKetua
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_by', 'updated_by', 'active'], 'integer'],
            [['jabatan', 'nama', 'foto', 'bulan_mulai', 'tahun_mulai', 'bulan_selesai', 'tahun_selesai', 'created_at', 'updated_at'], 'safe'],
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
        $query = SejarahKetua::find();

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
            'bulan_mulai' => $this->bulan_mulai,
            'tahun_mulai' => $this->tahun_mulai,
            'bulan_selesai' => $this->bulan_selesai,
            'tahun_selesai' => $this->tahun_selesai,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'jabatan', $this->jabatan])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
