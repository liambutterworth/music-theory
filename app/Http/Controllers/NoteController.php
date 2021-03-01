<?php

namespace App\Http\Controllers;

use App\Domain\Theory\Services\NoteService;
use App\Domain\Theory\Data\NoteData;
use App\Http\Resources\NoteResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NoteController extends Controller
{
    protected NoteService $note;
    protected Request $request;

    public function __construct(NoteService $note, Request $request)
    {
        $this->note = $note;
        $this->request = $request;
    }

    public function index(): ResourceCollection
    {
        $notes = $this->note->all();

        return NoteResource::collection($notes);
    }

    public function key(int $id): ResourceCollection
    {
        $notes = $this->note->getKey($id);

        return NoteResource::collection($notes);
    }

    public function show(int $id): NoteData
    {
        return $this->note->find($id);
    }
}
