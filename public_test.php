<?php
require_once __DIR__ . '/src/Kamoney.class.php';


// // Services
// $result = Kamoney::GetStatusOrder();
// $result = Kamoney::GetStatusMerchant();
// $result = Kamoney::GetStatusBuy();

// // Account
// $data = [
//     'email' => "*******v@gmail.com",
//     'affiliate_code' => "",
//     'terms' => true,
// ];
// $result = Kamoney::CreateAccount($data);
// var_dump($result);

// $data = [
//     'email' => "*******v@gmail.com",
//     'code' => "113123",
//     'password' => 'm1nh@senh@',
// ];
// $result = Kamoney::ActiveAccount($data);
// var_dump($result);

// $data = [
//     'email' => "*******v@gmail.com",
// ];
// $result = Kamoney::AccountRecovery($data);
// var_dump($result);

// $data = [
//     'email' => "*******v@gmail.com",
//     'code' => "403877",
//     'password' => 'm1nh@senh@2',
// ];
// $result = Kamoney::AccountRecoveryConfirm($data);
// var_dump($result);

// // Utils
//  $result = Kamoney::ListBank();
//  $result = Kamoney::GetPublicSystemInfo();
//  $result = Kamoney::ListNotification();
//  $result = Kamoney::ListCountry();
 
//  $country_id = 1;
//  $result = Kamoney::ListState($country_id);
 
// $country_id = 1;
// $state_id = 27;
// $result = Kamoney::ListCity($country_id, $state_id);

// $result = Kamoney::ListCurrency();

// $asset = "BTC";
// $result = Kamoney::ListCurrencyNetwork($asset);

// $result = Kamoney::ListFAQ();
// $result = Kamoney::ListProduct();

// $data = [
//     "name" => "IgorSilva",
//     "email" => "*******t@gmail.com",
//     "subject" => "TestSDK",
//     "message" => "Teste do sdk php"
// ];
// $result = Kamoney::ListContact($data);

// $result = Kamoney::ListPixType();
// $result = Kamoney::ListAffiliateMaterial();
// $result = Kamoney::ListServiceStatus();

// $coupon = "asdasd";
// $result = Kamoney::GetCoupon($coupon);
// $result = Kamoney::ListFee();
// $result = Kamoney::GetBuyWalletType();
// $result = Kamoney::GetBuyPaymentCategory();

// $code = "31123asdas2";
// $result = Kamoney::GetBuyPaymentCategoryType($code);
// $result = Kamoney::GetReward();

// // PaymentLink
// $hash = "asdwda";
// $result = Kamoney::GetPaymentLink($hash);

// $hash = "asdwda";
// $data = [
//     "asset" => "BTC",
//     "network" => "BTC",
//     "email" => "*******t@gmail.com",
//     "name" => "Igor Silva"
// ];
// $result = Kamoney::CreatePaymentLink($hash, $data);

// // Checkout
// $data = [
//     "merchant_id" => "asd",
//     "amount" => 100,
//     "email" => "*******t@gmail.com",
// ];

// $result = Kamoney::CreateCheckout($data);

// $id = 123;
// $result = Kamoney::GetCheckoutInfo($id);
// var_dump($result);

?>