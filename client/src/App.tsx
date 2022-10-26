import { BrowserRouter as Router, Route,Routes } from 'react-router-dom'
import React from 'react';
import { Home } from './components/Home';
import 'bootstrap/dist/css/bootstrap.min.css';
import './css/app.css';
import { Navbar } from './components/Navbar';
import { Footer } from './components/Footer';
function App() {
    return (
        <>
            <Navbar />
            <Router>
                <Routes>
                    <Route path="/" element={<Home />} />
                </Routes>
            </Router>
            <Footer />
        </>
    );
}

export default App;
