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
     * @param string $namespace
     * @param        $key1
     * @param        $key2
     */
    public function put(string $namespace, $key1, $key2): void;

    /**
     * Get item by key
     *
     * @param string $namespace
     * @param        $key
     *
     * @return mixed
     */
    public function get(string $namespace, $key);

    /**
     * Check pair exists
     *
     * @param string $namespace
     * @param        $item1
     * @param        $item2
     *
     * @return bool
     */
    public function exists(string $namespace, $item1, $item2): bool;
}