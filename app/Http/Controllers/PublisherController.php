<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::paginate(15);

        return view('/table_publisher', ['publishers' => $publishers]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dados do post inválidos!',
            ], 400);
        }

        $fieldValues = $request->validate([
            'name' => ['required'],
        ]);

        $fieldValues['name'] = strip_tags($fieldValues['name']);

        try {
            Publisher::create($fieldValues);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível cadastrar esta editora: ' . $errormsg,
            ], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Editora adicionada com sucesso!',
        ]);
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
        return redirect('/table_publisher');
    }

    public function destroy(Request $request, Publisher $publisher)
    {
        $id = $request->input('id');
        $publisher = Publisher::find($id);

        if (!$publisher) {
            return response()->json(['message' => 'Editora não encontrada'], 404);
        }

        try {
            $publisher->delete();
            return response()->json(['message' => 'Editora deletada com sucesso']);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return response()->json(['error' => $errormsg], 500);
        }
    }
}
