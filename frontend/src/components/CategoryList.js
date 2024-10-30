import React, { useEffect, useState } from "react";
import axios from "axios";
import Pagination from "../components/Pagination";
import "../assets/css/CategoryList.css";

const CategoryList = () => {
  const [categories, setCategories] = useState([]);
  const [selectedCategory, setSelectedCategory] = useState(null);
  const [products, setProducts] = useState([]);
  const [sortOrder, setSortOrder] = useState("asc");
  const [currentPage, setCurrentPage] = useState(1);
  const productsPerPage = 20;

  useEffect(() => {
    const fetchCategories = async () => {
      try {
        const response = await axios.get(
          "http://localhost:82/tech-store/backend/api/getCategories.php"
        );
        setCategories(response.data.slice(0, 10));
      } catch (error) {
        console.error("Lỗi khi lấy danh mục:", error);
      }
    };

    fetchCategories();
  }, []);

  useEffect(() => {
    const fetchProducts = async () => {
      try {
        const url = selectedCategory
          ? `http://localhost:82/tech-store/backend/api/getProducts.php?category_id=${selectedCategory}`
          : "http://localhost:82/tech-store/backend/api/getProducts.php";

        const response = await axios.get(url);
        let productData = Array.isArray(response.data) ? response.data : [];

        // Sắp xếp sản phẩm theo giá
        productData.sort((a, b) => {
          return sortOrder === "desc" ? b.price - a.price : a.price - b.price;
        });

        setProducts(productData);
        setCurrentPage(1); // Reset về trang 1 mỗi khi thay đổi bộ lọc
      } catch (error) {
        console.error("Lỗi khi lấy sản phẩm:", error);
      }
    };

    fetchProducts();
  }, [selectedCategory, sortOrder]);

  const handleCategoryChange = (e) => {
    setSelectedCategory(e.target.value || null);
  };

  const handleSortChange = (e) => {
    setSortOrder(e.target.value);
  };

  const indexOfLastProduct = currentPage * productsPerPage;
  const indexOfFirstProduct = indexOfLastProduct - productsPerPage;
  const currentProducts = products.slice(
    indexOfFirstProduct,
    indexOfLastProduct
  );

  const totalPages = Math.ceil(products.length / productsPerPage);

  const goToNextPage = () => {
    if (currentPage < totalPages) setCurrentPage((prev) => prev + 1);
  };

  const goToPreviousPage = () => {
    if (currentPage > 1) setCurrentPage((prev) => prev - 1);
  };

  const handlePageChange = (page) => {
    setCurrentPage(page);
  };

  return (
    <div className="home__category">
      <div className="home__category-item-list">
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

      <div className="filter-sort-section">
        <div className="filter">
          <label>Chọn danh mục: </label>
          <select onChange={handleCategoryChange}>
            <option value="">Tất cả</option>
            {categories.map((category) => (
              <option key={category.id} value={category.id}>
                {category.name}
              </option>
            ))}
          </select>
        </div>

        <div className="sort">
          <label>Sắp xếp theo giá: </label>
          <select onChange={handleSortChange}>
            <option value="asc">Tăng dần</option>
            <option value="desc">Giảm dần</option>
          </select>
        </div>
      </div>

      <div className="product-list">
        {currentProducts.length > 0 ? (
          currentProducts.map((product) => (
            <div key={product.id} className="product-item">
              <div
                className="product-image"
                style={{
                  backgroundImage: `url(assets/img/${product.thumbnail})`,
                  width: "60px", // Chiều rộng cho hình ảnh
                  height: "60px", // Chiều cao cho hình ảnh
                  backgroundSize: "contain",
                  backgroundRepeat: "no-repeat",
                  marginBottom: "10px",
                }}
              ></div>
              <h3 className="product-name">{product.name}</h3>
              <p className="product-price">Giá: {product.price} VNĐ</p>
            </div>
          ))
        ) : (
          <p>Không có sản phẩm nào trong danh mục này.</p>
        )}
      </div>

      {totalPages > 1 && (
        <Pagination
          currentPage={currentPage}
          totalPages={totalPages}
          onNextPage={goToNextPage}
          onPreviousPage={goToPreviousPage}
          onPageChange={handlePageChange}
        />
      )}
    </div>
  );
};

export default CategoryList;
