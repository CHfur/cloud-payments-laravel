<?php

declare(strict_types = 1);

namespace CHfur\Tests\Unit\Exceptions;

use GuzzleHttp\Psr7\Request;
use CHfur\Tests\AbstractTestCase;
use CHfur\CloudPayments\Exceptions\CloudPaymentsRequestException;

/**
 * @covers \CHfur\CloudPayments\Exceptions\CloudPaymentsRequestException
 */
class CloudPaymentsRequestExceptionTest extends AbstractTestCase
{
    public function testWrap(): void
    {
        $request = new Request('GET', 'example.com');

        $exception = CloudPaymentsRequestException::wrapException($request, $base_exception = new \Exception);

        $this->assertNotSame($base_exception, $exception);

        $this->assertSame($exception, CloudPaymentsRequestException::wrapException($request, $exception));
    }
}
