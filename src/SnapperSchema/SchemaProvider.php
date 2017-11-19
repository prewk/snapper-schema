<?php
/**
 * SchemaProvider
 *
 * @author Oskar Thornblad
 */

declare(strict_types = 1);

namespace Prewk\SnapperSchema;

use stdClass;

/**
 * Provides master and snapshot schemas in different forms
 */
class SchemaProvider
{
    /**
     * Get recipe schema as a JSON decoded stdClass
     *
     * @return stdClass
     */
    public static function getRecipeJSON(): stdClass
    {
        return json_decode(self::getRecipeString());
    }

    /**
     * Get recipe schema as a JSON string
     *
     * @return string
     */
    public static function getRecipeString(): string
    {
        return file_get_contents(__DIR__ . "../../snapshot-schema.json");
    }

    /**
     * Get recipe schema as a JSON Schema compatible ref object
     *
     * @return stdClass
     */
    public static function getRecipeAsRef(): stdClass
    {
        return (object)['$ref' => 'file://' . __DIR__ . "/../../recipe-schema.json"];
    }
}