<?php
/**
 * @author: AMINE HICHOUR
 * @created: 08/06/2022
 */

namespace Lepape\Test\Model\System;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class Config
 * Permet la récupération des configurations propres au moteur de recherche cartouches
 *
 * @package Bureauvallee\CartridgeSearch\Model
 */
class Config
{
    /** @var string */
    const CART_DESCRIPTION_LOGIN = 'lepape/general/description_login';

    /** @var string */
    const CART_DESCRIPTION_NOT_LOGIN = 'lepape/general/description_not_login';

    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;

    /**
     * Config constructor.
     *
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
    }

    /**
     * @return string
     */
    public function getDescription():?string
    {
        return $this->scopeConfig->getValue(self::CART_DESCRIPTION_LOGIN, ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return string
     */
    public function getGuestDescription():?string
    {
        return $this->scopeConfig->getValue(self::CART_DESCRIPTION_NOT_LOGIN, ScopeInterface::SCOPE_STORE);
    }
}
