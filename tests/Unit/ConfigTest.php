<?php

declare(strict_types = 1);

namespace CHfur\Tests\Unit;

use Illuminate\Support\Str;
use CHfur\CloudPayments\Config;
use CHfur\Tests\AbstractTestCase;

/**
 * @covers \CHfur\CloudPayments\Config
 */
class ConfigTest extends AbstractTestCase
{
    public function test(): void
    {
        $config_array = [
            'api_key'   => Str::random(),
            'public_id' => Str::random(),
        ];

        $config = new Config($config_array['public_id'], $config_array['api_key']);

        $this->assertSame($config_array['api_key'], $config->getApiKey());
        $this->assertSame($config_array['public_id'], $config->getPublicId());
    }
}
