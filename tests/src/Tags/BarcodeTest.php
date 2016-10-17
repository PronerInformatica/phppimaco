<?php
namespace PhpPimacoTest;

use Proner\PhpPimaco\Tags\Barcode;

class BarcodeTest extends \PHPUnit_Framework_TestCase
{
    function test_render()
    {
        $barcode = new Barcode('123456789');

        $render = "<img style='float: left' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMoAAAAeAQMAAABXBBPSAAAABlBMVEX///8AAABVwtN+AAAAAXRSTlMAQObYZgAAAC1JREFUKJFj+Mx/2Maeh+eDPbPNB57D9ufPH7YxsD/zwd74AMOo1KjUqBRMCgBS6GBUqpqy9wAAAABJRU5ErkJggg=='>";
        $this->assertEquals($render,$barcode->render());
    }
}