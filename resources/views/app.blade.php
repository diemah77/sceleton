<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Shopify App</title>
     
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" />

        @routes
    </head>

    <body class="font-shopify bg-sky-light text-ink">
        <div id="app" data-props="{{ json_encode($data) }}"></div>

        @if(config('shopify-app.esdk_enabled'))
            <script src="https://cdn.shopify.com/s/assets/external/app.js?{{ date('YmdH') }}"></script>
            <script type="text/javascript">
                ShopifyApp.init({
                    apiKey: '{{ config('shopify-app.api_key') }}',
                    shopOrigin: 'https://{{ $data["shop"]->shopify_domain }}',
                    debug: true,
                    forceRedirect: {{ env('SHOPIFY_SDK_FORCE_REDIRECT') ? 'true' : 'false' }},
                });
            </script>
        @endif

        <script src="{{ mix('/js/manifest.js') }}" defer></script>
        <script src="{{ mix('/js/vendor.js') }}" defer></script>
        <script src="{{ mix('/js/app.js') }}" defer></script>
    </body>
</html>
