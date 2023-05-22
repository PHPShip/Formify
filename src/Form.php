<?php declare(strict_types=1);

namespace Formify;

use DOMDocument;

class Form {
    private $action;
    private $method;
    private $enctype;
    private $fields;

    public function __construct(array $config = []) {
        $this->action = $config['action'] ?? '';
        $this->method = isset($config['method']) ? strtoupper($config['method']) : 'POST';
        $this->enctype = $config['enctype'] ?? 'multipart/form-data';
        $this->fields = [];
    }

    public function field(): Field {
        $field = new Field;
        $this->fields[] = $field;
        return $field;
    }

    public function render() {
        $doc = new DOMDocument();
        $html = $doc->createElement('form');

        $attributes = [
            'action' => $this->action,
            'method' => $this->method,
            'enctype' => $this->enctype
        ];

        foreach($attributes as $name => $value) {
            $html->setAttribute($name, $value);
        }

        foreach($this->fields as $field) {
            $input = $field->render();
            $import = $doc->importNode($input, true);
            $html->appendChild($import);
        }

        $doc->appendChild($html);
        echo $doc->saveHTML();
    }
}