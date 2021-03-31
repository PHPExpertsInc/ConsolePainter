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

interface ConsoleArtistGuild
{
    public function bold(?string $text = null): self;
    public function bolder(?string $text = null): self;
    public function dim(?string $text = null): self;
    public function italics(?string $text = null): self;
    public function underlined(?string $text = null): self;
    public function blink(?string $text = null): self;
    public function inverse(?string $text = null): self;
    public function hidden(?string $text = null): self;

    // --- Foregrounds --- //
    public function defaultColor(?string $text = null): self;
    public function black(?string $text = null): self;
    public function darkGray(?string $text = null): self;
    public function blue(?string $text = null): self;
    public function lightBlue(?string $text = null): self;
    public function green(?string $text = null): self;
    public function lightGreen(?string $text = null): self;
    public function cyan(?string $text = null): self;
    public function lightCyan(?string $text = null): self;
    public function red(?string $text = null): self;
    public function lightRed(?string $text = null): self;
    public function purple(?string $text = null): self;
    public function lightPurple(?string $text = null): self;
    public function brown(?string $text = null): self;
    public function yellow(?string $text = null): self;
    public function lightGray(?string $text = null): self;
    public function white(?string $text = null): self;

    // --- Backgrounds --- //
    public function onDefaultColor(?string $text = null): ConsoleArtistGuild;
    public function onBlack(?string $text = null): self;
    public function onRed(?string $text = null): self;
    public function onGreen(?string $text = null): self;
    public function onYellow(?string $text = null): self;
    public function onBlue(?string $text = null): self;
    public function onPurple(?string $text = null): self;
    public function onCyan(?string $text = null): self;
    public function onLightGray(?string $text = null): self;
    public function onDarkGray(?string $text = null): self;
    public function onLightRed(?string $text = null): self;
    public function onLightGreen(?string $text = null): self;
    public function onLightYellow(?string $text = null): self;
    public function onLightBlue(?string $text = null): self;
    public function onLightPurple(?string $text = null): self;
    public function onLightCyan(?string $text = null): self;
    public function onWhite(?string $text = null): self;

    public function text(string $text): self;
    public function __toString(): string;
}
