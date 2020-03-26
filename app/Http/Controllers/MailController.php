<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Feedback;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    protected $email;

    public function send(Request $request)
    {   
        $this->email = $request->email;

        switch ($request->sendTo ){
            case 0:
                $data = array('name' => $request->name, 'phone' => $request->phone, 'mess' => $request->message);
                Mail::send('mail', $data, function ($message) {
                    $message->to($this->email, $this->email)->subject('Форма обратной связи');
                    $message->from('formtoenvy@yandex.ru', 'Алексей Никитин');
                });
                return $data;
            break;
            case 1:
                $mess = "Имя: " . $request->name . "\r\n";
                $mess .= "Телефон: " . $request->phone . "\r\n";
                $mess .= "Сообщение: " . $request->message;
                $date = date('U');
                $newFile = Storage::put("/textForm/".$date.'.txt', $mess);
                return $mess;
            break;
            case 2:
                Feedback::create([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'message' => $request->message
                    ]);
            break;  
        }      
    }
}
