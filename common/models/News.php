<?php

namespace common\models;

use Yii;
use yii\imagine\Image as Imagine;

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
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'lead_photo' => 'Lead Photo',
            'lead_text' => 'Lead Text',
            'content' => 'Content',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
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

            $this->imageFile->saveAs($filePath);

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
