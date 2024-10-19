import React from "react";
import "./header.css";

const Header = () => {
  return (
    <header className="header">
      <div className="left">
        <a href="#" className="social-icon">
          <i className="fab fa-facebook"></i>
        </a>
        <img src="/logo.png" alt="Logo" className="logo" />
      </div>

      <div className="center">
        <input
          type="text"
          placeholder="Nhập từ khóa tìm kiếm"
          className="search-bar"
        />
        <button className="search-btn">
          <i className="fas fa-search"></i>
        </button>
      </div>

      <div className="right">
        <div className="right-notification">
          <i className="fas fa-bell">Thông báo</i>
        </div>
        <div className="right-help">
          <i href="#" className="fas fa-question-circle">
            Trợ giúp
          </i>
        </div>
        <div className="right-info-user">
          <img src="/logo.png" alt="Logo" className="logo" />
          <a href="">Thông tin người dùng</a>
        </div>
        <div className="right-cart">
          <i className="fas fa-shopping-cart"></i>
        </div>
      </div>
    </header>
  );
};

export default Header;
