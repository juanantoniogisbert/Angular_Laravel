<?php

namespace App\RealWorld\Filters;

use App\Tag;
use App\User;

class ArticleFilter extends Filter
{
    /**
     * Filter by author username.
     * Get all the articles by the user with given username.
     *
     * @param $username
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function author($username)
    {
        $user = User::whereUsername($username)->first();

        $userId = $user ? $user->id : null;

        return $this->builder->whereUserId($userId);
    }

    /**
     * Filter by favorited username.
     * Get all the articles favorited by the user with given username.
     *
     * @param $username
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function favorited($username)
    {
        $user = User::whereUsername($username)->first();

        $articleIds = $user ? $user->favorites()->pluck('id')->toArray() : [];

        return $this->builder->whereIn('id', $articleIds);
    }

    /**
     * Filter by tag name.
     * Get all the articles tagged by the given tag name.
     *
     * @param $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function tag($name)
    {
        // $tag = Tag::whereName($name)->first();
        // echo '<b>filter tag</b><br>';
        // print_r($tag->name);

        // $articleIds = $tag ? $tag->articles()->pluck('article_id')->toArray() : [];
        // echo '<pre>';
        // print_r($articleIds);
        // echo '</pre>';
        
        // echo '<pre>';
        // print_r($this->builder->whereIn('id', $articleIds)->pluck('slug'));
        // echo '</pre>';
        // return $this->builder->whereIn('id', $articleIds);

        $tag = Tag::whereName($name)->first();
        $articleIds = $tag ? $tag->articles()->pluck('article_id')->toArray() : [];
        return $this->builder->whereIn('id', $articleIds);
    }
}