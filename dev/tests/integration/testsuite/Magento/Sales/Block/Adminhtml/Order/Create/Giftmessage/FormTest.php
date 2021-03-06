<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Sales\Block\Adminhtml\Order\Create\Giftmessage;

/**
 * @magentoAppArea adminhtml
 */
class FormTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @magentoDataFixture Magento/Customer/_files/customer.php
     * @magentoAppIsolation enabled
     */
    public function testGetDefaultSenderWithCurrentCustomer()
    {
        /** Preconditions */
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $fixtureCustomerId = 1;
        /** @var \Magento\Backend\Model\Session\Quote $backendQuoteSession */
        $backendQuoteSession = $objectManager->get('Magento\Backend\Model\Session\Quote');
        $backendQuoteSession->setCustomerId($fixtureCustomerId);
        /** @var \Magento\Sales\Block\Adminhtml\Order\Create\Giftmessage\Form $block */
        $block = $objectManager->create('Magento\Sales\Block\Adminhtml\Order\Create\Giftmessage\Form');
        $block->setEntity(new \Magento\Framework\Object());

        /** SUT execution and assertions */
        $this->assertEquals('John Smith', $block->getDefaultSender(), 'Sender name is invalid.');
    }
}
