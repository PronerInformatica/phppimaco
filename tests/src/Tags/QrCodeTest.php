<?php
namespace PhpPimacoTest;

use Proner\PhpPimaco\Tags\QrCode;

class QrCodeTest extends \PHPUnit_Framework_TestCase
{
    function test_render()
    {
        $qrcode = new QrCode('123456789');

        $render = "<img style='float: left' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIQAAACEAQMAAABrihHkAAAABlBMVEX///8AAABVwtN+AAAA10lEQVRIie2VMQ7DIBAEz0rh8p7gn+BvubBkSxT5VvyTPIGSwmKzIFuKUyRSOHfeAsQ0wO0eiFz6IVBzH6TnHCoIR/VJoxNpjMmUlHsNTrGcQBrEkwivUE1yNYDP+hiQ7KBfwnD01IJk3R4ajzmzIR1WjgyeqyGKp4xOpiR42BIZO7DOSNJuDloR+LIXbxF7W6JrB6b3vmDPxn9k96sPLWxJyVh+cNAmMSVbX8xO47FT6gl72dM+ZgO1hAfGSUTKg7PJjEhZTgjR2ZLy7zTFwfefyIBc+qIXJw2epdxG9wQAAAAASUVORK5CYII='>";
        $this->assertEquals($render,$qrcode->render());
    }

    function test_render_with_label()
    {
        $qrcode = new QrCode('123456789');
        $qrcode->setLabel('teste');

        $render = "<img style='float: left' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIQAAACfBAMAAADKe2zMAAAAIVBMVEX///8AAAAAAAD////f398/Pz9/f39fX1+/v7+fn58fHx+LTFz9AAABs0lEQVRoge2Xu27CMBSGkzdwXsFtETBVNZfQEVJVrHToAwSkqmPZOnJZOkLVoSNIVH3LBgiHY2MCMVPh/5bEzvEXx+fk5nkAAJCTwEBQ556A4JwVekusB/GNYAE+FAcVPiVDz4hPXZQMKBwUO11QnKLgRX1hCs8ab67wCigOKXQEJYludgMoMhQW0qhU6AQU/p4l510HnP9fsS3L1EShPjuSWZhQcHzzfaQj9CgoMhQ0zJIRCth02dMChSkJ9GpOW4LlymNnOF+FxUlqvoSbhysUGYrAgN/sggVQkmynhMJYfmpZFIJ98eT9jL9EheXXWH9seDxzF6UwSxaKExXpEcE2GUChK3iLD+N/OTtngOLIVxGNtryK7AUOBQAAnIJKeFBE5Yl2b/MoeltFzU1Rl3IYdhYq7NxM32RRjcuxyywG3cn0vtseJrMIC+2Si+JZ1ebN1upCqn316qIoqfCq+rtS3E3VwEFRkVJeq+/CUtFM9lsus4iiZNhHfzmLzyhyW4sljfl6LfLXxWTUGry048fRuN8oRmFh9JVbUZ8ldVGO67Mfpd6TupCL3Ao7RysAAOfHH4+ZBGCO+CreAAAAAElFTkSuQmCC'>";
        $this->assertEquals($render,$qrcode->render());
    }

    function test_render_with_br()
    {
        $qrcode = new QrCode('123456789');
        $qrcode->br();

        $render = "<img  src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIQAAACEAQMAAABrihHkAAAABlBMVEX///8AAABVwtN+AAAA10lEQVRIie2VMQ7DIBAEz0rh8p7gn+BvubBkSxT5VvyTPIGSwmKzIFuKUyRSOHfeAsQ0wO0eiFz6IVBzH6TnHCoIR/VJoxNpjMmUlHsNTrGcQBrEkwivUE1yNYDP+hiQ7KBfwnD01IJk3R4ajzmzIR1WjgyeqyGKp4xOpiR42BIZO7DOSNJuDloR+LIXbxF7W6JrB6b3vmDPxn9k96sPLWxJyVh+cNAmMSVbX8xO47FT6gl72dM+ZgO1hAfGSUTKg7PJjEhZTgjR2ZLy7zTFwfefyIBc+qIXJw2epdxG9wQAAAAASUVORK5CYII='><br>";
        $this->assertEquals($render,$qrcode->render());
    }
}