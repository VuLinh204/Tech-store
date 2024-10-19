import React from "react";
import "./footer.css"; // Import the CSS file for styling

const Footer = () => {
  return (
    <footer className="footer">
      <div className="footer-content">
        <div className="footer-section logo">
          <div className="shop-logo">ABC shop</div>
        </div>

        <div className="footer-section info">
          <h4>Thông tin và chính sách</h4>
          <ul>
            <li>Trung tâm trợ giúp</li>
            <li>Chính sách bảo hành</li>
            <li>Trả hàng & hoàn tiền</li>
          </ul>
        </div>

        <div className="footer-section address">
          <p>Địa chỉ: TP Hồ Chí Minh</p>
          <p>Hotline: 0907456421</p>
        </div>

        <div className="footer-section social">
          <h4>Liên hệ</h4>
          <div className="social-icons">
            <a href="#">
              <i className="fab fa-facebook"></i>
            </a>
            <a href="#">
              <i className="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i className="fas fa-envelope"></i>
            </a>
            <a href="#">
              <i className="fab fa-linkedin"></i>
            </a>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
