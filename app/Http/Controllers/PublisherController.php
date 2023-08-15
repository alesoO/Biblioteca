<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

class PublisherController extends Controller
{

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => ['required'],]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'Dados do post invalidos!');
        } else {
            $fieldValues = $request->validate([
                'name' => ['required'],
            ]);
        }

        $fieldValues['name'] = strip_tags($fieldValues['name']);

        try {
            Publisher::create($fieldValues);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_publisher')->with('sucess');
    }


    public function update(Publisher $publisher, Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => ['required'],]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'Dados do post invalidos!');
        } else {
            $fieldValues = $request->validate([
                'name' => ['required'],
            ]);
        }

        $fieldValues['name'] = strip_tags($fieldValues['name']);
        
        try {
            $publisher->update($fieldValues);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/');
    }


    public function destroy(Publisher $publisher)
    {
        try{
            $publisher->delete();
        }catch (\Exception $e){
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/table_publisher')->with('info', 'Editora deletado com sucesso !');
    }
}