<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest; // Request baru
use App\Services\MovieService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    // ... (fungsi index, detail, create tetap sama)

    public function update(UpdateMovieRequest $request, $id) // Lebih pendek karena validasi pindah
    {
        $this->movieService->handleUpdateMovie($id, $request->validated(), $request->file('foto_sampul'));
        return redirect('/movies/data')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id) // Penamaan lebih standar
    {
        $this->movieService->handleDeleteMovie($id);
        return redirect('/movies/data')->with('success', 'Data berhasil dihapus');
    }
}