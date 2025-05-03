<?php

namespace App\Models;

use App\Enums\Config as ConfigEnum;
use App\Enums\LetterType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = [
        'path_url',
    ];

    /**
     * @return string
     */
    public function getPathUrlAttribute(): string
    {
        if (!is_null($this->path)) {
            return $this->path;
        }

        return asset('storage/attachments/' . $this->filename);
    }

}
