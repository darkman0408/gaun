<?php

use yii\helpers\Html;

$this->title = 'Members';
$this->params['breadcrumbs'][] = 'About' . ' / ' . $this->title;

\madand\knockoutjs\KnockoutAsset::register($this);
?>
<div class="site-about">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3>
                The Club of Sport Fishing on Sea Gaun employs three people. They are: club secretary Zlatko Jelovčić and two port 
                officers for mooring: Alen Radovčić and Čedo Jelovčić
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div>
                <img src="/images/clanovi1.jpg" alt="kaprije balote" class="img-thumbnail">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="text">
                <h3>Alen Radovčić and Čedo Jelovčić</hr>
                <hr>
                <p>
                    Were named the best and the nicest linesmen in the Middle Dalmatia. 
                    The pier is never empty; they are always there to answer to all your questions and to help you in any situation.
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="text">
                <h3>Always smiling with clubs president Ivo Radovčić</hr>
                <hr>
                <p>
                    on photograph left to the right: Čedo Jelovčić, Ivo Radovčić, Alen Radovčić
                </p>
            </div>
        </div>
        <div class="col-sm-6">
            <div>
                <img src="/images/clanovi2.jpg" alt="kaprije balote" class="img-thumbnail">
            </div>
        </div>
    </div>
</div>

<p class="members"><strong>Club is counting few dozen active members.</strong></p>
<hr>
<div class="row" data-bind="foreach: data">
    <div class="col-md-3">
        <span data-bind="text: name"></span>
        <span data-bind="text: lastName"></span>
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