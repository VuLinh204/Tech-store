import React from 'react';
import '../assets/css/Content.css';
import CategoryList from './CategoryList';
import ProductList from './ProductList';

function Content() {
    return (
        <div className="app__container">
            <div className="grid">
                <div className="grid__row app__content">
                    <div className="grid__column">
                        <div
                            style={{
                                color: 'var(--primary-color)',
                                fontSize: '3rem',
                                textAlign: 'center',
                                height: '50px',
                            }}
                        >
                            Danh Mục
                        </div>

                        <CategoryList />

                        <div
                            style={{
                                color: 'var(--primary-color)',
                                fontSize: '3rem',
                                textAlign: 'center',
                                height: '50px',
                            }}
                        >
                            Gợi ý hôm nay
                        </div>
                        <hr style={{ backgroundColor: 'var(--primary-color)', border: 0, height: '10px' }} />

                        <ProductList />

                        {/* Pagination */}
                        <div className="home-pagination">
                            <a href="#prev" className={1 > 1 ? '' : 'disabled'}>
                                {' '}
                                &lt;{' '}
                            </a>
                            {[1, 2, 3].map((i) => (
                                <a key={i} href={`#page${i}`} className={i === 1 ? 'active' : ''}>
                                    {i}
                                </a>
                            ))}
                            <a href="#next" className={1 < 3 ? '' : 'disabled'}>
                                {' '}
                                &gt;{' '}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Content;
