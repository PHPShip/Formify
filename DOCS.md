# Formify - Documentation

Formify is a simple HTML5 form generator library designed to make form creation manageable and scalable. It significantly reduces the redundant tasks involved in HTML form creation with the support of TailwindCSS for styling elements.

## Installation

Use Composer to install the library.

## Usage
Create a Formify configuration array with relevant form values and instantiate the Form class. You can then create form fields and finally render the form.

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
     ->placeholder('Enter your e-mail')
     ->style('border border-blue-100') // tailwindcss classes work here!
     ->value('example@gmail.com');

$form->render();
```

## Field Configuration
Utilize the following methods to customize the fields of your form:
- `name(string $name): self` - Sets the field name.
- `placeholder(string $placeholder): self` - Sets the placeholder text.
- `type(string $type): self` - Sets the field type (e.g., 'text', 'email', 'number').
- `style(string $style): self` - Apply css styles (e.g., 'border border-blue-100').
- `value(string $value): self` - Sets the default value for the field.

Add as many fields as you require and finally render the form using `$form->render();`.

## Errors & Exception Handling

Formify uses single method `render` for rendering the generated form and the fields within. During rendering, Formify uses PHP's built-in DOMDocument to create and append HTML elements. In case of any issues, exceptions (such as DOMException) are caught and handled.

Here's how Formify handles these exceptions during the form/field rendering:

- When creating and rendering a form field (as defined in `src/Field.php`), if any exceptions (like DOMException) occur, Formify will catch these. An error message will be echoed out indicating an issue with field rendering, and the function will return `null`.
