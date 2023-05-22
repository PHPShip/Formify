<?php declare(strict_types=1);

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

$form->field()
     ->name('fullName')
     ->type('text')
     ->style('border border-blue-100')
     ->value('polarnix');

$form->field()
    ->type('submit')
    ->value('submit');

// add error handling in the lib
$form->render();