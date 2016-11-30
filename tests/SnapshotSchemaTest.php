<?php

use JsonSchema\Validator as JsonValidator;
use PHPUnit\Framework\TestCase;
use Prewk\SnapperSchema\SchemaProvider;

class SnapshotSchemaTest extends TestCase
{
    protected $schema;

    protected function setUp()
    {
        $this->schema = (new SchemaProvider)->getSnapshotAsRef();
    }

    public function test_that_it_compiles()
    {
        $jsonValidator = new JsonValidator;
        $jsonValidator->check([], $this->schema);
    }
}