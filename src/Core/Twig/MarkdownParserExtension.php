<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusCmsIntegrator\Core\Twig;

use SolidDev\SyliusCmsIntegrator\Core\Markdown\MarkdownParserInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class MarkdownParserExtension extends AbstractExtension
{
    private MarkdownParserInterface $markdownParser;

    public function __construct(MarkdownParserInterface $markdownParser)
    {
        $this->markdownParser = $markdownParser;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('parseMarkdown', [$this, 'parse']),
        ];
    }

    public function parse(string $markdown): string
    {
        return $this->markdownParser->parse($markdown);
    }
}
