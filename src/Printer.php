<?php

namespace Proner\PhpPimaco;

class Printer
{
    public $template;
    private $config;
    private $file_template;
    private $path_template;
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

    public function addTag($content)
    {
        return $this->tags[] = new Tag($content);
    }

    public function render()
    {
        $pdf = new \FPDF($this->config['page']['orientation'],$this->config['page']['unit'],$this->config['page']['size']);
        $pdf->SetTopMargin($this->config['page']['margin-top']);
        $pdf->SetLeftMargin($this->config['page']['margin-left']);
        $pdf->SetRightMargin($this->config['page']['margin-right']);
        $pdf->AddPage();

        foreach($this->tags as $tag){
            $pdf->SetFont($tag->getFamily(),$tag->getStyle(),$tag->getSize());
            $pdf->Cell($this->config['tag']['width'],$this->config['tag']['height'],$tag->getContent(),$this->config['tag']['border']);
        }

        $pdf->Output();
    }
}