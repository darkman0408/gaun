<?php

/* @var $this yii\web\View */

$this->title = 'Gaun Kaprije';
?>
<?php

use yii\bootstrap\Carousel;
use yii\helpers\Html;
use evgeniyrru\yii2slick\Slick;
use yii\web\JsExpression;
use frontend\assets\SlideAsset;

SlideAsset::register($this);
?>


<div class="site-index">
    
    <?php
        $items = [
            ['content' => Html::img('images/dje-94.jpg', ['alt' => 'boy'])],
            ['content' => Html::img('images/eko-49.jpg', ['alt' => 'diving'])],
            ['content' => Html::img('images/mol-70.jpg', ['alt' => ''])],
            ['content' => Html::img('images/tra-1.jpg', ['alt' => ''])],
        ];

        print Carousel::widget([
            'items' => $items,
            'controls' => [
                '<span class="glyphicon glyphicon-chevron-left"></span>', '<span class="glyphicon glyphicon-chevron-right"></span>'
            ],
        ]);
    ?>

    <div class="body-content">

        <div class="row">
            
            <div class="col-md-12">
                <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
                    <div class="carousel-inner">
                        <div class="item active">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div>
                                <h3>News 1</h3>
                                <hr>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...
                                </p>
                                <p>
                                    <a class="btn btn-default" href="#">See more...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div>
                                <h3>News 2</h3>
                                <hr>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...
                                </p>
                                <p>
                                    <a class="btn btn-default" href="#">See more...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div>
                                <h3>News 3</h3>
                                <hr>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...
                                </p>
                                <p>
                                    <a class="btn btn-default" href="#">See more...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div>
                                <h3>News 4</h3>
                                <hr>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...
                                </p>
                                <p>
                                    <a class="btn btn-default" href="#">See more...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div>
                                <h3>News 5</h3>
                                <hr>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...
                                </p>
                                <p>
                                    <a class="btn btn-default" href="#">See more...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div>
                                <h3>News 6</h3>
                                <hr>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...
                                </p>
                                <p>
                                    <a class="btn btn-default" href="#">See more...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div>
                                <h3>News 7</h3>
                                <hr>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...
                                </p>
                                <p>
                                    <a class="btn btn-default" href="#">See more...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div>
                                <h3>News 8</h3>
                                <hr>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et...
                                </p>
                                <p>
                                    <a class="btn btn-default" href="#">See more...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>

    </div>

    </div>

</div>
