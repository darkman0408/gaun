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
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        [
            'label' => 'About', 
            'url' => ['/site/about'],
            'options' => ['class' => 'dropdown'],
            //'template' => '<a href="{url}" class="href_class">{label}></a>',
            'items' => [
                ['label' => 'History', 'url' => ['/site/history']],
                ['label' => 'Activities' , 'url' => ['/site/activities']],
                ['label' => 'Documents', 'url' => ['/document/index']],
                ['label' => 'Members', 'url' => ['/site/members']],
            ],
        ],
        ['label' => 'Services', 'url' => ['site/services']],
        ['label' => 'News', 'url' => ['/site/news']],
        ['label' => 'Gallery', 'url' => ['/site/gallery']],
        ['label' => 'Servis Information', 'url' => ['/site/service-info']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
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
                    <li><?= Html::a('Home', ['/site/index']) ?></li>
                    <li><?= Html::a('Services', ['/site/services']) ?></li>
                    <li><?= Html::a('News', ['/site/news']) ?></li>
                    <li><?= Html::a('Gallery', ['/site/gallery']) ?></li>
                    <li><?= Html::a('Servis Information', ['/site/service-info']) ?></li>
                    <li><?= Html::a('Contact', ['/site/contact']) ?></li>
                </ul>
            </div>
            <div class="col-md-3">
                <p>About</p>
                <ul>
                    <li><?= Html::a('History', ['/site/history']) ?></li>
                    <li><?= Html::a('Activities', ['/site/activities']) ?></li>
                    <li><?= Html::a('Documents', ['/documents/index']) ?></li>
                    <li><?= Html::a('Members', ['/site/members']) ?></li>                  
                </ul>
            </div>
            <div class="col-md-3">
                <p>Contact</p>
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
