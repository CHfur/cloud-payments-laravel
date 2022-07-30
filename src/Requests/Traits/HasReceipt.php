<?php

declare(strict_types = 1);

namespace CHfur\CloudPayments\Requests\Traits;

use CHfur\CloudPayments\Receipts\Receipt;

/**
 * @see https://developers.cloudpayments.ru/#format-peredachi-dannyh-dlya-onlayn-cheka
 */
trait HasReceipt
{
    /**
     * @var Receipt
     */
    protected $receipt;

    /**
     * @param Receipt $receipt
     *
     * @return $this
     */
    public function setReceipt(Receipt $receipt): self
    {
        $this->receipt = $receipt;

        return $this;
    }

    /**
     * @return array<string, array<mixed>>
     */
    protected function getReceiptData(): array
    {
        $receipt_data = [];
        if ($this->receipt instanceof Receipt) {
            $receipt_data['cloudPayments']['customerReceipt'] = $this->receipt->toArray();
        }

        return $receipt_data;
    }
}
