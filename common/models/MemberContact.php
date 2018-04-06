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

            [['phone', 'email'], 'required', 'on' => 'update'],
            [['phone', 'email'], 'required', 'on' => 'create']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app','ID'),
            'memberId' => Yii::t('app','Member ID'),
            'phone' => Yii::t('app','Phone'),
            'email' => Yii::t('app','Email'),
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
