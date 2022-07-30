<?php

declare(strict_types = 1);

namespace CHfur\Tests\Unit\Requests\Payments\Cards;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use CHfur\CloudPayments\Requests\Payments\Cards\CardsAuthRequestBuilder;
use CHfur\CloudPayments\Requests\Payments\Cards\CardsChargeRequestBuilder;

/**
 * @covers \CHfur\CloudPayments\Requests\Payments\Cards\CardsChargeRequestBuilder
 */
class CardsChargeRequestBuilderTest extends CardsAuthRequestBuilderTest
{
    protected function getUri(): UriInterface
    {
        return new Uri('https://api.cloudpayments.ru/payments/cards/charge');
    }

    protected function getRequestBuilder(): CardsAuthRequestBuilder
    {
        return new CardsChargeRequestBuilder;
    }
}
