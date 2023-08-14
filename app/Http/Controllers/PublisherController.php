<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublisherController extends Controller
{
    // set index page view
	public function index() {
		return view('table_publisher');
	}

	// handle fetch all publisher ajax request
	public function fetchAllPublisher() {
		$pubs = Publisher::all();
		$output = '';
		if ($pubs->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
              <tr>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($pubs as $pub) {
				$output .= '<tr>
                <td>' . $pub->name . '</td>
                <td>
                  <a href="#" id="' . $pub->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editPublisherModal"><i class="bi-pencil-square h4"></i></a>

                  <a href="#" id="' . $pub->id . '" class="text-danger mx-1 deleteIcon"><i class="bi-trash h4"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

	// handle insert a new publisher ajax request
	public function store(Request $request) {
		$file = $request->file('avatar');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		$file->storeAs('public/images', $fileName);

		$pubData = ['name' => $request->name];
		Publisher::create($pubData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle edit an publisher ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$pub = Publisher::find($id);
		return response()->json($pub);
	}

	// handle update an publisher ajax request
	public function update(Request $request) {
		$fileName = '';
		$pub = Publisher::find($request->pub_id);
		if ($request->hasFile('avatar')) {
			$file = $request->file('avatar');
			$fileName = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('public/images', $fileName);
			if ($pub->avatar) {
				Storage::delete('public/images/' . $pub->avatar);
			}
		} else {
			$fileName = $request->pub_avatar;
		}

		$pubData = ['name' => $request->name];

		$pub->update($pubData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle delete an publisher ajax request
	public function delete(Request $request) {
		$id = $request->id;
		$pub = Publisher::find($id);
		if (Storage::delete('public/images/' . $pub->avatar)) {
			Publisher::destroy($id);
		}
	}
}