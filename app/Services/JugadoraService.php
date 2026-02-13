<?php

namespace App\Services;

use App\Models\Jugadora;
use App\Repositories\JugadoraRepository;

class JugadoraService
{
    protected JugadoraRepository $repository;

    public function __construct(JugadoraRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function create(array $data): Jugadora
    {
        return $this->repository->create($data);
    }

    public function update(Jugadora $jugadora, array $data): Jugadora
    {
        return $this->repository->update($jugadora, $data);
    }

    public function delete(Jugadora $jugadora): void
    {
        $this->repository->delete($jugadora);
    }
}