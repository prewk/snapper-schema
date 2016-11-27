<?php
/**
 * SchemaProvider
 *
 * @author Oskar Thornblad
 */

declare(strict_types = 1);

namespace Prewk\SnapperSchema;

use stdClass;

class SchemaProvider
{
    /**
     * Make a schema provider
     * 
     * @return SchemaProvider
     */
    public function make(): SchemaProvider
    {
        return new static;
    }

    /**
     * Get schema as a JSON decoded stdClass
     *
     * @return stdClass
     */
    public function getJSON(): stdClass
    {
        return json_decode($this->getString());
    }

    /**
     * Get schema as a JSON string
     *
     * @return string
     */
    public function getString(): string
    {
        return file_get_contents(__DIR__ . "../../master-schema.json");
    }

    /**
     * Get schema as a JSON Schema compatible ref object
     *
     * @return string
     */
    public function asRef(): stdClass
    {
        return (object)['$ref' => 'file://' . __DIR__ . "/../../master-schema.json"];
    }
}