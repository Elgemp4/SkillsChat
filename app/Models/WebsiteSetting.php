<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Unguarded]
class WebsiteSetting extends Model
{
    /** @use HasFactory<\Database\Factories\WebsiteSettingFactory> */
    use HasFactory;
}
