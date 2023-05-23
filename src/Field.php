<?php declare(strict_types=1);

namespace Formify;

use DOMDocument;

class Field
{
    /**
     * The string value that will be assigned to the field's `name` attribute.
     *
     * @var string
     */
    private $name;

    /**
     * The type of the field, e.g. text or checkbox.
     *
     * @var string
     */
    private $type;

    /**
     * The string value that will be assigned to the field's `class` attribute.
     *
     * @var string
     */
    private $style;

    /**
     * The string value that will be assigned to the field's `value` attribute.
     *
     * @var string
     */
    private $value;

    /**
     * @var string
     */
    private $placeholder;

    /**
     * Construct a new Field.
     *
     * @param array<string, string> $attr
     */
    public function __construct(array $attr = [])
    {
        $this->name = $attr['name'] ?? '';
        $this->placeholder = $attr['placeholder'] ?? '';
        $this->type = $attr['type'] ?? 'text';
        $this->style = $attr['class'] ?? '';
        $this->value = $attr['value'] ?? '';
    }

    /**
     * Alter the name attribute.
     *
     * @param string $name
     * @return $this
     */
    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Alter the placeholder attribute.
     *
     * @param string $placeholder
     * @return $this
     */
    public function placeholder(string $placeholder): self
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    /**
     * Alter the type attribute.
     *
     * @param string $type
     * @return $this
     */
    public function type(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Alter the class attribute.
     *
     * @param string $style
     * @return $this
     */
    public function style(string $style): self
    {
        $this->style = $style;
        return $this;
    }

    /**
     * Alter the value attribute.
     *
     * @param string $value
     * @return $this
     */
    public function value(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Compile the Field into an element.
     *
     * @return mixed
     * @throws \DOMException
     */
    public function render(): mixed
    {
        $doc = new DOMDocument();
        $input_elm = $doc->createElement('input');

        $attributes = [
            'name' => $this->name,
            'placeholder' => $this->placeholder,
            'type' => $this->type,
            'class' => $this->style,
            'value' => $this->value
        ];

        foreach ($attributes as $name => $value) {
            $input_elm->setAttribute($name, $value);
        }

        $doc->appendChild($input_elm);
        return $doc->documentElement;
    }
}
