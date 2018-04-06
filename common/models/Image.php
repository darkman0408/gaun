<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\behaviors\SluggableBehavior;
use yii\imagine\Image as Imagine;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $name
 * @property string $thumbnail
 * @property string $image
 */
class Image extends \yii\db\ActiveRecord
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
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thumbnail', 'image'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','ID'),
            'name' => Yii::t('app','Name'),
            'thumbnail' => Yii::t('app','Thumbnail'),
            'image' => Yii::t('app','Image'),
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
            $filePath = 'uploads/images/image/' . $imageName . '.' . $extension;
            $thumbPath = 'uploads/images/thumb/' . $imageName . '.' . $extension;

            $frontFilePath = Yii::getAlias('@frontWeb') . '/uploads/images/image/' . $imageName . '.' . $extension;
            $frontThumbPath = Yii::getAlias('@frontWeb') . '/uploads/images/thumb/' . $imageName . '.' . $extension;


            $this->imageFile->saveAs($filePath, false);

            $this->imageFile->saveAs($frontFilePath);

            // thumbnail
            Imagine::thumbnail($filePath, 120, 120)
                ->save($thumbPath, ['quality' => 50]);

            Imagine::thumbnail($filePath, 120, 120)
                ->save($frontThumbPath, ['quality' => 50]);

            $this->imageFile = null;
            $this->image = $filePath;

            //$this->image = $frontFilePath;
            
            $this->thumbnail = $thumbPath;

            //$this->thumbnail = $frontThumbPath;
            
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
