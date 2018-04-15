<?php

function languageSelector($language)
{
    switch($language)
    {
        case 'en-US':
        Yii::$app->language = 'en-US';
        break;
        
        case 'hr-HR':
        Yii::$app->language = 'hr-HR';
        break; 
    }
}