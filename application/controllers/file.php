<?php

class File extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function download($nama_file)
	{
		force_download('uploads/'.$nama_file,NULL);
	}

}
