<?php

declare(strict_types = 1);

namespace CHfur\Tests\Unit\Requests\Subscriptions;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use CHfur\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use CHfur\CloudPayments\Requests\Subscriptions\SubscriptionsGetRequestBuilder;

/**
 * @covers \CHfur\CloudPayments\Requests\Subscriptions\SubscriptionsGetRequestBuilder
 */
class SubscriptionsGetRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var SubscriptionsGetRequestBuilder
     */
    protected $request_builder;

    public function testId(): void
    {
        $this->assertEmpty($this->request_builder->buildRequest()->getBody()->getContents());
        $this->request_builder->setId('some');
        $this->assertSame('{"Id":"some"}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    protected function getRequestBuilder(): SubscriptionsGetRequestBuilder
    {
        return new SubscriptionsGetRequestBuilder;
    }

    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/subscriptions/get');
    }
}
