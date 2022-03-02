<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusCmsIntegrator\Core\Markdown;

final class ParsedownMarkdownParser implements MarkdownParserInterface
{
    private \Parsedown $parsedown;

    public function __construct(\Parsedown $parsedown)
    {
        $this->parsedown = $parsedown;
    }

    public function parse(string $markdown): string
    {
        return $this->parsedown->parse($markdown);
    }
}
