import React from "react";
import "../assets/css/ViewCart.css";
import Header from "./Header";
import Footer from "./Footer";
const Cart = () => {
  return (
    <div>
      <Header />
      <div className="cart-container">
        <h2>Giỏ hàng</h2>
        <table className="cart-table">
          <thead>
            <tr>
              <th id="img">Hình ảnh</th>
              <th>Tên</th>
              <th>Mã Sản Phẩm</th>
              <th>Color</th>
              <th>Đơn giá</th>
              <th>Số lượng</th>
              <th>Số tiền</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <img src="/logo.png" alt="Anh" />
              </td>
              <td>sản phẩm 1</td>
              <td>ABC</td>
              <td>màu abc</td>
              <td>123</td>
              <td>1</td>
              <td>99,999</td>
              <td>
                <button className="delete-btn">🗑️</button>
              </td>
            </tr>
          </tbody>
        </table>
        <div className="cart-summary">
          <p>
            Tổng số lượng sản phẩm: <strong>1</strong>
          </p>
          <p>
            Tổng số tiền: <strong>99,999</strong>
          </p>
          <button className="checkout-btn">Thanh Toán</button>
        </div>
        <div className="suggestions">
          <h3>Có thể bạn sẽ thích</h3>
          <div className="suggestion-items">
            <div className="suggestion-item">Sản phẩm gợi ý</div>
            <div className="suggestion-item">Sản phẩm gợi ý</div>
            <div className="suggestion-item">Sản phẩm gợi ý</div>
            <div className="suggestion-item">Sản phẩm gợi ý</div>
            <div className="suggestion-item">Sản phẩm gợi ý</div>
            <div className="suggestion-item">Sản phẩm gợi ý</div>
          </div>
        </div>
      </div>
      <Footer />
    </div>
  );
};

export default Cart;
