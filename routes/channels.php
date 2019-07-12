<?php

use App\Models\Conversation;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('App.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('chart', function ($user) {
    return [
        'name' => $user->name,
    ];
});

Broadcast::channel('privateMessage.{conversation}', function($user, $conversation){
	$conversation = Conversation::findOrFail($conversation);

	return $conversation->participants->contains($user);
});

Broadcast::channel('presentUsers', function($user){
	
	return ['name' => $user->name];
});

Broadcast::channel('newConversationCreated.{id}', function($user, $id){
	
	return (int) $user->id === (int) $id;
});