<?php
namespace Proner\PhpPimaco;

class Tag
{
    private $content;

    private $width;
    private $height;
    private $border;
    private $ln;
    private $size;
    private $padding;
    private $align;
    private $valign = 'top';
    private $fill;
    private $link;

    function __construct($content = null)
    {
        $this->p = new \ArrayObject();

        if( $content !== null ){
            $p = new P($content);
            $this->p->append($p);
        }
    }

    public function loadConfig($template, $path)
    {
        $json = file_get_contents($path . $template);
        $std = json_decode($json);

        $this->width = $std->tag->width;
        $this->height = $std->tag->height;
        $this->border = $std->tag->border;
        $this->ln = $std->tag->ln;
        $this->align = $std->tag->align;
        $this->fill = $std->tag->fill;
        $this->link = $std->tag->link;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function setPadding($padding)
    {
        $this->padding = $padding;
        return $this;
    }

    public function addP(P $p)
    {
        $this->p->append($p);
        return $p;
    }

    public function p($content)
    {
        $p = new P($content);
        $this->p->append($p);
        return $p;
    }

    private function getP()
    {
        return $this->p->getArrayCopy();
    }

    public function render()
    {
        $this->content = "";

        if( !empty($this->width) ){
            $style[] = "width: {$this->width}mm";
        }
        if( !empty($this->height) ){
            $style[] = "height: {$this->height}mm";
        }
        if( !empty($this->border) ){
            $style[] = "border: {$this->border}mm solid black";
        }
        if( !empty($this->ln) ){
            $style[] = "ln: {$this->ln}mm";
        }
        if( !empty($this->padding) ){
            $style[] = "padding: {$this->padding}";
        }
        if( !empty($this->size) ){
            $style[] = "font-size: {$this->size}";
        }
        if( !empty($this->align) ){
            $style[] = "text-align: {$this->align}";
        }
        if( !empty($this->valign) ){
            $style[] = "vertical-align: {$this->valign}";
        }

        $ps = $this->getP();
        foreach($ps as $p){
            $this->content .= $p->render();
        }

        if( !empty($style) ){
            $this->content = "<td style='".implode(";",$style).";'>{$this->content}</td>";
        }else{
            $this->content = "<td>{$this->content}</td>";
        }

        return $this->content;
    }
}