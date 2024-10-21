import React from 'react';

const products = [
    {
        id: 1,
        name: 'Sản phẩm 1',
        image: 'product1.png',
        price: 100000,
        percent_discount: 10,
        quantity_sold: 50,
    },
    {
        id: 2,
        name: 'Sản phẩm 2',
        image: 'product2.png',
        price: 200000,
        percent_discount: 0,
        quantity_sold: 30,
    },
    {
        id: 3,
        name: 'Sản phẩm 3',
        image: 'product3.png',
        price: 150000,
        percent_discount: 5,
        quantity_sold: 20,
    },
    {
        id: 4,
        name: 'Sản phẩm 4',
        image: 'product3.png',
        price: 150000,
        percent_discount: 5,
        quantity_sold: 20,
    },
    {
        id: 5,
        name: 'Sản phẩm 5',
        image: 'product3.png',
        price: 150000,
        percent_discount: 5,
        quantity_sold: 20,
    },
];

const ProductList = (/*{ product }*/) => {
    return (
        <div className="home-product">
            <div className="grid__row">
                {products.map((product) => {
                    const newPrice = product.price - (product.price * product.percent_discount) / 100;
                    const isFavorited = false;

                    return (
                        <div key={product.id} className="grid__column-2-4">
                            <a className="home-product-item" href={`/productDetail/${product.id}`}>
                                <div
                                    className="home-product-item__img"
                                    style={{ backgroundImage: `url(assets/img/${product.image})` }}
                                />
                                <h4 className="home-product-item__name">{product.name}</h4>
                                <div className="home-product-item__price">
                                    <span className="home-product-item__price-old">
                                        {product.price.toLocaleString()}
                                    </span>
                                    <span className="home-product-item__price-current">
                                        {newPrice.toLocaleString()}
                                    </span>
                                </div>
                                <div className="home-product-item__action">
                                    {isFavorited && (
                                        <span className="home-product-item__like home-product-item__like--liked">
                                            <i className="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                                            <i className="home-product-item__like-icon-fill fa-solid fa-heart"></i>
                                        </span>
                                    )}
                                    <div className="home-product-item__rating">
                                        <i className="home-product-item__star--gold fa-solid fa-star"></i>
                                        <i className="home-product-item__star--gold fa-solid fa-star"></i>
                                        <i className="home-product-item__star--gold fa-solid fa-star"></i>
                                        <i className="home-product-item__star--gold fa-solid fa-star"></i>
                                        <i className="fa-solid fa-star"></i>
                                    </div>
                                    <span className="home-product-item__sold">{product.quantity_sold} Đã bán</span>
                                </div>
                                <div className="home-product-item__origin">
                                    <span className="home-product-item__brand">GenZ</span>
                                    <span className="home-product-item__origin-name">Việt Nam</span>
                                </div>
                                <div className="home-product-item__favourite">
                                    <i className="fa-solid fa-check"></i>
                                    <span>Yêu thích</span>
                                </div>
                                {product.percent_discount > 0 && (
                                    <div className="home-product-item__sale-off">
                                        <span className="home-product-item__sale-off-percent">
                                            {product.percent_discount}%
                                        </span>
                                        <span className="home-product-item__sale-off-label">GIẢM</span>
                                    </div>
                                )}
                            </a>
                        </div>
                    );
                })}
            </div>
        </div>
    );
};

export default ProductList;
