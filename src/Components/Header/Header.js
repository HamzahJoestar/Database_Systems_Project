import React from "react";
import "./Header.scss";

const Header = () => {
    return (
        <header>
         <div className="header-content">
            <div className="title-section">
            <h1> Marigold Memories</h1>
            <p>What would you like to buy?</p>
            </div>
            <div className="button-section">
                <button>Shop</button>
                <button>New Arrivals</button>
                <button>Contact Us</button>
                <button>About</button>
            </div>
            </div>
        </header>
    );
};

export default Header;