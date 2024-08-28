<?php

namespace App\Traits;

trait ExternalIdAsRouteKey
{
    public function getRouteKeyName(): string
    {
        return 'external_id';
    }
}