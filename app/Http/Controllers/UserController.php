<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'Dados do post invalidos!');
        } else {
            $fieldValues = $request->validate([
                'name' => ['required'],
                'email' => ['required']
            ]);
        }
        $fieldValues['name'] = strip_tags($fieldValues['name']);
        $fieldValues['email'] = strip_tags($fieldValues['email']);

        try {
            $user->update($fieldValues);
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/')->with('error', $errormsg);
        }
        return redirect('/profile_user');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $user = Auth::user();


        try {
            $user->delete();
            Auth::logout();
        } catch (\Exception $e) {
            $errormsg = $e->getMessage();
            return redirect('/profile_user')->with('error', $errormsg);
        }
        return (redirect('/')->with('info', 'Usuário apagado com sucesso'));
    }
}
