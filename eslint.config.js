import js from '@eslint/js';
import globals from 'globals';

export default [
    js.configs.recommended,
    {
        languageOptions: {
            globals: {
                ...globals.browser,
                ...globals.es2021,
                Alpine: 'readonly',
                Livewire: 'readonly',
                axios: 'readonly',
            },
        },
        files: ['resources/js/**/*.js'],
        rules: {
            'no-unused-vars': 'warn',
            'no-console': 'warn',
        },
    },
];
