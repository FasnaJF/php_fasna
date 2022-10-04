<?php

namespace App\Repositories\RepresentativeRepository;

use App\Models\Representative;
use App\Repositories\BaseRepository;

class RepresentativeRepository extends BaseRepository implements RepresentativeRepositoryInterface
{
    public function __construct(Representative $representative)
    {
        $this->model = $representative;
    }
}
