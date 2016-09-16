<?php

namespace Proner\PhpPimaco;

use DoctrineTest\InstantiatorTestAsset\ArrayObjectAsset;
use mPDF;

class Pimaco
{
    public $template;
    private $config;
    private $file_template;
    private $path_template;
    private $tags;

    function __construct($template, $path_template = null)
    {
        $this->tags = new \ArrayObject();

        if( empty($path_template) ){
            $this->path_template = dirname(__DIR__) . "/templates/";
        }else{
            $this->path_template = dirname(__DIR__) . "/" . $path_template;
        }
        $this->file_template = $template.".prn";

        $this->loadTemplates($this->path_template.$this->file_template);
        $this->pdf = new mPDF('utf-8', $this->config['page']['size'],$this->config['page']['font-size'],null,$this->config['page']['margin-left'],$this->config['page']['margin-right'],$this->config['page']['margin-top']);
        $this->pdf->SetColumns($this->config['page']['columns'],'L',1);
    }

    private function loadTemplates($template)
    {
        $tconfig = str_replace(".prn",".json",$template);
        $json = file_get_contents($tconfig);
        $std = json_decode($json);

        //PAGE
        foreach($std->page as $k => $v){
            if( is_string($v)){
                $this->config['page'][$k] = $v;
            }
            if( $k == 'size' ){
                foreach($std->page->size as $k2 => $v2){
                    $this->config['page']['size'][] = $v2;
                }
            }
        }

        //TAG
        foreach($std->tag as $k => $v){
            if( is_string($v)){
                $this->config['tag'][$k] = $v;
            }
        }
    }

    public function addTag(Tag $tag)
    {
        $tag->setWidth($this->config['tag']['width']);
        $tag->setHeight($this->config['tag']['height']);
        $content = $tag->getContent();
        $tag->setContent("<div style='width:{$tag->getWidth()}mm;height: {$tag->getHeight()}mm; border: 1px solid #000;'>{$content}</div>");
        return $this->tags->append($tag);
    }

    public function getTags()
    {
        return $this->tags->getArrayCopy();
    }

    public function render()
    {
        $tags = $this->getTags();
        foreach( $tags as $tag ){
            $this->pdf->WriteHTML($tag->getContent());
        }
        $this->pdf->Output();
    }
}