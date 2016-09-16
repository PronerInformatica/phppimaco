<?php

namespace PhpPimacoTest;

use Proner\PhpPimaco\Pimaco;
use Proner\PhpPimaco\Tag;

class PimacoTest extends \PHPUnit_Framework_TestCase
{
    public function test_add_tag()
    {
        $tag = new Tag();
        $tag->p("TAG");

        $pimaco = new Pimaco('6182');
        $pimaco->addTag($tag);
        $retorno = $pimaco->getTags()[0]->toArray();

        $vetor = [
            'content' => "<div style='width:101.6mm;height: 33.9mm; border: 1px solid #000;'><span style='margin: 0mm;padding: 0mm;float: left;'>TAG</span></div>",
            'width' => 101.6,
            'height' => 33.9
        ];

        $this->assertEquals($vetor,$retorno);
    }

    public function test_add_tags()
    {
        $tag = new Tag();
        $tag->p("TAG");

        $tag2 = new Tag();
        $tag2->p("TAG 2");

        $tag3 = new Tag();
        $tag3->p("TAG 3");

        $tag4 = new Tag();
        $tag4->p("TAG 4");

        $tag5 = new Tag();
        $tag5->p("TAG 5");

        $tag6 = new Tag();
        $tag6->p("TAG 6");

        $tag7 = new Tag();
        $tag7->p("TAG 7");

        $tag8 = new Tag();
        $tag8->p("TAG 8");

        $pimaco = new Pimaco('6182');
        $pimaco->addTag($tag);
        $pimaco->addTag($tag2);
        $pimaco->addTag($tag3);
        $pimaco->addTag($tag4);
        $pimaco->addTag($tag5);
        $pimaco->addTag($tag6);
        $pimaco->addTag($tag7);
        $pimaco->addTag($tag8);

        $retorno[0] = $pimaco->getTags()[0]->toArray();
        $retorno[1] = $pimaco->getTags()[1]->toArray();
        $retorno[2] = $pimaco->getTags()[2]->toArray();
        $retorno[3] = $pimaco->getTags()[3]->toArray();
        $retorno[4] = $pimaco->getTags()[4]->toArray();
        $retorno[5] = $pimaco->getTags()[5]->toArray();
        $retorno[6] = $pimaco->getTags()[6]->toArray();
        $retorno[7] = $pimaco->getTags()[7]->toArray();

        $vetor = [
            0 => [
                'content' => "<div style='width:101.6mm;height: 33.9mm; border: 1px solid #000;'><span style='margin: 0mm;padding: 0mm;float: left;'>TAG</span></div>",
                'width' => 101.6,
                'height' => 33.9
            ],
            1 => [
                'content' => "<div style='width:101.6mm;height: 33.9mm; border: 1px solid #000;'><span style='margin: 0mm;padding: 0mm;float: left;'>TAG 2</span></div>",
                'width' => 101.6,
                'height' => 33.9
            ],
            2 => [
                'content' => "<div style='width:101.6mm;height: 33.9mm; border: 1px solid #000;'><span style='margin: 0mm;padding: 0mm;float: left;'>TAG 3</span></div>",
                'width' => 101.6,
                'height' => 33.9
            ],
            3 => [
                'content' => "<div style='width:101.6mm;height: 33.9mm; border: 1px solid #000;'><span style='margin: 0mm;padding: 0mm;float: left;'>TAG 4</span></div>",
                'width' => 101.6,
                'height' => 33.9
            ],
            4 => [
                'content' => "<div style='width:101.6mm;height: 33.9mm; border: 1px solid #000;'><span style='margin: 0mm;padding: 0mm;float: left;'>TAG 5</span></div>",
                'width' => 101.6,
                'height' => 33.9
            ],
            5 => [
                'content' => "<div style='width:101.6mm;height: 33.9mm; border: 1px solid #000;'><span style='margin: 0mm;padding: 0mm;float: left;'>TAG 6</span></div>",
                'width' => 101.6,
                'height' => 33.9
            ],
            6 => [
                'content' => "<div style='width:101.6mm;height: 33.9mm; border: 1px solid #000;'><span style='margin: 0mm;padding: 0mm;float: left;'>TAG 7</span></div>",
                'width' => 101.6,
                'height' => 33.9
            ],
            7 => [
                'content' => "<div style='width:101.6mm;height: 33.9mm; border: 1px solid #000;'><span style='margin: 0mm;padding: 0mm;float: left;'>TAG 8</span></div>",
                'width' => 101.6,
                'height' => 33.9
            ]
        ];

        $this->assertEquals($vetor,$retorno);
    }
}