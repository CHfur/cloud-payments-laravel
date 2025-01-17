<?php

declare(strict_types = 1);

namespace CHfur\CloudPayments\Requests\Payments;

use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use CHfur\CloudPayments\Requests\Traits\HasReceipt;
use CHfur\CloudPayments\Requests\AbstractRequestBuilder;

/**
 * @see https://developers.cloudpayments.ru/#podtverzhdenie-oplaty
 */
class PaymentsConfirmRequestBuilder extends AbstractRequestBuilder
{
    use HasReceipt;

    /**
     * Required.
     *
     * @var int
     */
    protected $transaction_id;

    /**
     * Required.
     *
     * @var float
     */
    protected $amount;

    /**
     * @var array<mixed>
     */
    protected $json_data;

    /**
     * Required.
     *
     * @param int $transaction_id
     *
     * @return $this
     */
    public function setTransactionId(int $transaction_id): self
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    /**
     * Required.
     *
     * @param float $amount
     *
     * @return $this
     */
    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param array<mixed> $json_data
     *
     * @return $this
     */
    public function setJsonData(array $json_data): self
    {
        $this->json_data = $json_data;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \JsonException
     */
    protected function getRequestPayload(): array
    {
        $this->json_data = \array_merge($this->json_data ?? [], $this->getReceiptData());

        return [
            'TransactionId' => $this->transaction_id,
            'Amount'        => $this->amount,
            'JsonData'      => $this->json_data !== null && $this->json_data !== []
                ? \json_encode($this->json_data, JSON_THROW_ON_ERROR)
                : null,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/payments/confirm');
    }
}
