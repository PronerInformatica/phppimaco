<?php
namespace Proner\PhpPimacoTest;

use PHPUnit\Framework\TestCase;
use Proner\PhpPimaco\Tags\Img;

class ImgTest extends TestCase
{
    function test_render()
    {
        $img = new Img('tests/teste.png');

        $render = "<img style='float: left' src='tests/teste.png'>";
        $this->assertEquals($render,$img->render());
    }

    function test_render_width()
    {
        $img = new Img('tests/teste.png');
        $img->setWidth(10);

        $render = "<img style='width: 10mm;float: left' src='tests/teste.png'>";
        $this->assertEquals($render,$img->render());
    }

    function test_render_rotate()
    {
        $img = new Img('tests/teste.png');
        $img->rotate(90);

        $render = "<img style='float: left' src='tests/teste.png' rotate='90'>";
        $this->assertEquals($render,$img->render());
    }
}
