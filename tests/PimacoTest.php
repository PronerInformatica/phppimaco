<?php

namespace PhpPimacoTest;

use Proner\PhpPimaco\Pimaco;
use Proner\PhpPimaco\Tag;

class PimacoTest extends \PHPUnit_Framework_TestCase
{
    function test_render()
    {
        $template = "teste";
        $path = dirname(__DIR__) . "/tests/templates/";

        $tag = new Tag('teste');
        $tag2 = new Tag('teste2');

        $pimaco = new Pimaco($template,$path);
        $pimaco->addTag($tag);
        $pimaco->addTag($tag2);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste2</span></div></div>";
        $this->assertEquals($render,$pimaco->render());
    }

    function test_render_with_blank()
    {
        $template = "teste";
        $path = dirname(__DIR__) . "/tests/templates/";

        $tag = new Tag('teste');

        $pimaco = new Pimaco($template,$path);
        $pimaco->addTag($tag);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div>";
        $this->assertEquals($render,$pimaco->render());
    }

    function test_jump()
    {
        $template = "teste";
        $path = dirname(__DIR__) . "/tests/templates/";

        $tag = new Tag('teste');

        $pimaco = new Pimaco($template,$path);
        $pimaco->jump(0);
        $pimaco->addTag($tag);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div>";
        $this->assertEquals($render,$pimaco->render());
        unset($tag);
        unset($pimaco);

        $tag = new Tag('teste');

        $pimaco = new Pimaco($template,$path);
        $pimaco->jump(3);
        $pimaco->addTag($tag);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div><div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div>";
        $this->assertEquals($render,$pimaco->render());
    }
}