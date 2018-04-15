<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>
                    <?php 
                        $username = ''; 
                        if (isset(\Yii::$app->user->identity->username)) 
                            $username = Yii::$app->user->identity->username; 
                                    
                        print $username;
                    ?>
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    [
                        'label' => 'Documents',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Home', 'icon' => 'fa fa-folder', 'url' => '/document/index'],
                            ['label' => 'Create', 'icon' => 'fa fa-folder', 'url' => '/document/create'],
                        ],
                    ],
                    [
                        'label' => 'Images',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Home', 'icon' => 'fa fa-folder', 'url' => '/image/index'],
                            ['label' => 'Create', 'icon' => 'fa fa-folder', 'url' => '/image/create'],
                        ],
                    ],
                    [
                        'label' => 'Members',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Home', 'icon' => 'fa fa-folder', 'url' => '/member/index'],
                            ['label' => 'Create', 'icon' => 'fa fa-folder', 'url' => '/member/create'],
                        ],
                    ],
                    [
                        'label' => 'News',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Home', 'icon' => 'fa fa-folder', 'url' => '/news/index'],
                            ['label' => 'Create', 'icon' => 'fa fa-folder', 'url' => '/news/create'],
                        ],
                    ],
                    [
                        'label' => 'Services',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Home', 'icon' => 'fa fa-folder', 'url' => '/services/index'],
                            ['label' => 'Create', 'icon' => 'fa fa-folder', 'url' => '/services/create'],
                        ],
                    ],
                    [
                        'label' => 'Video',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Home', 'icon' => 'fa fa-folder', 'url' => '/video/index'],
                            ['label' => 'Create', 'icon' => 'fa fa-folder', 'url' => '/video/create'],
                        ],
                    ],
                    ['label' => 'Users', 'icon' => 'fa fa-user', 'url' => ['/user/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
