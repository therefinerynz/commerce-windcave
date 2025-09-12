<?php

namespace therefinerynz\commercewindcave\gateways;

use Craft;
use craft\helpers\App;
use craft\commerce\omnipay\base\OffsiteGateway;
use Omnipay\Common\AbstractGateway;
use Omnipay\PaymentExpress\PxPayGateway;
use therefinerynz\commercewindcave\Plugin;

/**
 * Windcave PxPay 2.0 Gateway for Craft Commerce 5
 * 
 * @author The Refinery <anthony@therefinery.co.nz>
 */
class Gateway extends OffsiteGateway
{
    // Properties
    // =========================================================================
    
    /**
     * @var string|null
     */
    public ?string $pxPayUserId = null;

    /**
     * @var string|null
     */
    public ?string $pxPayKey = null;


    // Public Methods
    // =========================================================================
    
    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('commerce', 'Windcave (PxPay 2.0)');
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml(): ?string
    {
        return '<p>Windcave PxPay 2.0 Gateway - Settings will go here</p>';
    }

    /**
     * @inheritdoc
     */
    public function supportsPurchase(): bool
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function supportsAuthorize(): bool
    {
        return false;
    }


    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createGateway(): AbstractGateway
    {
        $gateway = static::createOmnipayGateway($this->getGatewayClassName());
        
        // Basic configuration
        $gateway->setUsername($this->getPxPayUserId());
        $gateway->setPassword($this->getPxPayKey());
        $gateway->setTestMode($this->getTestMode());

        return $gateway;
    }

    /**
     * @inheritdoc
     */
    protected function getGatewayClassName(): ?string
    {
        return '\\' . PxPayGateway::class;
    }


    // Private Methods
    // =========================================================================

    /**
     * Get the PxPay User ID
     *
     * @return string|null
     */
    private function getPxPayUserId(): ?string
    {
        $setting = Plugin::getInstance()->getSettings()->pxPayUserId;
        return App::parseEnv($setting);
    }

    /**
     * Get the PxPay Key
     *
     * @return string|null
     */
    private function getPxPayKey(): ?string
    {
        $setting = Plugin::getInstance()->getSettings()->pxPayKey;
        return App::parseEnv($setting);
    }

    /**
     * Get the Test Mode setting
     *
     * @return bool
     */
    private function getTestMode(): bool
    {
        $setting = Plugin::getInstance()->getSettings()->testMode;
        return App::parseBooleanEnv($setting) ?? true;
    }
}