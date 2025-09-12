<?php

namespace therefinerynz\commercewindcave;

use Craft;
use craft\base\Model;
use craft\base\Plugin as BasePlugin;
use craft\events\RegisterComponentTypesEvent;
use craft\commerce\services\Gateways;
use therefinerynz\commercewindcave\gateways\Gateway;
use therefinerynz\commercewindcave\models\Settings;
use yii\base\Event;

/**
 * Windcave plugin
 *
 * @method static Plugin getInstance()
 * @method Settings getSettings()
 * @author The Refinery <anthony@therefinery.co.nz>
 * @copyright The Refinery
 * @license https://craftcms.github.io/license/ Craft License
 */
class Plugin extends BasePlugin
{
    public string $schemaVersion = '1.0.0';
    public bool $hasCpSettings = true;

    public static function config(): array
    {
        return [
            'components' => [
                // Define component configs here...
            ],
        ];
    }

    public function init(): void
    {
        parent::init();

        Event::on(
            Gateways::class,
            Gateways::EVENT_REGISTER_GATEWAY_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = Gateway::class;
            }
        );
    }

    protected function createSettingsModel(): ?Model
    {
        return Craft::createObject(Settings::class);
    }

    protected function settingsHtml(): ?string
    {
        return Craft::$app->view->renderTemplate('commerce-windcave/_settings.twig', [
            'plugin' => $this,
            'settings' => $this->getSettings(),
        ]);
    }
}
