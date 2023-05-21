<?php declare(strict_types=1);

namespace polarnix\Formify\Field;

use DOMDocument;
use DOMElement;
use DOMEntity;

class Field {
    private $name;
    private $type;
    private $class;
    private $value;

    public function __construct(array $attr = []) {
        $this->name = isset($attr['name']) ? $attr['name'] : '';
        $this->type = isset($attr['type']) ? $attr['type'] : 'text';
        $this->class = isset($attr['class']) ? $attr['class'] : '';
        $this->value = isset($attr['value']) ? $attr['value'] : '';
    }

    public function render(): DOMElement {
        $doc = new DOMDocument();
        $html = $doc->createElement('input');
        
        $attributes = [
            'name' => $this->name,
            'type' => $this->type,
            'class' => $this->class,
            'value' => $this->value
        ];

        foreach($attributes as $name => $value) {
            $html->setAttribute($name, $value);
        }

        return $html;
    }
}