<?php
/**
 * Created by PhpStorm.
 * User: Fernando Henrique
 * Date: 12/07/2016
 * Time: 07:57
 */

namespace App\Controller\Component;


use Cake\Controller\Component;

class ImageUploadComponent extends Component
{
    private $dir;
    private $thumbDir;
    private $thumbSize;
    private $size;

    public function initialize(array $config)
    {
        $this->dir = $config['dir'];
        $this->thumbDir = $config['thumbDir'];
        $this->size = $config['size'];
        $this->thumbSize = $config['thumbSize'];
        parent::initialize($config);
    }

    public function upload(array $file)
    {

        if (empty($file)) {
            throw new \InvalidArgumentException();
        }
        $extension = '.' . substr($file['name'], -3);
        $saveName = rand(0, 99999) . '-' . date('d-m-Y-H-m-s') . $extension;
        return $this->uploadDir($file, $saveName);
    }

    /**
     * Remove uma imagem de um diretório especifico
     * @param String $pathImg Caminho da imagem que deseja excluir
     */
    public function remove($imageName)
    {
        $imagesPath[0] = $this->dir . DIRECTORY_SEPARATOR . $imageName;
        $imagesPath[1] = $this->thumbDir . DIRECTORY_SEPARATOR . $imageName;
        $isSuccess = 0;
        foreach ($imagesPath as $imagePath) {

            if (unlink($imagePath)) {
                $isSuccess++;
            }
        }
        if($isSuccess === 2)
        {
            return true;
        }
        return false;
    }

    private function uploadDir($file, $saveName)
    {

        if ($this->img_resize($file['tmp_name'], $this->size, $this->dir, $saveName)) {
            if ($this->img_resize($file['tmp_name'], $this->thumbSize, $this->thumbDir, $saveName)) {
                $imgPath = $saveName;
                return $imgPath;
            }
        }
        return false;
    }

    private function img_resize($tmpname, $size, $save_dir, $save_name, $maxisheight = 0)
    {
        $save_dir .= (substr($save_dir, -1) != "/") ? "/" : "";
        $gis = getimagesize($tmpname);
        $type = $gis[2];
        switch ($type) {
            case "1":
                $imorig = imagecreatefromgif($tmpname);
                break;
            case "2":
                $imorig = imagecreatefromjpeg($tmpname);
                break;
            case "3":
                $imorig = imagecreatefrompng($tmpname);
                break;
            default:
                $imorig = imagecreatefromjpeg($tmpname);
        }
        $x = imagesx($imorig);
        $y = imagesy($imorig);

        $woh = (!$maxisheight) ? $gis[0] : $gis[1];

        if ($woh <= $size) {
            $aw = $x;
            $ah = $y;
        } else {
            if (!$maxisheight) {
                $aw = $size;
                $ah = $size * $y / $x;
            } else {
                $aw = $size * $x / $y;
                $ah = $size;
            }
        }
        $im = imagecreatetruecolor($aw, $ah);
        if (imagecopyresampled($im, $imorig, 0, 0, 0, 0, $aw, $ah, $x, $y)) {
            if (imagejpeg($im, $save_dir . $save_name)) {
                return true;
            } else {
                return false;
            }
        }
    }
}