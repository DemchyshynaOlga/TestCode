<?php

class View {
    /**
     * @param $data
     * @param $type
     */
	public static function action($data, $type) {
	    header('Content-Type: application/'.$type);
		echo $data;
	}
}