const schema = require('../master-schema.json');
const Ajv = require('ajv');
const ajv = new Ajv();
const manifest = require('../nodes/manifest.json');

describe('Master schema', () => {
    it('should compile', () => {
        ajv.compile(schema);
    });

    manifest.forEach(([name, path]) => {
        it(`should validate ${name} nodes`, () => {
            const validator = ajv.compile(schema);
            const node = require('../nodes/' + path);
            expect(validator([node])).toBe(true);
        });
    });
});