<?php

namespace App\Services;

use App\Interfaces\MovieRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class MovieService
{
    protected $movieRepo;

    public function __construct(MovieRepositoryInterface $movieRepo)
    {
        $this->movieRepo = $movieRepo;
    }

    // ... (fungsi lainnya)

    public function handleUpdateMovie($id, array $data, $file)
    {
        $movie = $this->movieRepo->find($id);

        if ($file) {
            $data['foto_sampul'] = $this->uploadImage($file);
            $this->deleteOldImage($movie->foto_sampul); // Menggunakan helper internal
        }

        return $this->movieRepo->update($id, $data);
    }

    public function handleDeleteMovie($id)
    {
        $movie = $this->movieRepo->find($id);
        $this->deleteOldImage($movie->foto_sampul); // Menggunakan helper internal
        
        return $this->movieRepo->delete($id);
    }

    // Perbaikan: Memecah fungsi yang terlalu panjang/duplikat menjadi private method
    private function uploadImage($file)
    {
        $fileName = Str::uuid()->toString() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $fileName);
        return $fileName;
    }

    private function deleteOldImage($fileName)
    {
        if ($fileName && File::exists(public_path('images/' . $fileName))) {
            File::delete(public_path('images/' . $fileName));
        }
    }
}