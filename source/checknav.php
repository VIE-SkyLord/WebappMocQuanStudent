<?php 
// Hàm kiểm tra phân quyền để định dạng nav theo phân quyền
$directnav = function($permission,$displayname) 
{
    // If permission is 1, redirect to the admin page
    if ($permission == 1) 
    {
        include 'nav-admin.php';
    }
    // If permission is 2, redirect to the customer page
    else if ($permission == 2) 
    {
        include 'nav-customer.php';
    }
    // If permission is neither 1 nor 2, do nothing (return)
    else 
    {
        return;
    }
}
?>