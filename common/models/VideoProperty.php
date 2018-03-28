<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "videoProperty".
 *
 * @property int $id
 * @property int $videoId
 * @property string $title
 * @property string $image
 * @property int $imageWidth
 * @property int $imageHeight
 * @property string $code
 * @property int $width
 * @property int $height
 * @property string $providerName
 *
 * @property Video $video
 */
class VideoProperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'videoProperty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['videoId', 'imageWidth', 'imageHeight', 'width', 'height'], 'integer'],
            [['code'], 'string'],
            [['title', 'image'], 'string', 'max' => 255],
            [['providerName'], 'string', 'max' => 30],
            [['videoId'], 'exist', 'skipOnError' => true, 'targetClass' => Video::className(), 'targetAttribute' => ['videoId' => 'id']],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'videoId' => 'Video ID',
            'title' => 'Title',
            'image' => 'Image',
            'imageWidth' => 'Image Width',
            'imageHeight' => 'Image Height',
            'code' => 'Code',
            'width' => 'Width',
            'height' => 'Height',
            'providerName' => 'Provider Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideo()
    {
        return $this->hasOne(Video::className(), ['id' => 'videoId']);
    }
}
