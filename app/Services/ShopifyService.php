<?php

namespace App\Services;


class ShopifyService
{
    /**
     * App\Shop
     */
    protected $shop;

    /**
     * Set up the client and provide credentials
     */
    public function __construct($shop)
    {
        $this->shop = $shop;
    }

    /**
     * Retrieve all orders of the shop
     *
     * @return array Orders
     */
    public function getOrders()
    {
        try
        {
            $response = $this->shop->api()->rest('GET', '/admin/orders.json?status=any');
        } catch (\Exception $e)
        {
            logger()->error($e->getMessage());
            dd($e->getMessage());
        }

        logger($response->body->orders);

        return $response->body->orders;
    }

    /**
     * Retrieve a specific order of the shop
     *
     */
    public function getOrderByName($order)
    {
        try
        {
            $response = $this->shop->api()->rest('GET', '/admin/orders.json?status=any&name=' . $order);
        } catch (\Exception $e)
        {
            logger()->error($e->getMessage());
            dd($e->getMessage());
        }

        logger($response->body->orders);

        $order = collect($response->body->orders)->first();

        logger(print_r($order, true));

        return $order;

//        return $this->addImageToLineItems($order);

        // return collect($response->body->orders)->first();
    }

    /**
     * Retrieve shop properties
     *
     */
    public function getShopProperties()
    {
        try
        {
            $response = $this->shop->api()->rest('GET', '/admin/shop.json');
        } catch (\Exception $e)
        {
            dd($e->getMessage());
        }

        return $response->body->shop;
    }

    /**
     * Retrieve first image of product
     *
     * @return String image
     */
    public function getProductImageById($productId)
    {
        $file = storage_path('images/shopify/products/' . basename($productId) . '.jpg');

        if ( ! file_exists(dirname($file)))
        {
            mkdir(dirname($file), 0755, true);
        }

        if (file_exists($file))
        {
            return file_get_contents($file);
        }

        if (is_null($this->shop))
        {
            return null;
        }

        try
        {
            $response = $this->shop->api()->rest('GET', "/admin/products/{$productId}/images.json");
        } catch (\Exception $e)
        {
            dd($e->getMessage());
        }

        try
        {
            /* @see https://ecommerce.shopify.com/c/shopify-apis-and-technology/t/friday-update-to-cdn-403-issue-555111 */
            ini_set('user_agent', 'Mozilla/4.0 (compatible; MSIE 6.0)');
//            $imageContent = file_get_contents(collect($response->body->images)->first()->src);
            $img = \Image::make(collect($response->body->images)->first()->src);

            return $img->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(dirname($file) . '/' . $productId . '.jpg');

        } catch (\Exception $e)
        {
            dd($e->getMessage());
        }

        return null;
    }

    public function getShopPolicies()
    {
        try
        {
            $response = $this->shop->api()->rest('GET', "/admin/policies.json");
        } catch (\Exception $e)
        {
            dd($e->getMessage());
        }

        return $response->body;
    }

}
