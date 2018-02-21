<?php
if ($this->session->userdata('user_id') != TRUE && $this->session->userdata('email') != TRUE)
{
    $base_url = BASE_URL;
    header("Location: $base_url/index.php/UserLogin/index");   
}
?>