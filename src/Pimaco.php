<?php
declare(strict_types = 1);
namespace Proner\PhpPimaco;

use Mpdf\Mpdf;

class Pimaco
{
    private $path_template;
    private $file_template;
    private $content;

    private $width;
    private $height;
    private $fontSize;
    private $orientation;
    private $columns;
    private $unit;
    private $marginTop;
    private $marginLeft;
    private $marginRight;
    private $marginBottom;
    private $marginHeader;
    private $marginFooter;

    private $tags;

    /**
     * Pimaco constructor.
     * @param string $template
     * @param string $path_template
     * @param string $tempDir
     * @throws \Exception
     */
    public function __construct(string $template, string $path_template = null, string $tempDir = null)
    {
        $this->path_template = dirname(__DIR__) . "/templates/";
        if (!empty($path_template)) {
            $this->path_template = $path_template;
        }
        $this->file_template = $template.".json";
        $this->loadConfig();

        $this->tags = new \ArrayObject();

        $config = [
            'format' => [$this->width, $this->height],
            'default_font_size' => $this->fontSize,
            'margin_left' => $this->marginLeft,
            'margin_right' => $this->marginRight,
            'margin_top' => $this->marginTop,
            'margin_bottom' => $this->marginBottom,
            'margin_header' => $this->marginHeader,
            'margin_footer' => $this->marginFooter
        ];

        if (!empty($tempDir)) {
            $config['tempDir'] = $tempDir;
        }

        try {
            $this->pdf = new Mpdf($config);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * @throws \Exception
     */
    private function loadConfig()
    {
        if (!file_exists($this->path_template . $this->file_template)) {
            throw new \Exception("template not found");
        }
        $json = file_get_contents($this->path_template . $this->file_template);
        $std = json_decode($json);

        $this->width = $std->page->size[0];
        $this->height = $std->page->size[1];
        $this->fontSize = $std->page->{'font-size'};
        $this->orientation = $std->page->orientation;
        $this->columns = $std->page->columns;
        $this->unit = $std->page->unit;
        $this->marginTop = $std->page->{'margin-top'};
        $this->marginLeft = $std->page->{'margin-left'};
        $this->marginRight = $std->page->{'margin-right'};
        $this->marginBottom = $std->page->{'margin-bottom'};
        $this->marginHeader = $std->page->{'margin-header'};
        $this->marginFooter = $std->page->{'margin-footer'};
    }

    public function addTag(Tag $tag)
    {
        $tag->loadConfig($this->file_template, $this->path_template);

        $new = $this->tags->count() + 1;
        $cols = $this->columns;
        $rows = ceil($this->tags->count()/$this->columns) + 1;

        if ($new%$cols==0) {
            $sideCol = "right";
            $margin = false;
        } elseif ($new == ($rows * $cols - ($cols - 1))) {
            $sideCol = "left";
            $margin = false;
        } else {
            $sideCol = "left";
            $margin = true;
        }

        return $this->tags->append($tag->render($sideCol, $margin));
    }

    private function addTagBlank()
    {
        $tag = new Tag('');
        $this->addTag($tag);
    }

    public function getTags()
    {
        return $this->tags->getArrayCopy();
    }

    public function jump($jump)
    {
        for ($i = 0; $i < $jump; $i++) {
            $this->addTagBlank();
        }
    }

    public function render()
    {
        $this->content = "";

        $rows = ceil($this->tags->count()/$this->columns);
        $blank = $this->columns*$rows-$this->tags->count();
        for ($i = 0; $i < $blank; $i++) {
            $this->addTagBlank();
        }

        $tags = $this->getTags();

        $col = 0;
        $render = "";
        for ($row = 1; $row <= $rows; $row++) {
            for ($i = 1; $i <= $this->columns && $this->tags->count() > 0; $i++) {
                $render .= $tags[$col];
                $col++;
                if ($col > $this->tags->count()) {
                    break 2;
                }
            }
        }
        return $render;
    }

    /**
     * @param string|null $name
     * @param string|null $dest
     * @throws \Mpdf\MpdfException
     */
    public function output(string $name = null, string $dest = null)
    {
//        var_dump($this->render());
//        exit();
        $this->pdf->WriteHTML($this->render());
        $this->pdf->Output($name, $dest);
    }
}
