# Formify

A simple PHP library for generating HTML5 forms. Don't forget to leave a star!

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
     ->placeholder('Enter your email address')
     ->value('example@gmail.com');

$form->render();
```

### Installation
Coming soon

### Contributing
Feel free to make a PR or open a new issue with the "feature request" tag.