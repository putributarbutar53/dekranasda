<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%berita}}".
 *
 * @property int $id
 * @property int $id_jenis_berita
 * @property string $judul
 * @property string $isi
 * @property string $foto
 * @property string $file
 * @property int $jumlah_view
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int $active
 *
 * @property MasterJenisBerita $jenisBerita
 */
class Berita extends \yii\db\ActiveRecord
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
        return '{{%berita}}';
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
            [['id_jenis_berita', 'judul', 'isi'], 'required'],
            [['id_jenis_berita', 'created_by', 'updated_by', 'active', 'jumlah_view'], 'integer'],
                [['isi'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['judul', 'foto', 'file'], 'string', 'max' => 255],
                [['id_jenis_berita'], 'exist', 'skipOnError' => true, 'targetClass' => MasterJenisBerita::className(), 'targetAttribute' => ['id_jenis_berita' => 'id']],
                [['foto'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpeg,png,gif,jpg',],
                [['foto'], 'file', 'maxSize' => 5000 * 1024, 'tooBig' => 'Limit is 5MB'],
                [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf,docx,jpeg,png,gif,jpg,doc,xls,xlsx',],
                [['file'], 'file', 'maxSize' => 5000 * 1024, 'tooBig' => 'Limit is 5MB'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_jenis_berita' => 'Id Jenis Berita',
            'judul' => 'Judul',
            'isi' => 'Isi',
            'foto' => 'Foto',
            'file' => 'File',
            'jumlah_view' => 'Jumlah View',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[JenisBerita]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisBerita()
    {
        return $this->hasOne(MasterJenisBerita::className(), ['id' => 'id_jenis_berita']);
    }
}
