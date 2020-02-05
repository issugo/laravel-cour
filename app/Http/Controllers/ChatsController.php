<?php

namespace App\Http\Controllers;

use App\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class ChatsController extends Controller
{
    /**
     * ChatsController constructor.
     * Force le besoin de connection
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Affiche le chat
     *
     * @return View
     */
    public function index()
    {
        return view('chat/chat');
    }

    /**
     * Fetch tout les messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    /**
     * Rentre les messages dans la BDD
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Envoyé!'];
    }
}
