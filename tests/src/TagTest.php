<?php
namespace PhpPimacoTest;

use Proner\PhpPimaco\Tags\Barcode;
use Proner\PhpPimaco\Tags\P;
use Proner\PhpPimaco\Tag;

class TagTest extends \PHPUnit_Framework_TestCase
{
    function test_border()
    {
        $template = "teste.json";
        $path = dirname(__DIR__) . "/templates/";

        $tag = new Tag('teste');
        $tag->loadConfig($template, $path);

        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());

        $tag->setBorder(0.1);
        $render = "<div style='width: 10mm;height: 10mm;border: 0.1mm solid black;'><div style='padding: 0mm;'><span>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());
    }

    function test_padding()
    {
        $template = "teste.json";
        $path = dirname(__DIR__) . "/templates/";

        $tag = new Tag('teste');
        $tag->loadConfig($template, $path);

        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());

        $tag->setPadding(4);
        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 4mm;'><span>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());
    }

    function test_render()
    {
        $template = "teste.json";
        $path = dirname(__DIR__) . "/templates/";

        $tag = new Tag('teste');
        $tag->loadConfig($template, $path);

        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());
    }

    function test_render_with_p()
    {
        $template = "teste.json";
        $path = dirname(__DIR__) . "/templates/";

        $tag = new Tag();
        $tag->loadConfig($template, $path);

        $tag->p('teste');
        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());

        $tag->p('teste2');
        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span><span>teste2</span></div></div>";
        $this->assertEquals($render,$tag->render());

        $tag->p('teste3')->b();
        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span><span>teste2</span><span style='font-weight: bold;'>teste3</span></div></div>";
        $this->assertEquals($render,$tag->render());
    }

    function test_render_add_p()
    {
        $template = "teste.json";
        $path = dirname(__DIR__) . "/templates/";

        $tag = new Tag();
        $tag->loadConfig($template, $path);

        $p = new P('teste');
        $tag->addP($p);
        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());

        $p = new P('teste3');
        $tag->addP($p)->b();
        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span><span style='font-weight: bold;'>teste3</span></div></div>";
        $this->assertEquals($render,$tag->render());
    }

    function test_render_width_barcode()
    {
        $template = "teste.json";
        $path = dirname(__DIR__) . "/templates/";

        $tag = new Tag();
        $tag->loadConfig($template, $path);

        $tag->barcode('123456789');
        $tag->p('teste');

        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><img style='float: left' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMoAAAAeAQMAAABXBBPSAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAC1JREFUKJFj+Mx/2Maeh+eDPbPNB57D9ufPH7YxsD/zwd74AMOo1KjUqBRMCgBS6GBUqpqy9wAAAABJRU5ErkJggg=='><span>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());
    }

    function test_render_add_barcode()
    {
        $template = "teste.json";
        $path = dirname(__DIR__) . "/templates/";

        $barcode = new Barcode('123456789');

        $tag = new Tag();
        $tag->loadConfig($template, $path);

        $tag->addBarcode($barcode);
        $tag->p('teste');

        $render = "<div style='width: 10mm;height: 10mm;'><div style='padding: 0mm;'><img style='float: left' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMoAAAAeAQMAAABXBBPSAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAC1JREFUKJFj+Mx/2Maeh+eDPbPNB57D9ufPH7YxsD/zwd74AMOo1KjUqBRMCgBS6GBUqpqy9wAAAABJRU5ErkJggg=='><span>teste</span></div></div>";
        $this->assertEquals($render,$tag->render());
    }
}