<?php
namespace PhpPimacoTest;

use Proner\PhpPimaco\Tags\QrCode;

class QrCodeTest
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

        $render = "<img style='float: left' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIQAAACfBAMAAADKe2zMAAAAIVBMVEX///8AAAAAAAD////f398fHx+fn59fX19/f3+/v78/Pz+8nJviAAABuElEQVRoge2XvW7CMBCAkzdwXsHlb6x6FEhHkqKWkSyoY6FS1bH0DVKGrikTI1LFazZAuJ6NCdhMhfuGJHbOXyLfJU48j2EYxpJAQ2DnnoDgnBVqS2wG0Z0gAT4rDip8TIaaER+7MBmscFDsdLHiFAUt6gtTeMZ4fYbXsOKQQkVgkvBh12BFicJAEVUInWCFv2fKadcB5/9X/JVlYcJQn5wpLUxWUHx9PVIRahQrShQ4zJARDNh2mdPCCl0SqNVctATJlUeucL4KgxPVdAq3L1dWlCgCDfqwCxKASTJdkhXa9GPLoBDki8f2M/4SFYZfY/W14dHMXZRCL1lWnKgozgiyK4EVqoK26DD6l7NzBVYcuRThaMNSZC5wVjAMw5wC5NwD0kzw8NpG8fKnaLkp2lJOwsUQmj/Vybusw7yaWt/FFCD7fB7dfjyOOgmEjV7NRbGETtL9hnwLd5NVh72iBuFVexitFDcjyBwUTSllBd7qUa7o5seRy13EcT6sn6zuYhzHLkldbqqi0lrPhX1dZOMo++ql/dlDEtbisDF7tVZ0Bmm4qKbtwVME0wbM5dBaYeZoBcMw58cv+bADbKw+gAMAAAAASUVORK5CYII='>";
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