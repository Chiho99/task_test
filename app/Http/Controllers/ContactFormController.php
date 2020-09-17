<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\ContactControll;

use App\Http\Requests\StoreContactForm as RequestsStoreContactForm;
use Illuminate\Http\Request;

use App\Models\ContactForm;
use Illuminate\Support\Facades\DB;
use App\Services\CheckFormData;
use Illuminate\Database\Eloquent\Collection;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        // dd($request);
        // $contact_forms = ContactForm::all();

        // クエリビルダ
        $contact_forms = DB::table('contact_forms')
        ->select('id', 'your_name', 'title', 'email', 'url', 'gender', 'age', 'created_at')
        ->orderBy('created_at', 'asc')
        ->paginate(10);

        // 検索フォーム
        $query = DB::table('contact_forms');
        // dd($query);
        // もしキーワドあったら
        if($search !== null){
            // 半角スペースを半角に
            $search_split = mb_convert_kana($search,'s');

            // 空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回す
            foreach($search_split2 as $value){
                $query->where('your_name','like','%'. $value . '%');
            }
        };

         $query->select('id', 'your_name', 'title', 'created_at');
         $query->orderBy('created_at', 'asc');
         $query->paginate(10);


        return view('contact.index', ['contact_forms'=> $contact_forms]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsStoreContactForm $request)
    {

        //$_POST['name]     // Pure PHP
        $contact_forms = new ContactForm();


        $contact_forms->your_name = $request->input('your_name');
        $contact_forms->title = $request->input('title');
        $contact_forms->email = $request->input('email');
        $contact_forms->url = $request->input('url');
        $contact_forms->gender = $request->input('gender');
        $contact_forms->age = $request->input('age');
        $contact_forms->contact = $request->input('contact');

        // dd($contact_forms);
        $contact_forms->save();
        return redirect()->route('contacts.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact_form = ContactForm::find($id);
         $gender = CheckFormData::checkGender($contact_form);
        //  dd($gender);
         $age = CheckFormData::checkAge($contact_form);
        return view('contact.show', ['contact_form' => $contact_form, 'id' => $id, 'gender' => $gender, 'age' => $age]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $id = 2;
        $contact_form = ContactForm::find($id);
        // dd($contact_form);
        return view('contact.edit', ['contact_form' => $contact_form]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $contact_forms = new ContactForm();
        $contact_form = ContactForm::find($id);

        $contact_form->your_name = $request->input('your_name');
        $contact_form->title = $request->input('title');
        $contact_form->email = $request->input('email');
        $contact_form->url = $request->input('url');
        $contact_form->gender = $request->input('gender');
        $contact_form->age = $request->input('age');
        $contact_form->contact = $request->input('contact');

        // dd($contact_form);
        $contact_form->save();
        return redirect()->route('contacts.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact_form = ContactForm::find($id);
        // dd($contact_form);
        $contact_form->delete();
        return redirect()->route('contacts.index');
    }
}
