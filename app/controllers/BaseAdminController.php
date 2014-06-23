<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminBaseController
 *
 * @author User
 */
class BaseAdminController extends BaseController {
     protected function setupLayout() {
        $this->layout = 'layouts.admin';
        parent::setupLayout();
    }
}
