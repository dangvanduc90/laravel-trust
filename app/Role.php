<?php

namespace App;

use Laratrust\Models\LaratrustRole;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Role extends LaratrustRole implements Searchable
{
    //
    public function getSearchResult(): SearchResult
    {
        $url = route('role.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }
}
