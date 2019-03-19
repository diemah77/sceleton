<?php

namespace App;

use App\Services\ShopifyService;
use OhMyBrew\ShopifyApp\Models\Shop as ShopifyShop;

class Shop extends ShopifyShop
{
    protected $fillable = [
        'shopify_domain',
        'shopify_token',
        'grandfathered',
        'freemium',
        'plan_id',
        'namespace',
        'email',
        'name',
        'email',
        'customer_email',
        'address1',
        'address2',
        'zip',
        'city',
        'country_name'
    ];

    protected $casts = [
        'policies' => 'array',
    ];

    public function claimStates()
    {
        return $this->morphMany(ClaimState::class, 'authorable');
    }

    public function updatePolicies()
    {
        $policies = (new ShopifyService($this))->getShopPolicies();

        $this->policies = $policies->policies;
        return $this->save();
    }

    public function getPolicyByHandle($handle)
    {
        $policies = collect($this->policies);

        $result = $policies->where('handle', $handle)->first();

        if (empty($result['body']))
        {
            return null;
        }

        return $result['body'];
    }
}
