<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Services */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-form">

    <?php $form = ActiveForm::begin([
        'method' => 'post',
        'action' => '#',
        'enableClientValidation' => false,
        'options' => [
            'id' => 'form-create-service',
            'class' => 'form-horizontal'
        ],
    ]); ?>
    
    <?= $form->field($model, 'name', 
        [
            'inputOptions' => [
                'class' => 'form-control']
    ])->textInput(['maxlength' => true])->label('Service Name') ?>

    <?= $form->field($model, 'description', [
        'inputOptions' => [
            'class' => 'form-control'
        ],
    ])->textarea(['rows' => 6])->label('Service Description') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'id' => 'onBtn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!-- create knockout view model -->
<script type="text/javascript">

    $('#onBtn').click(function(e) {

        var myObject = new Object();
        myObject.name = $("#services-name").val();
        myObject.description = $("#services-description").val();
        var myJson = JSON.stringify(myObject);
        
        $.ajax({
            url: "?r=services%2Fcreate",
            async: true,
            type: "POST",
            data: myJson,
            success: function(data) {
                console.log(data);
            },
            error: function()
            {
                console.log('Something wrong');
            }
        });       
    });
</script>