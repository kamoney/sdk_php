<?php
namespace sdk_php;

class Kamoney
{
    public static $public_key = '';
    public static $secret_key = '';
    private static $api = "https://api2.kamoney.com.br/v2";

    private static function request_public($endpoint, $data = [], $type = 'GET')
    {
        $headers = ['Content-Type: application/json'];
        $url = self::$api . "/public" . $endpoint;
        
        $ch = curl_init();

        if ($type == 'POST') {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_POST, 1);
        } else {
            $data_query = http_build_query(self::query_mounted($data), '', '&');
            curl_setopt($ch, CURLOPT_URL, $url . (count($data) > 0 ? '?' . $data_query : ''));
            curl_setopt($ch, CURLOPT_POST, 0);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $data = curl_exec($ch);

        return json_decode($data);
    }
    
    public static function query_mounted(array $req, String $comp = '') {
        $req_data_query = [];
        
        foreach ($req as $index => $value) {
            if (is_array($value)) {
                // Se for um array numérico, percorremos os elementos e adicionamos o índice corretamente
                if (array_keys($value) === range(0, count($value) - 1)) {
                    foreach ($value as $subIndex => $subValue) {
                        $req_data_query = array_merge($req_data_query, self::query_mounted($subValue, "{$comp}{$index}{$subIndex}"));
                    }
                } else {
                    // Se for um array associativo, apenas concatenamos normalmente
                    $req_data_query = array_merge($req_data_query, self::query_mounted($value, "{$comp}{$index}0"));
                }
            } else {
                // Para valores simples, concatenamos diretamente
                $req_data_query["{$comp}{$index}"] = $value;
            }
        }
    
        return $req_data_query;
    }
    
