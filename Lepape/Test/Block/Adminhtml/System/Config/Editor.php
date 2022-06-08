<?php
/**
 * @author: AMINE HICHOUR
 * @created: 08/06/2022
 */

namespace Lepape\Test\Block\Adminhtml\System\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Registry;
use Magento\Backend\Block\Template\Context;
use Magento\Cms\Model\Wysiwyg\Config as WysiwygConfig;

/**
 * Class Editor
 * @package Lepape\Test\Block\Adminhtml\System\Config
 */
class Editor extends Field
{
    /**
     * @var  Registry
     */
    protected $_coreRegistry;

    /**
     * @var WysiwygConfig
     */
    private $wysiwygConfig;

    /**
     * @param Context       $context
     * @param WysiwygConfig $wysiwygConfig
     * @param array         $data
     */
    public function __construct(
        Context $context,
        WysiwygConfig $wysiwygConfig,
        array $data = []
    ) {
        $this->wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $data);
    }

    protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
    {
        // set wysiwyg for element
        $element->setWysiwyg(true);
        // set configuration values
        $element->setConfig($this->wysiwygConfig->getConfig($element));
        return parent::_getElementHtml($element);
    }
}
