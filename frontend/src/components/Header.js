import React from 'react';
import '../assets/css/header.css';

import qrCode from '../assets/img/qr_code.png';
import googlePlay from '../assets/img/google_play.png';
import appStore from '../assets/img/app_store.png';

const Header = ({ currentUser, carts, searchHistory }) => {
    const imageUrl = currentUser ? require(`../assets/img/${currentUser.customer.image}`) : '';

    return (
        <header className="header">
            <div className="grid">
                {currentUser ? (
                    <nav className="header__navbar">
                        <ul className="header__navbar-list">
                            <li className="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate">
                                Vào cửa hàng trên ứng dụng Tech Store
                                <div className="header__qr">
                                    <img src={qrCode} alt="QR code" className="header__qr-img" />
                                    <div className="header__qr-apps">
                                        <a href="#" className="header__qr-link">
                                            <img
                                                src={googlePlay}
                                                alt="Google Play"
                                                className="header__qr-download-img"
                                            />
                                        </a>
                                        <a href="#" className="header__qr-link">
                                            <img src={appStore} alt="App Store" className="header__qr-download-img" />
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li className="header__navbar-item">
                                <span className="header__navbar-title--no-pointer">Kết nối</span>
                                <a href="https://www.facebook.com/finn.264/" className="header__navbar-icon-link">
                                    <i className="header__navbar--icon fa-brands fa-facebook"></i>
                                </a>
                                <a href="https://www.instagram.com/im.vulinh__/" className="header__navbar-icon-link">
                                    <i className="header__navbar--icon fa-brands fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                        <ul className="header__navbar-list">
                            <li className="header__navbar-item header__navbar-item--has-notify">
                                <a href="#" className="header__navbar-item-link">
                                    <i className="header__navbar-icon far fa-bell"></i>
                                    Thông báo
                                </a>
                                <div className="header__notify">
                                    <header className="header__notify-header">
                                        <h3>Thông báo mới nhận</h3>
                                    </header>
                                    <ul className="header__notify-list">
                                        <li>Thông báo1</li>
                                        <li>Thông báo2</li>
                                        <li>Thông báo3</li>
                                    </ul>
                                    <footer className="header__notify-footer">
                                        <a href="#" className="header__notify-footer-btn">
                                            Xem tất cả
                                        </a>
                                    </footer>
                                </div>
                            </li>
                            <li className="header__navbar-item">
                                <a href="#" className="header__navbar-item-link">
                                    <i className="header__navbar-icon fa-regular fa-circle-question"></i>
                                    Trợ giúp
                                </a>
                            </li>
                            <li className="header__navbar-item header__navbar-user">
                                <div
                                    className="header__navbar-user-img"
                                    style={{ backgroundImage: `url(${imageUrl})` }}
                                ></div>
                                <span className="header__navbar-user-name">{currentUser.name}</span>
                                <ul className="header__navbar-user-menu">
                                    <li className="header__navbar-user-item">
                                        <a href={`/user/profile/${currentUser.id}`}>Tài Khoản Của Tôi</a>
                                    </li>
                                    <li className="header__navbar-user-item">
                                        <a href={`/user/password/${currentUser.id}`}>Mật Khẩu</a>
                                    </li>
                                    <li className="header__navbar-user-item">
                                        <a href="/user/purchase">Đơn Mua</a>
                                    </li>
                                    <li className="header__navbar-user-item">
                                        <a href="/user/voucher">Mã Giảm Giá</a>
                                    </li>
                                    <li className="header__navbar-user-item">
                                        <a href="/signout">Đăng Xuất</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                ) : (
                    <nav className="header__navbar">
                        <ul className="header__navbar-list">
                            <li className="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate">
                                Vào cửa hàng trên ứng dụng GenZ Store
                                <div className="header__qr">
                                    <img src={qrCode} alt="QR code" className="header__qr-img" />
                                    <div className="header__qr-apps">
                                        <a href="#" className="header__qr-link">
                                            <img
                                                src={googlePlay}
                                                alt="Google Play"
                                                className="header__qr-download-img"
                                            />
                                        </a>
                                        <a href="#" className="header__qr-link">
                                            <img src={appStore} alt="App Store" className="header__qr-download-img" />
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li className="header__navbar-item">
                                <span className="header__navbar-title--no-pointer">Kết nối</span>
                                <a href="https://www.facebook.com/finn.264/" className="header__navbar-icon-link">
                                    <i className="header__navbar--icon fa-brands fa-facebook"></i>
                                </a>
                                <a href="https://www.instagram.com/im.vulinh__/" className="header__navbar-icon-link">
                                    <i className="header__navbar--icon fa-brands fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                )}
                <div className="header-with-search">
                    <div className="header__logo-img" id="header__logo-out">
                        <a href="/" className="header__logo-link">
                            <i
                                className="fa-brands fa-shopify fa-2xl"
                                style={{ color: '#74C0FC', fontSize: '3em' }}
                            ></i>
                            <svg className="header__logo-img" viewBox="0 0 200 50">
                                <text x="12" y="40" fontFamily="Arial, sans-serif" fontSize="36" fill="#74C0FC">
                                    GenZ Store
                                </text>
                            </svg>
                        </a>
                    </div>
                    <div className="header__search">
                        <div className="header__search-input-wrap">
                            <form action="/product/search" method="GET">
                                <input
                                    type="text"
                                    name="query"
                                    className="header__search-input"
                                    placeholder="Nhập để tìm kiếm sản phẩm"
                                />
                                <div className="header__search-history">
                                    <h3 className="header__search-history-heading">Lịch sử tìm kiếm</h3>
                                    <ul className="header__search-history-list">
                                        {/* {searchHistory.length > 0 ? (
                                            searchHistory.map((query, index) => (
                                                <li key={index} className="header__search-history-item">
                                                    <a href="#">{query}</a>
                                                    <button type="button" className="header__search-history-remove">
                                                        X
                                                    </button>
                                                </li>
                                            ))
                                        ) : (
                                            <li className="header__search-history-item">Không có lịch sử tìm kiếm.</li>
                                        )} */}
                                    </ul>
                                </div>
                            </form>
                        </div>
                        <div className="header__search-select">
                            <span className="header__search-select-label">Trong shop</span>
                            <i className="header__search-select-icon fa-solid fa-angle-down"></i>
                            <ul className="header__search-option">
                                <li className="header__search-option-item header__search-option-item--active">
                                    <span>Trong shop</span>
                                    <i className="fa-solid fa-check"></i>
                                </li>
                                <li className="header__search-option-item">
                                    <span>Ngoài shop</span>
                                    <i className="fa-solid fa-check"></i>
                                </li>
                            </ul>
                        </div>
                        <button type="submit" className="header__search-btn">
                            <i className="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <div className="header__cart">
                        <a href="/cart" className="header__cart-link">
                            <i className="fa-solid fa-cart-shopping header__cart-icon"></i>
                            <span className="header__cart-notice">{/* {carts.length} */}</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>
    );
};

export default Header;
