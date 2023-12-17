<!DOCTYPE html>
<html>
<head>
    <title>Menu ba cấp</title>
   
</head>
<style>
    /* Thiết lập kiểu cho navbar */
.navbar {
    background-color: #333;
    padding: 10px;
}

.menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.menu li {
    position: relative;
    display: inline-block;
}

.menu li a {
    display: block;
    padding: 10px 20px;
    text-decoration: none;
    color: #fff;
    transition: background-color 0.3s;
}

.menu li:hover > a {
    background-color: #555;
}

.menu .submenu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #fff;
    border: 1px solid #ccc;
    z-index: 1;
}

.menu .submenu.show {
    display: block;
}

.menu .submenu li {
    display: block;
}

.menu li:hover > .submenu {
    display: block;
}

.menu .subsubmenu {
    display: none;
    position: absolute;
    top: 0;
    left: 100%;
    background-color: #fff;
    border: 1px solid #ccc;
    z-index: 1;
}

.menu .submenu li:hover > .subsubmenu {
    display: block;
}

</style>
<body>
    <nav class="navbar">
        <ul class="menu">
            <li><a href="#">Menu 1</a>
                <ul class="submenu">
                    <li><a href="#">Menu 1.1</a>
                        <ul class="subsubmenu">
                            <li><a href="https://www.google.com/">Menu 1.1.1</a></li>
                            <li><a href="https://www.google.com/">Menu 1.1.2</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Menu 1.2</a>
                        <ul class="subsubmenu">
                            <li><a href="#">Menu 2.1.1</a></li>
                            <li><a href="#">Menu 2.1.2</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">Menu 2</a></li>
        </ul>
    </nav>

    <script>
        const menuItems = document.querySelectorAll('.menu > li > a');

        menuItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const submenu = this.nextElementSibling;
                submenu.classList.toggle('show');
            });
        });
    </script>
</body>
</html>
