# PHP TAGS

O PHP TAGS é um pacote para geração de etiquetas usando a biblioteca <a href="https://github.com/mpdf/mpdf" target="_blank">MPDF</a> para auxiliar a montagem de PDFs com as tuas etiquetas devidamente formatadas e prontas para impressão.

Esse projeto é uma derivação (fork) PronerInformatica/phppimaco que implementou quase todos os Layouts das etiquetas do tipo PIMACO (BIC)

## Dependência

- PHP 5.6 ou superior

## Instalação

Para fazer instalação do PHPPimaco utilize o composere faça referencia externa no composer.jsom para esse repositório

Estamos em fase de desenvolvimento não recomendamos usar em produção.

Se usar, use por conta a risco!

```php
composer require proner/phppimaco
```
ou adicione isso ao require do seu composer.json
```php
"require":{
    "proner/phppimaco": "dev-master"
}
```

## Primeira impressão
Depois fazer a instalação corretamente você deve seguir os exemplo a baixo para criar as suas etiquetas
```php
<?php
require_once "../vendor/autoload.php";

use Proner\PhpPimaco\Tag;
$tag = new Tag();
$tag->p("TAG 1");
```
Com a etiqueta criada, você deve estanciar o objeto Pimaco passando o código da etiqueta e adicioná-la e no objeto
```php
<?php
use Proner\PhpPimaco\Pimaco;
$pimaco = new Pimaco('6182');
$pimaco->addTag($tag);
$pimaco->output();
```

## Exemplo
```php
<?php
use Proner\PhpPimaco\Tag;
use Proner\PhpPimaco\Pimaco;

$tag = new Tag();
$tag->p("TAG 1");

$pimaco = new Pimaco('6182');
$pimaco->addTag($tag);
$pimaco->output();
```


## Templates Implementados

ETIQUETAS PADRÃO BIC-PRIMACO (PM)

Muito comum em papelarias, são folhas de papel A4 ou Carta com várias etiquetas pre cortadas para impressão em impressoras jato de tinta ou Laser.

* 3080 - 30 etiquetas por folha de papel Carta
* 3180
* A4056
* A4056R
* A4256
* A4356 - 33 etiquetas por folha de papel A4
* 5580A
* 5580M
* 5580V
* 6080
* 6082
* 6180
* 6280
* 6282
* 62582 - 14 etiquetas por folha de papel Carta
* 3080
* 6182

ETIQUETAS PADRÃO ROLL (PARA IMPRESSORAS DE ETIQUETAS / TAG PRINTS)

Muitas empresas tem em seus ativos impressoras de etiqueta especificamente para esse fim. A exemplo das impressoras Zebra, Argox e Elgin.

Algumas dessas impressoras disponhe de drive windows ou linux para impressão direta (driver spooler) sendo capaz de imprimir por exemplo conteúdo de um PDF. Atenço: Nem todas impressoras de etiquetas tem drivers de impressão direta pelo spooler de impresso do Windows, nesses casos não irá funcionar! Por favor reportem modelos testados!

* Roll 80x60mm - Rolo 2 colunas cada tag 40x60 com divisor de preço
