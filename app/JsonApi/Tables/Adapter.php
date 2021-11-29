<?php

namespace App\JsonApi\Tables;

use App\Models\Table;
use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\File;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Neomerx\JsonApi\Contracts\Encoder\Parameters\EncodingParametersInterface;

class Adapter extends AbstractAdapter
{
    protected $guarded = ['id'];

    /**
     * Mapping of JSON API attribute field names to model keys.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Mapping of JSON API filter names to model scopes.
     *
     * @var array
     */
    protected $filterScopes = [];

    /**
     * Adapter constructor.
     *
     * @param StandardStrategy $paging
     */
    public function __construct(StandardStrategy $paging)
    {
        parent::__construct(new Table(), $paging);
    }
    public function creating(Table $table, $request)
    {
        $img = getB64Image($request->qr);
        $img_extension = getB64Extension($request->qr);
        $img_name = 'mesas/'.$request->slug. '.' . $img_extension;
        Storage::disk('public')->put($img_name, $img);
        $url = Storage::url($img_name);
        $table->qr = $url;
        dd($url);
    }

    /**
     * @param Builder $query
     * @param Collection $filters
     * @return void
     */
    protected function filter($query, Collection $filters)
    {
        $this->filterWithScopes($query, $filters);
    }

    public function branch(){
        return $this->belongsTo('branch');
    }
}
