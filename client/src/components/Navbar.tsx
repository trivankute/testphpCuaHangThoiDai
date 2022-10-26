import React from "react";

export function Navbar() {
    return (
        <header className="header">
            <a href="#" className="logo">
                <i className="fa-solid fa-compact-disc"></i> timesrecord
            </a>

            <nav className="navbar">
                <a href="#home">Home</a>
                <a href="#features">Service</a>
                <a href="#products">Products</a>
                <a href="#categories">Categories</a>
                <a href="#review">Review</a>
                <a href="#blogs">Blogs</a>
            </nav>

            <div className="icons">
                <div className="fas fa-bars" id="menu-btn"></div>
                <div className="fas fa-search" id="search-btn"></div>
                <div className="fas fa-shopping-cart" id="cart-btn"></div>
                <div className="fas fa-user" id="login-btn"></div>
            </div>

            <form action="" className="search-form">
                <input type="search" id="search-box" placeholder="search here..." />
                <label htmlFor="search-box" className="fas fa-search"></label>
            </form>

            <div className="shopping-cart">
                <div className="box cart-row">
                    <img src="image/1989.png" alt="" />
                    <div className="content">
                        <h3>1989</h3>
                        <span className="price cart-price">$6.99</span>
                        <div className="cart-quantity">
                            <span>Quantity: </span>
                            <input className="cart-quantity-input" type="number" value="2" />
                            <i className="fas fa-trash"></i>
                        </div>
                    </div>
                </div>

                <div className="box cart-row">
                    <img src="image/Folklore.png" alt="" />
                    <div className="content">
                        <h3>Folklore</h3>
                        <span className="price cart-price">$4.99</span>
                        <div className="cart-quantity">
                            <span>Quantity: </span>
                            <input className="cart-quantity-input" type="number" value="2" />
                            <i className="fas fa-trash"></i>
                        </div>
                    </div>
                </div>

                <div className="box cart-row">
                    <img src="image/Lover.png" alt="" />
                    <div className="content">
                        <h3>Lover</h3>
                        <span className="price cart-price">$5.99</span>
                        <div className="cart-quantity">
                            <span>Quantity: </span>
                            <input className="cart-quantity-input" type="number" value="1" />
                            <i className="fas fa-trash"></i>
                        </div>
                    </div>
                </div>
                <div className="total cart-total-price">total : $19.69/-</div>
                <a href="#" className="btn">checkout</a>
            </div>

            <form action="" className="login-form">
                <h3>login now</h3>
                <input type="email" placeholder="your email" className="box" />
                <input type="password" placeholder="your password" className="box" />
                <p>forget your password <a href="#">click here</a></p>
                <p>don't have an account <a href="#">create now</a></p>
                <input type="submit" value="login now" className="btn" />
            </form>
        </header>
    );
}