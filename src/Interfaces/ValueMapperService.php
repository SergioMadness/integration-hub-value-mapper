<?php namespace professionalweb\IntegrationHub\ValueMapper\Interfaces;

/**
 * Interface for service
 * @package professionalweb\IntegrationHub\ValueMapper\Interfaces
 */
interface ValueMapperService
{
    /**
     * Set mapping
     *
     * @param $key1
     * @param $key2
     */
    public function put($key1, $key2): void;

    /**
     * @param $key
     *
     * @return mixed
     */
    public function get($key);
}