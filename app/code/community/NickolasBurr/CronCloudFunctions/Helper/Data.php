<?php
/**
 * Data.php
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License, which
 * is bundled with this package in the file LICENSE.txt.
 *
 * It is also available on the Internet at the following URL:
 * https://docs.nickolasburr.com/magento/extensions/1.x/croncloudfunctions/LICENSE.txt
 *
 * @package        NickolasBurr_CronCloudFunctions
 * @copyright      Copyright (C) 2018 Nickolas Burr <nickolasburr@gmail.com>
 * @license        MIT License
 */

class NickolasBurr_CronCloudFunctions_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * Get lib/$module path.
     *
     * @param string $module Module name.
     * @return string
     */
    public function getLibModulePath($module)
    {
        return Mage::getBaseDir('lib') . DIRECTORY_SEPARATOR . $module;
    }
}
