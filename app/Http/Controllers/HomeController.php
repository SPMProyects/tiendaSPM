<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Category;
use App\Product;
use App\Image;
use App\Order;
use App\Configuration;
use App\Mail\NewUser;
use App\Zipper\Facades\Zipper;
use FilesystemIterator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ZipArchive;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //PRUEBAS
        /*
        
        FUNCIONA BIEN

        $zip = new ZipArchive();
        $zip_name = public_path() . '\exports\prueba.zip';
        $dir = public_path() . '\storage\general';
        
        if (!$zip->open($zip_name, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            exit("Error abriendo ZIP en $zip_name");
        }
        $zip->addEmptyDir('general');
        
        $archivos = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::LEAVES_ONLY
        );
        
        foreach($archivos as $archivo){
            $rutaAbsoluta = $archivo->getRealPath();
            $nombreArchivo = $archivo->getFilename();
            $zip->addFile($rutaAbsoluta , $nombreArchivo);
        }
        
        $resultado = $zip->close();
        if ($resultado) {
            echo "Archivo creado";
        } else {
            echo "Error creando archivo";
        }
        */

        /* 

        FUNCIONA BIEN

        $the_folder = public_path() . '\storage\general';
        $zip_file_name = public_path() . '\exports\prueba.zip';
        $za = new ZipArchive();
        $res = $za->open($zip_file_name, ZipArchive::CREATE);
        if($res === TRUE) 
        {
            $this->addDir($za, $the_folder, basename($the_folder));
            $za->close();
        }
        else{
        echo 'Could not create a zip archive';
        }

        */

        $folders_to_zip = [
            public_path() . '\storage\general',
            public_path() . '\storage\home',
        ];

        $zip_file_name = public_path() . '\exports\prueba.zip';
        
        Zipper::setZipFileName($zip_file_name);
        Zipper::setFoldersToZip($folders_to_zip);
        Zipper::makeZip();

        return view('home');
        }


        /*

        FUNCIONA BIEN

        public function addDir($zip, $location, $name) 
            {
                $zip->addEmptyDir($name);
                $this->addDirDo($zip, $location, $name);
            } 
        private function addDirDo($zip, $location, $name) 
            {
                $name .= '/';
                $location .= '/';
                $dir = opendir ($location);
                while ($file = readdir($dir))
                {
                    if ($file == '.' || $file == '..') continue;
                    $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
                    $zip->$do($location . $file, $name . $file);
                }
            } 
        */
    


}
