<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24.01.2020
 * Time: 19:13
 */

namespace App\Http\Controllers;


use App\Http\Requests\StoreRecordRequest;
use App\Record;
use App\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.users', ['users' => User::all()]);
    }

    public function userRecords(User $user)
    {
        return view('admin.records', ['user' => $user,'records' => $user->records]);
    }

    public function create(User $user)
    {
        return view('records.create', ['user' => $user]);
    }

    public function store(User $user, StoreRecordRequest $request)
    {
        $record = new Record();
        $record->title = $request->all()['title'];
        $record->record = $request->all()['record'];
        $record->user_id = $user->id;
        $record->save();

        return redirect("/admin/users/{$user->id}/records");
    }
}