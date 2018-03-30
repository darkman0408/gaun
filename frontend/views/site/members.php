<?php

use yii\helpers\Html;

$this->title = 'History';
$this->params['breadcrumbs'][] = 'About' . ' / ' . $this->title;

\madand\knockoutjs\KnockoutAsset::register($this);
?>

<div class="row" data-bind="foreach: members">
    <div class="col-md-12">
        <div data-bind="text: name">
        </div>
        <div data-bind="text: lastName">
        </div>
    </div>
</div>

<?php 
    var_dump($model);

    $data = [];
    foreach($model as $val)
    {
        $data = [
             $val
        ];
    }


    var_dump($data);
?>

<script type="text/javascript">

    var data = <?php print json_encode($data);?>;

    //console.log(members);

    console.log(data);


</script>