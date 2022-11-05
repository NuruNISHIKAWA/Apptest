<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConfirmRequest;
use App\Http\Requests\FormInfoRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Contact;
class FormController extends Controller
{
        public function index(Request $request)
    {

        $form=$request->session()->get('key');

        if (isset($form)){
        }else{
            $form= [
                'name' => '',
                'firstname' => '',
                'gender' =>1,
                'email' => '',
                'postcode' => '',
                'address' => '',
                'building_name' => '',
                'opnion' => ''];
        }
        
        return view('form',['form' => $form]);

        /*
        if (isset($user)){
            return view('form',['form' => $form]);
        }else{

        }*/
        /*
        $user = Auth::user();
        if (isset($user)){
        $todos = Todo::all();
        $tags = Tag::all();

        $request->session()->forget('key');

        $param = ['todos' => $todos, 'tags' =>$tags,'user' =>$user];
        return view('todolist', $param);
        
        }else{
        return redirect('/login');
        }*/
    }

    public function confirm(Request $request)
    {
        $form=$request->session()->get('form');
       
        return view('confirm',['form' => $form]);
    }

    public function check(ConfirmRequest $request)
    {
        $form = $request->all();
        $request->session()->put('form',$form);
        /*return view('confirm',['form' => $form]);*/
        return redirect('/confirm');
    }

    public function thanks(Request $request)
    {
        return view('thanks');
    }

    public function register(FormInfoRequest $request)
    {
        $form = $request->all();
        $request->session()->forget('form');
        return redirect('/thanks');
    }

    /*----------------管理画面-------------------*/

            public function find(Request $request)
    {

        $input=$request->session()->get('input');
        $results=$request->session()->get('result');

        if (isset($input)){
        }else{
            $input= [
                'fullname' => '',
                'gender' => 3,
                'start_at' => '',
                'end_at' => '',
                'email' => ''];
        }

        /* $results=$results->paginate(10)->withQueryString();*/

        $param = [
            'input' =>$input,
            'results' => $results
        ];
        return view('manegiment', $param);
    }

    public function search(SearchRequest $request)
    {    
        
        $results = Contact::where('fullname', 'LIKE BINARY',"%{$request->fullname}%");

        if($request->gender==3){
        }else{
            $results=$results->where('gender', '=', "$request->gender");
        }

        if(isset($request->starte_at)){
            $results=$results->where('created_at', '>=', "$request->start_at");
        }
        if(isset($request->end_at)){
            $results=$results->where('created_at', '<=', "$request->end_at");
        }
        $results=$results->where('email', 'LIKE BINARY', "%{$request->email}%")->paginate(10);
dd($results);
        $request->session()->put('result',$results);

        return redirect('/manegiment');
    //return redirect('/find');
    }

    public function reset(Request $request){

        $request->session()->forget('input');
        $request->session()->forget('result');
        return redirect('/manegiment');
    }

}
