<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property int $id
 * @property string $name
 * @property string $lastName
 *
 * @property MemberContact[] $memberContacts
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 20],
            [['lastName'], 'string', 'max' => 40],

            [['name', 'lastName'], 'required', 'on' => 'update'],
            [['name', 'lastName'], 'required', 'on' => 'create']
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
            'lastName' => 'Last Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMemberContacts()
    {
        return $this->hasMany(MemberContact::className(), ['memberId' => 'id']);
    }
}
