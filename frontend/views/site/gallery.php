<?php

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\GalleryAsset;

$this->title = 'Gallery';
$this->params['breadcrumbs'][] = 'About' . ' / ' . $this->title;

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
                            
                                <a href="uploads/images/image/<?= findImageName($val->thumbnail) ?>" class="thumbnail">
                                    <?php
                                        // print thumb 
                                        print Html::img($val->thumbnail, $options = []); 
                                    ?> 
                                </a>
                            
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