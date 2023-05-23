<?php declare(strict_types=1);

namespace Formify;

use DOMDocument;

class Form
{
    /**
     * The PHP file (action) this form should go to.
     *
     * @var string
     */
    private $action;

    /**
     * The HTTP method the form should use to reach the action.
     *
     * @var string
     */
    private $method;

    /**
     * The type of encoding the form data should be encoded with.
     *
     * @var string
     */
    private $enctype;

    /**
     * The fields that are in this form.
     *
     * @var array<int, Field>
     */
    private $fields;

    /**
     * Construct a new Form.
     *
     * @param non-empty-array<string, string> $config
     */
    public function __construct(array $config = [])
    {
        $this->action = $config['action'] ?? '';
        $this->method = isset($config['method']) ? strtoupper($config['method']) : 'POST';
        $this->enctype = $config['enctype'] ?? 'multipart/form-data';
        $this->fields = [];
    }

    /**
     * Construct a new `Field` and return it.
     *
     * @return Field
     * @see Field
     */
    public function field(): Field
    {
        $field = new Field;
        $this->fields[] = $field;
        return $field;
    }

    /**
     * Renders the form to the view, so it can be sent to the browser.
     *
     * @return void
     */
    public function render(): void
    {
        try {
            $doc = new DOMDocument();
            $html = $doc->createElement('form');

            $attributes = [
                'action' => $this->action,
                'method' => $this->method,
                'enctype' => $this->enctype
            ];

            foreach ($attributes as $name => $value) {
                $html->setAttribute($name, $value);
            }

            foreach ($this->fields as $field) {
                $input = $field->render();
                if ($field === null) {
                    continue;
                }

                $import = $doc->importNode($input, true);
                $html->appendChild($import);
            }

            $doc->appendChild($html);
            echo $doc->saveHTML();
        } 
        catch (\DOMException|\Exception $e) {
            echo "An error occurred while rendering the form: " . $e->getMessage();
        }
    }
}
