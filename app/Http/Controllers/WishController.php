<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wish;
use App\Models\Category;

class WishController extends Controller
{
    public function getUserWishes()
    {
        $userId = Auth::id();
        $wishes = Wish::where('user_id', $userId)
            ->with('category')
            ->orderBy('created_at', 'desc')
            ->get();
        $categories = Category::all();
        return view('user_dashboard/salary', compact('wishes', 'categories'));
    }

    public function addWish(Request $request)
    {
        $request->validate([
            'item-name' => 'required|string|max:255',
            'item-category' => 'required|exists:categories,id',
            'item-price' => 'required|numeric|min:0',
            'item-image' => 'required|url',
        ]);

        $wish = new Wish();
        $wish->title = $request->input('item-name');
        $wish->category_id = $request->input('item-category'); // Store the category ID
        $wish->price = $request->input('item-price');
        $wish->imageURL = $request->input('item-image');
        $wish->user_id = Auth::id();
        $wish->is_achieved = false;
        $wish->save();

        return redirect()->route('income.show')->with('success', 'Wishlist item added successfully!');
    }

    public function deleteWish($id)
    {
        $wish = Wish::findOrFail($id);

        // Check if the wish belongs to the authenticated user
        if ($wish->user_id !== Auth::id()) {
            return redirect()->route('income.show')->with('error', 'Unauthorized action');
        }

        $wish->delete();
        return redirect()->route('income.show')->with('success', 'Wishlist item removed successfully!');
    }
}
