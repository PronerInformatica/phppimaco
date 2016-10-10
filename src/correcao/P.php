<?php
namespace Proner\PhpPimaco\Tags;

class P
{
    private $content;
    private $size;
    private $bold;

    function __construct($content)
    {
        $this->content = $content;
        $this->bold = false;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function b()
    {
        $this->bold = true;
        return $this;
    }

    public function br()
    {
        $this->content .= "<br>";
        return $this;
    }

    public function render()
    {
        $tag = "span";
        if( $this->size !== null ){
            $style[] = "font-size: {$this->size}mm";
        }
        if( $this->bold === true ){
            $style[] = "font-weight: bold";
        }

        if( !empty($style) ){
            $content = "<{$tag} style='".implode(";",$style).";'>{$this->content}</{$tag}>";
        }else{
            $content = "<{$tag}>{$this->content}</{$tag}>";
        }
        return $content;
    }
}