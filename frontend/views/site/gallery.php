<?php

use yii\helpers\Html;
use kartik\tabs\TabsX;

$this->title = 'Gallery';
$this->params['breadcrumbs'][] = 'About' . ' / ' . $this->title;

?>

<?php 
    $img_url = 'uploads/images/image';
    $items = [];

    foreach($model as $val)
    {
        $items = [
            'image' => $val->thumbnail,
        ];
        print Html::img(removePartOfUrl($val->thumbnail));
    }

?>
<hr>
<?php var_dump($model) ?>


<?php

// remove root parrt of image url
function removePartOfUrl($url)
{
    $replacePart = Yii::getAlias('@frontend') . '/web';

    $newUrl = str_replace($replacePart, "", $url);

    if($newUrl)
    {
        return $newUrl;
    }

    return $url;
}

?>