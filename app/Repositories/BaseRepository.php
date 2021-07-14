<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

interface BaseRepository
{
    public function all();

    public function store(FormRequest $request): bool;

    public function update(FormRequest $request, Model $model): bool;

    public function delete(Model $model): ?bool;
}
