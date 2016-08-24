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
                    $this->addInfoMessage("Потребителят беше успешно изтрит.");
                } else {
                    $this->addErrorMessage("Грешка: Потребителят не може да бъде изтрит!");
                    $this->addErrorMessage("Проверете дали потребителят няма публикувани новини!");
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
            $this->redirect('errors');
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
                        $this->addErrorMessage("You need to logout and login to update browser data!");
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
            $this->redirect('errors');
        }
    }
}