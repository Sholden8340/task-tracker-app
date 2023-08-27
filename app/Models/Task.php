<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, HasUuids;
    protected $table = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'is_complete'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->id = (string) Uuid::uuid4();
    }

    protected function id(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value,
        );
    }
}
