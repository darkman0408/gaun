<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <span class="hidden-xs">
                            <?php 
                                $username = ''; 
                                if (isset(\Yii::$app->user->identity->username)) 
                                    $username = Yii::$app->user->identity->username; 
                                    
                                print $username;
                            ?>
                        </span>                        
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/>
    
                            <p>
                                <?php 
                                    $username = ''; 
                                    if (isset(\Yii::$app->user->identity->username)) 
                                        $username = Yii::$app->user->identity->username; 
                                    
                                        print $username;
                                ?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    
                </li>
            </ul>
        </div>
    </nav>
</header>

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