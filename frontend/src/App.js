import React from 'react';
import Header from './components/Header';
import Footer from './components/Footer';
import Banner from './components/Banner';
import Content from './components/Content';
// import ProductList from './components/ProductList';
import './App.css';
import './Base.css';
import '@fortawesome/fontawesome-free/css/all.min.css';

function App() {
    return (
        <div className="App">
            <Header />
            <Banner />
            <Content />
            <Footer />
        </div>
    );
}

export default App;
