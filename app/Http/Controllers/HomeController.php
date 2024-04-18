<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


use Mailjet\Resources;
use Mailjet\Client;

class HomeController extends Controller
{


    public function index() {
        return view('welcome');
    }

    public function purchase(Request $request)

    {

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',

        ]);

        $user = new Customer();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();


        return    $this->payment($request,$user);




    }


    public function payment(Request $request,$user)
    {




        $idorder = 'PHP_' . rand(1, 1000); //Customer Order ID
// production
//        $terminalId = "lowkalo"; // Will be provided by URWAY
//        $password = "URWAY_KALO@2695"; // Will be provided by URWAY
//        $merchant_key = "6b1a1dc0ecaccc57dd93db0ca38a5fddadfa2c39036ce69c6cb0f103d70321ad"; // Will be provided by URWAY
//        $currencycode = "SAR";
//        $amount = 299;
//        $txn_details = $idorder . '|' . $terminalId . '|' . $password . '|' . $merchant_key . '|' . $amount . '|' . $currencycode;
//        $hash = hash('sha256', $txn_details);

//test
        $terminalId = "lowkalo"; // Will be provided by URWAY
        $password = "lowkalo@7867"; // Will be provided by URWAY
        $merchant_key = "fa58bd331c779c328fb9618e383fc5968205481ca340ae9688f012919bbbf0bd"; // Will be provided by URWAY
        $currencycode = "SAR";
        $amount = 299;
        $txn_details = $idorder . '|' . $terminalId . '|' . $password . '|' . $merchant_key . '|' . $amount . '|' . $currencycode;
        $hash = hash('sha256', $txn_details);


        $name = str_replace(' ', '', $user->name);
        $email = str_replace(' ', '', $user->email);
        $phone = str_replace(' ', '', $user->phone);
$myurl = "https://course.lowkalo.com/payment-status?name=$name&uremail=$email&urid=$user->id&phone=$phone";
        $fields = array(
            'trackid' => $idorder,
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
//        $ch = curl_init('https://payments.urway-tech.com/URWAYPGService/transaction/jsonProcess/JSONrequest');

        $ch = curl_init('https://payments-dev.urway-tech.com/URWAYPGService/transaction/jsonProcess/JSONrequest');

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
//        dd($result);
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


    public function payment_status() {



        if (request('Result') == 'Successful' && request('ResponseCode') == 000) {

            $email = request('uremail');
            $name = request('name');
            $phone = request('phone');

            $exist = User::where('email',$email)->first();

            if ($exist) {
                return view('status.success');
            }

            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->phone = $phone;
            $user->password = Hash::make('09393393003');
            $user->save();

            $this->send_email_helper($email);

            return view('status.success');

        } else  if (request('Result') == 'Failure') {
            return view('status.failure');
        } else {
            abort(404);
        }


    }


    private function send_email_helper($email)
    {

        $mj = new Client('ee1e9da8ced6f41ef57b122fbaace13a', 'e87e6ba196ac29bcc483ce1bd5497024');
        $body = [
            'FromEmail' => "lowkalo.info@gmail.com",
            'FromName' => "Lowkalo",
            'Subject' => "تاكيد عملية التسجيل",
            'Text-part' => "تمت عملية الدفع بنجاح",
            'Html-part' => "<h3>شكرا لك ، تمت عملية الدفع بنجاح سوف يتم ارسال ايميل بالبريد الالكتروني الخاص بك فور اطلاق الكورس</h3>",
            'Recipients' => [
                [
                    'Email' => $email,
                ],
            ],
        ];

        // Send the email
        $response = $mj->post(Resources::$Email, ['body' => $body]);

        // Check if the email sending was successful
        if (!$response->success()) {
            throw new \Exception('Email sending failed');
        }
    }

}
