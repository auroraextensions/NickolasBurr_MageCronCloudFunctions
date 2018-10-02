<?php
/**
 * Region.php
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

class NickolasBurr_MageCronCloudFunctions_Model_System_Config_Source_Select_General_Region
{
    /**
     * Google Cloud Platform regions.
     *
     * @property
     * @static
     */
    protected static $_regions = array(
        'asia-east1',
        'asia-northeast1',
        'asia-south1',
        'asia-southeast1',
        'australia-southeast1',
        'europe-north1',
        'europe-west1',
        'europe-west2',
        'europe-west3',
        'europe-west4',
        'northamerica-northeast1',
        'southamerica-east1',
        'us-central1',
        'us-east1',
        'us-east4',
        'us-west1',
        'us-west2',
    );

    /**
     * Options to display in <select>.
     *
     * @property
     * @static
     */
    protected static $_options = array();

    /**
     * Initialize options key/value array.
     */
    public function __construct()
    {
        /* Set option key/value pairs on self::$_options array. */
        \array_walk(self::$_regions, array($this, '_setOption'));
    }

    /**
     * Set option key/value array on self::$_options.
     *
     * @param int|string $value Option value.
     */
    protected function _setOption($value)
    {
        self::$_options[] = array(
            'label' => Mage::helper('adminhtml')->__($value),
            'value' => $value,
        );
    }

    /**
     * Get formatted options array.
     *
     * @return array
     */
    public function toOptionArray()
    {
        return self::$_options;
    }

    /**
     * Get options array.
     *
     * @return array
     */
    public function toArray()
    {
        return self::$_regions;
    }
}
