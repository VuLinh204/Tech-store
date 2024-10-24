// src/components/AddCategory.js
import React, { useState } from "react";
import axios from "axios";
import "../assets/css/AddCategory.css"; // Import file CSS

const AddCategory = ({ onAddSuccess }) => {
  const [name, setName] = useState("");
  const [thumbnail, setThumbnail] = useState("");
  const [message, setMessage] = useState("");
  const [error, setError] = useState(""); // Thêm biến để lưu lỗi cụ thể hơn

  const handleSubmit = async (e) => {
    e.preventDefault();

    setMessage(""); // Reset message mỗi lần submit
    setError(""); // Reset error mỗi lần submit

    try {
      // Gọi API POST đến backend với dữ liệu
      const response = await axios.post("/categories", {
        name,
        thumbnail,
      });

      // Kiểm tra nếu phản hồi thành công
      if (response.data) {
        setMessage("Category created successfully!");
        setName("");
        setThumbnail("");
        onAddSuccess(); // Gọi callback để thông báo thành công
      }
    } catch (error) {
      if (error.response && error.response.data) {
        // Hiển thị thông tin lỗi từ server
        setError(error.response.data.error || "Failed to create category");
      } else {
        setError("Failed to create category. Please try again.");
      }
      console.error(error.message);
    }
  };

  return (
    <div className="add-category">
      <h1>Thêm danh mục mới</h1>
      <form onSubmit={handleSubmit}>
        <div>
          <label>Tên danh mục:</label>
          <input
            type="text"
            value={name}
            onChange={(e) => setName(e.target.value)}
            required
          />
        </div>
        <div>
          <label>Hình ảnh URL:</label>
          <input
            type="text"
            value={thumbnail}
            onChange={(e) => setThumbnail(e.target.value)}
            required
          />
        </div>
        <button type="submit">Thêm danh mục</button>

        {/* Hiển thị thông báo thành công hoặc lỗi */}
        {message && <p className="success-message">{message}</p>}
        {error && <p className="error-message">{error}</p>}
      </form>
    </div>
  );
};

export default AddCategory;
