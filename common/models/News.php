<?php

namespace common\models;

use Yii;
use yii\imagine\Image as Imagine;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $lead_photo
 * @property string $lead_text
 * @property string $content
 * @property string $createdAt
 * @property string $updatedAt
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['createdAt', 'updatedAt'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updatedAt'],
                ],
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute' => 'slug',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lead_photo', 'lead_text', 'content'], 'string'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 100],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'lead_photo' => Yii::t('app', 'Lead Photo'),
            'lead_text' => Yii::t('app', 'Lead Text'),
            'content' => Yii::t('app', 'Content'),
            'createdAt' => Yii::t('app', 'Created At'),
            'updatedAt' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Upload image
     */
    public function upload()
    {
        $imageData = $this->getImageData();
        $imageName = $imageData['name'];
        $extension = $imageData['ext'];

        if($this->validate())
        {
            $filePath = 'uploads/news_images/image/' . $imageName .  '.' . $extension;

            $frontFilePath = Yii::getAlias('@frontWeb') . '/uploads/news_images/image/' . $imageName . '.' . $extension;

            $this->imageFile->saveAs($filePath, false);

            $this->imageFile->saveAs($frontFilePath);

            $this->imageFile = null;
            $this->lead_photo = $filePath;
            
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Find name and extension of image
     */
    private function getImageData()
    {
        $imageData = [];

        if($this->validate())
        {
            $imageData = [
                'name' => $this->imageFile->baseName,
                'ext' => $this->imageFile->extension,               
            ];
        }
        else 
        {
            return false;
        }

        return $imageData;
    }
}
