<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Libraries\cryptoapiphp\Cryptobox;

class crypto extends Controller
{
    // Testing on Crypto Payment Gateway for CryptoCurrencies.
    
    public function singlecurrency(){
	    $options = array( 
	        "public_key"  => "4992AAPQSIOBitcoin77BTCPUBdiH30lYB5izd5Zjl7wThbJaX",         // place your public key from gourl.io
	        "private_key" => "4992AAPQSIOBitcoin77BTCPRVhAEmgfylZ4ZUJUAyNuoZBFnq",         // place your private key from gourl.io
	        "webdev_key"  => "",        // optional, gourl affiliate program key
	        "orderID"     => "product1", // few your users can have the same orderID but combination 'orderID'+'userID' should be unique
	        "userID"      => "",        // optional; place your registered user id here (user1, user2, etc)
	                // for example, on premium page you can use for all visitors: orderID="premium" and userID="" (empty) 
	                // when userID value is empty - system will autogenerate unique identifier for every user and save it in cookies 
	        "userFormat"  => "COOKIE",   // save your user identifier userID in cookies. Available: COOKIE, SESSION, IPADDRESS, MANUAL
	        "amount"      => 0,         // amount in cryptocurrency or in USD below
	        "amountUSD"   => 2,         // price is 2 USD; it will convert to cryptocoins amount, using Live Exchange Rates
	                                    // For convert fiat currencies Euro/GBP/etc. to USD, use function convert_currency_live()
	        "period"      => "24 HOUR",  // payment valid period, after 1 day user need to pay again
	        "iframeID"    => "",         // optional; when iframeID value is empty - system will autogenerate iframe html payment box id
	        "language"    => "EN"       // text on EN - english, FR - french, please contact us and we can add your language
	        );  
	        
	    // Initialise Bitcoin Payment Class 
	    $box = new Cryptobox ($options);
	    $box1 = new Cryptobox ($options);
	
	    // Display payment box with custom width = 560 px and big qr code / or successful result
	    $payment_box = $box->display_cryptobox(true, 560, 230, "border-radius:15px;border:1px solid #eee;padding:3px 6px;margin:10px;",
	                    "display:inline-block;max-width:580px;padding:15px 20px;border:1px solid #eee;margin:7px;line-height:25px;"); 
	
	    // Log
	    $message = "";
	    
	    // A. Process Received Payment
	    if ($box->is_paid()) 
	    {
	        $message .= "A. User will see this message during 24 hours after payment has been made!";
	        
	        $message .= "<br>".$box1->amount_paid()." ".$box1->coin_label()."  received<br>";
	        
	        // Your code here to handle a successful cryptocoin payment/captcha verification
	        // For example, give user 24 hour access to your member pages
	        // ...
	    
	        // Please use IPN (instant payment notification) function cryptobox_new_payment() for update db records, etc
	        // Function cryptobox_new_payment($paymentID = 0, $payment_details = array(), $box_status = "") called every time 
	        // when a new payment from any user is received.
	        // IPN description: https://gourl.io/api-php.html#ipn 
	    }  
	    else $message .= "The payment has not been made yet";
	
	    
	    // B. Optional - One-time Process Received Payment
	    if ($box1->is_paid() && !$box1->is_processed()) 
	    {
	        $message .= "B. User will see this message one time after payment has been made!";  
	    
	        // Your code here - user see successful payment result
	        // ...
	
	        // Also you can use $box1->is_confirmed() - return true if payment confirmed 
	        // Average transaction confirmation time - 10-20min for 6 confirmations  
	        
	        // Set Payment Status to Processed
	        $box1->set_status_processed(); 
	        
	        // Optional, cryptobox_reset() will delete cookies/sessions with userID and 
	        // new cryptobox with new payment amount will be show after page reload.
	        // Cryptobox will recognize user as a new one with new generated userID
	        // $box1->cryptobox_reset(); 
	
	
	        // ...
	        // Also you can use IPN function cryptobox_new_payment($paymentID = 0, $payment_details = array(), $box_status = "") 
	        // for send confirmation email, update database, update user membership, etc.
	        // You need to modify file - cryptobox.newpayment.php, read more - https://gourl.io/api-php.html#ipn
	        // ...
	
	    }
	    
	    return view('crypto.singlecurrency')->with('payment_box', $payment_box)->with('message',$message);
	}
	
