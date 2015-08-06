<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Disqus\Resource\Forums;

use DreadLabs\VantomasWebsite\Disqus\Resource\AbstractResource;

/**
 * Disqus resource: forums/listPosts
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ListPosts extends AbstractResource
{

    /**
     * @var string
     */
    protected $forum;

    /**
     * @var int
     */
    protected $since;

    /**
     * @var array
     */
    protected $related = array();

    /**
     * @var mixed
     */
    protected $cursor = null;

    /**
     * @var int
     */
    protected $limit = 25;

    /**
     * @var string
     */
    protected $query = '';

    /**
     * @var array
     */
    protected $include = array('approved');

    /**
     * @var string
     */
    protected $order = 'desc';

    /**
     * @param string $forum
     */
    public function setForum($forum)
    {
        $this->forum = (string) $forum;
    }

    /**
     * @param int $since
     */
    public function setSince($since)
    {
        if (true === is_integer($since)) {
            $this->since = $since;
        }
    }

    /**
     * @param array $related
     */
    public function setRelated(array $related)
    {
        if (is_array($related) && 0 < count($related)) {
            $this->related = $related;
        }
    }

    /**
     * @param mixed $cursor
     */
    public function setCursor($cursor)
    {
        if (false === is_null($cursor)) {
            $this->cursor = $cursor;
        }
    }

    /**
     * @param int $limit
     */
    public function setLimit($limit)
    {
        if (is_numeric($limit)) {
            $this->limit = (int) $limit;
        }
    }

    /**
     * @param string $query
     */
    public function setQuery($query)
    {
        if (false === is_null($query)) {
            $this->query = $query;
        }
    }

    /**
     * @param array $include
     */
    public function setInclude(array $include)
    {
        if (is_array($include) && 0 < count($include)) {
            $this->include = $include;
        }
    }

    /**
     * @param string $order
     */
    public function setOrder($order)
    {
        $this->order = (string) $order;
    }
}
