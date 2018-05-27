<?php

namespace Academe\AuthorizeNet\ServerRequest\Payload;

/**
 *
 */

use PHPUnit\Framework\TestCase;

use GuzzleHttp\Exception\ClientException;
use Academe\AuthorizeNet\Response\Model\TransactionResponse;

class PaymentProfileTest extends TestCase
{
    public function setUp()
    {
    }

    public function testCreate()
    {
        $data = json_decode('{
            "customerProfileId": 394,
            "entityName": "customerPaymentProfile",
            "id": "694",
            "customerType": "business"
        }', true);

        $payload = new PaymentProfile($data);

        $this->assertSame(394, $payload->customerProfileId);
        $this->assertSame('694', $payload->id);

        // The ID represents the original customerId, so this will be aliased.
        $this->assertSame('694', $payload->customerId);

        $this->assertArraySubset($data, $payload->toData(true));
    }
}