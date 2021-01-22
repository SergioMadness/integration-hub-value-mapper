<?php namespace professionalweb\IntegrationHub\ValueMapper\Services;

use professionalweb\IntegrationHub\ValueMapper\Models\PairExistsOptions;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\EventData;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Services\Subsystem;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\ProcessOptions;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Models\SubsystemOptions;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\PairExistsSubsystem as IPairExistsSubsystem;

/**
 * Subsystem to check key-value pair exist
 * @package professionalweb\IntegrationHub\ValueMapper\Services
 */
class PairExistsSubsystem implements IPairExistsSubsystem
{
    /** @var ProcessOptions */
    private $processOptions;

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

    /**
     * Get available options
     *
     * @return SubsystemOptions
     */
    public function getAvailableOptions(): SubsystemOptions
    {
        return new PairExistsOptions();
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
        // TODO: Implement process() method.
    }
}