<?php

namespace backend\models;
use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%penjual}}".
 *
 * @property int $id
 * @property int $id_user
 * @property string $nama
 * @property string $no_hp
 * @property string $url_youtube
 * @property string $url_twitter
 * @property string $url_instagram
 * @property string $url_facebook
 * @property string $kode_pos
 * @property int $id_des_kel
 * @property int $id_kecamatan
 * @property string $no_ktp
 * @property string $alamat
 * @property string $foto
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int $active
 *
 * @property MasterDesKel $desKel
 * @property MasterKecamatan $kecamatan
 * @property User $user
 * @property Produk[] $produks
 */
class Penjual extends \yii\db\ActiveRecord
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

//    public function beforeSave($insert) {
//        if (!parent::beforeSave($insert)) {
//            return false;
//        }
//        if (!Yii::$app->user->isGuest) {
//            $uid = Yii::$app->user->identity->id;
//        } else {
//            throw new \Exception("Who Are You?");
//        }
//
//
//        if (ActiveRecord::EVENT_BEFORE_INSERT) {
//            $this->created_by = $uid;
//            $this->updated_by = $uid;
//        } else if (ActiveRecord::EVENT_BEFORE_UPDATE) {
//            $this->updated_by = $uid;
//        }
//
//        return true;
//    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%penjual}}';
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
            [['id_user', 'nama', 'no_hp', 'url_youtube', 'url_twitter', 'url_instagram', 'url_facebook', 'kode_pos', 'id_des_kel', 'id_kecamatan', 'no_ktp', 'alamat', 'foto'], 'required'],
                [['id_user', 'id_des_kel', 'id_kecamatan', 'created_by', 'updated_by', 'active'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama', 'url_youtube', 'url_twitter', 'url_instagram', 'url_facebook', 'kode_pos', 'no_ktp', 'alamat', 'foto', 'no_hp'], 'string', 'max' => 255],
                [['id_des_kel'], 'exist', 'skipOnError' => true, 'targetClass' => MasterDesKel::className(), 'targetAttribute' => ['id_des_kel' => 'id']],
            [['id_kecamatan'], 'exist', 'skipOnError' => true, 'targetClass' => MasterKecamatan::className(), 'targetAttribute' => ['id_kecamatan' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'nama' => 'Nama',
            'no_hp' => 'No HP',
            'url_youtube' => 'Url Youtube',
            'url_twitter' => 'Url Twitter',
            'url_instagram' => 'Url Instagram',
            'url_facebook' => 'Url Facebook',
            'kode_pos' => 'Kode Pos',
            'id_des_kel' => 'Id Des Kel',
            'id_kecamatan' => 'Id Kecamatan',
            'no_ktp' => 'No Ktp',
            'alamat' => 'Alamat',
            'foto' => 'Foto',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[DesKel]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDesKel()
    {
        return $this->hasOne(MasterDesKel::className(), ['id' => 'id_des_kel']);
    }

    /**
     * Gets query for [[Kecamatan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(MasterKecamatan::className(), ['id' => 'id_kecamatan']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * Gets query for [[Produks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduks()
    {
        return $this->hasMany(Produk::className(), ['id_penjual' => 'id']);
    }
}
