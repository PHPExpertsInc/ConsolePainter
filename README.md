# ConsolePainter

[![TravisCI](https://travis-ci.org/phpexpertsinc/ConsolePainter.svg?branch=master)](https://travis-ci.org/phpexpertsinc/ConsolePainter)
[![Test Coverage](https://api.codeclimate.com/v1/badges/1eef8c643548226efa69/test_coverage)](https://codeclimate.com/github/phpexpertsinc/ConsolePainter/test_coverage)

ConsolePainter is a PHP Experts, Inc., Project that enables easy color and stylization of ANSI terminals.

It strives to conform to the standard ANSI terminal colors as documented at
https://misc.flogisoft.com/bash/tip_colors_and_formatting

![image](https://user-images.githubusercontent.com/1125541/59557043-0a774b00-8f95-11e9-87cb-223afd9130ca.png)

## Installation

Via Composer

```bash
composer require phpexperts/console-painter
```

## Usage

```php
use PHPExperts\ConsolePainter\ConsolePainter;

$p = new ConsolePainter();

// This is *REALLY* emphasized!
echo "\t" . $p->italics('This is ') .
    $p->bold('*') . $p->bold()->underlined()->yellow('*REALLY*') .
    $p->bold()->onLightBlue(' emphasized*') . '!' . "\n";

echo $p->yellow('Press ')->bolder()->red('ENTER')->yellow(' to continue...') . "\n";

echo "\n";

// Draw the Red, White and Blue:
echo $p->bolder()->red('Red')->dim(', ')->italics()->white('White ')->dim('and ')->blue('Blue') . "\n";
```

This will output:

![image](https://user-images.githubusercontent.com/1125541/59557118-15cb7600-8f97-11e9-9a0f-dc0b50898f79.png)

You can even make really complex ASCII art with it. Here is a derivation of 
the European Union logo:

![image](https://user-images.githubusercontent.com/1125541/59557060-7659b380-8f95-11e9-98df-2a82bbdaae72.png)

## Demos

### Basic styles:

![image](https://user-images.githubusercontent.com/1125541/59557043-0a774b00-8f95-11e9-87cb-223afd9130ca.png)

### Complex text styling

![image](https://user-images.githubusercontent.com/1125541/59557055-50ccaa00-8f95-11e9-8fa5-d435efc5d688.png)

### ASCII Art

![image](https://user-images.githubusercontent.com/1125541/59557060-7659b380-8f95-11e9-98df-2a82bbdaae72.png)

## Use cases

ConsolePainter: Stylization  
 ✔ Can bold text  
 ✔ Can italicize text  
 ✔ Can underline text  
 ✔ Can dim text  
 ✔ Can blink text  
 ✔ Can hide text  
 ✔ Can invert the text style  
 ✔ All combinations of stylizations work  

ConsolePainter: Foreground Colors  
 ✔ Can make the text the default color  
 ✔ Can make the text black  
 ✔ Can make the text dark grey  
 ✔ Can make the text blue  
 ✔ Can make the text light blue  
 ✔ Can make the text green  
 ✔ Can make the text light green  
 ✔ Can make the text cyan  
 ✔ Can make the text light cyan  
 ✔ Can make the text red  
 ✔ Can make the text light red  
 ✔ Can make the text purple  
 ✔ Can make the text light purple  
 ✔ Can make the text brown  
 ✔ Can make the text yellow  
 ✔ Can make the text light gray  
 ✔ Can make the text white  
 ✔ Can chain two or more colored words together  
 ✔ Can chain two or more colored words together with a background  
 ✔ Can make the european union logo  

## Testing

```bash
phpunit --testdox
```

## Contributors

[Theodore R. Smith](https://www.phpexperts.pro/]) <theodore@phpexperts.pro>  
GPG Fingerprint: 4BF8 2613 1C34 87AC D28F  2AD8 EB24 A91D D612 5690  
CEO: PHP Experts, Inc.

## License

MIT license. Please see the [license file](LICENSE) for more information.

