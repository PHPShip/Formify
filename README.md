# Formify

![license](https://img.shields.io/github/license/PHPShip/Formify) ![issues](https://img.shields.io/github/issues/PHPShip/Formify)

Welcome to Formify, a streamlined PHP library that simplifies generating HTML5 forms. This library has been designed to
ensure rapid form creation while removing repetitive tasks.

Like our work? Please consider starring ⭐ the repository!

## Features

- Generate HTML5 forms programmatically
- Customizable form attributes (POST/GET methods, enctype, etc.)
- Customizable field attributes (name, type, placeholder, style, and value)
- TailwindCSS classes support for field styling

## Installation

Installation instructions will be provided soon.

## Quick Start

Formify allows for easy creation of HTML5 forms in a PHP environment. Follow the steps below to generate your first
form:

1. **Install the Library**
    - Installation instructions are being created and will be provided soon.

2. **Require Vendor Autoload**
    - Add the statement `require 'vendor/autoload.php';`, which loads PHP Composer's autoload file to manage
      dependencies.

3. **Import the Form Class**
    - Use the statement `use Formify\Form;` to import the Formify Form class.

4. **Create a Form Configuration**
    - Define a configuration array with relevant settings such as 'action', 'method', and 'enctype'.

5. **Instantiate the Form Class**
    - Create a new instance of the Form class passing the configuration array as an argument.
   ```php
   $form = new Form($config);
   ```

6. **Define Form Fields**
   - Make use of the field builder methods such as name(), type(), style(), placeholder(), and value() to define your form
     fields.
   ```php
   $form->field()
    ->name('emailAddress')
    ->type('email')
    ->style('border border-blue-100') // TailwindCSS classes supported!
    ->placeholder('Enter your email address')
    ->value('example@gmail.com');
   ```

7. **Render the form**
   - Call the `render()` method of your form instance.
   ```php
   $form->render();
   ```

   The complete sample code would look something like this:
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
   ->style('border border-blue-100')
   ->placeholder('Enter your email address')
   ->value('example@gmail.com')
   ->render();
   ```

## Contributions

Contributions, issues, and feature requests are all welcome! Feel free to open a new issue with the "feature request"
tag or submit a Pull Request.

## Documentation:

Looking for more detailed information? Please visit our [Documentation Page](DOCS.md).

## License

Formify is [MIT licensed](LICENSE).
