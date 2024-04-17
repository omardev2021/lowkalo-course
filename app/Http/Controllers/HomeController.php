<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function purchase(Request $request)

    {

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',

        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make('123456778');
        $user->save();


        return  $this->payment($request);
    }


    public function payment(Request $request)
    {


        $url = "https://www.lowkalo.com/status-guest";

        $idorder = 'PHP_' . rand(1, 1000); //Customer Order ID

        $terminalId = "lowkalo"; // Will be provided by URWAY
        $password = "URWAY_KALO@2695"; // Will be provided by URWAY
        $merchant_key = "6b1a1dc0ecaccc57dd93db0ca38a5fddadfa2c39036ce69c6cb0f103d70321ad"; // Will be provided by URWAY
        $currencycode = "SAR";
        $amount = 299;
        $txn_details = $idorder . '|' . $terminalId . '|' . $password . '|' . $merchant_key . '|' . $amount . '|' . $currencycode;
        $hash = hash('sha256', $txn_details);

//        $terminalId = "lowkalo"; // Will be provided by URWAY
//        $password = "lowkalo@7867"; // Will be provided by URWAY
//        $merchant_key = "fa58bd331c779c328fb9618e383fc5968205481ca340ae9688f012919bbbf0bd"; // Will be provided by URWAY
//        $currencycode = "SAR";
//        $amount = $total;
//        $txn_details = $idorder . '|' . $terminalId . '|' . $password . '|' . $merchant_key . '|' . $amount . '|' . $currencycode;
//        $hash = hash('sha256', $txn_details);

// $myurl = "https://www.lowkalo.com/status-guest?name=".$user->name."&uremail=".$user->email."&urid=".$id."&phone=".$user->phone."&urtotal=".$total;

        $name = str_replace(' ', '', $request->name);
        $email = str_replace(' ', '', $request->email);
        $phone = str_replace(' ', '', $request->phone);
//        $myurl = "https://www.lowkalo.com/status-guest?name=$name&uremail=$email&urid=$id&phone=$phone&urtotal=$total";
$myurl = "https://www.lowkalo.com/status-guest";
        $fields = array(
            'trackid' => '900',
            'terminalId' => $terminalId,
            'customerEmail' => $email,
            'action' => "1",  // action is always 1
            'merchantIp' => $request->ip(),
            'password' => $password,
            'currency' => $currencycode,
            'country' => "SA",
            'amount' => $amount,
            "udf1"              => "Test1",
            "udf2"              => $myurl, //Response page URL
            "udf3"              => "ar",
            "udf4"              => "",
            "udf5"              => "Test5",
            'requestHash' => $hash  //generated Hash
        );
        $data = json_encode($fields);

//        $ch = curl_init('https://payments-dev.urway-tech.com/URWAYPGService/transaction/jsonProcess/JSONrequest');
        $ch = curl_init('https://payments.urway-tech.com/URWAYPGService/transaction/jsonProcess/JSONrequest');

        // Will be provided by URWAY
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $server_output = curl_exec($ch);
        //close connection
        curl_close($ch);
        $result = json_decode($server_output);
        if (!empty($result->payid) && !empty($result->targetUrl)) {
            $url = $result->targetUrl . '?paymentid=' .  $result->payid;
            //    return $url;


            return redirect($url);
        } else {
            return redirect()->back();
            // print_r($result);
            // echo "<br/><br/>";
            // print_r($data);
            // die();
        }
    }

}
