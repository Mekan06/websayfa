<?php

namespace App\Http\Controllers;

use App\Iletisim;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use DB;
class IletisimController extends Controller
{
    public function ekle(){

        return view('iletisim');
    }
    public function yeniDeger(){

        $rules = array(
            'ad'             => 'required|min:3',
            'mail'            => 'required|email|min:3',
            'konu'         => 'required|min:5',
            'mesaj' => 'required|min:3'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('iletisim')
                ->withErrors($validator);

        } else {
            Iletisim::insert(
                array(
                    'isim'     =>   Input::get('ad'),
                    'mail'   =>   Input::get('mail'),
                    'konu'   =>   Input::get('konu'),
                    'mesaj'   =>  Input::get('mesaj')
                )
              );
            return Redirect::to('iletisim');
        }

    }
}
