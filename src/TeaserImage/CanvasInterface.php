<?php
namespace DreadLabs\VantomasWebsite\TeaserImage;

/**
 * The teaser image canvas
 */
interface CanvasInterface
{

    /**
     * Initializes the canvas
     *
     * @return void
     */
    public function initialize();

    /**
     * Adds a layer to the canvas
     *
     * @param LayerInterface $layer
     * @return void
     */
    public function addLayer(LayerInterface $layer);

    /**
     * Returns the rendered image resource
     *
     * @return string
     */
    public function render();
}
