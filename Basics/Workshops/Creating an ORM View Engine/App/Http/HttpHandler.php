<?php
/**
 * Created by PhpStorm.
 * User: Kati
 * Date: 1.11.2018 г.
 * Time: 15:01
 */

namespace App\Http;

use App\Data\UserDTO;
use App\Service\UserServiceInterface;


class HttpHandler extends HttpHandlerAbstract
{
    public function index(){
        $this->render("home/index");
    }
    public function allUsers(UserServiceInterface $userService){
        $this->render("users/all",$userService->all());
    }
    public function profile(UserServiceInterface $userService,array $formData=[]){
        $currentUser=$userService->currentUser();

        if($currentUser==null) {
            $this->redirect("login.php");
        }

        if (isset($formData['edit'])){
            $this->handleEditProcess($userService,$formData);
        }else {
            $this->render("users/profile",$currentUser);
        }
    }

    public function login(UserServiceInterface $userService,array $formData=[]){
        if (isset($formData['login'])){
            $this->handleLoginProcess($userService,$formData);
        }else{
            $this->render("users/login");
        }
    }
    public function register(UserServiceInterface $userService,array $formData=[]){
        if (isset($formData['register'])){
            $this->handleRegisterProcess($userService, $formData);
        }else {
            $this->render("user/register");
        }
    }

    /**
     * @param UserServiceInterface $userService
     * @param array $formData
     */
    public function handleRegisterProcess(UserServiceInterface $userService, array $formData): void
    {
        $user = $this->dataBinder->bind($formData,UserDTO::class);

        if ($userService->register($user, $formData['confirm_password'])) {
            $this->redirect("login.php");
        }else{
            $this->render("app/error",new ErrorDTO("Username is already taken or password mismatch."));
        }
    }

    private function handleLoginProcess(UserServiceInterface $userService, array $formData): void
    {
        $currentUser=$userService->login($formData['username'],$formData['password']);
        $_SESSION['id']=$currentUser->getId();
        if ($currentUser!==null){
            $this->redirect("profile.php");
        }else{
            $this->render("app/error",new ErrorDTO("Username does not exist or password does not match."));
        }
    }

    public function handleEditProcess(UserServiceInterface $userService, array $formData): void
    {
        $user = $this->dataBinder->bind($formData,UserDTO::class);

        if($userService->edit($user)){
            $this->redirect("profile.php");
        }
        else{
            $this->render("app/error",new ErrorDTO("Error editing the profile."));
        }
    }
}