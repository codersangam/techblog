<?php

/**
 * Google Adsense Ads for Laravel.
 *
 * Package for easily including Google Adsense Ad units
 * in Laravel and Lumen.
 *
 * @developer Martin Butt <https://www.martinbutt.com/>
 *
 * @copyright Copyright (c) 2021 Martin Butt
 * @license   MIT
 *
 * Copyright (c) 2016 Galen Han
 * Copyright (c) 2019 Crypto Technology srl
 * Copyright (c) 2021 Martin Butt
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

declare(strict_types=1);

return [

    'client_id' => 'ca-pub-2526686638699188', //Your Adsense client ID e.g. ca-pub-9508939161510421
    'ads' => [
        'responsive' => [
            'ad_slot' => 1111111111,
            'ad_format' => 'fluid',
            'ad_full_width_responsive' => true,
            'ad_style' => 'display:inline-block',
        ],
        'rectangle' => [
            'ad_slot' => 2222222222,
            'ad_style' => 'display:inline-block;width:300px;height:250px',
            'ad_full_width_responsive' => false,
            'ad_format' => 'auto',
        ],
    ],
];
