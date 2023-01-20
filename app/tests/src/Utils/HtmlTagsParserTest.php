<?php

namespace App\Utils;

use PHPUnit\Framework\TestCase;

class HtmlTagsParserTest extends TestCase
{

    /**
     * @dataProvider tagsHtmlProvider
     * @covers       HtmlTagsParser::parse
     */
    public function testParse(string $htmlString, array $tags): void
    {
        $obj = new HtmlTagsParser();
        $result = $obj->parse($htmlString);

        self::assertSame($tags, $result, 'Wrong');
    }

    public function tagsHtmlProvider(): \Generator
    {
        yield [
                '<html lang="en"><body><h1>Hello World</h1><h1>123</h1><p>This is a test</p><p>Bye</p></body></html>',
                ['html', 'body', 'h1', 'h1', 'p', 'p'],
        ];
        yield [
                '<div class="d-flex">
                <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" aria-label="Toggle navigation">
                <svg class="bi" aria-hidden="true"><use xlink:href="#three-dots"></use></svg>
                </button>
                </div>',
                ['div', 'button', 'svg', 'use'],
        ];
    }
}
