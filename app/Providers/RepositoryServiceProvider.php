<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\BaseRepositoryInterface;
use App\Repositories\RepresentativeRepository\RepresentativeRepository;
use App\Repositories\RepresentativeRepository\RepresentativeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private array $repositories = [
        BaseRepositoryInterface::class => BaseRepository::class,
        RepresentativeRepositoryInterface::class => RepresentativeRepository::class,
    ];

    public function register()
    {
        foreach ($this->repositories as $contracts => $eloquentClass) {
            $this->app->bind(
                $contracts,
                $eloquentClass
            );
        }
    }

    public function boot()
    {
    }

}
