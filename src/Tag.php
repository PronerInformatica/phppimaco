<?php
namespace Proner\PhpPimaco;

use Proner\PhpPimaco\Tags\Barcode;
use Proner\PhpPimaco\Tags\Img;
use Proner\PhpPimaco\Tags\P;
use Proner\PhpPimaco\Tags\QrCode;

class Tag
{
    private $content;

    private $width;
    private $height;
    private $border;
    private $size;
    private $padding;
    private $marginLeft;

    function __construct($content = null)
    {
        $this->tags = new \ArrayObject();

        if( $content !== null ){
            $p = new P($content);
            $this->tags->append($p);
        }
    }

    public function loadConfig($template, $path)
    {
        $json = file_get_contents($path . $template);
        $std = json_decode($json);

        $this->width = $std->tag->width;
        $this->height = $std->tag->height;
        $this->marginLeft = $std->tag->{'margin-left'};

        if( empty($this->border) ){
            $this->border = $std->tag->border;
        }

        if( empty($this->padding) ){
            $this->padding = 0;
        }

        if( empty($this->padding) ){
            $this->padding = 0;
        }

        $this->ln = $std->tag->ln;
        $this->align = $std->tag->align;
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

    public function setBorder($border)
    {
        $this->border = $border;
        return $this;
    }

    public function addP(P $p)
    {
        $this->tags->append($p);
        return $p;
    }

    public function p($content)
    {
        $p = new P($content);
        $this->tags->append($p);
        return $p;
    }

    public function addBarcode(Barcode $barcode)
    {
        $this->tags->append($barcode);
        return $barcode;
    }

    public function barcode($content, $typeCode = null)
    {
        $barcode = new Barcode($content,$typeCode);
        $this->tags->append($barcode);
        return $barcode;
    }

    public function qrcode($content)
    {
        $qrcode = new QrCode($content);
        $this->tags->append($qrcode);
        return $qrcode;
    }

    public function img($content)
    {
        $img = new Img($content);
        $this->tags->append($img);
        return $img;
    }

    private function getTags()
    {
        return $this->tags->getArrayCopy();
    }

    public function render($side = null,$margin = false)
    {
        $this->content = "";

        if( !empty($side) ){
            $style[] = "float: {$side}";
        }
        if( $margin ){
            $style[] = "margin-left: {$this->marginLeft}mm";
        }
        if( !empty($this->width) ){
            $style[] = "width: {$this->width}mm";
        }
        if( !empty($this->height) ){
            $style[] = "height: {$this->height}mm";
        }
        if( !empty($this->border) ){
            $style[] = "border: {$this->border}mm solid black";
        }
        if( !empty($this->size) ){
            $style[] = "font-size: {$this->size}mm";
        }
        if( !empty($this->align) ){
            $style[] = "text-align: {$this->align}";
        }

        $tags = $this->getTags();
        foreach($tags as $tag){
            $this->content .= $tag->render();
        }

        if( !empty($style) ){
            $this->content = "<div style='".implode(";",$style).";'><div style='padding: {$this->padding}mm;'>{$this->content}</div></div>";
        }else{
            $this->content = "<div><div style='padding: {$this->padding}mm;'>{$this->content}</div></div>";
        }

        return $this->content;
    }
}