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
     * Get master schema as a JSON decoded stdClass
     *
     * @return stdClass
     */
    public function getMasterJSON(): stdClass
    {
        return json_decode($this->getMasterString());
    }

    /**
     * Get snapshot schema as a JSON decoded stdClass
     *
     * @return stdClass
     */
    public function getSnapshotJSON(): stdClass
    {
        return json_decode($this->getSnapshotString());
    }
    
    /**
     * Get master schema as a JSON string
     *
     * @return string
     */
    public function getMasterString(): string
    {
        return file_get_contents(__DIR__ . "../../master-schema.json");
    }
    
    /**
     * Get snapshot schema as a JSON string
     *
     * @return string
     */
    public function getSnapshotString(): string
    {
        return file_get_contents(__DIR__ . "../../snapshot-schema.json");
    }

    /**
     * Get schema as a JSON Schema compatible ref object
     *
     * @return stdClass
     */
    public function getMasterAsRef(): stdClass
    {
        return (object)['$ref' => 'file://' . __DIR__ . "/../../master-schema.json"];
    }
    
    /**
     * Get snapshot schema as a JSON Schema compatible ref object
     *
     * @return stdClass
     */
    public function getSnapshotAsRef(): stdClass
    {
        return (object)['$ref' => 'file://' . __DIR__ . "/../../snapshot-schema.json"];
    }
}