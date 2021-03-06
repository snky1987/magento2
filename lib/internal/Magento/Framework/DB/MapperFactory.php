<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\Framework\DB;

/**
 * Class MapperFactory
 * @package Magento\Framework\DB
 */
class MapperFactory
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $objectManager;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Create Mapper object
     *
     * @param string $className
     * @param array $arguments
     * @return MapperInterface
     * @throws \Magento\Framework\Exception
     */
    public function create($className, array $arguments = [])
    {
        $mapper = $this->objectManager->create($className, $arguments);
        if (!$mapper instanceof MapperInterface) {
            throw new \Magento\Framework\Exception($className . ' doesn\'t implement \Magento\Framework\DB\MapperInterface');
        }
        return $mapper;
    }
}
