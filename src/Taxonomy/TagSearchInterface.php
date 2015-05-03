<?php
namespace DreadLabs\VantomasWebsite\Taxonomy;

interface TagSearchInterface
{

    /**
     * @param Tag $tag
     * @return void
     */
    public function setTag(Tag $tag);

    /**
     * @return string
     */
    public function __toString();
}
