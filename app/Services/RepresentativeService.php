<?php

namespace App\Services;

use App\Repositories\RepresentativeRepository\RepresentativeRepositoryInterface;

class RepresentativeService
{
    private RepresentativeRepositoryInterface $representativeRepository;

    public function __construct(RepresentativeRepositoryInterface $representativeRepository)
    {
        $this->representativeRepository = $representativeRepository;
    }

    public function getRepresentativeById($id)
    {
        return $this->representativeRepository->getById($id);
    }

    public function createRepresentative($data)
    {
        return $this->representativeRepository->create($data);
    }

    public function deleteRepresentative($id)
    {
        return $this->representativeRepository->deleteById($id);
    }

    public function updateRepresentative($id, $data)
    {
        return $this->representativeRepository->updateById($id, $data);
    }

    public function getAllRepresentatives()
    {
        return $this->representativeRepository->getAll();
    }
}
