<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FacebookEventController extends Controller
{
  public function pageViewCAPI(Request $request)
  {
    $pixelId     = '1280929069904279';
    $accessToken = 'EAAKrwnTBIFUBPbQZCSWFbBxd57GPybBLKyKCc2YspMsjZCwNsYQ8HIRqn9qqbwBZBZCe8uTJfH5rZCr0LgZAxxL1iDAhCKMWOunYO92KPWdVYZBoYyHp82iQjn3t9p9FePVhsmtO9ob5XJAVZATOltpH3BOIrkdjRObjzBuYqiOWT7Dhr3vNliGeKE69xojazQZDZD';

    // ✅ Test Event Code (remove in production)
    $testEventCode = 'TEST43269';

    try {
        $eventData = [
            'data' => [
                [
                    'event_name'       => 'PageView',
                    'event_time'       => $request->input('event_time', time()), // ✅ use browser timestamp if sent
                    'action_source'    => 'website',
                    'event_source_url' => $request->input('event_source_url'),   // ✅ exact match with Pixel
                    'event_id'         => $request->input('event_id'),           // ✅ deduplication key
                    'user_data' => [
                        'client_ip_address' => $request->input('client_ip_address'),
                        'client_user_agent' => $request->input('client_user_agent'),
                        'fbp'               => $request->input('fbp'),           // ✅ deduplication helper
                    ],
                ]
            ],
            'test_event_code' => $testEventCode
        ];

        $response = Http::post(
            "https://graph.facebook.com/v18.0/{$pixelId}/events?access_token={$accessToken}",
            $eventData
        );

        Log::info('📥 Facebook Page View Response:', $response->json());

        return response()->json([
            'success'  => true,
            'message'  => 'PageView event sent to Facebook CAPI (Test Mode)',
            'response' => $response->json(),
        ]);

    } catch (\Exception $e) {
        Log::error('❌ Facebook PageView CAPI Error: ' . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'Failed to send PageView event',
            'error'   => $e->getMessage()
        ], 500);
    }
}
   

  public function viewContent(Request $request)
    {
        $pixelId     = '1280929069904279';
        $accessToken = 'EAAKrwnTBIFUBPbQZCSWFbBxd57GPybBLKyKCc2YspMsjZCwNsYQ8HIRqn9qqbwBZBZCe8uTJfH5rZCr0LgZAxxL1iDAhCKMWOunYO92KPWdVYZBoYyHp82iQjn3t9p9FePVhsmtO9ob5XJAVZATOltpH3BOIrkdjRObjzBuYqiOWT7Dhr3vNliGeKE69xojazQZDZD';
    
        // ✅ Your Test Event Code from Events Manager
        $testEventCode = 'TEST43269';
    
        try {
            $eventData = [
                'data' => [
                    [
                        'event_name'       => 'ViewContent',
                        'event_time'       => time(),
                        "event_id"       => $request->input('event_id'),
                        'action_source'    => 'website',
                        'event_source_url' => $request->headers->get('referer'),
                        'user_data' => [
                            'client_ip_address' => $request->input('client_ip_address', $request->ip()),
                            'client_user_agent' => $request->input('client_user_agent', $request->userAgent()),
                            'fbp'               => $request->input('fbp'), // 👈 added
                            'fbc'               => $request->input('fbc'), // 👈 added
                        ],
                        'custom_data' => [
                            'content_ids'      => [$request->input('product_id')],
                            'content_name'     => $request->input('product_name'),
                            'content_type'     => 'product',
                            'content_category' => $request->input('category'),
                            'content_brand'    => $request->input('brand'),
                            'value'            => $request->input('value', 0),
                            'currency'         => $request->input('currency', 'BDT'),
                        ]
                    ]
                ],
                // 👇 Required for testing
                'test_event_code' => $testEventCode
            ];
    
            $response = Http::post(
                "https://graph.facebook.com/v18.0/{$pixelId}/events?access_token={$accessToken}",
                $eventData
            );
    
            Log::info('📥 Facebook View Content Response:', $response->json());
    
            return response()->json([
                'success'  => true,
                'message'  => 'ViewContent event sent successfully',
                'response' => $response->json(),
            ]);
    
        } catch (\Exception $e) {
            Log::error('❌ ViewContent CAPI Error: ' . $e->getMessage());
    
            return response()->json([
                'success' => false,
                'message' => 'Failed to send ViewContent event',
                'error'   => $e->getMessage()
            ], 500);
        }
    }




