<?php
require_once 'Element.php';

class Form {
    private $action = '';
    private $method = 'post';

    // fields is an array containing:
    // 'labelText' => 'input type' kv pairs, eg: 'Comments' => 'textarea'
    // for simple fast form creation or:
    // instances of Elements, eg: [$labelFirstname, $inputFirstname, ...]
    // for much more control over the forms elements and attributes etc.
    private $fields = [];

    // the renderable html
    private $html = '';

    public function __construct($action, $method, $fields=[]) {
        $this->action = $action;
        $this->method = $method;
        $this->fields = $fields;

        $this->buildHtml();
    }

    public function html() {
        return $this->html;
    }

    public function render() {
        echo $this->html;
    }

    private function buildHtml() {
        $contents = '';
        foreach($this->fields as $key => $value) {
            if(is_object($value)) {
                // detailed case, collection of Element instances
                // so add their html to $contents
                $contents .= $value->html() . '<br>';
            } else {
                // simple case, 'labelText' => 'tagType' kv pairs, eg: 'First neme' => 'text'
                // Create Element instances and add html to $contents
                $name = $this->underscorecase($key);
                $label = new Element('label', ['for' => $name ], "{$key}:");
                $contents .= $label->html() . '<br>';

                // most form elements are input tags, except textarea
                if($value == 'textarea') {
                    $element = new Element('textarea', ['rows' => '4', 'cols' => '20', 'name' => $name], '');
                } else {
                    // input tag
                    $element= new Element('input',['type' => $value, 'name' => $name]);
                }
                $contents .= $element->html() . '<br>';
            }
        }
        // Add a submit button
        $submit = new Element('button', ['type' => 'submit', 'value' => 'submit', 'name' => 'submit'], 'Submit');
        $contents .= $submit->html();

        // Since form is an element we can use Element to get our html string
        $form = new Element('form', ['action' => $this->action, 'method' => $this->method ], $contents);

        $this->html = $form->html();
    }

    private function underscorecase($string) {
        $retval = trim($string);
        $retval = strtolower($retval);
        $retval = preg_replace('/\s+/', '_', $retval);
        return $retval;
    }

}
