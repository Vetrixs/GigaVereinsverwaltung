module.exports = {
   root: true,
   parserOptions: {
      parser: "@babel/eslint-parser",
      requireConfigFile: false,
   },
   env: {
      browser: true,
      node: true
   },
   extends: [
      '@vue/standard',
      'plugin:vue/recommended'
   ],
   // required to lint *.vue files
   plugins: [
      'vue'
   ],
   // add your custom rules here
   rules: {
      'indent': ['error', 3],
      'quotes': ['error', 'single'],
      'comma-dangle': ['error', {
         'arrays': 'only-multiline',
         'objects': 'only-multiline',
         'functions': 'never',
         'imports': 'only-multiline',
         'exports': 'only-multiline',
      }],
      'no-return-assign': 'off',
      'camelcase': 'off',
      'vue/max-attributes-per-line': ['error', {
         'singleline': 100,
         'multiline': {
            'max': 1,
            'allowFirstLine': false
         }
      }],
      'vue/no-mutating-props': 'off'
   },
   globals: {}
}
