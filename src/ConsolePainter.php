<?php declare(strict_types=1);

/**
 * This file is part of Console Painter, a PHP Experts, Inc., Project.
 *
 * Copyright © 2019-2021 PHP Experts, Inc.
 * Author: Theodore R. Smith <theodore@phpexperts.pro>
 *   GPG Fingerprint: 4BF8 2613 1C34 87AC D28F  2AD8 EB24 A91D D612 5690
 *   https://www.phpexperts.pro/
 *   https://github.com/PHPExpertsInc/ConsolePainter
 *
 * This file is licensed under the MIT License.
 */

namespace PHPExperts\ConsolePainter;

class ConsolePainter implements ConsoleArtistGuild, ANSIColors
{
    public string $e = "\e";

    /** @var string[] */
    protected array $applied = [];

    /** @var string[] */
    protected array $reverseApplied = [];

    protected string $line = '';

    protected string $text = '';

    protected function applyFormat(string $apply, ?string $undo, ?string $text = null): ConsoleArtistGuild
    {
        $this->applied[] = $apply;
        if ($undo !== null) {
            $this->reverseApplied[] = $undo;
        }

        if ($text !== null) {
            $applied = implode(';', $this->applied);
            $reversed = implode(';', $this->reverseApplied);
            $this->text .= "{$this->e}[{$applied}m{$text}{$this->e}[{$reversed}m";
            $this->applied = [];
            $this->reverseApplied = [];
        }

        return $this;
    }

    // --- Stylers --- //
    public function bold(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BOLD, self::UN_BOLD, $text);
    }

    public function bolder(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::UN_BOLD, '', $text);
    }

    public function dim(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::DIM, self::UN_DIM, $text);
    }

    public function italics(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::ITALICS, self::UN_ITALICS, $text);
    }

    public function underlined(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::UNDERLINE, self::UN_UNDERLINE, $text);
    }

    public function blink(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BLINK, self::UN_BLINK, $text);
    }

    public function inverse(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::INVERSE, self::UN_INVERSE, $text);
    }

    public function hidden(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::HIDDEN, self::UN_HIDDEN, $text);
    }

    // --- Foregrounds --- //
    public function defaultColor(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_DEFAULT, self::FG_DEFAULT, $text);
    }

    public function black(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_BLACK, self::FG_DEFAULT, $text);
    }

    public function darkGray(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_DARK_GRAY, self::FG_DEFAULT, $text);
    }

    public function blue(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_BLUE, self::FG_DEFAULT, $text);
    }

    public function lightBlue(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_LIGHT_BLUE, self::FG_DEFAULT, $text);
    }

    public function green(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_GREEN, self::FG_DEFAULT, $text);
    }

    public function lightGreen(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_LIGHT_GREEN, self::FG_DEFAULT, $text);
    }

    public function cyan(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_CYAN, self::FG_DEFAULT, $text);
    }

    public function lightCyan(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_LIGHT_CYAN, self::FG_DEFAULT, $text);
    }

    public function red(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_RED, self::FG_DEFAULT, $text);
    }

    public function lightRed(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_LIGHT_RED, self::FG_DEFAULT, $text);
    }

    public function purple(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_PURPLE, self::FG_DEFAULT, $text);
    }

    public function lightPurple(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_LIGHT_PURPLE, self::FG_DEFAULT, $text);
    }

    public function brown(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_BROWN, self::FG_DEFAULT, $text);
    }

    public function yellow(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_YELLOW, self::UN_BOLD . ';' . self::FG_DEFAULT, $text);
    }

    public function lightGray(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_LIGHT_GRAY, self::FG_DEFAULT, $text);
    }

    public function white(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::FG_WHITE, self::FG_DEFAULT, $text);
    }

    // --- Backgrounds --- //
    public function onDefaultColor(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_DEFAULT, null, $text);
    }

    public function onBlack(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_BLACK, null, $text);
    }

    public function onRed(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_RED, null, $text);
    }

    public function onGreen(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_GREEN, null, $text);
    }

    public function onYellow(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_YELLOW, null, $text);
    }

    public function onBlue(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_BLUE, null, $text);
    }

    public function onPurple(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_PURPLE, null, $text);
    }

    public function onCyan(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_CYAN, null, $text);
    }

    public function onLightGray(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_LIGHT_GRAY, null, $text);
    }

    public function onDarkGray(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_DARK_GRAY, null, $text);
    }

    public function onLightRed(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_LIGHT_RED, null, $text);
    }

    public function onLightGreen(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_LIGHT_GREEN, null, $text);
    }

    public function onLightYellow(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_LIGHT_YELLOW, null, $text);
    }

    public function onLightBlue(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_LIGHT_BLUE, null, $text);
    }

    public function onLightPurple(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_LIGHT_PURPLE, null, $text);
    }

    public function onLightCyan(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_LIGHT_CYAN, null, $text);
    }

    public function onWhite(?string $text = null): ConsoleArtistGuild
    {
        return $this->applyFormat(self::BG_WHITE, null, $text);
    }

    public function text(string $text): self
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
