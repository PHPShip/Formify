<?php declare(strict_types=1);

namespace Formify;

use DOMDocument;

class Field
{
    private string $name;
    private string $type;
    private string $style;
    private string $value;
    private string $placeholder;

    public function __construct(array $attr = [])
    {
        $this->name = $attr['name'] ?? '';
        $this->placeholder = $attr['placeholder'] ?? '';
        $this->type = $attr['type'] ?? 'text';
        $this->style = $attr['class'] ?? '';
        $this->value = $attr['value'] ?? '';
    }

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function placeholder(string $placeholder): self
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function type(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function style(string $style): self
    {
        $this->style = $style;
        return $this;
    }

    public function value(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function render(): mixed
    {
        try {
            $doc = new DOMDocument();
            $input_elm = $doc->createElement('input');

            $attributes = [
                'name' => $this->name,
                'type' => $this->type,
                'class' => $this->style,
                'value' => $this->value,
                'placeholder' => $this->placeholder
            ];

            foreach ($attributes as $name => $value) {
                if (empty($value) === false) {
                    $input_elm->setAttribute($name, $value);
                }
            }

            $doc->appendChild($input_elm);
            return $doc->documentElement;
        }
        catch (\DOMException|\Exception $e) {
            echo "An error occurred while rendering the field: " . $e->getMessage();
            return null;
        }
    }
}
