<?php

namespace Proner\PhpPimaco;

use mPDF;

class Pimaco
{
    public $template;
    private $config;
    private $file_template;
    private $path_template;
    private $rows = array();
    private $tags = array();

    function __construct($template, $path_template = null)
    {
        if( empty($path_template) ){
            $this->path_template = dirname(__DIR__) . "/templates/";
        }else{
            $this->path_template = dirname(__DIR__) . "/" . $path_template;
        }
        $this->file_template = $template.".prn";

        $this->loadTemplates($this->path_template.$this->file_template);
        $this->pdf = new mPDF('utf-8', $this->config['page']['size'],$this->config['page']['font-size'],null,$this->config['page']['margin-left'],$this->config['page']['margin-right'],$this->config['page']['margin-top']);
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

        //ROW
        foreach($std->row as $k => $v){
            if( is_string($v)){
                $this->config['row'][$k] = $v;
            }
        }

        //TAG
        foreach($std->tag as $k => $v){
            if( is_string($v)){
                $this->config['tag'][$k] = $v;
            }
        }
    }

    public function row()
    {
        return $this->rows[] = new Row($this->config['row']['width']);
//        $html = "<table>";
//        $this->pdf->WriteHTML("<table border='1' style='border-spacing: 0; width: {$this->config['tag']['width']}mm' cellpadding='0' cellpadding='0'><tr><td>aaaa</td><td>aaaa</td></tr></table>");
    }

    public function addTag($content)
    {
        return $this->tags[] = new Tag($content);
    }

    public function render()
    {
        foreach( $this->rows as $row ){
            $this->pdf->WriteHTML($row->getContent());
        }
//        $this->pdf->WriteHTML("Diogo");
        $this->pdf->Output();
    }
}