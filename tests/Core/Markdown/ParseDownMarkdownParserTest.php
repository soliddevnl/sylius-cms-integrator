<?php

declare(strict_types=1);

/*
 * This file was created by Joost van Driel, a freelance software developer specialized in PHP.
 * Do you need a developer to help you out with your project or want premium support for this plugin?
 * Find me at https://soliddev.nl.
*/

namespace SolidDev\SyliusCmsIntegrator\Tests\Core\Markdown;

use Parsedown;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use SolidDev\SyliusCmsIntegrator\Core\Markdown\ParsedownMarkdownParser;

class ParsedownMarkdownParserTest extends TestCase
{
    private ParsedownMarkdownParser $markdownParser;

    private Parsedown|MockObject $parseDown;

    protected function setUp(): void
    {
        $this->parseDown = $this->createMock(Parsedown::class);
        $this->markdownParser = new ParsedownMarkdownParser($this->parseDown);
    }

    public function testParse(): void
    {
        $this->parseDown->expects($this->once())
            ->method('parse')
            ->with('###My awesome markdown')
            ->willReturn('<h3>My awesome markdown</h3>');

        $parsed = $this->markdownParser->parse('###My awesome markdown');

        self::assertEquals('<h3>My awesome markdown</h3>', $parsed);
    }
}
