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
    protected function creating(Table $table, $request)
    {
        $img = getB64Image($request->qr);
        $img_extension = getB64Extension($request->qr);
        $img_name = 'mesas/'.$request->branch_id.'/'.$request->slug. '.' . $img_extension;
        Storage::disk('public')->put($img_name, $img);
        $table->qr = $img_name;
        // dd($url);
    }

    protected function updating(Table $table, $record){
        $original =  $table->getRawOriginal();

        if ($original['slug'] !== $record->slug) {
            // dd($table->qr);
            Storage::disk('public')->delete($original['qr']);
            $img = getB64Image($record->qr);
            $img_extension = getB64Extension($record->qr);
            $img_name = 'mesas/'.$record->branch_id.'/'.$record->slug. '.' . $img_extension;
            Storage::disk('public')->put($img_name, $img);
            // borrar imagen, y guardar la imagen nueva con nuevo nombre
            $table->qr = $img_name;
            $table->save();
        }else {
            $table->name = $original['name'];
            $table->slug = $original['slug'];
            $table->qr = $original['qr'];
            $table->save();
        }

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
