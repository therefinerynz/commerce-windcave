<?php

namespace therefinerynz\commercewindcave\models;

use Craft;
use craft\base\Model;


/**
 * Windcave settings
 */
class Settings extends Model
{
    /**
     * @var string
     */
    public string $pxPayUserId = '';

    /**
     * @var string  
     */
    public string $pxPayKey = '';

    /**
     * @var bool|string
     */
    public bool|string $testMode = true;

    /**
     * @inheritdoc
     */
    protected function defineRules(): array
    {
        $rules = parent::defineRules();
        $rules[] = [['pxPayUserId', 'pxPayKey'], 'required'];
        return $rules;
    }
}
