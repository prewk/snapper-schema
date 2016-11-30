const schema = require('../snapshot-schema.json');
const Ajv = require('ajv');
const ajv = new Ajv();
const manifest = require('../nodes/manifest.json');

describe('Master schema', () => {
    it('should compile', () => {
        ajv.compile(schema);
    });
});