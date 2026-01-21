<?php



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = [
        'nomSite' => 'Boutique Laravel',
        'produits' => [
            [
                'id' => 1,
                'nom' => 'Montre Classique',
                'description' => 'Montre élégante avec bracelet en cuir et cadran argenté.',
                'prix' => 150
            ],
            [
                'id' => 2,
                'nom' => 'Sac à Dos Sport',
                'description' => 'Sac à dos robuste, idéal pour le sport et les voyages.',
                'prix' => 80
            ],
            [
                'id' => 3,
                'nom' => 'Lunettes de Soleil',
                'description' => 'Lunettes de soleil modernes avec protection UV.',
                'prix' => 50
            ],
        ],
    ];

    return view('home.index', $data);
});

Route::get('/produit/{id}', function ($id) {
    $produits = [
        1 => [
            'nom' => 'Montre Classique',
            'description' => 'Montre élégante avec bracelet en cuir et cadran argenté.',
            'prix' => 150
        ],
        2 => [
            'nom' => 'Sac à Dos Sport',
            'description' => 'Sac à dos robuste, idéal pour le sport et les voyages.',
            'prix' => 80
        ],
        3 => [
            'nom' => 'Lunettes de Soleil',
            'description' => 'Lunettes de soleil modernes avec protection UV.',
            'prix' => 50
        ],
    ];

    if (!isset($produits[$id])) {
        abort(404, 'Produit non trouvé');
    }

    return view('produits.details', ['produit' => $produits[$id]]);
});



