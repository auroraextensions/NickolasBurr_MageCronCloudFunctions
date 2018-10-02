<?php
/**
 * Cron.php
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License, which
 * is bundled with this package in the file LICENSE.txt.
 *
 * It is also available on the Internet at the following URL:
 * https://docs.nickolasburr.com/magento/extensions/1.x/magecroncloudfunctions/LICENSE.txt
 *
 * @package        NickolasBurr_MageCronCloudFunctions
 * @copyright      Copyright (C) 2018 Nickolas Burr <nickolasburr@gmail.com>
 * @license        MIT License
 */

class NickolasBurr_MageCronCloudFunctions_Helper_Cron extends NickolasBurr_MageCronCloudFunctions_Helper_Data
{
    /** @constant XML_PATH_FIELD_MODULE_ENABLE */
    const XML_PATH_FIELD_MODULE_ENABLE = 'magecroncloudfunctions/general/enable_module';

    /** @constant XML_PATH_FIELD_GCP_PROJECT */
    const XML_PATH_FIELD_GCP_PROJECT = 'magecroncloudfunctions/general/gcp_project';

    /** @constant XML_PATH_FIELD_CLOUD_FUNC_REGION */
    const XML_PATH_FIELD_CLOUD_FUNC_REGION = 'magecroncloudfunctions/general/cloud_functions_region';

    /**
     * Get Cloud Functions endpoint base URI.
     *
     * @return string
     */
    public function getEndpointBaseUri()
    {
        /** @var string $region */
        $region = Mage::getStoreConfig(self::XML_PATH_FIELD_CLOUD_FUNC_REGION);

        /** @var string $project */
        $project = Mage::getStoreConfig(self::XML_PATH_FIELD_GCP_PROJECT);

        return 'https://' . $region . '-' . $project . '.cloudfunctions.net';
    }

    /**
     * Get cloud function URL for triggering via HTTP.
     */
    public function getEndpointUrl($pathname = '/')
    {
        return $this->getEndpointBaseUri() . $pathname;
    }
}
