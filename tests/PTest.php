<?php
namespace PhpPimacoTest;


use Proner\PhpPimaco\P;

class PTest extends \PHPUnit_Framework_TestCase
{
    function test_render()
    {
        $p = new P('teste');

        $render = "<span style='margin: 0mm;padding: 0mm;float: left;'>teste</span>";
        $this->assertEquals($render,$p->render());

        $p->align('right');
        $render = "<span style='margin: 0mm;padding: 0mm;float: right;'>teste</span>";
        $this->assertEquals($render,$p->render());
//
        $p->b();
        $render = "<span style='margin: 0mm;padding: 0mm;float: right;font-weight: bold;'>teste</span>";
        $this->assertEquals($render,$p->render());

        $p->setSize(10);
        $render = "<span style='margin: 0mm;padding: 0mm;float: right;font-size: 10mm;font-weight: bold;'>teste</span>";
        $this->assertEquals($render,$p->render());

        $p->br();
        $render = "<span style='margin: 0mm;padding: 0mm;float: right;font-size: 10mm;font-weight: bold;'>teste<br></span>";
        $this->assertEquals($render,$p->render());
    }
}