public function addToCart(Request $request)
{
    $request->validate([
        'event_id'          => 'required|string',
        'product_id'        => 'required|integer',
        'product_name'      => 'required|string',
        'brand'             => 'nullable|string',
        'category'          => 'nullable|string',
        'value'             => 'required|numeric',
        'currency'          => 'required|string',
        'quantity'          => 'required|integer',
        'client_user_agent' => 'nullable|string',
        'client_ip_address' => 'nullable|string',
        'fbp'               => 'nullable|string', // 🔥 added
        'fbc'               => 'nullable|string', // 🔥 added
    ]);

    $pixelId       = '1280929069904279'; 
    $accessToken   = 'EAAKrwnTBIFUBPbQZCSWFbBxd57GPybBLKyKCc2YspMsjZCwNsYQ8HIRqn9qqbwBZBZCe8uTJfH5rZCr0LgZAxxL1iDAhCKMWOunYO92KPWdVYZBoYyHp82iQjn3t9p9FePVhsmtO9ob5XJAVZATOltpH3BOIrkdjRObjzBuYqiOWT7Dhr3vNliGeKE69xojazQZDZD';
    $testEventCode = 'TEST43269'; // ✅ Test code from Events Manager

    $eventData = [
        'data' => [
            [
                'event_name'       => 'AddToCart',
                'event_time'       => time(),
                'event_id'         => $request->event_id,
                'action_source'    => 'website',
                'event_source_url' => $request->headers->get('referer'),
                'user_data'        => [
                    'client_ip_address' => $request->client_ip_address,
                    'client_user_agent' => $request->client_user_agent,
                    'fbp'               => $request->fbp, // 👈 Added
                    'fbc'               => $request->fbc, // 👈 Added
                ],
                'custom_data'      => [
                    'content_ids'      => [$request->product_id],
                    'content_name'     => $request->product_name,
                    'content_category' => $request->category,
                    'content_brand'    => $request->brand,
                    'value'            => $request->value,
                    'currency'         => $request->currency,
                    'contents' => [
                        [
                            'id'        => $request->product_id,
                            'quantity'  => $request->quantity,
                            'item_price'=> $request->value / max($request->quantity, 1) // safe divide
                        ]
                    ]
                ],
            ]
        ],
        'test_event_code' => $testEventCode
    ];

    try {
        $response = Http::post(
            "https://graph.facebook.com/v18.0/{$pixelId}/events?access_token={$accessToken}",
            $eventData
        );

        Log::info('📥 Facebook CAPI AddToCart Response:', $response->json());

        return response()->json([
            'success'            => true,
            'message'            => '✅ AddToCart event sent to Facebook CAPI (Test Mode)',
            'facebook_response'  => $response->json()
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => '❌ Failed to send AddToCart event',
            'error'   => $e->getMessage()
        ], 500);
    }
}


   public function beginCheckoutCAPI(Request $request)
    {
        try {
            $pixelId     = '1280929069904279'; 
            $accessToken = 'EAAKrwnTBIFUBPbQZCSWFbBxd57GPybBLKyKCc2YspMsjZCwNsYQ8HIRqn9qqbwBZBZCe8uTJfH5rZCr0LgZAxxL1iDAhCKMWOunYO92KPWdVYZBoYyHp82iQjn3t9p9FePVhsmtO9ob5XJAVZATOltpH3BOIrkdjRObjzBuYqiOWT7Dhr3vNliGeKE69xojazQZDZD';
    
            // ✅ Use your Events Manager test event code
            $testEventCode = 'TEST43269';
    
            // Extract content_ids from items
            $items = $request->input('items', []);
            $contentIds = collect($items)->pluck('id')->filter()->values()->toArray();
    
            $payload = [
                "data" => [[
                    "event_name"     => "InitiateCheckout",
                    "event_time"     => time(),
                    "event_id"       => $request->input('event_id'),
                    "action_source"  => "website",
                    "user_data" => [
                        "client_ip_address" => $request->input('client_ip_address', $request->ip()),
                        "client_user_agent" => $request->input('client_user_agent', $request->userAgent()),
                        "fbp"               => $request->input('fbp'), // ✅ Added
                        "fbc"               => $request->input('fbc'), // ✅ Added
                    ],
                    "custom_data" => [
                        "currency"      => $request->input('currency', 'BDT'),
                        "value"         => $request->input('value'),
                        "content_ids"   => $contentIds,
                        "content_type"  => "product",
                        "contents"      => collect($items)->map(function ($item) {
                            return [
                                "id"         => $item['id'] ?? '',
                                "quantity"   => $item['quantity'] ?? 1,
                                "item_price" => $item['price'] ?? 0,
                            ];
                        })->toArray(),
                    ],
                ]],
                "test_event_code" => $testEventCode
            ];
    
            $response = Http::post(
                "https://graph.facebook.com/v20.0/{$pixelId}/events?access_token={$accessToken}",
                $payload
            );
    
            Log::info('FB CAPI InitiateCheckout response', [
                "success"     => true,
                "payload"     => $payload,
                "message"     => "✅ InitiateCheckout event sent (Test Mode)",
                "fb_response" => $response->json()
            ]);
    
            return response()->json([
                "success"     => true,
                "payload"     => $payload,
                "message"     => "✅ InitiateCheckout event sent (Test Mode)",
                "fb_response" => $response->json()
            ]);
        } catch (\Exception $e) {
            Log::error('FB CAPI InitiateCheckout error', [
                "error" => $e->getMessage()
            ]);
    
            return response()->json([
                "success" => false,
                "error"   => $e->getMessage(),
            ], 500);
        }
    }


  public function purchaseCAPI(Request $request)
{
    $pixelId     = '1280929069904279'; 
    $accessToken = 'EAAKrwnTBIFUBPbQZCSWFbBxd57GPybBLKyKCc2YspMsjZCwNsYQ8HIRqn9qqbwBZBZCe8uTJfH5rZCr0LgZAxxL1iDAhCKMWOunYO92KPWdVYZBoYyHp82iQjn3t9p9FePVhsmtO9ob5XJAVZATOltpH3BOIrkdjRObjzBuYqiOWT7Dhr3vNliGeKE69xojazQZDZD';

    // ✅ Test Event Code from Events Manager (remove in production)
    $testEventCode = 'TEST43269';

    try {
        $contents   = [];
        $contentIds = [];

        // Map items for Facebook CAPI
        if (!empty($request->items) && is_array($request->items)) {
            foreach ($request->items as $item) {
                $contents[] = [
                    'id'            => $item['id'] ?? '',
                    'quantity'      => $item['quantity'] ?? 1,
                    'item_price'    => $item['price'] ?? 0,
                    'product_name'  => $item['name'] ?? '',
                    'item_brand'    => $item['brand'] ?? '',
                    'item_category' => $item['category'] ?? '',
                    'item_size'     => $item['size'] ?? '',
                    'item_color'    => $item['color'] ?? '',
                    'item_model'    => $item['model'] ?? '',
                    'item_weight'   => $item['weight'] ?? '',
                ];

                if (!empty($item['id'])) {
                    $contentIds[] = $item['id'];
                }
            }
        }

        $payload = [
            'data' => [
                [
                    'event_name'    => 'Purchase',
                    'event_time'    => time(),
                    'event_id'      => $request->event_id,
                    'action_source' => 'website',
                    'user_data'     => [
                        'client_ip_address' => $request->user_data['client_ip_address'] ?? null,
                        'client_user_agent'=> $request->user_data['client_user_agent'] ?? null,
                        'em'    => isset($request->user_data['email']) ? hash('sha256', strtolower(trim($request->user_data['email']))) : null,
                        'ph'    => isset($request->user_data['phone']) ? hash('sha256', preg_replace('/\D/', '', $request->user_data['phone'])) : null,
                        'fn'    => isset($request->user_data['name']) ? hash('sha256', strtolower(trim($request->user_data['name']))) : null,
                        'ct'    => isset($request->user_data['area']) ? hash('sha256', strtolower(trim($request->user_data['area']))) : null,
                        'country'=> isset($request->user_data['country']) ? hash('sha256', strtolower(trim($request->user_data['country']))) : null,
                        // ✅ Added for deduplication
                        'fbp'   => $request->user_data['fbp'] ?? null,
                        'fbc'   => $request->user_data['fbc'] ?? null,
                    ],
                    'custom_data' => [
                        'currency'     => $request->currency,
                        'value'        => $request->value,
                        'content_ids'  => $contentIds,  // ✅ Required
                        'content_type' => 'product',    // ✅ Required
                        'contents'     => array_map(function($item){
                            return [
                                'id'         => $item['id'] ?? '',
                                'quantity'   => $item['quantity'] ?? 1,
                                'item_price' => $item['price'] ?? 0
                            ];
                        }, $request->items ?? [])
                    ]
                ]
            ],
            'test_event_code' => $testEventCode // 👈 Remove this in production
        ];

        $response = Http::post(
            "https://graph.facebook.com/v20.0/{$pixelId}/events?access_token={$accessToken}", 
            $payload
        );

        Log::info('📥 Facebook CAPI Purchase Response:', $response->json());

        return response()->json([
            'status'   => $response->status(),
            'response' => $response->json()
        ]);

    } catch (\Exception $e) {
        \Log::error('Facebook CAPI Purchase Error: ' . $e->getMessage());
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
}



}