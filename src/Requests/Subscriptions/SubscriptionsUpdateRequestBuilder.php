<?php

declare(strict_types = 1);

namespace AvtoDev\CloudPayments\Requests\Subscriptions;

use Carbon\Carbon;
use Psy\Util\Json;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;
use AvtoDev\CloudPayments\Receipts\Receipt;
use AvtoDev\CloudPayments\Requests\AbstractRequestBuilder;

/**
 * @see https://developers.cloudpayments.ru/#izmenenie-podpiski-na-rekurrentnye-platezhi
 */
class SubscriptionsUpdateRequestBuilder extends AbstractRequestBuilder
{
    /**
     * Required.
     *
     * @var string|null
     */
    protected $id;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var string|null
     */
    protected $email;

    /**
     * @var float|null
     */
    protected $amount;

    /**
     * @see Currency
     *
     * @var string|null
     */
    protected $currency;

    /**
     * @var bool|null
     */
    protected $require_confirmation;

    /**
     * @var Carbon|null
     */
    protected $start_date;

    /**
     * @see Interval
     *
     * @var string|null
     */
    protected $interval;

    /**
     * @var int|null
     */
    protected $period;

    /**
     * @var int|null
     */
    protected $max_periods;

    /**
     * @var Receipt|null
     */
    protected $customer_receipt;

    /**
     * Required.
     *
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Required.
     *
     * @param string $id
     *
     * @return $this
     */
    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getAmount(): ?float
    {
        return $this->amount;
    }

    /**
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
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequireConfirmation(): ?bool
    {
        return $this->require_confirmation;
    }

    /**
     * @param bool $require_confirmation
     *
     * @return $this
     */
    public function setRequireConfirmation(bool $require_confirmation): self
    {
        $this->require_confirmation = $require_confirmation;

        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getStartDate(): ?Carbon
    {
        return $this->start_date;
    }

    /**
     * @param Carbon $start_date
     *
     * @return $this
     */
    public function setStartDate(Carbon $start_date): self
    {
        $this->start_date = clone $start_date;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInterval(): ?string
    {
        return $this->interval;
    }

    /**
     * @param string $interval
     *
     * @return $this
     */
    public function setInterval(string $interval): self
    {
        $this->interval = $interval;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getPeriod(): ?int
    {
        return $this->period;
    }

    /**
     * @param int $period
     *
     * @return $this
     */
    public function setPeriod(int $period): self
    {
        $this->period = $period;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxPeriods(): ?int
    {
        return $this->max_periods;
    }

    /**
     * @param int $max_periods
     *
     * @return $this
     */
    public function setMaxPeriods(int $max_periods): self
    {
        $this->max_periods = $max_periods;

        return $this;
    }

    /**
     * @return Receipt|null
     */
    public function getCustomerReceipt(): ?Receipt
    {
        return $this->customer_receipt;
    }

    /**
     * @param Receipt $customer_receipt
     *
     * @return $this
     */
    public function setCustomerReceipt(Receipt $customer_receipt): self
    {
        $this->customer_receipt = $customer_receipt;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function getRequestPayload(): array
    {
        return [
            'Id'                  => $this->id,
            'Description'         => $this->description,
            'Email'               => $this->email,
            'Amount'              => $this->amount,
            'Currency'            => $this->currency,
            'RequireConfirmation' => $this->require_confirmation,
            'StartDate'           => $this->start_date instanceof Carbon
                ? $this->start_date->toRfc3339String()
                : null,
            'Interval'            => $this->interval,
            'Period'              => $this->period,
            'MaxPeriods'          => $this->max_periods,
            'CustomerReceipt'     => $this->customer_receipt instanceof Receipt
                ? Json::encode($this->customer_receipt->toArray())
                : null,
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function getUri(): UriInterface
    {
        return new Uri('/subscriptions/update');
    }
}
