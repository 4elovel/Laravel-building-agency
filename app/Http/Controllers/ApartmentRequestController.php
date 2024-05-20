<?php

namespace App\Http\Controllers;

use App\Models\ApartmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ApartmentRequestController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $requests = ApartmentRequest::where('user_id', $user->id)->get();

        return view('apartment-requests-index', compact('requests'));
    }

    public function destroy($id): RedirectResponse
    {
        $user = Auth::user();
        $request = ApartmentRequest::where('id', $id)->where('user_id', $user->id)->firstOrFail();

        $request->delete();

        return redirect()->route('apartment.requests.index')->with('success', 'Заявка успішно видалена!');
    }
}
