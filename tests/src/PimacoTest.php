<?php
namespace Proner\PhpPimacoTest;

use PHPUnit\Framework\TestCase;
use Proner\PhpPimaco\Pimaco;
use Proner\PhpPimaco\Tag;

class PimacoTest extends TestCase
{
    function test_render_with_2_coluns()
    {
        $template = "teste";
        $path = dirname(__DIR__) . "/templates/";

        $tag = new Tag('teste');
        $tag2 = new Tag('teste2');
        $tag3 = new Tag('teste3');
        $tag4 = new Tag('teste4');
        $tag5 = new Tag('teste5');
        $tag6 = new Tag('teste6');

        $pimaco = new Pimaco($template,$path);
        $pimaco->addTag($tag);
        $pimaco->addTag($tag2);
        $pimaco->addTag($tag3);
        $pimaco->addTag($tag4);
        $pimaco->addTag($tag5);
        $pimaco->addTag($tag6);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste2</span></div></div><div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste3</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste4</span></div></div><div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste5</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste6</span></div></div>";
        $this->assertEquals($render,$pimaco->render());
    }

    function test_render_with_3_coluns()
    {
        $template = "teste2";
        $path = dirname(__DIR__) . "/templates/";

        $tag = new Tag('teste');
        $tag2 = new Tag('teste2');
        $tag3 = new Tag('teste3');
        $tag4 = new Tag('teste4');
        $tag5 = new Tag('teste5');
        $tag6 = new Tag('teste6');
        $tag7 = new Tag('teste7');
        $tag8 = new Tag('teste8');
        $tag9 = new Tag('teste9');

        $pimaco = new Pimaco($template,$path);
        $pimaco->addTag($tag);
        $pimaco->addTag($tag2);
        $pimaco->addTag($tag3);
        $pimaco->addTag($tag4);
        $pimaco->addTag($tag5);
        $pimaco->addTag($tag6);
        $pimaco->addTag($tag7);
        $pimaco->addTag($tag8);
        $pimaco->addTag($tag9);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div><div style='float: left;margin-left: 4mm;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste2</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste3</span></div></div><div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste4</span></div></div><div style='float: left;margin-left: 4mm;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste5</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste6</span></div></div><div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste7</span></div></div><div style='float: left;margin-left: 4mm;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste8</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste9</span></div></div>";
        $this->assertEquals($render,$pimaco->render());
    }

    function test_render_tag_blank_with_2_coluns()
    {
        $template = "teste";
        $path = dirname(__DIR__) . "/templates/";

        $tag = new Tag('teste');

        $pimaco = new Pimaco($template,$path);
        $pimaco->addTag($tag);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div>";
        $this->assertEquals($render,$pimaco->render());
    }

    function test_render_tag_blank_with_3_coluns()
    {
        $template = "teste2";
        $path = dirname(__DIR__) . "/templates/";

        $tag = new Tag('teste');

        $pimaco = new Pimaco($template,$path);
        $pimaco->addTag($tag);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div><div style='float: left;margin-left: 4mm;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div>";
        $this->assertEquals($render,$pimaco->render());
    }

    function test_jump_with_2_coluns()
    {
        $template = "teste";
        $path = dirname(__DIR__) . "/templates/";

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

    function test_jump_with_3_coluns()
    {
        $template = "teste2";
        $path = dirname(__DIR__) . "/templates/";

        $tag = new Tag('teste');

        $pimaco = new Pimaco($template,$path);
        $pimaco->jump(0);
        $pimaco->addTag($tag);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div><div style='float: left;margin-left: 4mm;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div>";
        $this->assertEquals($render,$pimaco->render());
        unset($tag);
        unset($pimaco);

        $tag = new Tag('teste');

        $pimaco = new Pimaco($template,$path);
        $pimaco->jump(3);
        $pimaco->addTag($tag);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div><div style='float: left;margin-left: 4mm;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div><div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div><div style='float: left;margin-left: 4mm;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div>";
        $this->assertEquals($render,$pimaco->render());
    }

    function test_render_with_img()
    {
        $template = "teste";
        $path = dirname(__DIR__) . "/templates/";

        $tag = new Tag();

        $tag->img('tests/teste.png');
        $tag->p('teste');

        $pimaco = new Pimaco($template,$path);
        $pimaco->addTag($tag);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><img style='float: left' src='tests/teste.png'><span>teste</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div>";
        $this->assertEquals($render,$pimaco->render());
    }
}
