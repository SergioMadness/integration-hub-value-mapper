<?php namespace professionalweb\IntegrationHub\ValueMapper\Listeners;

use professionalweb\IntegrationHub\ValueMapper\Interfaces\PairExistsSubsystem;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\GetValueMapSubsystem;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\SetValueMapSubsystem;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Events\EventToProcess;

class NewEventListener
{
    public function handle(EventToProcess $eventToProcess)
    {
        if ($eventToProcess->getProcessOptions()->getSubsystemId() === SetValueMapSubsystem::SUBSYSTEM_ID_SET) {
            return app(SetValueMapSubsystem::class)
                ->setProcessOptions($eventToProcess->getProcessOptions())
                ->process($eventToProcess->getEventData());
        }

        if ($eventToProcess->getProcessOptions()->getSubsystemId() === GetValueMapSubsystem::SUBSYSTEM_ID) {
            return app(GetValueMapSubsystem::class)
                ->setProcessOptions($eventToProcess->getProcessOptions())
                ->process($eventToProcess->getEventData());
        }

        if ($eventToProcess->getProcessOptions()->getSubsystemId() === PairExistsSubsystem::SUBSYSTEM_ID_PAIR_EXISTS) {
            return app(PairExistsSubsystem::class)
                ->setProcessOptions($eventToProcess->getProcessOptions())
                ->process($eventToProcess->getEventData());
        }
    }
}