<?php 
// Hàm kiểm tra phân quyền để về trang chủ
$directpage = function($permission, $pageadmin, $pagecustomer) 
{
    // If permission is 1, redirect to the admin page
    if ($permission == 1) 
    {
        include $pageadmin;
    }
    // If permission is 2, redirect to the customer page
    else if ($permission == 2) 
    {
        include $pagecustomer;
    }
    // If permission is neither 1 nor 2, do nothing (return)
    else 
    {
        return;
    }
}
?>