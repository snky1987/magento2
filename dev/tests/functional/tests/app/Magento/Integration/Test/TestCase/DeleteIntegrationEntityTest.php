<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Integration\Test\TestCase;

use Magento\Integration\Test\Fixture\Integration;
use Magento\Integration\Test\Page\Adminhtml\IntegrationIndex;
use Mtf\TestCase\Injectable;

/**
 * Test Creation for Delete Integration Entity
 *
 * Test Flow:
 * Preconditions:
 * 1. Integration is created
 *
 * Steps:
 * 1. Log in to backend as admin user.
 * 2. Navigate to System > Extensions > Integrations
 * 3. Click on the "Remove" icon for required integration
 * 4. Click "Delete" button.
 * 5. Perform all assertions.
 *
 * @group Web_API_Framework_(PS)
 * @ZephyrId MAGETWO-26058
 */
class DeleteIntegrationEntityTest extends Injectable
{
    /**
     * Integration grid page
     *
     * @var IntegrationIndex
     */
    protected $integrationIndexPage;

    /**
     * Injection data
     *
     * @param IntegrationIndex $integrationIndex
     * @return void
     */
    public function __inject(IntegrationIndex $integrationIndex)
    {
        $this->integrationIndexPage = $integrationIndex;
    }

    /**
     * Delete Integration Entity test
     *
     * @param Integration $integration
     * @return void
     */
    public function test(Integration $integration)
    {
        // Precondition
        $integration->persist();

        // Steps
        $filter = ['name' => $integration->getName()];
        $this->integrationIndexPage->open();
        $this->integrationIndexPage->getIntegrationGrid()->searchAndDelete($filter);
    }
}
