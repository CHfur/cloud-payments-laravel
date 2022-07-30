<?php

declare(strict_types = 1);

namespace CHfur\Tests\Unit\Requests\Payments;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use CHfur\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use CHfur\CloudPayments\Requests\Payments\PaymentsVoidRequestBuilder;

/**
 * @covers \CHfur\CloudPayments\Requests\Payments\PaymentsVoidRequestBuilder
 */
class PaymentsVoidRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var PaymentsVoidRequestBuilder
     */
    protected $request_builder;

    public function testTransactionId(): void
    {
        $this->assertSame('', $this->request_builder->buildRequest()->getBody()->getContents());

        $this->request_builder->setTransactionId(1);

        $this->assertSame('{"TransactionId":1}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestBuilder(): PaymentsVoidRequestBuilder
    {
        return new PaymentsVoidRequestBuilder;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/void');
    }
}
