# PHP PIMACO

[![Build Status](https://travis-ci.org/mrprompt/phppimaco.svg?branch=master)](https://travis-ci.org/mrprompt/phppimaco)
[![Latest Stable Version](https://poser.pugx.org/proner/phppimaco/v/stable)](https://packagist.org/packages/proner/phppimaco)
[![Latest Unstable Version](https://poser.pugx.org/proner/phppimaco/v/unstable)](https://packagist.org/packages/proner/phppimaco)
[![Total Downloads](https://poser.pugx.org/proner/phppimaco/downloads)](https://packagist.org/packages/proner/phppimaco)
[![License](https://poser.pugx.org/proner/phppimaco/license.svg)](https://packagist.org/packages/proner/phppimaco)
[![Code Climate](https://codeclimate.com/github/PronerInformatica/phppimaco/badges/gpa.svg)](https://codeclimate.com/github/PronerInformatica/phppimaco)

O PHP PIMACO é um pacote para geração de etiquetas usando a biblioteca <a href="https://github.com/mpdf/mpdf" target="_blank">MPDF</a> para auxiliar a montagem de PDFs com as tuas etiquetas devidamente formatadas e prontas para impressão.

## Dependência

- PHP 7.0 ou superior

## Instalação

Para fazer instalação do PHPPimaco utilize o composer
```php
composer require proner/phppimaco
```

Caso você precise usar o MPDF na versão 6 use o comando
```php
composer require proner/phppimaco:"^1.2"
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
* 3080
* 3081
* 3082
* 3180
* 3181
* 3182
* 5580A
* 5580M
* 5580V
* 6080
* 6081
* 6082
* 6083
* 6084
* 6085
* 6086
* 6087
* 6088
* 6089
* 6092
* 6093
* 6094
* 6095
* 6180
* 6181
* 6182
* 6183
* 6184
* 6185
* 6187
* 62580
* 62581
* 62582
* 6280
* 6281
* 6282
* 6283
* 6284
* 6285
* 6286
* 6287
* 6288
* 6293
* 7088
* 7089
* 7188
* 8096
* 8098
* 8099F
* 8099L
* 8196
* 8296
* A4048
* A4049
* A4050
* A4051
* A4054
* A4054R
* A4055
* A4056
* A4056R
* A4060
* A4062
* A4063
* A4063R
* A4067
* A4248
* A4249
* A4250
* A4251
* A4254
* A4255
* A4256
* A4260
* A4261
* A4262
* A4263
* A4264
* A4265
* A4267
* A4268
* A4348
* A4349
* A4350
* A4351
* A4354
* A4355
* A4356
* A4360
* A4361
* A4362
* A4363
* A4364
* A4365
* A4367
* A4368


## Templates Testados
* 3080
* 6182


## Documentação

Acesse na nossa Wiki para ter acesso a documentação <a href="https://github.com/PronerInformatica/phppimaco/wiki" target="_blank">Wiki</a>
