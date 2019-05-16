<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifications\InboxMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Admin;

class ContactController extends Controller
{
	public function mailToAdmin(ContactFormRequest $message, Admin $admin) {
		$admin->notify(new InboxMessage($message));

		return response()->json(null, 200);
	}
}
