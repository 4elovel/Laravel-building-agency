<?php

namespace App\Http\Controllers;

use App\Exceptions\FailedApartmentRequestCreate;
use App\Http\Requests\ApartmentApplicationRequest;
use App\Models\ApartmentRequest;
use App\Models\Complex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function showForm() : View
    {
        $complexes = Complex::all();
        return view('welcome',compact('complexes'));
    }
    public function submitForm(ApartmentApplicationRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validated();

        try { //трохи надумано просто не знаю куди ще exception впихнути
            //throw new \Exception("");//тест роботи exception

            DB::beginTransaction();

            ApartmentRequest::create([
                'user_name' => $validatedData['name'],
                'user_email' => $validatedData['email'],
                'user_phone' => $validatedData['phone'],
                'complex_id' => $validatedData['complex'],
                'user_id' => null,
                'apartment_type' => $validatedData['apartment_type'],
                'area' => $validatedData['area'],
                'budget' => $validatedData['budget'],
                'status' => 'pending',
            ]);

            DB::commit();

            return redirect()->route('apartment.application.form')->with('success', 'Ваша заявка успішно відправлена!');
        } catch (\Exception $e) {
            DB::rollBack();
            throw new FailedApartmentRequestCreate('Неможливо створити заявку. Будь ласка, спробуйте ще раз пізніше.', 'apartment.application.form');
        }

    }
}
