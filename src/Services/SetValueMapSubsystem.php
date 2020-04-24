<?php namespace professionalweb\IntegrationHub\ValueMapper\Services;

use professionalweb\IntegrationHub\ValueMapper\Models\SetValueMapOptions;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\EventData;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\ValueMapperService;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Services\Subsystem;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\ProcessOptions;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\SubsystemOptions;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\SetValueMapSubsystem as ISetValueMapSubsystem;

/**
 * Value mapper subsystem
 * @package professionalweb\IntegrationHub\ValueMapper\Services
 */
class SetValueMapSubsystem implements ISetValueMapSubsystem
{
    /** @var ProcessOptions */
    private $processOptions;

    /** @var ValueMapperService */
    private $valueMapperService;

    public function __construct(ValueMapperService $valueMapperService)
    {
        $this->setValueMapperService($valueMapperService);
    }

    /**
     * Set options with values
     *
     * @param ProcessOptions $options
     *
     * @return Subsystem
     */
    public function setProcessOptions(ProcessOptions $options): Subsystem
    {
        $this->processOptions = $options;

        return $this;
    }

    public function getProcessOptions(): ProcessOptions
    {
        return $this->processOptions;
    }

    /**
     * Get available options
     *
     * @return SubsystemOptions
     */
    public function getAvailableOptions(): SubsystemOptions
    {
        return new SetValueMapOptions();
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
        $this->getValueMapperService()->get($eventData->get('key'), $eventData->get('value'));

        return $eventData;
    }

    /**
     * @return ValueMapperService
     */
    public function getValueMapperService(): ValueMapperService
    {
        return $this->valueMapperService;
    }

    /**
     * @param ValueMapperService $valueMapperService
     *
     * @return $this
     */
    public function setValueMapperService(ValueMapperService $valueMapperService): self
    {
        $this->valueMapperService = $valueMapperService;

        return $this;
    }
}