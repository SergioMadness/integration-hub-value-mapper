<?php

declare(strict_types=1);

namespace professionalweb\IntegrationHub\ValueMapper\Traits;

use professionalweb\IntegrationHub\ValueMapper\Interfaces\Repositories\ValueMapRepository;

/**
 * Trait for classes use value map repository
 * @package professionalweb\IntegrationHub\ValueMapper\Traits
 */
trait UseValueMapRepository
{
    private ValueMapRepository $valueMapRepository;

    public function getValueMapRepository(): ValueMapRepository
    {
        return $this->valueMapRepository;
    }

    /**
     * @return $this
     */
    public function setValueMapRepository(ValueMapRepository $valueMapRepository): self
    {
        $this->valueMapRepository = $valueMapRepository;

        return $this;
    }
}