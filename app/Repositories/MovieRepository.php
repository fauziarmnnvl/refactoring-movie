<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Models\Category;
use App\Interfaces\MovieRepositoryInterface; // Import dari folder baru

class MovieRepository implements MovieRepositoryInterface
{
    public function getAll($search, $perPage)
    {
        $query = Movie::latest();
        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%')
                  ->orWhere('sinopsis', 'like', '%' . $search . '%');
        }
        return $query->paginate($perPage)->withQueryString();
    }

    public function find($id)
    {
        return Movie::findOrFail($id);
    }

    public function getAllCategories()
    {
        return Category::all();
    }

    public function create(array $data)
    {
        // Karena Movie.php menggunakan $incrementing = false
        return Movie::create($data);
    }

    public function update($id, array $data)
    {
        $movie = $this->find($id);
        $movie->update($data);
        return $movie;
    }

    public function delete($id)
    {
        $movie = $this->find($id);
        return $movie->delete();
    }
}