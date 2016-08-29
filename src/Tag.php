<?php
namespace Proner\PhpPimaco;

class Tag
{
    private $content;
    private $family;
    private $style;
    private $size;

    function __construct($content)
    {
        $this->setContent($content);
        $this->setFamily('Arial');
        $this->setStyle('');
        $this->setSize(10);
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getFamily()
    {
        return $this->family;
    }

    public function setFamily($family)
    {
        $this->family = $family;
        return $this;
    }

    public function getStyle()
    {
        return $this->style;
    }

    public function setStyle($style)
    {
        $this->style = $style;
        return $this;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }
}