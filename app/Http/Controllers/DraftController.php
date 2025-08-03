<?php

namespace App\Http\Controllers;

use App\Http\Requests\Draft\EditDraftRequest;
use App\Http\Resources\Draft\DraftResource;
use App\Http\Resources\Draft\ManyDraftsResource;
use App\Models\Draft;
use App\Repositories\DraftRepository;
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

    public function edit(EditDraftRequest $request): Response
    {
        $draft = DraftRepository::getById($request->id, $this->user()['id']);
        $data = $request->validated();
        unset($data['id']);
        $draft->update($data);

        return response(['status' => true]);
    }

    public function getList(): Response
    {
        $drafts = DraftRepository::getByUser($this->user()['id']);
        $drafts = ManyDraftsResource::collection($drafts);

        return response(['status' => true, 'drafts' => $drafts]);
    }

    public function get(int $draft): Response
    {
        $draft = DraftRepository::getById($draft, $this->user()['id']);
        $draft = new DraftResource($draft);

        return response(['status' => true, 'draft' => $draft]);
    }

    public function delete(int $draft): Response
    {
        $draft = DraftRepository::getById($draft, $this->user()['id']);
        $draft->delete();

        return response(['status' => true]);
    }
}
