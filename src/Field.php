<?php declare(strict_types=1);

namespace Formify;

use DOMDocument;

class Field {
    private $name;
    private $type;
    private $style;
    private $value;

    public function __construct(array $attr = []) {
        $this->name = $attr['name'] ?? '';
        $this->type = $attr['type'] ?? 'text';
        $this->style = $attr['class'] ?? '';
        $this->value = $attr['value'] ?? '';
    }

    public function name($name): self {
        $this->name = $name;
        return $this;
    }

    public function type($type): self {
        $this->type = $type;
        return $this;
    }

    public function style($style): self {
        $this->style = $style;
        return $this;
    }

    public function value($value): self {
        $this->value = $value;
        return $this;
    }

    public function render() {
        $doc = new DOMDocument();
        $input_elm = $doc->createElement('input');
        
        $attributes = [
            'name' => $this->name,
            'type' => $this->type,
            'class' => $this->style,
            'value' => $this->value
        ];

        foreach($attributes as $name => $value) {
            $input_elm->setAttribute($name, $value);
        }

        $doc->appendChild($input_elm);
        return $doc->documentElement;
    }
}