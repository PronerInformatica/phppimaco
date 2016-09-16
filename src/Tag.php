<?php
namespace Proner\PhpPimaco;

class Tag
{
    private $content;
    private $width;
    private $height;

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function p($content)
    {
        $p = new P($content);
        $this->p[] = $p;
        return $p;
    }

    private function render()
    {
        foreach($this->p as $p){
            $this->content .= $p->getContent();
        }
        unset($this->p);
    }

    public function getContent()
    {
        $this->render();
        return $this->content;
    }

    public function toArray()
    {
        return [
            'content' => $this->content,
            'width' => $this->width,
            'height' => $this->height
        ];
    }
}