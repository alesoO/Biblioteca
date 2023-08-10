<?php

namespace App\Http\Controllers;

use App\Models\publishers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublishersController extends Controller
{
    // set index page view
    public function index()
    {
        return view('index');
    }

    public function fetcAllPublishers()
    {
        $pubs = publishers::all();
        $output = '';

        if ($pubs->count() > 0) {
            $output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
            <tr>
              <th>Nome</th>
            </tr>
          </thead>
          <tbody>';
            foreach ($pubs as $pub) {
                $output .= '<tr>
            <td>' . $pub->name . '</td>
          </tr>';
            }
            $output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
    }

	public function store(Request $request) {
		$file = $request->file('avatar');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/images', $fileName);

		$pubData = ['name' => $request->name];
		publishers::create($pubData);
		return response()->json([
			'status' => 200,
		]);
	}




}