    private static function request_private($endpoint, $data = array(), $type = 'GET')
    {
        $mt = explode(' ', microtime());
        $data['nonce'] = $mt[1] . substr($mt[0], 2, 6);
        $data_query = http_build_query(self::query_mounted($data), '', '&');
        $sign = hash_hmac('sha512', $data_query, self::$secret_key);

        $headers = array(
            'public: ' . self::$public_key,
            'sign: ' . $sign,
            'Content-Type: application/json'
        );

        $url = self::$api . "/private" . $endpoint;

        $ch = curl_init();

        if ($type == 'POST') {
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_POST, 1);
        } elseif ($type == 'PUT') {
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $data_query);
            curl_setopt($ch, CURLOPT_PUT, 1);        
        } elseif ($type == 'DELETE') {
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $data_query);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        } else {
            curl_setopt($ch, CURLOPT_URL, $url . '?' . $data_query);
            curl_setopt($ch, CURLOPT_POST, 0);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $data = curl_exec($ch);
        var_dump($data);
        return json_decode($data);
    }

    public static function GetStatusOrder()
    {
        return self::request_public("/services/order");
    }

    public static function GetStatusMerchant()
    {
        return self::request_public("/services/merchant");
    }

    public static function GetStatusBuy()
    {
        return self::request_public("/services/buy");
    }

    public static function CreateAccount($data)
    {
        return self::request_public("/register", $data, 'POST');
    }

    public static function ActiveAccount($data)
    {
        return self::request_public("/active", $data, 'POST');
    }

    public static function AccountRecovery($data)
    {
        return self::request_public("/recovery", $data, 'POST');
    }

    public static function AccountRecoveryConfirm($data)
    {
        return self::request_public("/recovery/confirm", $data, 'POST');
    }

    public static function GetPublicSystemInfo()
    {
        return self::request_public("/system/info");
    }

    public static function ListBank()
    {
        return self::request_public("/bank");
    }

    public static function ListNotification()
    {
        return self::request_public("/notification");
    }

    public static function ListCountry()
    {
        return self::request_public("/country");
    }

    public static function ListState($country_id)
    {
        return self::request_public("/country/{$country_id}/state");
    }

    public static function ListCity($country_id, $state_id)
    {
        return self::request_public("/country/{$country_id}/state/{$state_id}/city");
    }

    public static function ListCurrency()
    {
        return self::request_public("/currency");
    }

    public static function ListCurrencyNetwork($asset)
    {
        return self::request_public("/currency/{$asset}");
    }

    public static function ListFAQ()
    {
        return self::request_public("/faq");
    }

    public static function ListProduct()
    {
        return self::request_public("/product");
    }

    public static function ListContact($data)
    {
        return self::request_public("/contact", $data, 'POST');
    }

    public static function ListPixType()
    {
        return self::request_public("/pixtype");
    }

    public static function ListAffiliateMaterial()
    {
        return self::request_public("/affiliate");
    }

    public static function ListServiceStatus()
    {
        return self::request_public("/status");
    }

    public static function GetCoupon($coupon)
    {
        return self::request_public("/coupon/{$coupon}");
    }

    public static function ListFee()
    {
        return self::request_public("/fee");
    }
    
    public static function GetBuyWalletType()
    {
        return self::request_public("/buy/wallet/type");
    }
    
    public static function GetBuyPaymentCategory()
    {
        return self::request_public("/buy/payment/category");
    }
    
    public static function GetBuyPaymentCategoryType($code)
    {
        return self::request_public("/buy/payment/category/{$code}");
    }
    
    public static function GetReward()
    {
        return self::request_public("/reward");
    }
    
    public static function GetPaymentLink($hash)
    {
        return self::request_public("/merchant/paymentlink/{$hash}");
    }
    
    public static function CreatePaymentLinkByHash($hash, $data)
    {
        return self::request_public("/merchant/paymentlink/{$hash}", $data, 'POST');
    }
    
    public static function CreateCheckout($data)
    {
        return self::request_public("/merchant/checkout", $data, 'POST');
    }

    public static function GetCheckoutInfo($id)
    {
        return self::request_public("/merchant/checkout/{$id}");
    }


    // Private

    public static function GetAccountInfo()
    {
        return self::request_private("/account");
    }
    
    public static function ChangeAccountInfo($data)
    {
        return self::request_private("/account", $data, 'POST');
    }
    
    public static function GetAccountLocality()
    {
        return self::request_private("/account/locality");
    }
    
    public static function ChangeAccountLocality($data)
    {
        return self::request_private("/account/locality", $data, 'POST');
    }
    
    public static function ChangeAccountContact($data)
    {
        return self::request_private("/account/contact", $data, 'POST');
    }

    public static function ListAccountHistory($data)
    {
        return self::request_private("/account/history", $data);
    }

    public static function ListAccountNotification($data)
    {
        return self::request_private("/account/notification", $data);
    }

    public static function ReadAllAccountNotification()
    {
        return self::request_private("/account/notification", null, 'PUT');
    }

    public static function ReadAccountNotificationById($id)
    {
        return self::request_private("/account/notification/{$id}", null, 'PUT');
    }

    public static function GetOrderLimit()
    {
        return self::request_private("/account/services/order");
    }

    public static function GetMerchantLimit()
    {
        return self::request_private("/account/services/merchant");
    }

    public static function GetBuyLimit()
    {
        return self::request_private("/account/services/buy");
    }

    public static function ListAffiliateInfo()
    {
        return self::request_private("/account/affiliates");
    }

    public static function ListRecipient()
    {
        return self::request_private("/account/recipients");
    }
    
    public static function CreateRecipient($data)
    {
        return self::request_private("/account/recipients", $data, 'POST');
    }

    public static function GetRecipientInfo($id)
    {
        return self::request_private("/account/recipients/{$id}");
    }

    public static function UpdateRecipientInfo($id, $data)
    {
        return self::request_private("/account/recipients/{$id}", $data, 'POST');
    }

    public static function DeleteRecipient($id)
    {
        return self::request_private("/account/recipients/{$id}", null, 'DELETE');
    }

    public static function GetLevelLimit()
    {
        return self::request_private("/account/limit");
    }

    public static function GetAccountFee()
    {
        return self::request_private("/account/fee");
    }

    public static function GetAccountReward()
    {
        return self::request_private("/account/reward");
    }

    public static function ListWallet($data)
    {
        return self::request_private("/wallet", $data);
    }

    public static function ListWalletExtract($asset, $data)
    {
        return self::request_private("/wallet/{$asset}/extract", $data);
    }

    public static function ListWithdraw($data)
    {
        return self::request_private("/wallet/withdraw", $data);
    }

    public static function GetWithdrawInfo($id)
    {
        return self::request_private("/wallet/withdraw/{$id}");
    }    

    public static function GetWithdrawReceipt($id)
    {
        return self::request_private("/wallet/withdraw/{$id}/receipt");
    }

    public static function GetWithdrawReceiptDownload($id, $filename)
    {
        return self::request_private("/wallet/withdraw/{$id}/receipt/{$filename}");
    }
    
    public static function CreateWithdraw($data)
    {
        return self::request_private("/wallet/withdraw", $data, 'POST');
    }
    
    public static function ListOrder($data)
    {
        return self::request_private("/order", $data);
    }
    
    public static function GetOrderInfo($id)
    {
        return self::request_private("/order/{$id}");
    }
    
    public static function ListOrderReceipt($data)
    {
        return self::request_private("/order/receipt", $data);
    }
    
    public static function GetOrderReceiptDownload($filename)
    {
        return self::request_private("/order/receipt/{$filename}");
    }

    public static function CreateOrder($data)
    {
        return self::request_private("/order", $data, 'POST');
    }
    
    public static function ListBuy($data)
    {
        return self::request_private("/buy", $data);
    }
    
    public static function GetBuyInfo($id)
    {
        return self::request_private("/buy/{$id}");
    }
    
    public static function GerNewQRCodeBuy($id)
    {
        return self::request_private("/buy/{$id}/payment_method/reset");
    }
    
    public static function GetBuyPrivateKey($id, $data)
    {
        return self::request_private("/buy/{$id}/private", $data, 'POST');
    }
    
    public static function CreateBuy($data)
    {
        return self::request_private("/buy", $data, 'POST');
    }

    public static function CreateMerchant($data)
    {
        return self::request_private("/merchant", $data, 'POST');
    }

    public static function ListMerchant($data)
    {
        return self::request_private("/merchant", $data);
    }
    
    public static function GetMerchantInfo($id)
    {
        return self::request_private("/merchant/{$id}");
    }
    
    public static function ListPaymentLink($data)
    {
        return self::request_private("/merchant/paymentlink", $data);
    }
    
    public static function DeletePaymentLink($id)
    {
        return self::request_private("/merchant/paymentlink/{$id}", null, 'DELETE');
    }

    public static function CreatePaymentLink($data)
    {
        return self::request_private("/merchant/paymentlink", $data, 'POST');
    }
}