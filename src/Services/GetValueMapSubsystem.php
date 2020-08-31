<?php namespace professionalweb\IntegrationHub\ValueMapper\Services;

use professionalweb\IntegrationHub\ValueMapper\Models\GetValueMapOptions;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\EventData;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\SubsystemOptions;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\GetValueMapSubsystem as IGetValueMapSubsystem;

/**
 * Get value subsystem
 * @package professionalweb\IntegrationHub\ValueMapper\Services
 */
class GetValueMapSubsystem extends SetValueMapSubsystem implements IGetValueMapSubsystem
{

    /**
     * Get available options
     *
     * @return SubsystemOptions
     */
    public function getAvailableOptions(): SubsystemOptions
    {
        return new GetValueMapOptions();
    }

    /**
     * Process event data
     *
     * @param EventData $eventData
     *
     * @return EventData
     */
    public function process(EventData $eventData): EventData
    {
        $data = $eventData->getData();
        $key = $eventData->get('key');
        $data = array_merge($data, $this->getValueMapperService()->get($this->getProcessOptions()->getOptions()['namespace'] ?? 'default', $key));
        $eventData->setData($data);

        return $eventData;
    }
}