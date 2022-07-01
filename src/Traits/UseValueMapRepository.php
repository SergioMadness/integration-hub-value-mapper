<?php namespace professionalweb\IntegrationHub\ValueMapper\Traits;

use professionalweb\IntegrationHub\ValueMapper\Interfaces\Repositories\ValueMapRepository;

/**
 * Trait for classes use value map repository
 * @package professionalweb\IntegrationHub\ValueMapper\Traits
 */
trait UseValueMapRepository
{
    /** @var ValueMapRepository */
    private ValueMapRepository $valueMapRepository;

    /**
     * @return ValueMapRepository
     */
    public function getValueMapRepository(): ValueMapRepository
    {
        return $this->valueMapRepository;
    }

    /**
     * @param ValueMapRepository $valueMapRepository
     *
     * @return $this
     */
    public function setValueMapRepository(ValueMapRepository $valueMapRepository): self
    {
        $this->valueMapRepository = $valueMapRepository;

        return $this;
    }
}