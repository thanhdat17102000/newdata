<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ShopifyController extends Controller
{
    public function shopify(Request $request)
    {
        $shop = $request->shop;
        // ....
        $client_id = '1fe237149359c0ef833befe727efe2fe';
        $scope = 'write_orders,read_customers,read_products,write_products,read_orders,write_orders';
        $url = route('url');
        //https://{shop}.myshopify.com/admin/oauth/authorize?client_id={api_key}&scope={scopes}&redirect_uri={redirect_uri}&state={nonce}&grant_options[]={access_mode}
        $redirect = "https://$shop.myshopify.com/admin/oauth/authorize?client_id=$client_id&scope=$scope&redirect_uri=$url";
        return redirect($redirect);
    }
    public function install(Request $request)
    {

        $shop = $request->shop;
        // ....
        $client_id = '1fe237149359c0ef833befe727efe2fe';
        $scope = 'write_orders,read_customers';
        $url = route('url');
        //https://{shop}.myshopify.com/admin/oauth/authorize?client_id={api_key}&scope={scopes}&redirect_uri={redirect_uri}&state={nonce}&grant_options[]={access_mode}
        $redirect = "https://$shop/admin/oauth/authorize?client_id=$client_id&scope=$scope&redirect_uri=$url";
        return redirect($redirect);
    }

    public function url(Request $request)
    {
        $code = $request->code;
        $shop = $request->shop;
        $access_token = $this->getAccessToken($code, $shop)->access_token;
        $infoShop = $this->getInfoShop($shop, $access_token);

        $check = DB::table('info_shop')->where('id', $infoShop->id)->count();
        if ($check !== 0) {
            dd('Thất bại');
        } else {
            DB::table('info_shop')->insert([
                'id' => $infoShop->id,
                'name' => $infoShop->name,
                'domain' => $infoShop->domain,
                'customer_email' => $infoShop->customer_email,
                'plan_display_name' => $infoShop->plan_display_name,
                'created_at' => Now(),
                'updated_at' => Now(),
            ]);
            
        }
    }

    public function getInfoShop($shop, $access_token)
    {
        $response = Http::withHeaders([
            'X-Shopify-Access-Token' => $access_token,
        ], )->get("https://$shop/admin/api/2022-04/shop.json", [
            'fields' => 'id,name,customer_email,domain,plan_display_name']);
        if ($response->successful()) {
            return json_decode($response->getBody())->shop;
        } else {
            $response->throw();
        }

    }

    public function getAccessToken(string $code, string $shop)
    {

        $client = new Client();
        $response = $client->post(
            "https://$shop/admin/oauth/access_token",
            [
                'form_params' => [
                    'client_id' => '1fe237149359c0ef833befe727efe2fe',
                    'client_secret' => 'e2708d4bd3fb1f0f725f6a497bc9b2d3',
                    'code' => $code,
                ],
            ]
        );

        return json_decode($response->getBody()->getContents());
    }

    

}
