<?php

namespace common\models;

use common\models\Member;
use common\models\MemberContact;
use Yii;
use yii\base\Model;
use yii\widgets\ActiveForm;

class MemberForm extends Model
{
    private $_member;
    private $_memberContact;

    public function rules()
    {
        return [
            [['Member'], 'required'],
            [['MemberContact'], 'safe'],
        ];
    }

    public function afterValidate()
    {
        $error = false;

        if(!$this->member->validate())
        {
            $error = true;
        }

        if(!$this->memberContact->validate())
        {
            $error = true;
        }

        if($error)
        {
            $this->addError(null); // add an empty error to prevent saving
        }

        parent::afterValidate();
    }

    public function save()
    {
        if(!$this->validate())
        {
            return false;
        }

        $transaction = Yii::$app->db->beginTransaction();
        
        if(!$this->member->save())
        {
            $transaction->rollBack();
            return false;
        }

        $this->memberContact->memberId = $this->member->id;

        if(!$this->memberContact->save(false))
        {
            $transaction->rollBack();
            return false;
        }

        $transaction->commit();
        return true;
    }

    public function getMember()
    {
        return $this->_member;
    }

    public function setMember($member)
    {
        if($member instanceof Member)
        {
            $this->_member = $member;
        }
        else if(is_array($member))
        {
            $this->_member->setAttributes($member);
        }
    }

    public function getMemberContact()
    {
        if($this->_memberContact === null)
        {
            if($this->member->isNewRecord)
            {
                $this->_memberContact = new MemberContact();
                $this->_memberContact->loadDefaultValues();
            }
            else
            {
                $this->_memberContact = $this->member->memberContact;
            }
        }

        return $this->_memberContact;
    }

    public function setMemberContact($memberContact)
    {
        if(is_array($memberContact))
        {
            $this->memberContact->setAttributes($memberContact);
        }
        else if($memberContact instanceof MemberContact)
        {
            $this->_memberContact = $memberContact;
        }
    }

    public function errorSummary($form)
    {
        $errorLists = [];

        foreach($this->getAllModels() as $id => $model)
        {
            $errorList = $form->error->errorSummary($model, [
                'header' => '<p>Please fix the following errors for <b>' . $id . '</b></p>',
            ]);
            $errorList = str_replace('<li></li>', '', $errorList); // remove the empty error
            $errorLists[] = $errorList;
        }

        return implode('', $errorLists);
    }

    private function getAllModels()
    {
        return [
            'Member' => $this->member,
            'MemberContact' => $this->memberContact,
        ];
    }
}