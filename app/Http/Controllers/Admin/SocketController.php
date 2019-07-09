<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Creativeorange\Gravatar\Gravatar;
use App\Models\{Conversation, Message};
use App\Http\Requests\Chat\ChatMessageSentRequest;
use App\Events\{PrivateMessageSent, PublicMessageSent};


class SocketController extends Controller
{

    

   
}
