<?php
declare(strict_types = 1);
namespace Proner\PhpPimaco\Tags;

use Endroid\QrCode\ErrorCorrectionLevel;

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

    /**
     * QrCode constructor.
     * @param string $content
     * @param string|null $typeCode
     */
    public function __construct(string $content, string $typeCode = null)
    {
        $this->content = $content;
        $this->labelFontSize = 12;
        $this->size = 100;
        $this->padding = 0;
        $this->align = 'left';
        return $this;
    }

    /**
     * @param float $size
     * @return $this
     */
    public function setSize(float $size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param string $label
     * @return $this
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @param float $labelFontSize
     * @return $this
     */
    public function setLabelFontSize(float $labelFontSize)
    {
        $this->labelFontSize = $labelFontSize;
        return $this;
    }

    /**
     * @param float $padding
     * @return $this
     */
    public function setPadding(float $padding)
    {
        $this->padding = $padding;
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
     * @throws \Endroid\QrCode\Exception\InvalidWriterException
     */
    public function render()
    {
        $qrcode = new \Endroid\QrCode\QrCode();
        $qrcode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);
        $qrcode->setEncoding('UTF-8');
        $qrcode->setForegroundColor(array('r' => 0, 'g' => 0, 'b' => 0, 'a' => 0));
        $qrcode->setBackgroundColor(array('r' => 255, 'g' => 255, 'b' => 255, 'a' => 0));
        $qrcode->setWriterByName('png');
        $qrcode->setText($this->content);

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

        if (!empty($this->size)) {
            $qrcode->setSize($this->size);
        }

        if (!empty($this->label)) {
            $qrcode->setLabel($this->label);
        }

        if (!empty($this->labelFontSize)) {
            $qrcode->setLabelFontSize($this->labelFontSize);
        }

        if (!empty($this->padding)) {
            $qrcode->setPadding($this->padding);
        }

        if (!empty($styles)) {
            $style = "style='".implode(";", $styles)."'";
        } else {
            $style = "";
        }

        return "<img ".$style." src='{$qrcode->writeDataUri()}'>".$this->br;
    }
}
