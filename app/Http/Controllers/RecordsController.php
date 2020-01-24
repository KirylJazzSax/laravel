<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24.01.2020
 * Time: 14:07
 */

namespace App\Http\Controllers;


use App\Http\Requests\StoreRecordRequest;
use App\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecordsController extends Controller
{
    public function index()
    {
        return view('records.records', ['records' => Auth::user()->records]);
    }

    public function create()
    {
        return view('records.create');
    }

    public function store(StoreRecordRequest $request)
    {
        $record = new Record();
        $record->title = $request->all()['title'];
        $record->record = $request->all()['record'];
        $record->user_id = $request->user()->id;
        $record->save();

        return redirect('/records');
    }

    public function edit(Record $record)
    {
        return view('records.edit', ['record' => $record]);
    }

    public function update(Record $record, StoreRecordRequest $request)
    {
        $record->title = $request->all()['title'];
        $record->record = $request->all()['record'];

        $record->save();

        if ($request->user()->isAdmin()) {
            return redirect("/admin/users/{$record->user->id}/records");
        }
        return redirect('/records');
    }

    public function destroy(Record $record)
    {
        $userId = $record->user->id;
        $record->delete();
        return redirect("/admin/users/{$userId}/records");
    }
}