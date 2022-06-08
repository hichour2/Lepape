<?php
/**
 * @author: AMINE HICHOUR
 * @created: 08/06/2022
 */

namespace Lepape\Test\Block;

use Lepape\Test\Model\System\Config;
use Magento\Customer\Model\Session;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class Description
 * @package Lepape\Test\Block
 */
class Description extends Template
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var Session
     */
    private $customerSession;

    /**
     * Description constructor.
     * @param Context $context
     * @param Config $config
     * @param Session $customerSession
     * @param array $data
     */
    public function __construct
    (
        Context $context,
        Config $config,
        Session $customerSession,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->config = $config;
        $this->customerSession = $customerSession;
    }

    /**
     * @return string
     */
    public function getActiveUserDescription(): string
    {
        if ($this->customerSession->isLoggedIn()){
            return $this->config->getDescription();
        }
        return $this->config->getGuestDescription();
    }
}
