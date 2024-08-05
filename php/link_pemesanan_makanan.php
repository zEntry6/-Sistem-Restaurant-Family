<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="../restaurant.css">
    <link rel="stylesheet" href="../style.css">
    <script src="../js/ShoppingCart.js" defer></script>
</head>

<body>
    <nav class="navbar">
        <a href="../index.html" class="navbar-logo">Restaurant<span> Family</span></a>
        <div class="navbar-nav">
            <a href="../index.html">Home</a>
            <a href="../index.html">Tentang</a>
            <a href="../index.html">Menu</a>
            <a href="../index.html">Kontak</a>
        </div>
        <div class="navbar-extra">
            <!-- <a href="#" id="shopping-cart-button"><i data-feather="shopping-cart"></i></a> -->
            <button id="login-show"><a href="../login.html">Login</button></a>
            <a href="#" id="Hamburger-menu"><i data-feather="menu"></i></a>
        </div>

        <!-- Shopping cart 
        <div class="shopping-cart">
            <div class="cart-item">
                <img src="../img/Menu/beef.jpg" alt="pizza">
                <div class="item-detail">
                    <h3>pizza</h3>
                    <div class="item-price"></div>
                    IDR 75k
                </div>
                <i data-feather="trash-2" class="remove-item"></i>
            </div>
            <div class="cart-item">
                <img src="../img/Menu/sphageti.jpg" alt="Sphageti">
                <div class="item-detail">
                    <h3>Sphageti</h3>
                    <div class="item-price"></div>
                    IDR 35k
                </div>
                <i data-feather="trash-2" class="remove-item"></i>
            </div>
            <div class="cart-item">
                <img src="../img/Menu/steak.jpg" alt="steak">
                <div class="item-detail">
                    <h3>Steak</h3>
                    <div class="item-price"></div>
                    IDR 55k
                </div>
                <i data-feather="trash-2" class="remove-item"></i>
            </div>
            <div class="cart-item">
                <img src="../img/Menu/chicken.jpg" alt="chiken">
                <div class="item-detail">
                    <h3>Ayam panggang</h3>
                    <div class="item-price"></div>
                    IDR 35k
                </div>
                <i data-feather="trash-2" class="remove-item"></i>
            </div>
        </div>
          -->

    </nav>
    <!-- Product -->

    <section id="menu" class="menu" x-data="products">
        <h2>Menu <span>Kami</span></h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat, illum aspernatur possimus inventore porro
            odio.</p>

        <div class="main">
            <div class="content" id='foodList'>

            </div>
            <div class="sidebar" id="cartList">
                <div class="total">
                    <h1>Total: Rp. 30.000</h1>
                    <hr>
                </div>
                <div class="card-order">
                    <div class="detail">
                        <img src="../img/Menu/pizza.jpg" alt="">
                        <p>Pizza</p>
                        <span>3</span>
                    </div>
                    <button><i class="fas fa-trash"></i> Hapus</button>
                </div>
                <div class="card-order">
                    <div class="detail">
                        <img src="../img/Menu/chicken.jpg" alt="">
                        <p>Ayam Panggang</p>
                        <span>3</span>

                    </div>
                    <button><i class="fas fa-trash"></i> Hapus</button>
                </div>
                <div class="card-order">
                    <div class="detail">
                        <img src="../img/Menu/sphageti.jpg" alt="">
                        <p>Sphageti</p>
                        <span>3</span>
                    </div>
                    <button><i class="fas fa-trash"></i> Hapus</button>
                </div>

                <div class="card-finish">
                    <button>ORDER SEKARANG</button>
                </div>
            </div>
        </div>
    </section>


    <script>
        feather.replace();
    </script>


    <script>
        const shoppingCart = document.querySelector('.shopping-cart');

        document.querySelector('#shopping-cart-button').onclick = () => {
            shoppingCart.classList.toggle('active');
        };

        const sc = document.querySelector('#shopping-cart-button');

        document.addEventListener('click', function (e) {
            if (!sc.contains(e.target) && !shoppingCart.contains(e.target)) {
                shoppingCart.classList.remove('active');
            }
        });
    </script>
</body>