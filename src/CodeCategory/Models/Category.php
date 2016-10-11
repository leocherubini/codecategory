<?php

namespace CodePress\CodeCategory\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Category extends Model implements SluggableInterface
{

	use SluggableTrait;

	protected $table = "codepress_categories";

	protected $sluggable = [
		'build_from' => 'name',
		'save_to' => 'slug',
		'unique' => true
	];

	protected $fillable = [
		'name',
		'slug',
		'active',
		'parent_id'
	];

	public function categorizable()
	{
		return $this->morphTo();
	}

	public function parent()
	{
		return $this->belongsTo(Category::class);
	}

	public function children()
	{
		return $this->hasMany(Category::class, 'parent_id');
	}
}