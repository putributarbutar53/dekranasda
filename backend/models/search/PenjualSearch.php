<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Penjual;

/**
 * PenjualSearch represents the model behind the search form of `backend\models\Penjual`.
 */
class PenjualSearch extends Penjual
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_des_kel', 'id_kecamatan', 'created_by', 'updated_by', 'active'], 'integer'],
            [['nama', 'no_hp', 'url_youtube', 'url_twitter', 'url_instagram', 'url_facebook', 'kode_pos', 'no_ktp', 'alamat', 'foto', 'created_at', 'updated_at'], 'safe'],
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
        $query = Penjual::find()
                ->alias('a')
                ->innerJoin(['user b'], 'a.id_user = b.id')
                ->where(['b.status' => 10]);

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
            'id_user' => $this->id_user,
            'id_des_kel' => $this->id_des_kel,
            'id_kecamatan' => $this->id_kecamatan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
                ->andFilterWhere(['like', 'url_youtube', $this->url_youtube])
            ->andFilterWhere(['like', 'url_twitter', $this->url_twitter])
            ->andFilterWhere(['like', 'url_instagram', $this->url_instagram])
            ->andFilterWhere(['like', 'url_facebook', $this->url_facebook])
            ->andFilterWhere(['like', 'kode_pos', $this->kode_pos])
            ->andFilterWhere(['like', 'no_ktp', $this->no_ktp])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
    
    public function searchProses($params)
    {
        $query = Penjual::find()
                ->alias('a')
                ->innerJoin(['user b'], 'a.id_user = b.id')
                ->where(['b.status'=>9]);

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
            'id_user' => $this->id_user,
            'id_des_kel' => $this->id_des_kel,
            'id_kecamatan' => $this->id_kecamatan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
                ->andFilterWhere(['like', 'url_youtube', $this->url_youtube])
            ->andFilterWhere(['like', 'url_twitter', $this->url_twitter])
            ->andFilterWhere(['like', 'url_instagram', $this->url_instagram])
            ->andFilterWhere(['like', 'url_facebook', $this->url_facebook])
            ->andFilterWhere(['like', 'kode_pos', $this->kode_pos])
            ->andFilterWhere(['like', 'no_ktp', $this->no_ktp])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'foto', $this->foto]);

        return $dataProvider;
    }
}
