import React, { useState, useEffect } from "react";
import AddCategory from "./AddCategory"; // Import component AddCategory
import "../assets/css/CategoriesManage.css"; // Import file CSS
import axios from "axios";

const CategoriesManage = () => {
  const [activeItem, setActiveItem] = useState("Danh mục");
  const [isAdding, setIsAdding] = useState(false); // Trạng thái cho chế độ thêm danh mục
  const [categories, setCategories] = useState([]); // State để lưu danh sách danh mục

  // Hàm để gọi API lấy danh sách danh mục
  const fetchCategories = async () => {
    try {
      const response = await axios.get("http://localhost:82/categories");
      setCategories(response.data); // Cập nhật state với dữ liệu nhận được
    } catch (error) {
      console.error("Failed to fetch categories:", error);
    }
  };

  useEffect(() => {
    fetchCategories(); // Gọi hàm khi component mount
  }, []);
  const handleItemClick = (item) => {
    setActiveItem(item);
    setIsAdding(false); // Khi chọn mục khác thì không ở chế độ thêm
  };

  const handleAddCategoryClick = () => {
    setIsAdding(true); // Chuyển sang chế độ thêm danh mục
  };

  const handleAddSuccess = () => {
    setIsAdding(false); // Trở về chế độ xem danh sách sau khi thêm thành công
  };

  return (
    <div className="app__container">
      <div className="grid">
        <div className="grid__row app__content">
          <div className="grid__column-2">
            <nav className="manager">
              <h3 className="manager__heading">Quản lý</h3>
              <ul className="manager-list">
                <li className="manager-item">
                  <a
                    href="#"
                    className={`manager-item__link ${
                      activeItem === "Bảng điều khiển" ? "active" : ""
                    }`}
                    onClick={() => handleItemClick("Bảng điều khiển")}
                  >
                    Bảng điều khiển
                  </a>
                </li>
                <li className="manager-item">
                  <a
                    href="#"
                    className={`manager-item__link ${
                      activeItem === "Danh mục" ? "active" : ""
                    }`}
                    onClick={() => handleItemClick("Danh mục")}
                  >
                    Danh mục
                  </a>
                </li>
                <li className="manager-item">
                  <a
                    href="#"
                    className={`manager-item__link ${
                      activeItem === "Sản phẩm" ? "active" : ""
                    }`}
                    onClick={() => handleItemClick("Sản phẩm")}
                  >
                    Sản phẩm
                  </a>
                </li>
                <li className="manager-item">
                  <a
                    href="#"
                    className={`manager-item__link ${
                      activeItem === "Thanh trượt" ? "active" : ""
                    }`}
                    onClick={() => handleItemClick("Thanh trượt")}
                  >
                    Thanh trượt
                  </a>
                </li>
                <li className="manager-item">
                  <a
                    href="#"
                    className={`manager-item__link ${
                      activeItem === "Mã giảm giá" ? "active" : ""
                    }`}
                    onClick={() => handleItemClick("Mã giảm giá")}
                  >
                    Mã giảm giá
                  </a>
                </li>
                <li className="manager-item">
                  <a
                    href="#"
                    className={`manager-item__link ${
                      activeItem === "Người dùng" ? "active" : ""
                    }`}
                    onClick={() => handleItemClick("Người dùng")}
                  >
                    Người dùng
                  </a>
                </li>
              </ul>
            </nav>
          </div>

          <div className="grid__column-10">
            <div className="category-manager">
              {isAdding ? (
                // Nếu đang ở chế độ thêm, hiển thị component AddCategory
                <AddCategory onAddSuccess={handleAddSuccess} />
              ) : (
                // Nếu không ở chế độ thêm, hiển thị danh sách danh mục
                <div>
                  <div className="category-manager__header">
                    <h1>Danh sách các danh mục</h1>
                    <button
                      className="btn btn--primary"
                      onClick={handleAddCategoryClick}
                    >
                      + Thêm
                    </button>
                  </div>
                  <table className="category-table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th>Hình ảnh</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      {categories.length > 0 ? (
                        categories.map((category) => (
                          <tr key={category.id}>
                            <td>{category.id}</td>
                            <td>{category.name}</td>
                            <td>{category.description}</td>{" "}
                            {/* Giả sử bạn có một trường mô tả */}
                            <td>
                              <img src={category.thumbnail} alt="Hình ảnh" />
                            </td>
                            <td>
                              <button className="btn-edit">
                                <i className="fa fa-edit"></i>
                              </button>
                              <button className="btn-delete">
                                <i className="fa fa-trash"></i>
                              </button>
                            </td>
                          </tr>
                        ))
                      ) : (
                        <tr>
                          <td colSpan="5">Không có danh mục nào.</td>
                        </tr>
                      )}
                    </tbody>
                  </table>
                  <div className="pagination">
                    <button className="btn-pagination">1</button>
                    <button className="btn-pagination">2</button>
                    <button className="btn-pagination">3</button>
                  </div>
                </div>
              )}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default CategoriesManage;
