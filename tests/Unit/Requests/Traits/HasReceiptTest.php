<?php

declare(strict_types = 1);

namespace Unit\Requests\Traits;

use CHfur\Tests\AbstractTestCase;
use CHfur\CloudPayments\Receipts\Receipt;
use CHfur\CloudPayments\Requests\Traits\HasReceipt;

/**
 * @covers \CHfur\CloudPayments\Requests\Traits\HasReceipt
 */
class HasReceiptTest extends AbstractTestCase
{
    protected $request_builder;

    protected function setUp(): void
    {
        parent::setUp();
        $this->request_builder = new class {
            use HasReceipt;

            public function getData()
            {
                return $this->getReceiptData();
            }
        };
    }

    public function testGettersAndSetters(): void
    {
        $receipt = new Receipt;

        $this->assertSame([], $this->request_builder->getData());

        $this->request_builder->setReceipt($receipt);

        $this->assertSame(
            ['cloudPayments' => ['customerReceipt' => $receipt->toArray()]],
            $this->request_builder->getData()
        );
    }
}
