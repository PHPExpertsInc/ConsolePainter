<?php declare(strict_types=1);

/**
 * This file is part of Console Painter, a PHP Experts, Inc., Project.
 *
 * Copyright © 2019 PHP Experts, Inc.
 * Author: Theodore R. Smith <theodore@phpexperts.pro>
 *   GPG Fingerprint: 4BF8 2613 1C34 87AC D28F  2AD8 EB24 A91D D612 5690
 *   https://www.phpexperts.pro/
 *   https://github.com/PHPExpertsInc/ConsolePainter
 *
 * This file is licensed under the MIT License.
 */

namespace PHPExperts\ConsolePainter;

class ConsolePainter
{
    protected const BOLD = '1';
    protected const DIM = '2';
    protected const ITALICS = '3';
    protected const UNDERLINE = '4';
    protected const BLINK = '5';
    protected const INVERSE = '7';
    protected const HIDDEN = '8';

    protected const RESET = '0';
    protected const UN_BOLD = '21';
    protected const UN_DIM = '22';
    protected const UN_ITALICS = '23';
    protected const UN_UNDERLINE = '24';
    protected const UN_BLINK = '25';
    protected const UN_INVERSE = '27';
    protected const UN_HIDDEN = '28';

    protected const FG_DEFAULT = '39';
    protected const FG_BLACK = '30';
    protected const FG_DARK_GRAY = '90';
    protected const FG_BLUE = '34';
    protected const FG_LIGHT_BLUE = '94';
    protected const FG_GREEN = '32';
    protected const FG_LIGHT_GREEN = '92';
    protected const FG_CYAN = '36';
    protected const FG_LIGHT_CYAN = '96';
    protected const FG_RED = '31';
    protected const FG_LIGHT_RED = '91';
    protected const FG_PURPLE = '35';
    protected const FG_LIGHT_PURPLE = '95';
    protected const FG_BROWN = '0;33';
    protected const FG_YELLOW = '1;33';
    protected const FG_LIGHT_GRAY = '37';
    protected const FG_WHITE = '97';

    protected const BG_DEFAULT = '49';
    protected const BG_BLACK = '40';
    protected const BG_RED = '41';
    protected const BG_GREEN = '42';
    protected const BG_YELLOW = '43';
    protected const BG_BLUE = '44';
    protected const BG_PURPLE = '45';
    protected const BG_CYAN = '46';
    protected const BG_LIGHT_GRAY = '47';
    protected const BG_DARK_GRAY = '100';
    protected const BG_LIGHT_RED = '101';
    protected const BG_LIGHT_GREEN = '102';
    protected const BG_LIGHT_YELLOW = '103';
    protected const BG_LIGHT_BLUE = '104';
    protected const BG_LIGHT_PURPLE = '105';
    protected const BG_LIGHT_CYAN = '106';
    protected const BG_WHITE = '107';

    public $e = "\e";

    /** @var array */
    protected $applied = [];

    /** @var array */
    protected $reverseApplied = [];

    /** @var string */
    protected $line = '';

    /** @var string */
    protected $text = '';

    protected function applyFormatOrig(string $apply, string $undo, ?string $text = null): self
    {
        $this->line .= $apply . '-;-';

        if ($text !== null) {
            // Remove the last '-;-'.
            $this->line = rtrim($this->line, '-;-') . 'm';
            $this->line .= $text;
            $this->line .= "{$this->e}[" . $undo . '-;-';
        }

        return $this;
    }

    protected function applyFormat(string $apply, string $undo, ?string $text = null): self
    {
        $this->applied[] = $apply;
//        array_unshift($this->reverseApplied, $undo);
        $this->reverseApplied[] = $undo;

        if ($text !== null) {
            $this->text .= "{$this->e}[" . implode(';', $this->applied) . 'm'. $text . "{$this->e}[" . implode(';', $this->reverseApplied) . 'm';
            $this->applied = [];
            $this->reverseApplied = [];
        }

        return $this;
    }

    // --- Stylers --- //
    public function bold(?string $text = null)
    {
        if (preg_match('/\[([0-9]+-;-)+$/', $this->line) === 1) {
            $this->line .= "{$this->e}[";
        }

        return $this->applyFormat(self::BOLD, self::UN_BOLD, $text);
    }

    public function dim(?string $text = null)
    {
        if (preg_match('/\[([0-9]+-;-)+$/', $this->line) === 1) {
            $this->line .= "{$this->e}[";
        }

        return $this->applyFormat(self::DIM, self::UN_DIM, $text);
    }

    public function italics(?string $text = null)
    {
        if (preg_match('/\[([0-9]+-;-)+$/', $this->line) === 1) {
            $this->line .= "{$this->e}[";
        }

        return $this->applyFormat(self::ITALICS, self::UN_ITALICS, $text);
    }

    public function underlined(?string $text = null)
    {
        return $this->applyFormat(self::UNDERLINE, self::UN_UNDERLINE, $text);
    }

    public function blink(?string $text = null)
    {
        return $this->applyFormat(self::BLINK, self::UN_BLINK, $text);
    }

    public function inverse(?string $text = null)
    {
        return $this->applyFormat(self::INVERSE, self::UN_INVERSE, $text);
    }

    public function hidden(?string $text = null)
    {
        return $this->applyFormat(self::HIDDEN, self::UN_HIDDEN, $text);
    }

    // --- Foregrounds --- //
    public function defaultColor(?string $text = null): self
    {
        return $this->applyFormat(self::FG_DEFAULT, self::FG_DEFAULT, $text);
    }

