<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Page;

use DreadLabs\VantomasWebsite\TeaserImage;

/**
 * Page
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class Page
{

    /**
     * @var Identifier
     */
    private $identifier;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \DateTime
     */
    private $lastUpdatedAt;

    /**
     * @var string
     */
    private $abstract;

    /**
     * @var string
     */
    private $subTitle;

    /**
     * @var string
     */
    private $keywords;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var TeaserImage\Resource
     */
    private $teaserImage;

    /**
     * @param Identifier $identifier
     */
    public function __construct(Identifier $identifier)
    {
        $this->identifier = $identifier;
    }

    /**
     * @return Identifier
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param \DateTime $lastUpdatedAt
     */
    public function setLastUpdatedAt(\DateTime $lastUpdatedAt)
    {
        $this->lastUpdatedAt = $lastUpdatedAt;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdatedAt()
    {
        return $this->lastUpdatedAt;
    }

    /**
     * @param string $abstract
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
    }

    /**
     * @return string
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * @param string $subTitle
     */
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;
    }

    /**
     * @return string
     */
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param TeaserImage\Resource $teaserImage
     */
    public function setTeaserImage(TeaserImage\Resource $teaserImage)
    {
        $this->teaserImage = $teaserImage;
    }

    /**
     * @return TeaserImage\Resource
     */
    public function getTeaserImage()
    {
        return $this->teaserImage;
    }
}
