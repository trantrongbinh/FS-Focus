<?php

namespace App\Tools;

use App\User;

class Mention
{
    public $content;
    public $content_parsed;
    public $users = [];
    public $usernames;

    /**
     * Filter the mention usernames.
     *
     * @return array
     */
    public function getMentionedUsername()
    {
        preg_match_all('/href="\/user\/(?:([-\w]+)\/?)/', $this->content, $atlist_tmp_link); // get name from link
        $usernames = array_unique($atlist_tmp_link[1]);

        return $usernames;
    }

    /**
     * Replace the `@{user}` by the user link
     */
    public function replace()
    {
        $this->content_parsed = $this->content;

        foreach ($this->users as $user) {
            preg_match_all('|href="\/user\/' . $user->name . '"[^>]*>(.*?)(?=\</a)|si', $this->content, $atlist_tmp_text); //get name from text has @ off tag a
            $searches = $atlist_tmp_text[1];
            $place = '@' . $user->name;

            foreach ($searches as $search) {
                $this->content_parsed = str_replace($search, $place, $this->content_parsed);
            }
        }
    }

    /**
     * Parse the `@` mention user in content.
     *
     * @param  string $content
     * @return string
     */
    public function parse($content)
    {
        $this->content = $content;
        $this->usernames = $this->getMentionedUsername();

        count($this->usernames) > 0 && $this->users = User::whereIn('name', $this->usernames)->get();
        $this->replace();

        return $this->content_parsed;
    }
}
