import React, { useEffect, useState } from "react";
import axios from "axios";
import "../assets/css/CategoryList.css";

const CategoryList = () => {
  const [categories, setCategories] = useState([]);

  useEffect(() => {
    // Gọi API lấy danh mục từ backend
    const fetchCategories = async () => {
      try {
        const response = await axios.get(
          "http://localhost:82/tech-store/backend/views/getCategories.php"
        );
        // Chỉ lấy 10 danh mục đầu tiên
        setCategories(response.data.slice(0, 10));
      } catch (error) {
        console.error("Lỗi khi lấy danh mục:", error);
      }
    };

    fetchCategories();
  }, []);

  return (
    <div className="home__category">
      <div className="home__category-item-list">
        {/* Hiển thị 5 mục trên */}
        <div className="home__category-row">
          {categories.slice(0, 5).map((category) => (
            <a key={category.id} href="#" className="home__category-item">
              <div
                className="home__category-image"
                style={{ backgroundImage: `url(${category.thumbnail})` }}
              />
              <div className="home__category-name">{category.name}</div>
            </a>
          ))}
        </div>

        {/* Hiển thị 5 mục dưới */}
        <div className="home__category-row">
          {categories.slice(5, 10).map((category) => (
            <a key={category.id} href="#" className="home__category-item">
              <div
                className="home__category-image"
                style={{ backgroundImage: `url(${category.thumbnail})` }}
              />
              <div className="home__category-name">{category.name}</div>
            </a>
          ))}
        </div>
      </div>
    </div>
  );
};

export default CategoryList;
