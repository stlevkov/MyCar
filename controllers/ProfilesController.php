<?php

class ProfilesController extends BaseController
{
    function onInit()
    {
        $this->authorize();
    }

    function index()
    {
        $this->users = $this->model->getAll();
    }

    function delete(int $id)
    {
        if (htmlspecialchars($_SESSION['username']) == 'admin') {
            if ($this->isPost) {
                if ($this->model->delete($id)) {
                    $this->addInfoMessage("User deleted.");
                } else {
                    $this->addErrorMessage("Error: You cannot delete this user!");
                    $this->addErrorMessage("Check if user have posts and parts data!");
                    $this->redirect("posts");
                }
                $this->redirect('profiles');
            } else {
                $user = $this->model->getUserById($id);
                if (!$user) {
                    $this->addErrorMessage("Error: user does not exist");
                    $this->redirect("profiles");
                }
                $this->user = $user;
            }
        } else {
            $this->redirect('home');
        }
    }

    function edit(int $id)
    {
        if (htmlspecialchars($_SESSION['username']) == 'admin') {
            if ($this->isPost) {
                // HTTP POST
                $username = $_POST['username'];
                if (strlen($username) < 1) {
                    $this->setValidationError("username", "Username cannot be empty!");
                }
                $full_name = $_POST['full_name'];
                if (strlen($full_name) < 1) {
                    $this->setValidationError("full_name", "Full name cannot be empty!");
                }
                if ($this->formValid()) {
                    if ($this->model->edit($username, $full_name, $id)) {
                        $this->addInfoMessage("user edited.");
                    } else {
                        $this->addErrorMessage("Error: cannot edit user.");
                    }
                    $this->redirect('profiles');
                }
            }
            $user = $this->model->getUserById($id);
            if (!$user) {
                $this->addErrorMessage("Error: user does not exist");
                $this->redirect("profiles");
            }
            $this->user = $user;
        } else {
            $this->redirect('home');
        }
    }
}