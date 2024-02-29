<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%sejarah_ketua}}".
 *
 * @property int $id
 * @property string $jabatan
 * @property string $nama
 * @property string $foto
 * @property string $bulan_mulai
 * @property string $tahun_mulai
 * @property string $bulan_selesai
 * @property string $tahun_selesai
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int $active
 */
class SejarahKetua extends \yii\db\ActiveRecord
 {

    public function behaviors() {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function beforeSave($insert) {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        if (!Yii::$app->user->isGuest) {
            $uid = Yii::$app->user->identity->id;
        } else {
            throw new \Exception("Who Are You?");
        }


        if (ActiveRecord::EVENT_BEFORE_INSERT) {
            $this->created_by = $uid;
            $this->updated_by = $uid;
        } else if (ActiveRecord::EVENT_BEFORE_UPDATE) {
            $this->updated_by = $uid;
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sejarah_ketua}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_dekranasda');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['urutan', 'jabatan', 'nama', 'bulan_mulai', 'tahun_mulai', 'bulan_selesai', 'tahun_selesai'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['urutan', 'created_by', 'updated_by', 'active'], 'integer'],
            [['jabatan', 'nama', 'foto', 'bulan_mulai', 'tahun_mulai', 'bulan_selesai', 'tahun_selesai'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        'urutan' => 'Ketua Ke',
            'jabatan' => 'Jabatan',
            'nama' => 'Nama',
            'foto' => 'Foto',
            'bulan_mulai' => 'Bulan Mulai',
            'tahun_mulai' => 'Tahun Mulai',
            'bulan_selesai' => 'Bulan Selesai',
            'tahun_selesai' => 'Tahun Selesai',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'active' => 'Active',
        ];
    }
}
