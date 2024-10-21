import React from "react";
import "../assets/css/Cart.css";
import { Link } from "react-router-dom";
// Dữ liệu mẫu cho giỏ hàng
const sampleCarts = [
  {
    id: 1,
    product: {
      id: 101,
      name: "Sản phẩm 1",
      price: 100000,
      percent_discount: 10,
      image: "product1.png",
      category: "Điện tử",
    },
    quantity: 2,
  },
  {
    id: 2,
    product: {
      id: 102,
      name: "Sản phẩm 2",
      price: 200000,
      percent_discount: 5,
      image: "product2.png",
      category: "Thời trang",
    },
    quantity: 1,
  },
];

const Cart = () => {
  const carts = sampleCarts;
  const cartCount = carts.length;

  const calculateNewPrice = (price, discount) => {
    return price - (price * discount) / 100;
  };

  return (
    <div className="header__cart">
      <Link to="/ViewCart" className="header__cart-click"></Link>
      <div className="header__cart-wrap">
        {" "}
        <Link to="/ViewCart">
          {" "}
          <i className="header__cart-icon fa-solid fa-cart-shopping"></i>
        </Link>
        <span className="header__cart-notice">{cartCount}</span>
        <div className="header__cart-list">
          {cartCount === 0 ? (
            <img
              src="assets/img/no-cart.webp"
              alt=""
              className="header__cart-no-cart-img"
            />
          ) : (
            <>
              <h4 className="header__cart-heading">Sản phẩm trong giỏ hàng</h4>
              <ul className="header__cart-list-item">
                {carts.map((cart) => {
                  const newPrice = calculateNewPrice(
                    cart.product.price,
                    cart.product.percent_discount
                  );
                  return (
                    <li key={cart.id} className="header__cart-item">
                      <a href={`/detail/${cart.product.id}`}>
                        <img
                          src={`assets/img/${cart.product.image}`}
                          alt=""
                          className="header__cart-img"
                        />
                      </a>
                      <div className="header__cart-item-info">
                        <div className="header__cart-item-head">
                          <h5 className="header__cart-item-name">
                            <a href={`/detail/${cart.product.id}`}>
                              {cart.product.name}
                            </a>
                          </h5>
                          <div className="header__cart-item-price-wrap">
                            <span className="header__cart-item-price">
                              {newPrice.toLocaleString()}đ
                            </span>
                            <span className="header__cart-item-multiply">
                              x
                            </span>
                            <span className="header__cart-item-qnt">
                              {cart.quantity}
                            </span>
                          </div>
                        </div>
                        <div className="header__cart-item-body">
                          <span className="header__cart-item-description">
                            Phân loại: {cart.product.category}
                          </span>
                          <form
                            action={`/cart/remove/${cart.id}`}
                            method="post"
                          >
                            <button
                              type="submit"
                              className="header__cart-item-remove"
                            >
                              Xóa
                            </button>
                          </form>
                        </div>
                      </div>
                    </li>
                  );
                })}
                <Link
                  to="/ViewCart"
                  className="header__cart-view-cart btn btn--primary"
                >
                  {" "}
                  Xem giỏ hàng
                </Link>
              </ul>
            </>
          )}
        </div>
      </div>
    </div>
  );
};

export default Cart;
