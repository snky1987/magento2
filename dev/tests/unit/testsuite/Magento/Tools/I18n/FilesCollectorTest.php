<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Tools\I18n;

class FilesCollectorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected $_testDir;

    /**
     * @var \Magento\Tools\I18n\FilesCollector
     */
    protected $_filesCollector;

    protected function setUp()
    {
        // dev/tests/unit/testsuite/tools/I18n/_files/files_collector
        $this->_testDir = str_replace('\\', '/', realpath(dirname(__FILE__))) . '/_files/files_collector/';

        $objectManagerHelper = new \Magento\TestFramework\Helper\ObjectManager($this);
        $this->_filesCollector = $objectManagerHelper->getObject('Magento\Tools\I18n\FilesCollector');
    }

    public function testGetFilesWithoutMask()
    {
        $expectedResult = [$this->_testDir . 'default.xml', $this->_testDir . 'file.js'];
        $files = $this->_filesCollector->getFiles([$this->_testDir]);
        $this->assertEquals($expectedResult, $files);
    }

    public function testGetFilesWithMask()
    {
        $expectedResult = [$this->_testDir . 'file.js'];
        $this->assertEquals($expectedResult, $this->_filesCollector->getFiles([$this->_testDir], '/\.js$/'));
    }
}
