<?php


include_once '../../base/const.php';

class qqUploadedFileXhr
{

     /**
    * Descripcion aqui    
    
    *@param type $path 
    *@access  
    *@return null    
    */
        function save($path)
    {
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $temp);
        fclose($input);

        if ($realSize != $this->getSize())
        {
            return false;
        }

        $target = fopen($path, "w");
        fseek($temp, 0, SEEK_SET);
        stream_copy_to_stream($temp, $target);
        fclose($target);

        return true;
    }

 /**
    * Descripcion aqui    
    
    *@access  
    *@return null    
    */
     /**
    * Descripcion aqui    
    
    *@access  
    *@return null    
    */
        function getName()
    {
        return $_GET['qqfile'];
    }

 /**
    * Descripcion aqui    
    
    *@access  
    *@return null    
    */
     /**
    * Descripcion aqui    
    
    *@access  
    *@return null    
    */
        function getSize()
    {
        if (isset($_SERVER["CONTENT_LENGTH"]))
        {
            return (int) $_SERVER["CONTENT_LENGTH"];
        }
        else
        {
            throw new Exception('Getting content length is not supported.');
        }
    }

}


class qqUploadedFileForm
{

    
     /**
    * Descripcion aqui    
    
    *@param type $path 
    *@access  
    *@return null    
    */
        function save($path)
    {
        if (!move_uploaded_file($_FILES['qqfile']['tmp_name'], $path))
        {
            return false;
        }
        return true;
    }

 /**
    * Descripcion aqui    
    
    *@access  
    *@return null    
    */
     /**
    * Descripcion aqui    
    
    *@access  
    *@return null    
    */
        function getName()
    {
        return $_FILES['qqfile']['name'];
    }

 /**
    * Descripcion aqui    
    
    *@access  
    *@return null    
    */
     /**
    * Descripcion aqui    
    
    *@access  
    *@return null    
    */
        function getSize()
    {
        return $_FILES['qqfile']['size'];
    }

}

class qqFileUploader
{

    private $allowedExtensions = array();
    private $sizeLimit = 10485760;
    private $file;

 /**
    * Descripcion aqui    
    
    *@param type array $allowedExtensions = array() 
    *@param String  $sizeLimit = 10485760 
    *@access  
    *@return null    
    */
        function __construct(array $allowedExtensions = array(), $sizeLimit = 10485760)
    {
        $allowedExtensions = array_map("strtolower", $allowedExtensions);

        $this->allowedExtensions = $allowedExtensions;
        $this->sizeLimit = $sizeLimit;

        $this->checkServerSettings();

        if (isset($_GET['qqfile']))
        {
            $this->file = new qqUploadedFileXhr();
        }
        elseif (isset($_FILES['qqfile']))
        {
            $this->file = new qqUploadedFileForm();
        }
        else
        {
            $this->file = false;
        }
    }

   /**
    * Descripcion aqui    
    
    *@access private
    *@return null    
    */
      private function checkServerSettings()
    {
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));

        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit)
        {
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';
            die("{'error':'increase post_max_size and upload_max_filesize to $size'}");
        }
    }

   /**
    * Descripcion aqui    
    
    *@param String $str 
    *@access private
    *@return null    
    */
      private function toBytes($str)
    {
        $val = trim($str);
        $last = strtolower($str[strlen($str) - 1]);
        switch ($last)
        {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;
        }
        return $val;
    }

    
 /**
    * Descripcion aqui    
    
    *@param type $uploadDirectory 
    *@param type  $replaceOldFile = FALSE 
    *@access  
    *@return null    
    */
        function handleUpload($uploadDirectory, $replaceOldFile = FALSE)
    {

        if (!is_writable($uploadDirectory))
        {
            return array('error' => "Server error. Upload directory isn't writable.");
        }

        if (!$this->file)
        {
            return array('error' => 'No files were uploaded.');
        }

        $size = $this->file->getSize();

        if ($size == 0)
        {
            return array('error' => 'El archivo esta vacio');
        }

        if ($size > $this->sizeLimit)
        {
            return array('error' => 'El Archivo muy grande; Por favor intente con otro');
        }

        $pathinfo = pathinfo($this->file->getName());
        $filename = str_replace(" ", "_", $pathinfo['filename']);
                $ext = $pathinfo['extension'];

        if ($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions))
        {
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => 'File has an invalid extension, it should be one of ' . $these . '.');
        }

        if (!$replaceOldFile)
        {
                        while (file_exists($uploadDirectory . $filename . '.' . $ext))
            {
                $filename .= rand(10, 99);
            }
        }

        if ($this->file->save($uploadDirectory . $filename .".". $ext))
        {

            $info =$filename .".". $ext;
            return array('success' => true, "info" => $info,"ext"=> $ext);
        }
        else
        {
            return array('error' => 'no se pudo guardar la imagen.' .
                'The upload was cancelled, or server error encountered');
        }
    }

}

$allowedExtensions = array("jpg", "png", "jpeg", "bmp","gif");
$sizeLimit = 2 * 1024 * 1024;

$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

$result = $uploader->handleUpload(ARTICLE ."/", true);



echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
