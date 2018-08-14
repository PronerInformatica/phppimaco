<?php
namespace PhpPimacoTest;

use Proner\PhpPimaco\Tags\QrCode;

class QrCodeTest extends \PHPUnit_Framework_TestCase
{
    function test_render()
    {
        $qrcode = new QrCode('123456789');

        $render = "<img style='float: left' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIQAAACEAQMAAABrihHkAAAABlBMVEX///8AAABVwtN+AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAA10lEQVRIie2VMQ7DIBAEz0rh8p7gn+BvubBkSxT5VvyTPIGSwmKzIFuKUyRSOHfeAsQ0wO0eiFz6IVBzH6TnHCoIR/VJoxNpjMmUlHsNTrGcQBrEkwivUE1yNYDP+hiQ7KBfwnD01IJk3R4ajzmzIR1WjgyeqyGKp4xOpiR42BIZO7DOSNJuDloR+LIXbxF7W6JrB6b3vmDPxn9k96sPLWxJyVh+cNAmMSVbX8xO47FT6gl72dM+ZgO1hAfGSUTKg7PJjEhZTgjR2ZLy7zTFwfefyIBc+qIXJw2epdxG9wQAAAAASUVORK5CYII='>";
        $this->assertEquals($render,$qrcode->render());
    }

    function test_render_with_label()
    {
        $qrcode = new QrCode('123456789');
        $qrcode->setLabel('teste');

        $render = "<img style='float: left' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIQAAACfBAMAAADKe2zMAAAAIVBMVEX///8AAAAAAAD////f398fHx+fn59fX19/f3+/v78/Pz+8nJviAAAACXBIWXMAAA7EAAAOxAGVKw4bAAABs0lEQVRoge2Xy1LCMBSG2/EF0leo3JaOB8G6pB1GWdoN41JcOC7FN0AWbpEVS2YcXtMAJZ6EUEhYCf+3aE/Sk6+dnPQWBAAA4EhkIFTnjoTolBV6S6wH8Z1gCSEUexWhKoZekVB1qWJA4aHY6oLiGAVf1GemCKz55gyvgGKfQkeoIqmb3QCKEoWFIqsQegFFuGPKedce5/9X/C3LwqRSQ3akdGFCwQnN95GO0LOgKFGoYZaKqIRNl70sUJiSSF/NRUuwWgXsDKersDiVmk/h5uEKRYkiMuA3u2AJqki2U0JhTL9qWRSCffG4fsafo8Lya6w/NgJeubNSmEsWiiMVxRHBdiVAoSt4iw/jfzlbZ4DiwFeRGm15FdkXOBQAAHAEF0TUzGkDC+nKQdH6G9fyVLzH9WTep+ZPdShDmlVHzorbnCafz4Obj4eBDJNGt+ajWMhN53sV3g1p7KOoUXLZ7qfL8HpAEw9FM47jCr3VU6noyDj1uYosk8N6+fIqXrLMp6iL9aqotFZz4V7UpJZNvrqj3vQ+l2HSmL46K2jcSObVUfvxKZUhzeK+u8LOoQoAwAnyCxjrAd2rYPj9AAAAAElFTkSuQmCC'>";
        $this->assertEquals($render,$qrcode->render());
    }

    function test_render_with_br()
    {
        $qrcode = new QrCode('123456789');
        $qrcode->br();

        $render = "<img  src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIQAAACEAQMAAABrihHkAAAABlBMVEX///8AAABVwtN+AAAACXBIWXMAAA7EAAAOxAGVKw4bAAAA10lEQVRIie2VMQ7DIBAEz0rh8p7gn+BvubBkSxT5VvyTPIGSwmKzIFuKUyRSOHfeAsQ0wO0eiFz6IVBzH6TnHCoIR/VJoxNpjMmUlHsNTrGcQBrEkwivUE1yNYDP+hiQ7KBfwnD01IJk3R4ajzmzIR1WjgyeqyGKp4xOpiR42BIZO7DOSNJuDloR+LIXbxF7W6JrB6b3vmDPxn9k96sPLWxJyVh+cNAmMSVbX8xO47FT6gl72dM+ZgO1hAfGSUTKg7PJjEhZTgjR2ZLy7zTFwfefyIBc+qIXJw2epdxG9wQAAAAASUVORK5CYII='><br>";
        $this->assertEquals($render,$qrcode->render());
    }
}