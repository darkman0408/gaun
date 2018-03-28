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
            'id' => 'ID',
            'name' => 'Name',
            'thumbnail' => 'Thumbnail',
            'image' => 'Image',
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


            $this->imageFile->saveAs($filePath);

            // thumbnail
            Imagine::thumbnail($filePath, 120, 120)
                ->save($thumbPath, ['quality' => 50]);

            $this->imageFile = null;
            $this->image = $filePath;
            
            $this->thumbnail = $thumbPath;
            
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
