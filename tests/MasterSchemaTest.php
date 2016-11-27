<?php

use PHPUnit\Framework\TestCase;
use JsonSchema\Validator as JsonValidator;
use Prewk\SnapperSchema\SchemaProvider;

class MasterSchemaTest extends TestCase
{
    protected $schema;

    protected function setUp()
    {
        $this->schema = (new SchemaProvider)->asRef();
    }

    public function test_that_it_compiles()
    {
        $jsonValidator = new JsonValidator;
        $jsonValidator->check([], $this->schema);
    }

    public function test_that_the_nodes_are_valid()
    {
        foreach (json_decode(file_get_contents(__DIR__ . "/../nodes/manifest.json")) as list($name, $path)) {
            $jsonValidator = new JsonValidator;

            $node = json_decode(file_get_contents(__DIR__ . "/../nodes/$path"));

            $jsonValidator->check([$node], $this->schema);

            $this->assertTrue($jsonValidator->isValid(), "Node $name should be valid");
        }
    }
}