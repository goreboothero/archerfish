<?php

declare(strict_types=1);

namespace Iamyukihiro\Archerfish;

use PHPUnit\Framework\TestCase;

class ArcherfishTest extends TestCase
{
    protected Archerfish $archerfish;

    protected function setUp(): void
    {
        $this->archerfish = new Archerfish();
    }

    public function test(): void
    {
        $actual = $this->archerfish;
        $this->assertInstanceOf(Archerfish::class, $actual);
    }
}