	public function multicurrency(){
		/**** CONFIGURATION VARIABLES ****/
		
		$userID         = "";               // place your registered userID or md5(userID) here (user1, user7, uo43DC, etc).
		// if userID is empty, it will autogenerate userID and save in cookies
		$userFormat     = "COOKIE";         // save userID in cookies (or you can use IPADDRESS, SESSION)
		$orderID        = "invoice000383";  // invoice number - 000383
		$amountUSD      = 10.21;             // invoice amount - 2.21 USD
		// for convert fiat currencies Euro/GBP/etc. to USD, use function convert_currency_live()
		$period         = "NOEXPIRY";       // one time payment, not expiry
		$def_language   = "en";             // default Payment Box Language
		$def_payment    = "bitcoin";        // default Coin in Payment Box
		
		// List of coins that you accept for payments
		// For example, for accept payments in bitcoins, dogecoins use - $available_payments = array('bitcoin', 'dogecoin');
		//$available_payments = array('bitcoin', 'litecoin', 'paycoin', 'dogecoin', 'dash', 'speedcoin', 'reddcoin', 'potcoin',
			//	'feathercoin', 'vertcoin', 'vericoin', 'peercoin', 'monetaryunit');
		$available_payments = array('bitcoin');
		
		
		// Goto  https://gourl.io/info/memberarea/My_Account.html
		// You need to create record for each your coin and get private/public keys
		// Place Public/Private keys for all your available coins from $available_payments
		
		$all_keys = array(
				"bitcoin"  => array("public_key" => "4992AAPQSIOBitcoin77BTCPUBdiH30lYB5izd5Zjl7wThbJaX",  "private_key" => "4992AAPQSIOBitcoin77BTCPRVhAEmgfylZ4ZUJUAyNuoZBFnq"),
				//"dogecoin" => array("public_key" => "-your public key for Dogecoin box-", "private_key" => "-private key for Dogecoin box-")
				// etc.
		);
		
		/********************************/
		
		
		// Re-test - that all keys for $available_payments added in $all_keys
		if (!in_array($def_payment, $available_payments)) $available_payments[] = $def_payment;
		foreach($available_payments as $v)
		{
			if (!isset($all_keys[$v]["public_key"]) || !isset($all_keys[$v]["private_key"]))
				die("Please add your public/private keys for '$v' in \$all_keys variable");
				elseif (!strpos($all_keys[$v]["public_key"], "PUB"))  die("Invalid public key for '$v' in \$all_keys variable");
				elseif (!strpos($all_keys[$v]["private_key"], "PRV")) die("Invalid private key for '$v' in \$all_keys variable");
				//elseif (strpos(CRYPTOBOX_PRIVATE_KEYS, $all_keys[$v]["private_key"]) === false)
				//die("Please add your private key for '$v' in variable \$cryptobox_private_keys, file cryptobox.config.php.");
		}
		
		// Optional - Language selection list for payment box (html code)
		//$languages_list = display_language_box($def_language);
		
		// Optional - Coin selection list (html code)
		//$coins_list = display_currency_box($available_payments, $def_payment, $def_language);
		$coinName = 'bitcoin'; // current selected coin by user
		
		// Current Coin public/private keys
		$public_key  = $all_keys[$coinName]["public_key"];
		$private_key = $all_keys[$coinName]["private_key"];
		
		/** PAYMENT BOX **/
		$options = array(
				"public_key"  => $public_key,   // your public key from gourl.io
				"private_key" => $private_key,  // your private key from gourl.io
				"webdev_key"  => "",            // optional, gourl affiliate key
				"orderID"     => $orderID,      // order id or product name
				"userID"      => $userID,       // unique identifier for every user
				"userFormat"  => $userFormat,   // save userID in COOKIE, IPADDRESS or SESSION
				"amount"      => 0,             // product price in coins OR in USD below
				"amountUSD"   => $amountUSD,    // we use product price in USD
				"period"      => $period,       // payment valid period
				"language"    => $def_language  // text on EN - english, FR - french, etc
		);
		
		// Initialise Payment Class
		$box = new Cryptobox ($options);
		
		// coin name
		$coinName = $box->coin_name();
		
		// Successful Cryptocoin Payment received
		if ($box->is_paid())
		{
			// Optional - use IPN (instant payment notification) function cryptobox_new_payment() for update db records, etc
			// IPN description: https://gourl.io/api-php.html#ipn
		
			if (!$box->is_confirmed()) {
				$message =  "Thank you for payment (payment #".$box->payment_id()."). Awaiting transaction/payment confirmation";
			}
			else
			{ // payment confirmed (6+ confirmations)
		
				// one time action
				if (!$box->is_processed())
				{
					// One time action after payment has been made/confirmed
					 
					$message = "Thank you for order (order #".$orderID.", payment #".$box->payment_id()."). We will send soon";
		
					// Set Payment Status to Processed
					$box->set_status_processed();
				}
				else $message = "Thank you. Your order is in process"; // General message
			}
		}
		else $message = "This invoice has not been paid yet";
		
		
		
		// ...
		// Also you can use IPN function cryptobox_new_payment($paymentID = 0, $payment_details = array(), $box_status = "")
		// for send confirmation email, update database, update user membership, etc.
		// You need to modify file - cryptobox.newpayment.php, read more - https://gourl.io/api-php.html#ipn
		// ...
		
		return view('crypto.multicurrency')
			//->with('languages_list', $languages_list)
			->with('message',$message)
			->with('box',$box);
	}
}
