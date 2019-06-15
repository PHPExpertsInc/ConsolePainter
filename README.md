# Standard Skeleton Project

[![TravisCI](https://travis-ci.org/phpexpertsinc/skeleton.svg?branch=master)](https://travis-ci.org/phpexpertsinc/skeleton)
[![Maintainability](https://api.codeclimate.com/v1/badges/503cba0c53eb262c947a/maintainability)](https://codeclimate.com/github/phpexpertsinc/SimpleDTO/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/503cba0c53eb262c947a/test_coverage)](https://codeclimate.com/github/phpexpertsinc/SimpleDTO/test_coverage)

Skeleton Project is a PHP Experts, Inc., Project meant to ease the creation of new projects.

It strives to conform to the Standard PHP Skeleton (https://github.com/php-pds/skeleton) wherever possible.

Read [**On Structuring PHP Projects**](https://blog.nikolaposa.in.rs/2017/01/16/on-structuring-php-projects/)
for more.

The configurer was inspired by https://www.binpress.com/building-project-skeletons-composer/

## Installation

Via Composer

```bash
composer create-project phpexperts/skeleton NewProject
```

## Usage

Install a project, then remove the directories you won't need, like `bin`.

You should definitely edit the LICENSE and .travis.yml to be specific to your 
project and update the tags at the top of the README.md.

# Use cases

 ✔ Rapidly start up a project right.  
 ✔ Less time spent on boilerplating a git repo.  
 ✔ Conforms to the most widely-deployed PHP layout.  
 ✔ Fully compatible with the Bettergist Collective recommendation.  

## Testing

```bash
phpunit --testdox
```

## Stress Tested to 10 Levels Deep
```$xslt
"Level 1: Generating combinations for A"
array:5 [
  "Number of possibilities" => 2
  "Time (ms)              " => 0.048160552978516
  "Time (s)               " => 4.8160552978516E-5
  "Memory consumed        " => 0
  "Peak Memory (Diff)     " => 0
]
"Level 2: Generating combinations for A, B"
array:5 [
  "Number of possibilities" => 4
  "Time (ms)              " => 0.049829483032227
  "Time (s)               " => 4.9829483032227E-5
  "Memory consumed        " => 0
  "Peak Memory (Diff)     " => 0
]
"Level 3: Generating combinations for A, B, C"
array:5 [
  "Number of possibilities" => 15
  "Time (ms)              " => 0.22101402282715
  "Time (s)               " => 0.00022101402282715
  "Memory consumed        " => 0
  "Peak Memory (Diff)     " => 0
]
"Level 4: Generating combinations for A, B, C, D"
array:5 [
  "Number of possibilities" => 64
  "Time (ms)              " => 1.11985206604
  "Time (s)               " => 0.00111985206604
  "Memory consumed        " => 0
  "Peak Memory (Diff)     " => 0
]
"Level 5: Generating combinations for A, B, C, D, E"
array:5 [
  "Number of possibilities" => 325
  "Time (ms)              " => 7.5879096984863
  "Time (s)               " => 0.0075879096984863
  "Memory consumed        " => 0
  "Peak Memory (Diff)     " => 0
]
"Level 6: Generating combinations for A, B, C, D, E, F"
array:5 [
  "Number of possibilities" => 1956
  "Time (ms)              " => 48.535108566284
  "Time (s)               " => 0.048535108566284
  "Memory consumed        " => 0
  "Peak Memory (Diff)     " => 0
]
"Level 7: Generating combinations for A, B, C, D, E, F, G"
array:5 [
  "Number of possibilities" => 13699
  "Time (ms)              " => 386.21711730957
  "Time (s)               " => 0.38621711730957
  "Memory consumed        " => 0
  "Peak Memory (Diff)     " => 0
]
"Level 8: Generating combinations for A, B, C, D, E, F, G, H"
array:5 [
  "Number of possibilities" => 109600
  "Time (ms)              " => 3581.2821388245
  "Time (s)               " => 3.5812821388245
  "Memory consumed        " => 0
  "Peak Memory (Diff)     " => 0
]
"Level 9: Generating combinations for A, B, C, D, E, F, G, H, I"
array:5 [
  "Number of possibilities" => 986409
  "Time (ms)              " => 36741.584062576
  "Time (s)               " => 36.741584062576
  "Memory consumed        " => 320
  "Peak Memory (Diff)     " => 0
]
"Level 10: Generating combinations for A, B, C, D, E, F, G, H, I, J"
array:5 [
  "Number of possibilities" => 9864100
  "Time (ms)              " => 425331.70604706
  "Time (s)               " => 425.33170604706
  "Memory consumed        " => 0
  "Peak Memory (Diff)     " => 0
]
```

# Contributors

[Theodore R. Smith](https://www.phpexperts.pro/]) <theodore@phpexperts.pro>  
GPG Fingerprint: 4BF8 2613 1C34 87AC D28F  2AD8 EB24 A91D D612 5690  
CEO: PHP Experts, Inc.

## License

MIT license. Please see the [license file](LICENSE) for more information.

