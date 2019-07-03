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
        if ($length<0 or $length==0){
            echo'Length cannot be zero or negative.';
            exit;
        }
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
        if ($width<0 or $width==0){
            echo 'Width cannot be zero or negative.';
            exit;
        }
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
        if($height<0 or $height==0){
            echo 'Height cannot be zero or negative.';
            exit;
        }
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