<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusCmsIntegrator\Tests\Core\Twig;

use PHPUnit\Framework\TestCase;
use SolidDev\SyliusCmsIntegrator\Core\Twig\MarkdownParserExtension;
use SolidDev\SyliusCmsIntegrator\Tests\Mocks\SpyingMarkdownParser;

class MarkdownParserExtensionTest extends TestCase
{
    public function testParse(): void
    {
        $parserExtension = new MarkdownParserExtension(new SpyingMarkdownParser('<h3>My markdown</h3>'));

        $parsed = $parserExtension->parse('###My markdown');

        self::assertEquals('<h3>My markdown</h3>', $parsed);
    }

    public function testFunctions(): void
    {
        $parserExtension = new MarkdownParserExtension(new SpyingMarkdownParser('<h3>My markdown</h3>'));

        $functions = $parserExtension->getFunctions();

        self::assertCount(1, $functions);
        self::assertEquals('parseMarkdown', $functions[0]->getName());
    }
}
