<?php

use PHPUnit\Framework\TestCase;

class ZendExceptionTest extends TestCase
{
    public function testExtendsException(): void
    {
        $exception = new Zend_Exception();
        $this->assertInstanceOf(Exception::class, $exception);
    }

    public function testDefaultValues(): void
    {
        $exception = new Zend_Exception();
        $this->assertSame('', $exception->getMessage());
        $this->assertSame(0, $exception->getCode());
        $this->assertNull($exception->getPrevious());
    }

    public function testCustomMessageAndCode(): void
    {
        $exception = new Zend_Exception('test error', 42);
        $this->assertSame('test error', $exception->getMessage());
        $this->assertSame(42, $exception->getCode());
    }

    public function testPreviousException(): void
    {
        $previous = new RuntimeException('root cause');
        $exception = new Zend_Exception('wrapped', 0, $previous);
        $this->assertSame($previous, $exception->getPrevious());
    }
}
