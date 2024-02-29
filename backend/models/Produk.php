<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%produk}}".
 *
 * @property int $id
 * @property int $id_kategori
 * @property int $id_penjual
 * @property string $nama
 * @property string $harga
 * @property string $ukuran
 * @property string $warna
 * @property string $motif
 * @property string $deskripsi
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int $active
 *
 * @property MasterKategoriProduk $kategori
 * @property Penjual $penjual
 */
class Produk extends \yii\db\ActiveRecord
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
        return '{{%produk}}';
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
            [['id_kategori', 'id_penjual', 'nama', 'harga', 'ukuran', 'warna', 'motif', 'deskripsi'], 'required'],
            [['id_kategori', 'id_penjual', 'created_by', 'updated_by', 'active'], 'integer'],
            [['deskripsi'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama', 'harga', 'ukuran', 'warna', 'motif'], 'string', 'max' => 255],
            [['id_kategori'], 'exist', 'skipOnError' => true, 'targetClass' => MasterKategoriProduk::className(), 'targetAttribute' => ['id_kategori' => 'id']],
            [['id_penjual'], 'exist', 'skipOnError' => true, 'targetClass' => Penjual::className(), 'targetAttribute' => ['id_penjual' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kategori' => 'Id Kategori',
            'id_penjual' => 'Id Penjual',
            'nama' => 'Nama',
            'harga' => 'Harga',
            'ukuran' => 'Ukuran',
            'warna' => 'Warna',
            'motif' => 'Motif',
            'deskripsi' => 'Deskripsi',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[Kategori]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKategori()
    {
        return $this->hasOne(MasterKategoriProduk::className(), ['id' => 'id_kategori']);
    }

    /**
     * Gets query for [[Penjual]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenjual()
    {
        return $this->hasOne(Penjual::className(), ['id' => 'id_penjual']);
    }
}
