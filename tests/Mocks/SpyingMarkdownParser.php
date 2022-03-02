<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusCmsIntegrator\Tests\Mocks;

use SolidDev\SyliusCmsIntegrator\Core\Markdown\MarkdownParserInterface;

final class SpyingMarkdownParser implements MarkdownParserInterface
{
    public function __construct(private string $returnValue)
    {
    }

    public function parse(string $markdown): string
    {
        return $this->returnValue;
    }
}
