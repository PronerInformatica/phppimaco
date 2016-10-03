<?php
namespace Proner\PhpPimaco\Tags;

class P
{
    private $content;
    private $margin;
    private $padding;
    private $size;
    private $bold;

    function __construct($content)
    {
        $this->content = $content;
        $this->margin = 0;
        $this->padding = 0;
        $this->bold = false;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function align($align)
    {
        $this->float = $align;
        return $this;
    }

    public function setPadding($padding)
    {
        $this->padding = $padding;
        return $this;
    }

    public function br()
    {
        $this->content .= "<br>";
        return $this;
    }

    public function b()
    {
        $this->bold = true;
        return $this;
    }

    public function render()
    {
        $tag = "span";
        if( $this->margin !== null ){
            $style[] = "margin: {$this->margin}mm";
        }
        if( $this->padding !== null ){
            $style[] = "padding: {$this->padding}mm";
        }
        if( $this->size !== null ){
            $style[] = "font-size: {$this->size}mm";
        }
        if( $this->bold === true ){
            $style[] = "font-weight: bold";
        }
        $content = "<{$tag} style='".implode(";",$style).";'>{$this->content}</{$tag}>";
        return $content;
    }
}