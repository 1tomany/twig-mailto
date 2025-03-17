<?php

namespace OneToMany\Twig\Tests;

use OneToMany\Twig\MailtoExtension;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\TestCase;

#[Group('UnitTests')]
#[Group('TwigTests')]
final class MailtoExtensionTest extends TestCase
{

    public function testTrue(): void
    {
        $this->assertFalse(false);
    }

}
