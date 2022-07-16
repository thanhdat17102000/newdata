<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    // public function index(){
    //     $data = "https://thanhdatfg.myshopify.com/admin/oauth/authorize?client_id=1fe237149359c0ef833befe727efe2fe&scope=write_orders,read_customers&redirect_uri=https://localhost:8000/";
    //     dd($data);
    // }
    public function createWebhook()
    {

            $client = new Client();
            $url = 'https://datshop11111.myshopify.com/admin/api/2022-07/webhooks.json';
            $client->request('POST', $url, [    
                'headers' => [
                    'X-Shopify-Access-Token' => 'shpua_b18be6dac319067e0878f95fff846d75',
                ],
                'form_params' => [
                    'webhook' => [
                        'topic' => 'products/create',
                        'format' => 'json',
                        'address' => 'https://03a7-113-161-32-170.ap.ngrok.io/api/create_product',
                    ],
                ],
            ]);  
            // $response);      
    }
    public function createProduct(Request $request)
    {
        $product = $request->all();
        Log::info($product);
        if ($product['image'] == null) {
           $data = $this->image($product);
        } else {
          $dataImgae = $this->image($product);
          $dataSrc = ['image'=> $product['image']['src']];
          $data = array_merge($dataImgae, $dataSrc);
        }

        
        
        
    }

}
