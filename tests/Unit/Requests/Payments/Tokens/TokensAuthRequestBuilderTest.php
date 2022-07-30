<?php

declare(strict_types = 1);

namespace CHfur\Tests\Unit\Requests\Payments\Tokens;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use CHfur\Tests\Unit\Requests\AbstractRequestBuilderTestCase;
use CHfur\CloudPayments\Requests\Payments\Tokens\TokensAuthRequestBuilder;

/**
 * @covers \CHfur\CloudPayments\Requests\Payments\Tokens\TokensAuthRequestBuilder
 */
class TokensAuthRequestBuilderTest extends AbstractRequestBuilderTestCase
{
    /**
     * @var TokensAuthRequestBuilder
     */
    protected $request_builder;

    public function testToken(): void
    {
        $this->request_builder->setToken('some');

        $this->assertSame('{"Token":"some"}', $this->request_builder->buildRequest()->getBody()->getContents());
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestBuilder(): TokensAuthRequestBuilder
    {
        return new TokensAuthRequestBuilder;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/tokens/auth');
    }
}
