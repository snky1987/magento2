<?php
/**
 * Template Types interface
 *
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */
namespace Magento\Framework\App;

interface TemplateTypesInterface
{
    /**
     * Types of template
     */
    const TYPE_TEXT = 1;

    const TYPE_HTML = 2;

    /**
     * Return true if template type eq text
     *
     * @return boolean
     */
    public function isPlain();

    /**
     * Getter for template type
     *
     * @return int
     */
    public function getType();
}
