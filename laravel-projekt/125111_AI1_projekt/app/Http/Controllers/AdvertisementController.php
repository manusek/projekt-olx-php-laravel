<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdvertisementController;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Validator;

class AdvertisementController extends Controller
{
    public function myAdvertisements()
    {
        $user = Auth::user();
        $ogloszenia = Advertisement::where('user_id', $user->id)->get();
        return view('myAdvs', ['ogloszenia' => $ogloszenia]);
    }

    public function deleteAdv($id)
    {
        $ogloszenie = Advertisement::findOrFail($id);
        $ogloszenie->delete();

        return redirect()->back()->with('success', 'Ogłoszenie zostało usunięte.');
    }

    public function editAdv(Request $request, $id)
    {
        $ogloszenie = Advertisement::findOrFail($id);
        $user = Auth::user();
        if($user)
        {
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $ogloszenie->image = $imageName;
                $ogloszenie->save(); 
            }
    
            return view('edit', compact('ogloszenie'));
        }else{
            return redirect()->route('login')->with('error', 'brak uprawnien.');
        } 

        
    }

    public function updateAdv(Request $request, $id)
    {
        $ogloszenie = Advertisement::findOrFail($id);

    // Definicja reguł walidacji
    $rules = [
        'title' => 'required|string',
        'content' => 'required|string',
        'location' => ['required', 'string', 'regex:/^[^\d!@#\$%^&*()_+={}\[\]|\\;:\'",.<>\/?]+$/'],
        'price' => 'required|numeric|min:0',
        'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|size:9',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    // Definicja komunikatów błędów
    $messages = [
        'title.required' => 'Pole tytułu jest wymagane.',
        'title.string' => 'Pole tytułu musi być ciągiem znaków.',

        'content.required' => 'Pole opisu jest wymagane.',
        'content.string' => 'Pole opisu musi być ciągiem znaków.',

        'location.required' => 'Pole lokalizacji jest wymagane.',
        'location.string' => 'Pole lokalizacji musi być ciągiem znaków.',
        'location.regex' => 'Pole lokalizacji nie może zawierać cyfr ani znaków specjalnych.',

        'price.required' => 'Pole ceny jest wymagane.',
        'price.numeric' => 'Pole ceny musi być liczbą.',
        'price.min' => 'Cena nie może być ujemna.',

        'number.required' => 'Pole numeru telefonu jest wymagane.',
        'number.string' => 'Pole numeru telefonu musi być ciągiem znaków.',

        'image.image' => 'Plik musi być obrazem.',
        'image.mimes' => 'Plik musi być w formacie: jpeg, png, jpg, gif.',
        'image.max' => 'Maksymalny rozmiar obrazka to 2MB.',
    ];

    // Walidacja danych wejściowych
    $validator = Validator::make($request->all(), $rules, $messages);

    // Sprawdzenie poprawności walidacji
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
        $ogloszenie = Advertisement::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $ogloszenie->image = $imageName;
        }
            $ogloszenie->update($request->all());
        

        return redirect()->route('welcome')->with('success', 'Ogłoszenie zostało zaktualizowane pomyślnie.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Wyszukaj ogłoszenia zawierające wpisany ciąg znaków w tytule
        $advertisements = Advertisement::where('title', 'like', '%'.$query.'%')
                                        ->orWhere('content', 'like', '%'.$query.'%')
                                        ->get();
        
        // Przekieruj użytkownika do widoku z wynikami wyszukiwania i zmienna query
        return view('search_results', ['advertisements' => $advertisements, 'query' => $query]);
    }
}
