<?php
declare(strict_types = 1);
namespace Proner\PhpPimaco\Tags;

use phpDocumentor\Reflection\Types\Void_;
use \Picqer\Barcode\BarcodeGeneratorPNG;

class Barcode
{
    private $width;
    private $height;
    private $content;
    private $typeCode;
    private $margin;
    private $align;
    private $br;

    /**
     * Barcode constructor.
     * @param string $content
     * @param string|null $typeCode
     */
    public function __construct(string $content, string $typeCode = null)
    {
        $this->content = $content;
        $this->typeCode = 'TYPE_CODE_128';

        if ($typeCode !== null) {
            $this->typeCode = $typeCode;
        }

        $this->width = 2;
        $this->height = 30;
        $this->align = 'left';
        return $this;
    }

    /**
     * @param float $width
     * @return $this
     */
    public function setWidth(float $width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @param float $height
     * @return $this
     */
    public function setHeight(float $height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param $margin
     * @return $this
     */
    public function setMargin($margin)
    {
        if (is_array($margin)) {
            $margin = implode("mm ", $margin).'mm';
        } else {
            $margin = $margin."mm";
        }
        $this->margin = $margin;
        return $this;
    }

    /**
     * @param string $align
     * @return $this
     */
    public function setAlign(string $align)
    {
        $this->align = $align;
        return $this;
    }

    public function br()
    {
        $this->br .= "<br>";
    }

    /**
     * @return string
     * @throws \Picqer\Barcode\Exceptions\BarcodeException
     */
    public function render()
    {
        if ($this->br === null) {
            if ($this->align == 'left') {
                $styles[] = "float: left";
            } else {
                $styles[] = "float: right";
            }
        }

        if ($this->margin !== null) {
            $styles[] = "margin: {$this->margin}";
        }

        if (!empty($styles)) {
            $style = "style='".implode(";", $styles)."'";
        } else {
            $style = "";
        }

        $barcode = new BarcodeGeneratorPNG();

        switch ($this->typeCode) {
            case 'TYPE_CODE_39':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_CODE_39, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_CODE_39_CHECKSUM':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_CODE_39_CHECKSUM, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_CODE_39E':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_CODE_39E, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_CODE_39E_CHECKSUM':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_CODE_39E_CHECKSUM, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_CODE_93':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_CODE_93, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_STANDARD_2_5':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_STANDARD_2_5, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_STANDARD_2_5_CHECKSUM':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_STANDARD_2_5_CHECKSUM, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_INTERLEAVED_2_5':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_INTERLEAVED_2_5, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_INTERLEAVED_2_5_CHECKSUM':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_INTERLEAVED_2_5_CHECKSUM, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_CODE_128':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_CODE_128, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_CODE_128_A':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_CODE_128_A, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_CODE_128_B':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_CODE_128_B, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_CODE_128_C':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_CODE_128_C, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_EAN_2':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_EAN_2, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_EAN_5':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_EAN_5, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_EAN_8':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_EAN_8, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_EAN_13':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_EAN_13, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_UPC_A':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_UPC_A, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_UPC_E':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_UPC_E, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_MSI':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_MSI, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_MSI_CHECKSUM':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_MSI_CHECKSUM, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_POSTNET':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_POSTNET, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_PLANET':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_PLANET, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_RMS4CC':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_RMS4CC, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_KIX':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_KIX, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_IMB':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_IMB, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_CODABAR':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_CODABAR, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_CODE_11':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_CODE_11, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_PHARMA_CODE':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_PHARMA_CODE, $this->width, $this->height))."'>".$this->br;

            case 'TYPE_PHARMA_CODE_TWO_TRACKS':
                return "<img ".$style." src='data:image/png;base64,".base64_encode($barcode->getBarcode($this->content, $barcode::TYPE_PHARMA_CODE_TWO_TRACKS, $this->width, $this->height))."'>".$this->br;
        }
    }
}
