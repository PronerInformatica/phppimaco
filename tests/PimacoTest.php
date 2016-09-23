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

        $render = "<table cellspacing='0' cellpadding='0'><tr><td style='width: 10mm;height: 10mm;'><span style='margin: 0mm;padding: 0mm;float: left;'>teste</span></td><td style='width: 10mm;height: 10mm;'><span style='margin: 0mm;padding: 0mm;float: left;'>teste2</span></td></tr></table>";
        $this->assertEquals($render,$pimaco->render());
    }

    function test_render_with_blank()
    {
        $template = "teste";
        $path = dirname(__DIR__) . "/tests/templates/";

        $tag = new Tag('teste');

        $pimaco = new Pimaco($template,$path);
        $pimaco->addTag($tag);

        $render = "<table cellspacing='0' cellpadding='0'><tr><td style='width: 10mm;height: 10mm;'><span style='margin: 0mm;padding: 0mm;float: left;'>teste</span></td><td style='width: 10mm;height: 10mm;'><span style='margin: 0mm;padding: 0mm;float: left;'></span></td></tr></table>";
        $this->assertEquals($render,$pimaco->render());
    }
}