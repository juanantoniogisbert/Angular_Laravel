<?php

namespace App\RealWorld\Paginate;

use Illuminate\Database\Eloquent\Builder;

class Paginate
{
    /**
     * Total count of the items.
     *
     * @var int
     */
    protected $total;

    /**
     * Collection of items.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $data;

    /**
     * Paginate constructor.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param int $limit
     * @param int $offset
     */
    public function __construct(Builder $builder, $limit = 20, $offset = 0)
    {
        // $limit = request()->get('limit', $limit);
        // echo '<b>paginate</b><br>';
        // print_r($limit);
        // echo '</br>';

        // $offset = request()->get('offset', $offset);
        // print_r($offset);
        // echo '</br>';

        // $this->total = $builder->count();
        // print_r($this->total);
        // echo '</br>';
        
        // $this->data = $builder->latest()->skip($offset)->take($limit)->pluck('title');
        // echo '<pre>';
        // print_r($this->data);
        // echo '</pre>';
        
        $limit = request()->get('limit', $limit);
        $offset = request()->get('offset', $offset);
        $this->total = $builder->count();
        $this->data = $builder->latest()->skip($offset)->take($limit)->get();
    }

    /**
     * Get the total count of the items.
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Get the paginated collection of items.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getData()
    {
        return $this->data;
    }
}