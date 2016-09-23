<?php
namespace PhpPimacoTest;

use Proner\PhpPimaco\P;
use Proner\PhpPimaco\Tag;

class TagTest extends \PHPUnit_Framework_TestCase
{
    function test_render()
    {
        $tag = new Tag('teste');

        $render = "<td><span style='margin: 0mm;padding: 0mm;float: left;'>teste</span></td>";
        $this->assertEquals($render,$tag->render());
    }

    function test_render_with_p()
    {
        $tag = new Tag();

        $tag->p('teste');
        $render = "<td><span style='margin: 0mm;padding: 0mm;float: left;'>teste</span></td>";
        $this->assertEquals($render,$tag->render());

        $tag->p('teste2');
        $render = "<td><span style='margin: 0mm;padding: 0mm;float: left;'>teste</span><span style='margin: 0mm;padding: 0mm;float: left;'>teste2</span></td>";
        $this->assertEquals($render,$tag->render());

        $tag->p('teste3')->b();
        $render = "<td><span style='margin: 0mm;padding: 0mm;float: left;'>teste</span><span style='margin: 0mm;padding: 0mm;float: left;'>teste2</span><span style='margin: 0mm;padding: 0mm;float: left;font-weight: bold;'>teste3</span></td>";
        $this->assertEquals($render,$tag->render());
    }

    function test_render_add_p()
    {
        $tag = new Tag();

        $p = new P('teste');
        $tag->addP($p);
        $render = "<td><span style='margin: 0mm;padding: 0mm;float: left;'>teste</span></td>";
        $this->assertEquals($render,$tag->render());

        $p = new P('teste2');
        $tag->addP($p);
        $render = "<td><span style='margin: 0mm;padding: 0mm;float: left;'>teste</span><span style='margin: 0mm;padding: 0mm;float: left;'>teste2</span></td>";
        $this->assertEquals($render,$tag->render());

        $p = new P('teste3');
        $tag->addP($p)->b();
        $render = "<td><span style='margin: 0mm;padding: 0mm;float: left;'>teste</span><span style='margin: 0mm;padding: 0mm;float: left;'>teste2</span><span style='margin: 0mm;padding: 0mm;float: left;font-weight: bold;'>teste3</span></td>";
        $this->assertEquals($render,$tag->render());
    }
}