<?php
/**
 * Observer.php
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

class NickolasBurr_MageCronCloudFunctions_Model_Observer
{
    /** @constant XML_PATH_HELPER_CRON */
    const XML_PATH_HELPER_CRON = 'magecroncloudfunctions/cron';

    /** @property $_cronHelper */
    protected $_cronHelper = null;

    /**
     * Set each helper class instance.
     */
    public function __construct()
    {
        $this->_cronHelper = Mage::helper(self::XML_PATH_HELPER_CRON);
    }

    /**
     * Get cron helper class instance.
     *
     * @return NickolasBurr_MageCronCloudFunctions_Helper_Cron
     */
    protected function _getCronHelper()
    {
        return $this->_cronHelper;
    }

    /**
     * Trigger cloud function.
     *
     * @param Mage_Cron_Model_Schedule $event
     * @return int
     */
    public function run($event)
    {
        /** @var string $jobCode */
        $jobCode = $event->getJobCode();

        /* The cloud function pathname. */
        $pathname = '/' . $jobCode;

        /* @var array $options */
        $options = array(
            'json' => array(
                'auth_token' => $this->_getCronHelper()->getAuthToken(),
            ),
        );

        /** @var GuzzleHttp\Client $client */
        $client = new GuzzleHttp\Client(array('base_uri' => $this->_getCronHelper()->getEndpointBaseUri()));
        $response = $client->request('PUT', $pathname, $options);

        return $response->getStatusCode();
    }
}
