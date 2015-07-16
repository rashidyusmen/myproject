<?php

class ImageEntity extends Entity {

    protected $image;

    public function getImage() {
        if (file_exists(dirname(__FILE__).'/../../../storage/'.$this->image)) {
            return $this->image;
        } else {
            return '';
        }
    }

    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    public function saveImage($image) {
        $filename = rand(1,100000).$image['name'];

        move_uploaded_file($image['tmp_name'], dirname(__FILE__).'/../../../storage/'.$filename);
        $this->setImage($filename);
    }
}

?>