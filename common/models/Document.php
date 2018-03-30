<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property string $name
 * @property string $document
 */
class Document extends \yii\db\ActiveRecord
{
    public $fileDoc;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document'], 'string'],
            [['name'], 'string', 'max' => 50],
            [['fileDoc'], 'file'],
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
            'document' => 'Document',
        ];
    }

     /**
     * Upload file
     */
    public function upload()
    {
        $fileName = $this->fileDoc->baseName;
        $extension = $this->fileDoc->extension;
        if($this->validate())
        {
            $filePath = 'uploads/documents/' . $fileName . '.' . $extension;
            $this->fileDoc->saveAs($filePath);
            $this->fileDoc = null;
            $this->document = $filePath;
            
            return true;
        }
        else
        {
            return false;
        }
    }
}
