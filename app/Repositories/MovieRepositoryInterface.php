<?php

namespace App\Interfaces; // Update namespace ke folder Interfaces

interface MovieRepositoryInterface
{
    public function getAll($search, $perPage);
    public function find($id);
    public function getAllCategories();
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}