<?php

declare(strict_types = 1);

namespace CHfur\Tests\Unit\Requests\Payments\Tokens;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use CHfur\CloudPayments\Requests\Payments\Tokens\TokensAuthRequestBuilder;
use CHfur\CloudPayments\Requests\Payments\Tokens\TokensChargeRequestBuilder;

/**
 * @covers \CHfur\CloudPayments\Requests\Payments\Tokens\TokensChargeRequestBuilder
 */
class TokensChargeRequestBuilderTest extends TokensAuthRequestBuilderTest
{
    /**
     * {@inheritdoc}
     */
    protected function getRequestBuilder(): TokensAuthRequestBuilder
    {
        return new TokensChargeRequestBuilder;
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/tokens/charge');
    }
}
