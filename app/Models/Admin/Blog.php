<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static findOrFail(string $id)
 * @method static where(string $string, string $string1)
 * @method static orderBy(string $string, string $string1)
 * @method static insert(array $array)
 * @method static whereName($name)
 * @method static whereSlug(string $param)
 */
class Blog extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected array $dates = ['deleted_at'];

  /**
   * @return void
   */
  protected static function boot(): void
    {
        parent::boot();
        static::created(function ($post) {
            $post->slug = $post->generateSlug($post->blog_title);
            $post->save();
        });
    }

  /**
   * @param $name
   * @return array|string|null
   */
  private function generateSlug($name): array|string|null
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }
}
