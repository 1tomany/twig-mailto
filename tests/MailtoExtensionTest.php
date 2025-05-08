<?php

namespace OneToMany\Twig\Tests;

use OneToMany\Twig\MailtoExtension;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;
use Twig\TwigFunction;

#[Group('UnitTests')]
#[Group('TwigTests')]
final class MailtoExtensionTest extends TestCase
{
    public function testGettingFunctions(): void
    {
        $extension = new MailtoExtension();
        $functions = $extension->getFunctions();

        $this->assertCount(1, $functions);
        $this->assertInstanceOf(TwigFunction::class, $functions[0]);
        $this->assertEquals('mailto', $functions[0]->getName());
    }

    public function testGeneratingMailtoRequiresValidEmailAddress(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The email address "invalid" is invalid.');

        new MailtoExtension()->generateMailto('invalid');
    }

    public function testGeneratingMailtoLowercasesEmailAddress(): void
    {
        $extension = new MailtoExtension();

        $this->assertStringContainsString('vic@1tomany.com', $extension->generateMailto('VIC@1TOMANY.COM'));
    }
}
