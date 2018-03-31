<?php

function removePartOfUrl($url)
{
    $replacePart = Yii::getAlias('@frontend');

    $newUrl = str_replace($url, "", $replacePart);

    if($newUrl)
    {
        return $newUrl;
    }

    return $url;
}

?>