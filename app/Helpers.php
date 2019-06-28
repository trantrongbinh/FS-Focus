<?php

if (!function_exists('admin_url')) {
    /**
     * Get admin url.
     *
     * @param  string $uri
     * @return string
     */
    function admin_url($uri)
    {
        return url('/dashboard/' . $uri);
    }
}

if (!function_exists('human_filesize')) {
    /**
     * Get a readable file size.
     *
     * @param $bytes
     * @param int $decimals
     * @return string
     */
    function human_filesize($bytes, $decimals = 2)
    {
        $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];

        $floor = floor((strlen($bytes) - 1) / 3);

        return sprintf("%.{$decimals}f", $bytes / pow(1024, $floor)) . @$size[$floor];
    }
}

if (!function_exists('isActive')) {
    /**
     * Determine the nav if it is the current route.
     *
     * @param string $nav
     * @return boolean
     */
    function isActive($nav)
    {
        return Route::currentRouteName() == $nav ? 'active' : '';
    }
}

if (!function_exists('translug')) {
    /**
     * Translate the slug to english.
     *
     * @param string $slug
     * @return string
     */
    function translug($slug)
    {
        return app('Translug')->translate($slug);
    }
}

if (!function_exists('lang')) {
    /**
     * Trans for getting the language.
     *
     * @param string $text
     * @param  array $parameters
     * @return string
     */
    function lang($text, $parameters = [])
    {
        return trans('blog.' . $text, $parameters);
    }
}

if (!function_exists('getVote')) {
    /**
     * Get resource vote off a post.
     *
     * @param collection $post
     * @return array
     */
    function getVote($post)
    {
        $isUpvote = in_array(\Auth::id(), $post->upvoteUsers->pluck('id')->toArray()) ? true : false;
        $isDownvote = in_array(\Auth::id(), $post->downvoteUsers->pluck('id')->toArray()) ? true : false;
        $vote = [
            'is_up_voted' => $isUpvote,
            'is_down_voted' => $isDownvote,
            'is_voted' => $isUpvote || $isDownvote,
            'vote_count' => count($post->upvoteUsers) + count($post->downvoteUsers),
        ];

        return $vote;
    }
}