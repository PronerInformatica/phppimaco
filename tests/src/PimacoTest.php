<?php

namespace PhpPimacoTest;

use Proner\PhpPimaco\Pimaco;
use Proner\PhpPimaco\Tag;

class PimacoTest extends \PHPUnit_Framework_TestCase
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
        $tag7 = new Tag('teste7');
        $tag8 = new Tag('teste8');

        $pimaco = new Pimaco($template,$path);
        $pimaco->addTag($tag);
        $pimaco->addTag($tag2);
        $pimaco->addTag($tag3);
        $pimaco->addTag($tag4);
        $pimaco->addTag($tag5);
        $pimaco->addTag($tag6);
        $pimaco->addTag($tag7);
        $pimaco->addTag($tag8);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste2</span></div></div><div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste3</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste4</span></div></div><div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste5</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste6</span></div></div><div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste7</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste8</span></div></div>";
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
        $tag10 = new Tag('teste10');
        $tag11 = new Tag('teste11');
        $tag12 = new Tag('teste12');

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
        $pimaco->addTag($tag10);
        $pimaco->addTag($tag11);
        $pimaco->addTag($tag12);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span></div></div><div style='float: left;margin-left: 4mm;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste2</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste3</span></div></div><div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste4</span></div></div><div style='float: left;margin-left: 4mm;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste5</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste6</span></div></div><div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste7</span></div></div><div style='float: left;margin-left: 4mm;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste8</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste9</span></div></div><div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste10</span></div></div><div style='float: left;margin-left: 4mm;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste11</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste12</span></div></div>";
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

    function test_render_with_barcode()
    {
        $template = "teste";
        $path = dirname(__DIR__) . "/templates/";

        $tag = new Tag('teste');
        $tag->barcode('123456789');

        $pimaco = new Pimaco($template,$path);
        $pimaco->addTag($tag);

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span>teste</span><img style='float: left' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMoAAAAeAQMAAABXBBPSAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAC1JREFUKJFj+Mx/2Maeh+eDPbPNB57D9ufPH7YxsD/zwd74AMOo1KjUqBRMCgBS6GBUqpqy9wAAAABJRU5ErkJggg=='></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div>";
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

        $render = "<div style='float: left;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><img style='float: left' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAAAmCAYAAAB0xJ2ZAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH4AoLEjsb7lR/SAAAAB1pVFh0Q29tbWVudAAAAAAAQ3JlYXRlZCB3aXRoIEdJTVBkLmUHAAACW0lEQVRo3u2Zv0tyURjHv/fllbo2JAki2qgUuBbiILgIgZs6ufgXBNFQW0R7a0NCU1NzQkgQIgg6tTZEUy5CIMWtoPq8U5d+vL56oy68eB44y32e83zv/ZznPHDOtQA0wfZLE24GgAFgABgABoABYAAYAAbApNrvcYIsy/KU9LuOF6+6P3lcMRXw1RX1Y3X+2x5weHioXC6nUCikqakpJRIJbWxsaDAYuDH39/fa2trS4uKiZmZmNDs7q3w+r+Pj40/bzrIsd3jVGWd1v2SS+Dj95eWFSqXi+j6OVCrFYDAAoFqtDo17m/9vPi86I7/jOwHUajUkMT8/z9HREf1+H8dxaLfbLC8vI4nNzU0AQqEQktjd3eXm5obHx0c6nQ7FYvGfGl51fAWQTqeRRKvV+hR/eXmJJJLJJADJZBJJFAoFtre3aTabPD8/j9TwquMrgGAwOLQsX0cgEADg9PSUSCTyzpdIJDg/Px8JwIuOrwBs2x75Ym/nOI5DvV5nbW2NWCyGJLLZ7EgAXnV8A7C0tIQkut2u53y9Xg9JBINB95llWUji6enp23R+FMDBwQGSiEaj1Go1rq6ucByHh4cHLi4u2N/fJ5PJALCyskKj0eDu7o7b21v29vaQxPT0tJsvHA4jiZOTk3f9wYuOrwAAVldXxyrNYb5KpeLmKpfLQ8t6XB3fAbw2uHK5TDweJxAIYNs2qVSK9fV1t8mdnZ1RKpUIh8PYts3CwgI7Ozs4juPmub6+plQqMTc3524HrzqjzDI/Rsx9gAFgABgABoABYAAYAAaAAWAATKL9AZmQ1w5fH521AAAAAElFTkSuQmCC'><span>teste</span></div></div><div style='float: right;width: 10mm;height: 10mm;'><div style='padding: 0mm;'><span></span></div></div>";
        $this->assertEquals($render,$pimaco->render());
    }
}