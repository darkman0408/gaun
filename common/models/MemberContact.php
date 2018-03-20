<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "memberContact".
 *
 * @property int $id
 * @property int $memberId
 * @property string $phone
 * @property string $email
 *
 * @property Member $member
 */
class MemberContact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'memberContact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['memberId'], 'integer'],
            [['phone'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 50],
            [['memberId'], 'exist', 'skipOnError' => true, 'targetClass' => Member::className(), 'targetAttribute' => ['memberId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'memberId' => 'Member ID',
            'phone' => 'Phone',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Member::className(), ['id' => 'memberId']);
    }
}
