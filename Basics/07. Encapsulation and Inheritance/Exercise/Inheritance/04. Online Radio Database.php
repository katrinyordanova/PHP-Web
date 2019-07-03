<?php

class Song{
    /**
     * @var string
     */
    private $artist;

    /**
     * @var string
     */
    private $name;

    /**
     * @var mixed
     */
    private $length;

    /**
     * Song constructor.
     * @param $artist
     * @param $name
     * @param $length
     * @throws Exception
     */
    public function __construct(string $artist,string $name, $length)
    {
        $this->setArtist($artist);
        $this->setName($name);
        $this->setLength($length);
    }

    //Getters
    /**
     * @return string
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    //Setters
    /**
     * @param string $artist
     * @throws Exception
     */
    public function setArtist($artist): void
    {
        if(strlen($artist)<3 or strlen($artist)>20){
            throw new Exception('Artist name should be between 3 and 20 symbols.'."\n");
        }
        $this->artist = $artist;
    }

    /**
     * @param string $name
     * @throws Exception
     */
    public function setName($name): void
    {
        if(strlen($name)<3 or strlen($name)>30){
            throw new Exception('Song name should be between 3 and 30 symbols.'."\n");
        }
        $this->name = $name;
    }

    /**
     * @param  $length
     * @throws Exception
     */
    public function setLength($length): void
    {
        $time=explode(':',$length);
        if (is_numeric($time[0])){
            $minutes=$time[0];

            if ($minutes<0 or $minutes>14){
                throw new Exception('Song minutes should be between 0 and 14.'."\n");
            }
        }
        else{
            throw new Exception('Invalid song length'."\n");
        }
        if (is_numeric($time[1])){
            $seconds=$time[1];

            if ($seconds<0 or $seconds>59){
                throw new Exception('Song seconds should be between 0 and 59.'."\n")
                ;
            }
        }
        else{
            throw new Exception('Invalid song length'."\n");
        }
        $total=$minutes*60+$seconds;
        $this->length = $total;
    }
}
$counter=0;
$playlist=0;
$songsToCome=intval(readline());
for ($s=0;$s<$songsToCome;$s++){
    list($artist,$song,$songLength)=explode(';',readline());
    try {
        $songs=new Song($artist,$song,$songLength);
        echo 'Song added.'."\n";
        $counter++;
        $playlist+=$songs->getLength();

    }catch (Exception $exception){
        echo $exception->getMessage();
    }
}
echo 'Songs added: '.$counter."\n";
$hours=gmdate('G',$playlist);
$minutes=gmdate('i',$playlist);
$seconds=gmdate('s',$playlist);
echo 'Playlist length: '.$hours.'h '.$minutes.'m '.$seconds.'s';