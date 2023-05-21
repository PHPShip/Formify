# Formify

A simple PHP library for generating HTML5 forms

### Example

```php
<?php 

$config = [
    'action' => 'action.php',
    'method' => 'POST',
    'enctype' => 'multipart/form-data'
];

$form = new Formify($config);

$form->field()
     ->name('emailAddress')
     ->type('email')
     ->style('border border-blue-100')
     ->value('example@gmail.com');

$form->render();
```

### Installation
Coming soon