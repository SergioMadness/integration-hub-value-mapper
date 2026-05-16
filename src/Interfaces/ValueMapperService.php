<?php

declare(strict_types=1);

namespace professionalweb\IntegrationHub\ValueMapper\Interfaces;

/**
 * Interface for service
 * @package professionalweb\IntegrationHub\ValueMapper\Interfaces
 */
interface ValueMapperService
{
    /**
     * Set mapping
     *
     * @param        $key1
     * @param        $key2
     */
    public function put(string $namespace, $key1, $key2): void;

    /**
     * Get item by key
     *
     * @param        $key
     */
    public function get(string $namespace, $key): array;

    /**
     * Check pair exists
     *
     * @param        $item1
     * @param        $item2
     */
    public function exists(string $namespace, $item1, $item2): bool;
}