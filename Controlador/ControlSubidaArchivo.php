<?php

class ControlSubidaArchivo
{
    private $directorio;
    private $rutaCompleta;
    private $imageFileType;

    public function __construct()
    {
        $this->directorio = "../Recursos/Subidas/";
        $this->rutaCompleta = $this->directorio . basename($_FILES["imagen"]["name"]);
    }
    public function mostrarDatosFichero()
    {
        print "Nombre de fichero: " . $_FILES['imagen']['name'] . "<br>";
        print "Tipo : " . $_FILES['imagen']['type'] . "<br>";
        print "Tamaño : " . $_FILES['imagen']['size'] . "<br>";
        print "Nombre temporal: " . $_FILES['imagen']['tmp_name'] . "<br>";
        print "Error : " . $_FILES['imagen']['error'] . "<br>";
        print "Ruta completa: " . $this->rutaCompleta . "<br>";
    }

    public function comprobarExiste()
    {
        // Check if file already exists
        if (file_exists($this->rutaCompleta)) {
            return false;
        } else {
            return true;
        }
    }
    public function comprobarImagen()
    {
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if ($check !== false) {
            print "File is an image - " . $check["mime"] . ".";
            $this->tipoImagen();
            return true;
        } else {
            return false;
        }
    }

    public function tipoImagen()
    {
        // Allow certain file formats
        if (
            $this->imageFileType != "jpg" && $this->imageFileType != "png" && $this->imageFileType != "jpeg"
            && $this->imageFileType != "gif"
        ) {
            return true;
        } else {
            return false;
        }

    }

    public function moverImagen()
    {
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $this->rutaCompleta)) {
            print "The file " . htmlspecialchars(basename($_FILES["imagen"]["name"])) . " has been uploaded.";
            return true;
        } else {
            print "Sorry, there was an error uploading your file.";
            return false;
        }
    }

    public function proceso()
    {

        if ($this->comprobarExiste()) {
            if ($this->comprobarImagen()) {
                if ($this->tipoImagen()) {
                    if ($this->moverImagen()) {
                        return $this->getRutaCompleta();
                    } else {
                        return -4;
                    }
                } else {
                    return -3;
                }
            } else {
                return -2;
            }
        } else {
            return -1;
        }
    }
    public function getRutaCompleta(): string
    {
        return $this->rutaCompleta;
    }
}
?>