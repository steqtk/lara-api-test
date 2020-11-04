<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message as MessageRequest;
use App\Models\Message as  MessageModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMail;

class Message extends Controller
{
    /**
     * @param MessageRequest $request
     * @return mixed
     */
    public function send(MessageRequest $request){

        $message = new MessageModel([
                'message_content' => $request->get('message_content'),
            ]
        );

        if ($message->save()) {

            Mail::to(env('NOTIFY_EMAIL'))->send(new NotifyMail());

            if (Mail::failures()) {
                return response()->json(['success' => false], 406);
            } else {
                return response()->json([
                    'success' => true,
                    'message_content' => $message->message_content],
                    201);
            }
        }
    }
}
