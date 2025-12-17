<?php


namespace App\Controllers;

use App\Models\Korisnik;
use App\Services\MailService;
use Core\Controller;
use Core\Url;

class HomeController extends Controller{
    public function index(): void{
        $this->view('home/index');
    }

    public function register(): void{
        if($_SERVER["REQUEST_METHOD"]==="POST" && !isset($_POST["sendMail"])){
            $activationKey=Korisnik::create($_POST);

            $_SESSION['activation']=[
                'ime'=>$_POST["ime"],
                'prezime'=>$_POST["prezime"],
                'email'=>$_POST["email"],
                'key'=>$activationKey
            ];

            $this->view('home/activation-preview');
            return;
        }
        if(isset($_POST["sendMail"]) && isset($_SESSION["activation"])){
            //slanje mail-a
            MailService::sendActivation(
                $_SESSION["activation"]["email"],
                Url::base()."/index.php?page=activate&key=  ".$_SESSION["activation"]["mail"]
            );
            unset($_SESSION["activation"]);
            return;
            
        }
        $this->view('home/register');
    }

    public function activate():void{
        if(isset($_GET["key"]) && Korisnik::activate($_GET["key"])){
            $this->view('home/activate-success');
        }
        else{
            echo "Neispravan aktivacijski link!";
        }
    }

    public function login(){

        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $user = Korisnik::authenticate($_POST["korime"],$_POST["sifra"]);

            if($user){
                $_SESSION["user"]=[
                    'id'=>$user["id"],
                    'korime'=>$user["korime"],
                    'tip'=>$user["tip_naziv"],
                ];

                header("Location: index.php");
                exit;
            }
            $this->view('home/login',['error'=>'Neispravni podaci za prijavu ili račun nije aktivan']);
            return;
        }

        $this->view('home/login');
    }

    public function logout(): void{
        session_destroy();
        header("Location: index.php?=login");
        exit;
    }

}