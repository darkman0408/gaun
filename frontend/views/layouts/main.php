<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Gaun',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']],
        [
            'label' => Yii::t('frontend', 'About'), 
            'url' => ['/site/about'],
            'options' => ['class' => 'dropdown'],
            //'template' => '<a href="{url}" class="href_class">{label}></a>',
            'items' => [
                ['label' => Yii::t('frontend', 'History'), 'url' => ['/site/history']],
                ['label' => Yii::t('frontend', 'Activities') , 'url' => ['/site/activities']],
                ['label' => Yii::t('frontend', 'Documents'), 'url' => ['/document/index']],
                ['label' => Yii::t('frontend', 'Members'), 'url' => ['/site/members']],
            ],
        ],
        ['label' => Yii::t('frontend', 'Services'), 'url' => ['site/services']],
        ['label' => Yii::t('frontend', 'News'), 'url' => ['/site/news']],
        ['label' => Yii::t('frontend', 'Gallery'), 'url' => ['/site/gallery']],
        ['label' => Yii::t('frontend', 'Servis Information'), 'url' => ['/site/service-info']],
        ['label' => Yii::t('frontend', 'Contact'), 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/site/signup']];
        $menuItems[] = ['label' => Yii::t('frontend', 'Login'), 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                Yii::t('frontend', 'Logout (' . Yii::$app->user->identity->username . ')'),
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    } ?>
    <div class="navbar-text pull-right">
        <?= Html::beginForm() ?>
        <?= Html::dropDownList('language', Yii::$app->language, ['en-US' => 'English', 'hr-HR' => 'Croatian'], $options = ['id' => 'lang']) ?>
        <?= Html::endForm() ?>
    </div>
    <?php
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>

    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul>
                    <li><?= Html::a(Yii::t('frontend', 'Home'), ['/site/index']) ?></li>
                    <li><?= Html::a(Yii::t('frontend', 'Services'), ['/site/services']) ?></li>
                    <li><?= Html::a(Yii::t('frontend', 'News'), ['/site/news']) ?></li>
                    <li><?= Html::a(Yii::t('frontend', 'Gallery'), ['/site/gallery']) ?></li>
                    <li><?= Html::a(Yii::t('frontend', 'Servis Information'), ['/site/service-info']) ?></li>
                    <li><?= Html::a(Yii::t('frontend', 'Contact'), ['/site/contact']) ?></li>
                </ul>
            </div>
            <div class="col-md-3">
                <p><?= Yii::t('frontend', 'About') ?></p>
                <ul>
                    <li><?= Html::a(Yii::t('frontend', 'History'), ['/site/history']) ?></li>
                    <li><?= Html::a(Yii::t('frontend', 'Activities'), ['/site/activities']) ?></li>
                    <li><?= Html::a(Yii::t('frontend', 'Documents'), ['/documents/index']) ?></li>
                    <li><?= Html::a(Yii::t('frontend', 'Members'), ['/site/members']) ?></li>                  
                </ul>
            </div>
            <div class="col-md-3">
                <p><?= Yii::t('frontend', 'Contact') ?></p>
                <ul>
                    <li>Ivo Radovčić</li>
                    <li>+385(0)98 943 5293</li>
                    <li>Zlatko Jelovčić</li>
                    <li>+385(0)99 379 0858</li>
                    <li>tajnik@skrmgaun.hr</li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li>Alen Radovčić</li>
                    <li>+385(0)98 526 250</li>
                    <li>Čedo Radovčić</li>
                    <li>+385(0)99 596 0717</li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<script type="text/javascript">
    
    var data; 

    $("#lang").change(function() {
        var selectedValue = $(this).val();       
        data = selectedValue;

        //console.log(data);

        $.ajax({
            url: '/site/language',
            async: false,
            type: 'POST',
            data: {data : data},
            //dataType: 'json',
            success: function() {
                window.location.reload();
            }
        });
    });

</script>