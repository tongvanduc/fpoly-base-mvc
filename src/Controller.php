<?php

namespace Ductong\BaseMvc;

class Controller {
    // Render ra giao diện client
    protected function render($view, $data = []) {
        $data['view'] = $view;

        extract($data);

        include "Views/client/master.php";
    }

    // Render ra giao diện Admin
    protected function renderAdmin($view, $data = []) {
        $data['view'] = $view;

        extract($data);

        include "Views/admin/master.php";
    }
}