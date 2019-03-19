<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ShopSeeder::class);
    }
}

class ShopSeeder extends Seeder
{
    public function run()
    {
        $shop = App\Shop::create([
            'shopify_domain' => 'insure-app-store.myshopify.com',
            'shopify_token' => '8969309db78af81c4794cf433b49836f',
            'grandfathered' => false,
            'freemium' => false,
            'email' => 'apps@shopicasts.com'
        ]);
    }
}
