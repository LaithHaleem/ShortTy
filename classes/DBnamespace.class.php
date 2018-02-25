<?php

 interface DBnamespace {
 	public function Insert($table, $cols = []);
 	public function Get($table, $where);
 	public function Update($table, $fields, $where);
 	public function Delete($table, $id);
 	public function G_query($stmt);
 }