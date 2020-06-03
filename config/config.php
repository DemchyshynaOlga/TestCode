<?php

return [
    'key' => 'er56her78',
    'contentType' => [
        'application/json' => 'json',
        'application/xml' => 'xml'
    ],
    'validationFields' => [
        'card' => ['require' => true],
        'expirationdate' => ['require' => true],
        'cvv2' => ['require' => true],
        'email' => ['require' => true],
        'phone' => ['require' => false],
    ],
    'errors' => [
        'require' => 'is a required field',
        'validation' => 'field is not valid',
        'number' => 'field value should be a number ',
        'expiration' => 'card expired'
    ],
    'dateFormat' => 'm/y'
];