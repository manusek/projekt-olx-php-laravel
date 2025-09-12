<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Form;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Image;


class FormController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Pobieramy wszystkie kategorie z bazy danych

        $user = Auth::user();

        if ($user) {
            return view('form', ['categories' => $categories]);
        } else {
            return redirect()->route('login')->with('error', 'brak uprawnien.');
        }
        // return view('form', ['categories' => $categories]);
    }

    public function store(Request $request)
    {

        $rules = [
            'title' => 'required|string',
            'category' => 'required|exists:categories,id',
            'description' => 'required|string',
            'location' => ['required', 'string', 'regex:/^[^\d!@#\$%^&*()_+={}\[\]|\\;:\'",.<>\/?]+$/'],
            'price' => 'required|numeric|min:0',
            'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|size:9',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gifs|max:2048',
        ];

        // Definicja komunikatów błędów
        $messages = [
            'title.required' => 'Pole tytułu jest wymagane.',
            'title.string' => 'Pole tytułu musi być ciągiem znaków.',
        
            'category.required' => 'Pole kategorii jest wymagane.',
            'category.exists' => 'Wybrana kategoria nie istnieje.',
        
            'description.required' => 'Pole opisu jest wymagane.',
            'description.string' => 'Pole opisu musi być ciągiem znaków.',
        
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
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //id aktualnie zalogowanego uzytkownika
        $user = Auth::user();

        $advertisement = new Advertisement();
        $advertisement->title = $request->input('title');
        $advertisement->category_id = $request->input('category');
        $advertisement->content = $request->input('description');
        $advertisement->location = $request->input('location');
        $advertisement->price = $request->input('price');
        $advertisement->number = $request->input('number');
        $advertisement->user_id = $user->id;
        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName); // Przenosimy obrazek do katalogu 'public/images'
        
            $advertisement->image = $imageName;
        }
        
        $advertisement->save();

        // Przekierowanie użytkownika po zapisaniu ogłoszenia
        return redirect()->route('welcome')->with('success', 'Ogłoszenie zostało dodane.');
    }
}