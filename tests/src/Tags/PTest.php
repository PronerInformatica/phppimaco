<?php
namespace PhpPimacoTest;

use Proner\PhpPimaco\Tags\P;

class PTest extends \PHPUnit_Framework_TestCase
{
    function test_render()
    {
        $p = new P('teste');

        $render = "<span>teste</span>";
        $this->assertEquals($render,$p->render());

        $p->b();
        $render = "<span style='font-weight: bold;'>teste</span>";
        $this->assertEquals($render,$p->render());

        $p->setSize(10);
        $render = "<span style='font-size: 10mm;font-weight: bold;'>teste</span>";
        $this->assertEquals($render,$p->render());

        $p->br();
        $render = "<span style='font-size: 10mm;font-weight: bold;'>teste<br></span>";
        $this->assertEquals($render,$p->render());
    }
}