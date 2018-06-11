<?php
function view($file)
{
	return include('view/'.$file.'.php');
}

function redirect($path)
{
	return 	header('location: index.php?'.base64_encode($path));
}