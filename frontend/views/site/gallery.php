<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\GalleryAsset;

$this->title = 'Gallery';
$this->params['breadcrumbs'][] = 'About' . ' / ' . $this->title;

GalleryAsset::register($this);
?>



<div class="site-gallery">

    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#photos" aria-control="photos" role="tab" data-toggle="tab">Photos</a></li>
            <li role="presentation"><a href="#videos" aria-control="videos" role="tab" data-toggle="tab">Videos</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="photos">
            <?php 
                $count = 0;
                $numOfCols = 6; // must be factor of 12 (1, 2, 3, 4, 6, 12)
                $bootstrapCol = 12 / $numOfCols; 
            ?>
                <div class="row">
                    <?php foreach($model as $val): ?>

                    <?php
                        // get image size
                        list($width, $height) = getimagesize("uploads/images/image/" . findImageName($val->thumbnail));
                    ?>
                    
                        <div class="col-md-<?= $bootstrapCol ?>">
                            <figure >
                                <a href="uploads/images/image/<?= findImageName($val->thumbnail) ?>" class="thumbnail" data-size="<?= $width . 'x' . $height ?>">
                                    <?php
                                        // print thumb 
                                        print Html::img($val->thumbnail, $options = []); 
                                    ?> 
                                </a>
                                <figcaption >
                            </figure>     
                        </div>
                    
                <?php
                    $count++;
                    if($count % $numOfCols == 0)
                        print '</div><div class="row">';
                ?>                
                <?php endforeach; ?>
                </div> <!-- close row -->            
            </div>

            <div role="tabpanel" class="tab-pane" id="videos">
                <?php
                    $rowCount = 0;
                    $columns = 4; // must be factor of 12 (1, 2, 3, 4, 6, 12)
                    $colWidth = 12 / $columns;
                ?>
                <div class="row">
                <?php foreach($video as $val): ?>
                
                <div class="col-md-<?= $colWidth ?>">
                <figure class="figure">
                    <div class="embed-responsive embed-responsive-16by9">
                        <?= $val->code; ?>        
                    </div>
                    <figcaption class="figure-caption">
                        <?= $val->title ?>
                        <?= $val->providerName ?>
                    </figure>
                </figure>
                </div>
                <?php
                    $rowCount++;
                    if($rowCount % $columns == 0)
                        print '</div><div class="row">';
                ?>
                <?php endforeach; ?>
                </div> <!-- close row --> 

            </div>
        </div>

    </div>

</div>


<?php 
    function findImageName($filename)
    {
        $storagePath = "uploads/images/thumb/";
        $filename = str_replace($storagePath, "", $filename);
        
        return $filename;
    }
?>

<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

          </div>

        </div>

</div>