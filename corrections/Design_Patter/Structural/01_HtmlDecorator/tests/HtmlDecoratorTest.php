<?php

use App\HtmlDecorator\Text;
use App\HtmlDecorator\Italic;
use App\HtmlDecorator\Paragraph;

use PHPUnit\Framework\TestCase;

class HtmlDecoratorTest extends TestCase
{
    public function setUp(): void
    {
    }

    public function testEmText()
    {

        $this->assertEquals((string) (new Italic(new Text("Hello world!"))), "<em>Hello world!</em>");
    }

    public function testEmParagraphText()
    {

        $this->assertEquals((string) (new Paragraph(new Italic(new Text("Hello world!")))), "<p><em>Hello world!</em></p>");
    }

    public function testParagraphEmText()
    {

        $this->assertEquals((string) (new Italic(new Paragraph(new Text("Hello world!")))), "<em><p>Hello world!</p></em>");
    }
}
