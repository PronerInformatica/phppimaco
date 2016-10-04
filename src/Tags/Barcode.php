<?php
namespace Proner\PhpPimaco\Tags;

use \Picqer\Barcode\BarcodeGeneratorPNG;

class Barcode
{
    private $content;
    private $typeCode;

    function __construct($content)
    {
        $this->content = $content;
    }

    public function render()
    {
        $barcode = new BarcodeGeneratorPNG();
        return '<img src="data:image/png;base64,' . base64_encode($barcode->getBarcode('081231723897', $barcode::TYPE_CODE_128)) . '">';
    }
}