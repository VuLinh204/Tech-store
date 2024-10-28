// src/components/Pagination.js

import React from "react";
import PropTypes from "prop-types";
import "../assets/css/Pagination.css";

const Pagination = ({
  currentPage,
  totalPages,
  onNextPage,
  onPreviousPage,
  onPageChange,
}) => {
  // Tính toán số trang hiển thị
  const pageNumbers = [];
  const maxPageDisplay = 5;
  const halfPageDisplay = Math.floor(maxPageDisplay / 2);

  // Tính toán trang bắt đầu và trang kết thúc
  let startPage = Math.max(currentPage - halfPageDisplay, 1);
  let endPage = Math.min(startPage + maxPageDisplay - 1, totalPages);

  if (endPage - startPage < maxPageDisplay - 1) {
    startPage = Math.max(endPage - maxPageDisplay + 1, 1);
  }

  for (let i = startPage; i <= endPage; i++) {
    pageNumbers.push(i);
  }

  return (
    <div className="pagination">
      {totalPages > 1 && (
        <>
          <button onClick={onPreviousPage} disabled={currentPage === 1}>
            {"<"}
          </button>

          {pageNumbers.map((page) => (
            <button
              key={page}
              className={page === currentPage ? "active" : ""}
              onClick={() => onPageChange(page)}
            >
              {page}
            </button>
          ))}

          <button onClick={onNextPage} disabled={currentPage === totalPages}>
            {">"}
          </button>
        </>
      )}
    </div>
  );
};

Pagination.propTypes = {
  currentPage: PropTypes.number.isRequired,
  totalPages: PropTypes.number.isRequired,
  onNextPage: PropTypes.func.isRequired,
  onPreviousPage: PropTypes.func.isRequired,
  onPageChange: PropTypes.func.isRequired,
};

export default Pagination;
