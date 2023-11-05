<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['fullname','gender','email','postcode','address','building_name','opinion']);
        $request->session()->put('contact', $contact);
        return view('confirm',compact('contact'));
    }
    public function store(ContactRequest $request)
    {
        $contact = $request->only(['fullname','gender','email','postcode','address','building_name','opinion',]);
        Contact::create($contact);
        return view('thanks');
    }
    public function edit(Request $request)
    {
        $contact = $request->session()->get('contact'); 

        return view('edit', compact('contact'));
    }
     public function reconfirm(Request $request)
    {
        $contact = $request->only(['fullname','gender','email','postcode','address','building_name','opinion']);
        $request->session()->put('contact', $contact);
        return redirect('/confirm');
    }
    public function find()
    {
        return view('find', ['input' => '']);
    }
   public function search(Request $request)
    {
        $fullname = request('fullname');
        $gender = request('gender');
        $registration_date = request('registration_date');
        $email = request('email');

        $query = Contact::query();

        if (!empty($fullname)) {
            $query->where('fullname', 'LIKE', "%$fullname%");
        }

        if (!empty($gender) && $gender !== '全て') {
            $query->where('gender', $gender);
         }

        if (!empty($email)) {
            $query->where('email', 'LIKE', "%$email%");
        }

        $items = $query->get();

        $param = [
            'fullname' => $fullname,
            'gender' => $gender,
            'email' => $email,
            'items' => $items,
        ];
        
        return view('find', $param);
    }
    public function destroy($id)
    {
        $contact = Contact::find($id);

        if ($contact) {
        $contact->delete();
        // レコードが削除された後の処理
        } else {
            // エラーメッセージをセットしたり、適切な処理を行ったりする
        }
        $searchParams = request()->except(['id', '_token', '_method']);
        return redirect('/find?' . http_build_query($searchParams))->with('message', 'カテゴリを削除しました');
    }
}