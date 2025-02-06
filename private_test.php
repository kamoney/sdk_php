<?php
require_once __DIR__ . '/src/Kamoney.class.php';

Kamoney::$public_key = '*****';
Kamoney::$secret_key = '*****';

// // Account

// $result = Kamoney::GetAccountInfo();
// var_dump($result);

// $data = [
//     "name" => "Igor Silva",
//     "personal_id" => "08832125623",
//     "date_of_birth" => "1995-02-05"
// ];

// $result = Kamoney::ChangeAccountInfo($data);
// var_dump($result);

// $result = Kamoney::GetAccountLocality();
// var_dump($result);

// $data = [
//     "zipcode" => "35430232",
//     "street" => "Rua Dom Bosco",
//     "number" => 490,
//     "complement" => 201,
//     "neighborhood" => "Palmeiras",
//     "city" => 5
// ];

// $result = Kamoney::ChangeAccountLocality($data);
// var_dump($result);

// $data = [
//     "whatsapp" => "(31)986721862",
//     "telegram" => "@igoras",
// ];

// $result = Kamoney::ChangeAccountContact($data);

// $data = [
//     "page" => 1,
//     "search" => "",
//     "date" => ""
// ];

// $result = Kamoney::ListAccountHistory($data);

// $data = [
//     "page" => 1,
// ];

// $result = Kamoney::ListAccountNotification($data);

// $result = Kamoney::ReadAllAccountNotification();
// $result = Kamoney::ReadAccountNotificationById(2937);
// $result = Kamoney::GetOrderLimit();
// $result = Kamoney::GetMerchantLimit();
// $result = Kamoney::GetBuyLimit();
// $result = Kamoney::ListAffiliateInfo();
// $result = Kamoney::ListRecipient();

// $data = [
//     "type" => 1,
//     "account_type"=>  "CC",
//     "bank" => 1,
//     "agency" => "0001",
//     "account_number" => "1234-3",
//     "owner" => "Igor Silva",
//     "personal_id" => "08832125623",
//     "description" => "string"
// ];
// $result = Kamoney::CreateRecipient($data);

// $data = [
//     "account_type"=>  "CC",
//     "bank" => 1,
//     "agency" => "0156",
//     "account_number" => "1234-3",
//     "owner" => "Igor Silva",
//     "personal_id" => "08832125623",
//     "description" => "string"
// ];
// $result = Kamoney::UpdateRecipientInfo(2912, $data);

// $result = Kamoney::DeleteRecipient(2912);
// $result = Kamoney::GetLevelLimit();
// $result = Kamoney::GetAccountFee();
// $result = Kamoney::GetAccountReward();

// $data = [
//     "page" => 1,
// ];
// $result = Kamoney::ListWallet($data);

// $data = [
//     "page" => 1,
//     "begin" => "",
//     "end" => "",
//     "search" => "",
//     "type" => "1"
// ];
// $result = Kamoney::ListWalletExtract("R$", $data);

// $data = [
//     "page" => 1,
//     "begin" => "",
//     "end" => "",
//     "search" => "",
//     "asset" => "",
//     "status" => ""
// ];
// $result = Kamoney::ListWithdraw($data);

// $result = Kamoney::GetWithdrawInfo("rMflp74eLrV18EwGHlBnPERagSoeEuSurrMMqKnw61q");
// $result = Kamoney::GetWithdrawReceipt("");
// $result = Kamoney::GetWithdrawReceiptDownload("", "");

// $data = [
//     "asset" => "R$",
//     "key" => "31986721862",
//     "type" => "Celular",
//     "amount" => 100,
//     "tfa" => "1565"
// ];
// $result = Kamoney::CreateWithdraw($data);

// $data = [
//     "page" => 1,
//     "begin" => "",
//     "end" => "",
//     "search" => "",
//     "asset" => "",
//     "status" => ""
// ];
// $result = Kamoney::ListOrder($data);

// $result = Kamoney::GetOrderInfo("OKM87256756");

// $data = [
//     "page" => 1,
//     "begin" => "",
//     "end" => "",
//     "search" => "",
// ];
// $result = Kamoney::ListOrderReceipt($data);

// $result = Kamoney::GetOrderReceiptDownload("");

// $data = [
//     "asset" => "BTC",
//     "network" => "BTC",
//     "pix" => [
//         [
//             "type" => "CPF",
//             "key" => "08832125623",
//             "amount" => 100
//         ],
//     ]
// ];
// $result = Kamoney::CreateOrder($data);

// $data = [
//     "page" => 1,
//     "begin" => "",
//     "end" => "",
//     "search" => "",
//     "status" => ""
// ];
// $result = Kamoney::ListBuy($data);

// $result = Kamoney::GetBuyInfo("BKM27570653");

// $result = Kamoney::GerNewQRCodeBuy("BKM27570653");

// $data = [
//     "password" => "",
//     "tfa" => ""
// ];
// $result = Kamoney::GetBuyPrivateKey("BKM27570653", $data);

// $data = [
//     "asset" => "BTC",
//     "network" => "BTC",
//     "amount" => 150,
//     "wallet_type" => 1,
//     "payment_method" => "pix",
//     "addr" => "oajsdihjwaoidaw"
// ];
// $result = Kamoney::CreateBuy($data);

// $asset = 'BTC';
// $network = 'BTC';
// $amount = 10; // in R$
// $email_client = "claudecigoularte@gmail.com";
// $url_callback = "https://webhook.site/fba07365-0284-4ee1-a122-893d921204e9";

// $data = [
//     "asset" => $asset,
//     "network" => $network,
//     "amount" => $amount,
//     "email" => $email,
//     "callback" => $callback,
// ];

// $result = Kamoney::CreateMerchant($data);

// $data = [
//     "page" => 1,
//     "begin" => "",
//     "end" => "",
//     "search" => "",
//     "status" => ""
// ];
// $result = Kamoney::ListMerchant($data);

// $result = Kamoney::GetMerchantInfo("gisSJTtiNlIX2hwQGDDuBDGaABBCOBye07DK7Xlo4gZ");

// $data = [
//     "page" => 1,
//     "begin" => "",
//     "end" => "",
//     "search" => "",
// ];
// $result = Kamoney::ListPaymentLink($data);

// $result = Kamoney::DeletePaymentLink(844);

// $data = [
//     "label" => "Label test",
//     "amount" => 151,
// ];

// $result = Kamoney::CreatePaymentLink($data);


var_dump($result);
?>