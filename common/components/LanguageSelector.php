<?php

namespace common\components;

use yii\base\BootstrapInterface;

class LanguageSelector implements BootstrapInterface
{
    public $supportedLanguages = [];

    public function bootstrap($app)
    {
        $preferredLanguage = isset($app->request->cookies['language']) ? (string)$app->request->cookies['language'] : null;

        if (empty($preferredLanguage))
        {
            $app->request->getPreferredLanguage($this->supportedLanguages);
        }
        
        $app->language = $preferredLanguage;
    }
}