import React from 'react';
import Header from './components/Header';
// import ProductList from './components/ProductList';
import Footer from './components/Footer';
import './App.css';

function App() {
    return (
        <div className="App">
            <Header />
            <main className="container my-5">{/* <ProductList /> */}</main>
            <Footer />
        </div>
    );
}

export default App;
