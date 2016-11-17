<?php
namespace Proner\PhpPimaco\Tags;

class QrCode
{
    private $size;
    private $label;
    private $labelFontSize;
    private $padding;
    private $margin;
    private $align;
    private $content;
    private $br;

    function __construct($content,$typeCode = null)
    {
        $this->content = $content;
        $this->labelFontSize = 12;
        $this->size = 100;
        $this->padding = 0;
        $this->align = 'left';
        return $this;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function setLabelFontSize($labelFontSize)
    {
        $this->labelFontSize = $labelFontSize;
        return $this;
    }

    public function setPadding($padding)
    {
        $this->padding = $padding;
        return $this;
    }

    public function setMargin($margin)
    {
        if( is_array($margin) ){
            $margin = implode("mm ",$margin).'mm';
        }else{
            $margin = $margin."mm";
        }
        $this->margin = $margin;
        return $this;
    }

    public function setAlign($align)
    {
        $this->align = $align;
        return $this;
    }

    public function br()
    {
        $this->br .= "<br>";
    }

    public function render()
    {
        $qrcode = new \Endroid\QrCode\QrCode();
        $qrcode->setErrorCorrection('high');
        $qrcode->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0));
        $qrcode->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0));
        $qrcode->setImageType(\Endroid\QrCode\QrCode::IMAGE_TYPE_PNG);
        $qrcode->setText($this->content);


        if( $this->br === null ){
            if( $this->align == 'left' ){
                $styles[] = "float: left";
            }else{
                $styles[] = "float: right";
            }
        }

        if( $this->margin !== null ){
            $styles[] = "margin: {$this->margin}";
        }

        if( !empty($this->size) ){
            $qrcode->setSize($this->size);
        }

        if( !empty($this->label) ){
            $qrcode->setLabel($this->label);
        }

        if( !empty($this->labelFontSize) ){
            $qrcode->setLabelFontSize($this->labelFontSize);
        }

        if( !empty($this->padding) ){
            $qrcode->setPadding($this->padding);
        }

        if( !empty($styles) ){
            $style = "style='".implode(";",$styles)."'";
        }else{
            $style = "";
        }

        return "<img ".$style." src='{$qrcode->getDataUri()}'>".$this->br;
    }
}





