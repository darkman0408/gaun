<?php

namespace backend\controllers;

use Yii;
use common\models\Member;
use common\models\MemberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\MemberContact;

/**
 * MemberController implements the CRUD actions for Member model.
 */
class MemberController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Member models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Member model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Member model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /* $model = new Member();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]); */

        $member = new Member();

        if(!$member)
        {
            throw new NotFoundHttpException("The member was not found.");
        }

        $contact = new MemberContact();

        if(!$contact)
        {
            throw new NotFoundHttpException("The member has no contact info.");
        }

        $member->scenario = 'create';
        $contact->scenario = 'create';

        if ($member->load(Yii::$app->request->post()) && $contact->load(Yii::$app->request->post())) 
        {
            $isValid = $member->validate();
            $isValid = $contact->validate() && $isValid;
            if($isValid)
            {
                $member->save();
                $contact->memberId = $member->id;
                $contact->save();
                return $this->redirect(['member/create']);
            } 
        }

        return $this->render('create', [
            'member' => $member,
            'contact' => $contact
        ]);
    }

    /**
     * Updates an existing Member model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $member = Member::findOne($id);

        if(!$member)
        {
            throw new NotFoundHttpException("The member was not found.");
        }

        $contact = MemberContact::findOne($member->id);

        if(!$contact)
        {
            throw new NotFoundHttpException("The member has no contact info.");
        }

        $member->scenario = 'update';
        $contact->scenario = 'update';

        if ($member->load(Yii::$app->request->post()) && $contact->load(Yii::$app->request->post())) 
        {
            $isValid = $member->validate();
            $isValid = $contact->validate() && $isValid;
            if($isValid)
            {
                $member->save();
                $contact->memberId = $member->id;
                $contact->save();
                return $this->redirect(['member/view', 'id' => $id]);
            }
        }

        return $this->render('update', [
            'member' => $member,
            'contact' => $contact
        ]);
    }

    /**
     * Deletes an existing Member model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();

        $member = Member::findOne($id);
        $contact = MemberContact::findOne($member->id);

        if(!$member || !$contact)
        {
            throw new NotFoundHttpException("The member was not found.");
        }
        else
        {
            $member->delete();
            $contact->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Member model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Member the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Member::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
