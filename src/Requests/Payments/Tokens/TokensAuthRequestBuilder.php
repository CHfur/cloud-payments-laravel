<?php

declare(strict_types = 1);

namespace CHfur\CloudPayments\Requests\Payments\Tokens;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use CHfur\CloudPayments\Requests\Traits\HasReceipt;
use CHfur\CloudPayments\Requests\AbstractRequestBuilder;
use CHfur\CloudPayments\Requests\Traits\PaymentRequestTrait;

/**
 * @see https://developers.cloudpayments.ru/#oplata-po-tokenu-rekarring
 */
class TokensAuthRequestBuilder extends AbstractRequestBuilder
{
    use PaymentRequestTrait, HasReceipt;

    /**
     * Required.
     *
     * @var string|null
     */
    protected $token;

    /**
     * Required.
     *
     * @param string $token
     *
     * @return $this
     */
    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestPayload(): array
    {
        $this->json_data = \array_merge($this->json_data ?? [], $this->getReceiptData());

        return \array_merge($this->getCommonPaymentParams(), [
            'Token' => $this->token,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/payments/tokens/auth');
    }
}
