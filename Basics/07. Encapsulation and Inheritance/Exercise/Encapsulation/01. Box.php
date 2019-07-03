<?php
//parent
class Box
{
    private $length;
    private $width;
    private $height;

    /**
     * Box constructor.
     * @param $length
     * @param $width
     * @param $height
     */
    public function __construct($length, $width, $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @return mixed
     */
    private function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    private function setLength($length): void
    {
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    private function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    private function setWidth($width): void
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    private function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    private function setHeight($height): void
    {
        $this->height = $height;
    }


    private function getSurfaceArea(){
        $surfaceArea=2*($this->getLength()*$this->getWidth())+2*($this->getLength()*$this->getHeight())+2*($this->getWidth()*$this->getHeight());
        return $surfaceArea;
    }

    private function getLateralSurfaceArea(){
        $lateralSurfaceArea=2*($this->getLength()*$this->getHeight())+2*($this->getWidth()*$this->getHeight());
        return $lateralSurfaceArea;
    }

    private function getVolume(){
        $volume=$this->getLength()*$this->getHeight()*$this->getWidth();
        return $volume;
    }

    function __toString()
    {
        $surfaceArea=number_format($this->getSurfaceArea(),2,'.','');
        $lateralSurfaceArea=number_format($this->getLateralSurfaceArea(),2,'.','');
        $volume=number_format($this->getVolume(),2,'.','');

        return 'Surface Area - '.$surfaceArea."\n".'Lateral Surface Area - ' . $lateralSurfaceArea."\n".'Volume - '.$volume;

    }
}
$length=floatval(readline());
$width=floatval(readline());
$height=floatval(readline());

$box=new Box($length,$width,$height);
echo $box;