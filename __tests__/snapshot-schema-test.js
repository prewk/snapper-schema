const schema = require('../snapshot-schema.json');
const Ajv = require('ajv');
const ajv = new Ajv();

describe('Snapshot schema', () => {
    it('should compile', () => {
        ajv.compile(schema);
    });
});