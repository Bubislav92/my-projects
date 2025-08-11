<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product; // Ovo je važno, jer dohvatamo podatke o proizvodu
use App\Models\Category; // Dodajte ako je već nema
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Приказује садржај корисникове корпе.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $cart = $user->cart;

        // Ако корисник нема корпу, креирај нову
        if (!$cart) {
            $cart = Cart::create(['user_id' => $user->id]);
        }

        // Дохвати ставке корпе са учитаним подацима о производу
        $cartItems = $cart->cartItems()->with('product')->get();

        // Израчунај подзбир, доставу и укупан износ
        $subtotal = $cartItems->sum(function($item) {
            $price = $item->product->discount_price ?? $item->product->price;
            return $price * $item->quantity;
        });
        $shipping = 10.00; // Fiksna cena dostave
        $total = $subtotal + $shipping;

        // Враћамо Blade view са подацима
        return view('components.cart', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    /**
     * Додаје производ у корпу или ажурира његову количину.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();

        // Proveri ili kreiraj korpu
        $cart = Cart::firstOrCreate(['user_id' => $user->id]);

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        $cartItem = $cart->cartItems()->where('product_id', $productId)->first();
        $product = Product::find($productId);

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
            $message = 'Количина производа ажурирана у корпи.';
        } else {
            $cartItem = CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
            $message = 'Производ је додат у корпу.';
        }

        // 🟢 AUTOMATSKO UKLANJANJE IZ WISHLISTE
        WishList::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->delete();

        return redirect()->back()->with([
            'success' => $message,
            'added_product_id' => $product->id,
            'added_product_name' => $product->name,
            'added_product_image' => $product->thumbnail_url,
        ]);
    }


    /**
     * Ажурира количину за одређену ставку у корпи.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartItem  $cartItem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:0', // Количина може бити 0 да се обрише
        ]);

        // Осигурај да ставка корпе припада пријављеном кориснику
        if ($cartItem->cart->user_id !== Auth::id()) {
            return redirect()->route('components.cart')->with('error', 'Неовлашћена акција.');
        }

        $newQuantity = $request->input('quantity');

        if ($newQuantity > 0) {
            $cartItem->quantity = $newQuantity;
            $cartItem->save();
            $message = 'Количина производа је ажурирана.';
        } else {
            // Ако је количина 0, обриши ставку из корпе
            $cartItem->delete();
            $message = 'Производ је уклоњен из корпе.';
        }

        return redirect()->route('components.cart')->with('success', $message);
    }

    /**
     * Уклања ставку из корпе.
     *
     * @param  \App\Models\CartItem  $cartItem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CartItem $cartItem)
    {
        // Осигурај да ставка корпе припада пријављеном кориснику
        if ($cartItem->cart->user_id !== Auth::id()) {
            return redirect()->route('cart')->with('error', 'Неовлашћена акција.');
        }

        $cartItem->delete();
        $message = 'Производ је уклоњен из корпе.';

        return redirect()->route('components.cart')->with('success', $message);
    }

    public function clearCart()
    {
        $user = Auth::user();
        $cart = $user->cart;

        if ($cart) {
            // Брише све ставке корпе повезане са овом корпом
            $cart->cartItems()->delete();
            $message = 'Your cart has been cleared.';
        } else {
            $message = 'Your cart is already empty.';
        }

        return redirect()->route('components.cart')->with('success', $message);
    }

    // Funkcija getCartCount je uklonjena jer se sada sve radi preko Blade-a i reload-a stranice.
    // Ako bi se implementirao dinamički brojač u headeru, to bi zahtevalo JS.
}