# Formify

A simple PHP library for generating HTML5 forms

### Example

```php
require 'vendor/autoload.php';

use Formify\Form;

$config = [
    'action' => 'action.php',
    'method' => 'POST',
    'enctype' => 'multipart/form-data'
];

$form = new Form($config);

$form->field()
     ->name('emailAddress')
     ->type('email')
     ->style('border border-blue-100') // tailwindcss classes work here!
     ->value('example@gmail.com');

$form->render();
```

### Installation
Coming soon

### TODO
[] Add placeholder support
[] Add error handling

### Contributing
Feel free to make a PR