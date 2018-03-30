<?php

use yii\helpers\Html;

$this->title = 'History';
$this->params['breadcrumbs'][] = 'About' . ' / ' . $this->title;

\madand\knockoutjs\KnockoutAsset::register($this);
?>

<?php
    var_dump($model);
    print '<hr>';
    var_dump($model[0]->name);
    print '<hr>';
    print($model[0]->name);
    print '<hr>';
    print($model[0]->lastName);
    print '<hr>';
    print($model[1]->name);
    print '<hr>';
?>

<div class="row" data-bind="foreach: data">
    <div class="col-md-12">
        <p data-bind="text: name"></p>
        <p data-bind="text: lastName"></p>
    </div>
</div>

<script type="text/javascript">

    ko.applyBindings({
        data: [
            <?php
            $data = [];
            foreach($model as $val)
            {
                $data = [
                    'name' => $val->name,
                    'lastName' => $val->lastName
                ]; 
                $data = json_encode($data);               
                print $data;
                print (',');
            } 
            ?> 
        ]
    });

</script>