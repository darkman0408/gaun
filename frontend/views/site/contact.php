<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;

require_once(Yii::getAlias('@common') . '/' . 'helpers/language.php');
languageSelector($language);
?>

<div class="site-contact">
    <h1><?= Yii::t('frontend', Html::encode($this->title)) ?></h1>

    <div class="row">
        <div class="col-lg-4">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('frontend', 'Submit'), ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-4">
            <a href="#" class="thumbnail">
                <img src="/images/Gaun-1-5.jpg" alt="contact" />
            </a>
        </div>
        <div class="col-md-4">
            <div class="contact-stuff">
				<p><?= Yii::t('frontend', 'Mooring:') ?></p>
				<ul>
					<li>Alen Radovčić</li>
					<li>+385(0)98 526 250</li>
					<li>Čedo Jelovčić</li>
					<li>+385(0)99 596 0717</li>
				</ul>

				<p><?= Yii::t('frontend', 'President') ?></p>
				<ul>
					<li>Ivo Radovčić</li>
					<li>+385(0)98 943 5293</li>
				</ul>

				<p><?= Yii::t('frontend', 'Secretary') ?></p>
				<ul>
					<li>Zlatko Jelovčić</li>
					<li>+385(0)99 379 0858</li>
					<li>tajnik@skrmgaun.hr</li>
				</ul>
            </div>
        </div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div id="map"></div>
		</div>
	</div>

</div>

<script type="text/javascript">
	function initMap() {
		var kaprije = {lat: 43.694330, lng: 15.704817};
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 12,
			center: kaprije
		});
		var marker = new google.maps.Marker({
			position: kaprije,
			map: map
		});
	}
</script>
<script async defer
	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0INbaPuiiQTIFR1fb5MLKno2blbhfR9Q&callback=initMap">
</script>