<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use backend\assets\NavAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
NavAsset::register($this);
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

    <?php
    NavBar::begin([
        'brandLabel' => 'Gaun',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse sidebar',
            'role' => 'navigation',
        ],
        'innerContainerOptions' => ['class' => 'container-fluid'],
    ]);
    $menuItems = [
        [
            'label' => 'Home' . '<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>', 'url' => ['/site/index']
        ],
        [
            'label' => 'Members' . '<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>', 'url' => ['/member/index']
        ],
        [
            'label' => 'Services' . '<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>', 'url' => ['/services/index']
        ],
        [
            'label' => 'Images' . '<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>', 'url' => ['/image/index']
        ],
        [
            'label' => 'Video' . '<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>', 'url' => ['/video/index']
        ],
        [
            'label' => 'Documents' . '<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span>', 'url' => ['/document/index']
        ],
    ];
    if (Yii::$app->user->isGuest) {
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
        'options' => ['class' => 'navbar-nav',],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="black"></div>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
