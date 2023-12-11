<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>
<%@page contentType="text/html" pageEncoding="UTF-8"%>

   <%-- Kiểm tra và hiển thị thông báo thành công nếu có --%>
    <% if (request.getAttribute("successMessage") != null) { %>
        <p class="success-message"><%= request.getAttribute("successMessage") %></p>
    <% } %>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link href="css/login.css" rel="stylesheet" type="text/css"/>
        <title>Đăng Nhập</title>
    </head>
     <style>
            img{
                width: 200px;
                height: 120px;
            }
            
input[type="submit"], button[type=submit] {
    background: none repeat scroll 0 0 #435d7d;
    border: medium none;
    color: #fff;
    padding: 11px 20px;
    text-transform: uppercase;
}

input, button, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
        </style>
    <body>
        <div class="container">
            <a href="shop">   <button type="submit">Trở Về Trang Chủ</button></a>
        <div id="logreg-forms">
         

            <form action="signup"  method="post" class
                   <p class="text-danger">${mess2}</p>
                 <p class="text-danger">${mess3}</p>
                 <p class="text-danger">${mess4}</p>
                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Đăng Kí</h1>
                <input name="name" type="text" id="user-name" class="form-control" placeholder="Tên" required="" autofocus="">
                <input name="user" type="text" id="user-name" class="form-control" placeholder="Tài Khoản" required="" autofocus="">
                <input name="sdt" type="text" id="user-name" class="form-control" placeholder="Số Điện Thoại" required="" autofocus="">
                <input name="pass" type="password" id="user-pass" class="form-control" placeholder="Mật Khẩu" required autofocus="">
                <input name="repass" type="password" id="user-repeatpass" class="form-control" placeholder="Nhập Lại Mật Khẩu" required autofocus="">

                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i>Đăng Kí</button>
                <a href="login.jsp" id="cancel_signup"><i class="fas fa-angle-left"></i> trở lại</a>
            </form>
                <br>

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            
        </script>
    
        </div>
        </body>
</html>