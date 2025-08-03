<?php

namespace App\Http\Controllers;

use App\Models\Draft;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DraftController extends Controller
{
    public function new(): Response
    {
        $id = Draft::create([
            'user_id' => $this->user()['id']
        ])->id;

        return response(['status' => true, 'id' => $id]);
    }
}
