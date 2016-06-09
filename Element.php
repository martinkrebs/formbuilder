<?php

// An html form element
class Element {

    private $tagType = '';
    private $attributes = [];

    // contents: inner contents of a tag , if any, ie <tag> contents ... </tag>
    // if tag is a closed tag, $contents should be set to null, if tag is a double tag with no content, set $content = '';
    private $contents = '';

    // the renderable html
    private $html = '';

    public function __construct($tagType, $attributes, $contents=null) {
        $this->tagType = $tagType;
        $this->attributes = $attributes;
        $this->contents = $contents;

        $this->buildHtml();
    }

    public function html() {
        return $this->html;
    }

    public function render() {
        echo $this->html;
    }

    private function buildHtml() {
        $this->html = "<{$this->tagType}";
        foreach($this->attributes as $key => $value) {
            $this->html .= " {$key}=\"{$value}\"";
        }
        // Add contents and closing tag if any, else just a close bracket >
        if(!is_null($this->contents)){
            $this->html .= ">{$this->contents}</{$this->tagType}>";
        } else {
            $this->html .= ">";
        }
    }
}
