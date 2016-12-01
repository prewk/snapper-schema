<?php
/**
 * TestProvider
 *
 * @author Oskar Thornblad
 */

declare(strict_types = 1);

namespace Prewk\SnapperSchema;

/**
 * Provides test JSON files for implementation testing
 */
class TestProvider
{
    /**
     * Make a TestProvider
     *
     * @return TestProvider
     */
    public function make(): TestProvider
    {
        return new static;
    }

    /**
     * Get the Snapshot test JSON
     *
     * @return string
     */
    public function getSnapshot(): string
    {
        return file_get_contents(__DIR__ . "/../../resources/snapshots/large.json");
    }

    /**
     * Get the Schema test JSON
     *
     * @return string
     */
    public function getSchema(): string
    {
        return file_get_contents(__DIR__ . "/../../resources/schemas/large.json");
    }

    /**
     * Get the Transform test JSON
     *
     * @return string
     */
    public function getTransformed(): string
    {
        return file_get_contents(__DIR__ . "/../../resources/transformed/large.json");
    }

    /**
     * Get the Compile test JSON
     *
     * @return string
     */
    public function getCompiled(): string
    {
        return file_get_contents(__DIR__ . "/../../resources/compiled/large.json");
    }
}