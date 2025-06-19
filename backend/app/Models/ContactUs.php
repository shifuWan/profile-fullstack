<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Scope;

class ContactUs extends Model
{
    protected $table = 'contact_us';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    #[Scope]
    protected function filter(Builder $builder, array $filters): Builder
    {
       $builder->when($filters['name'] ?? null, function (Builder $query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        });

        $builder->when($filters['email'] ?? null, function (Builder $query, $email) {
            return $query->where('email', 'like', '%' . $email . '%');
        });

        return $builder;
    }
}
