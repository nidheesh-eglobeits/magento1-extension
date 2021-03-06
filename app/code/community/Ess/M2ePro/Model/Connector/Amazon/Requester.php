<?php

/*
 * @author     M2E Pro Developers Team
 * @copyright  2011-2015 ESS-UA [M2E Pro]
 * @license    Commercial use is forbidden
 */

abstract class Ess_M2ePro_Model_Connector_Amazon_Requester extends Ess_M2ePro_Model_Connector_Requester
{
    const COMPONENT = 'Amazon';
    const COMPONENT_VERSION = 8;

    /**
     * @var Ess_M2ePro_Model_Account|null
     */
    protected $account = NULL;

    //########################################

    public function __construct(array $params = array(),
                                Ess_M2ePro_Model_Account $account = NULL)
    {
        $this->account = $account;
        parent::__construct($params);
    }

    //########################################

    /**
     * @return string
     */
    protected function getComponent()
    {
        return self::COMPONENT;
    }

    /**
     * @return int
     */
    protected function getComponentVersion()
    {
        return self::COMPONENT_VERSION;
    }

    //########################################

    public function process()
    {
        if (!is_null($this->account)) {
            $this->requestExtraData['account'] = $this->account->getChildObject()->getServerHash();
        }

        return parent::process();
    }

    //########################################
}