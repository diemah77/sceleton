<?php

use App\Freezium\Freezium;

function shop()
{
    $shop = \ShopifyApp::shop();

    if (app()->environment() != 'production')
    {
    	$shopModel = config('shopify-app.shop_model');
    	$shop = $shopModel::first();
    }
      
    return $shop;
}

function formatMoney($amount, $currency = 'EUR')
{
    if ($currency == 'EUR')
    {
        setlocale(LC_MONETARY, 'de_DE.utf8');
        
        return money_format('€%!n', floatval($amount));
    }

    return money_format('%+n', floatval($amount));
}

function render($component, $data = null)
{
    return Freezium::render($component, $data);
}
