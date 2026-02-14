<?php
// hata yakalayıcılar
// dd() ve error_log()
// ------------------
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        // veri getirme yöntemleri
        // $pizzas = Pizza::all();                              // tümünü getir
        // $pizzas = Pizza::orderBy('name', 'DESC')->get();     // z'den a'tya getir
        // $pizzas = Pizza::where('type', 'hawaiian')->get();   // koşula göre getir
        $pizzas = Pizza::latest()->get();                       // en son eklenene göre getir

        return view('pizzas.index', ['pizzas' => $pizzas]);
    }

    public function show($id)
    {
        // $pizza = Pizza::find($id);       // id değeri varsa getir
        $pizza = Pizza::findOrFail($id);    // id değeri varsa getir yoksa 404'e gönder

        return view('pizzas.show', ['pizza' => $pizza]);
    }

    public function create()
    {
        return view('pizzas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|not_in:0|max:255',
            'base' => 'required|string|not_in:0|max:255',
            'toppings' => 'nullable|array',
            'toppings.*' => 'string|max:255',
            'image_url' => 'required|string|not_in:0|max:255',
        ]);

        $pizza = new Pizza();

        $pizza->name = $validated['name'];
        $pizza->type = $validated['type'];
        $pizza->base = $validated['base'];
        $pizza->toppings = $validated['toppings'] ?? [];
        $pizza->image_url = $validated['image_url'];

        // error_log($pizza);
        $pizza->save();

        return redirect(route('pizzas.index'))->with('mssg', 'Thank you for your order');
    }

    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        // return redirect('/pizzas');
        return redirect(route('pizzas.index'))->with('mssg', 'Order confirmed');
    }
}
