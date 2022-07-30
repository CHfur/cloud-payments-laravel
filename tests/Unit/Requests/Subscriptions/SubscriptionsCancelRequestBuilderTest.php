<?php

declare(strict_types = 1);

namespace CHfur\Tests\Unit\Requests\Subscriptions;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use CHfur\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use CHfur\CloudPayments\Requests\Subscriptions\SubscriptionsCancelRequestBuilder;

/**
 * @covers \CHfur\CloudPayments\Requests\Subscriptions\SubscriptionsCancelRequestBuilder
 */
class SubscriptionsCancelRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var SubscriptionsCancelRequestBuilder
     */
    protected $request_builder;

    public function testId(): void
    {
        $this->assertEmpty($this->request_builder->buildRequest()->getBody()->getContents());
        $this->request_builder->setId('some');
        $this->assertSame('{"Id":"some"}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    protected function getRequestBuilder(): SubscriptionsCancelRequestBuilder
    {
        return new SubscriptionsCancelRequestBuilder;
    }

    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/subscriptions/cancel');
    }
}
