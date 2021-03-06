<?php

namespace Jonassiewertsen\StatamicButik\Tests\CP;

use Jonassiewertsen\StatamicButik\Http\Models\ShippingProfile;
use Jonassiewertsen\StatamicButik\Tests\TestCase;

class ShippingProfileDeleteTest extends TestCase
{
    /** @test */
    public function A_shipping_type_can_be_deleted()
    {
        $this->signInAdmin();

        $shippingProfile = create(ShippingProfile::class);
        $this->assertEquals(1, $shippingProfile->count());

        $this->delete(route('statamic.cp.butik.shipping-profiles.destroy', $shippingProfile->first()))
            ->assertOk();

        $this->assertEquals(0, ShippingProfile::count());
    }
}