    public function black(?string $text = null): self
    {
        return $this->applyFormat(self::FG_BLACK, self::FG_DEFAULT, $text);
    }

    public function darkGray(?string $text = null): self
    {
        return $this->applyFormat(self::FG_DARK_GRAY, self::FG_DEFAULT, $text);
    }

    public function blue(?string $text = null): self
    {
        return $this->applyFormat(self::FG_BLUE, self::FG_DEFAULT, $text);
    }

    public function lightBlue(?string $text = null): self
    {
        return $this->applyFormat(self::FG_LIGHT_BLUE, self::FG_DEFAULT, $text);
    }

    public function green(?string $text = null): self
    {
        return $this->applyFormat(self::FG_GREEN, self::FG_DEFAULT, $text);
    }

    public function lightGreen(?string $text = null): self
    {
        return $this->applyFormat(self::FG_LIGHT_GREEN, self::FG_DEFAULT, $text);
    }

    public function cyan(?string $text = null): self
    {
        return $this->applyFormat(self::FG_CYAN, self::FG_DEFAULT, $text);
    }

    public function lightCyan(?string $text = null): self
    {
        return $this->applyFormat(self::FG_LIGHT_CYAN, self::FG_DEFAULT, $text);
    }

    public function red(?string $text = null): self
    {
        return $this->applyFormat(self::FG_RED, self::FG_DEFAULT, $text);
    }

    public function lightRed(?string $text = null): self
    {
        return $this->applyFormat(self::FG_LIGHT_RED, self::FG_DEFAULT, $text);
    }

    public function purple(?string $text = null): self
    {
        return $this->applyFormat(self::FG_PURPLE, self::FG_DEFAULT, $text);
    }

    public function lightPurple(?string $text = null): self
    {
        return $this->applyFormat(self::FG_LIGHT_PURPLE, self::FG_DEFAULT, $text);
    }

    public function brown(?string $text = null): self
    {
        return $this->applyFormat(self::FG_BROWN, self::FG_DEFAULT, $text);
    }

    public function yellow(?string $text = null): self
    {
        return $this->applyFormat(self::FG_YELLOW, self::FG_DEFAULT, $text);
    }

    public function lightGray(?string $text = null): self
    {
        return $this->applyFormat(self::FG_LIGHT_GRAY, self::FG_DEFAULT, $text);
    }

    public function white(?string $text = null): self
    {
        return $this->applyFormat(self::FG_WHITE, self::FG_DEFAULT, $text);
    }

    // --- Backgrounds --- //
    public function onBlack(?string $text = null): self
    {
        return $this->applyFormat(self::BG_BLACK, self::BG_DEFAULT, $text);
    }

    public function onRed(?string $text = null): self
    {
        return $this->applyFormat(self::BG_RED, self::BG_DEFAULT, $text);
    }

    public function onGreen(?string $text = null): self
    {
        return $this->applyFormat(self::BG_GREEN, self::BG_DEFAULT, $text);
    }

    public function onYellow(?string $text = null): self
    {
        return $this->applyFormat(self::BG_YELLOW, self::BG_DEFAULT, $text);
    }

    public function onBlue(?string $text = null): self
    {
        return $this->applyFormat(self::BG_BLUE, self::BG_DEFAULT, $text);
    }

    public function onPurple(?string $text = null): self
    {
        return $this->applyFormat(self::BG_PURPLE, self::BG_DEFAULT, $text);
    }

    public function onCyan(?string $text = null): self
    {
        return $this->applyFormat(self::BG_CYAN, self::BG_DEFAULT, $text);
    }

    public function onLightGray(?string $text = null): self
    {
        return $this->applyFormat(self::BG_LIGHT_GRAY, self::BG_DEFAULT, $text);
    }

    public function onDarkGray(?string $text = null): self
    {
        if (preg_match('/\[([0-9]+-;-)+$/', $this->line) === 1) {
            $this->line .= "{$this->e}[";
        }

        return $this->applyFormat(self::BG_DARK_GRAY, self::BG_DEFAULT, $text);
    }

    public function onLightRed(?string $text = null): self
    {
        return $this->applyFormat(self::BG_LIGHT_RED, self::BG_DEFAULT, $text);
    }

    public function onLightGreen(?string $text = null): self
    {
        return $this->applyFormat(self::BG_LIGHT_GREEN, self::BG_DEFAULT, $text);
    }

    public function onLightYellow(?string $text = null): self
    {
        return $this->applyFormat(self::BG_LIGHT_YELLOW, self::BG_DEFAULT, $text);
    }

    public function onLightBlue(?string $text = null): self
    {
        return $this->applyFormat(self::BG_LIGHT_BLUE, self::BG_DEFAULT, $text);
    }

    public function onLightPurple(?string $text = null): self
    {
        return $this->applyFormat(self::BG_LIGHT_PURPLE, self::BG_DEFAULT, $text);
    }

    public function onLightCyan(?string $text = null): self
    {
        return $this->applyFormat(self::BG_LIGHT_CYAN, self::BG_DEFAULT, $text);
    }

    public function onWhite(?string $text = null): self
    {
        return $this->applyFormat(self::BG_WHITE, self::BG_DEFAULT, $text);
    }

    public function text(string $text)
    {
        $this->applyFormat('', '', $text);

        return $this;
    }

    public function __toString(): string
    {
        $text = $this->text . "{$this->e}[0m";
        $this->text = '';

        return $text;
    }
}
