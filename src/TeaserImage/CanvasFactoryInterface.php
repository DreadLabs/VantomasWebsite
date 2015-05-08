<?php
namespace DreadLabs\VantomasWebsite\TeaserImage;

interface CanvasFactoryInterface
{

    /**
     * Creates a teaser image canvas instance
     *
     * @param string $baseImage A valid base image resource string
     *
     * @return CanvasInterface
     */
    public function create($baseImage);
}
