<?php
namespace DreadLabs\VantomasWebsite\Twitter;

interface ApiInterface
{

    public function addParameter($key, $value);

    public function getTimeline();

    public function getSearchResult();
}
