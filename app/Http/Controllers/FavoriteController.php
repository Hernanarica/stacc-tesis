<?php

namespace App\Http\Controllers;

use App\Models\Local;

class FavoriteController extends Controller
{
    /**
     * It gets all the favorites of the currently logged in user, and then passes them to the view
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View collection of all the favorites of the user.
     */
    public function index()
    {
        $favorites = auth()->user()->favorite(Local::class);

        return view('sections.my-favorites', compact('favorites'));
    }

    /**
     * When a user visits the route `locals/{id}/favorite`, add a favorite to the local with the given id.
     *
     * @param  id  $id  The id of the local you want to add to your favorites.
     * @return \Illuminate\Http\RedirectResponse route to the local show page.
     */
    public function store($id)
    {
        $local = Local::find($id);
        $local->addFavorite();

        return to_route('locals.show', ['local' => $id])->with('success', 'Local agregado a favoritos');
    }

    /**
     * It finds the local with the given id, removes it from the user's favorites, and then redirects the user back to the
     * local's show page
     *
     * @param  id  $id  The id of the local that we want to remove from the favorites list.
     * @return \Illuminate\Http\RedirectResponse route to the local show page.
     */
    public function destroy($id)
    {
        $local = Local::find($id);
        auth()->user()->removeFavorite($local);

        return to_route('locals.show', ['local' => $id])->with('success', 'Local eliminado de favoritos');
    }
}
