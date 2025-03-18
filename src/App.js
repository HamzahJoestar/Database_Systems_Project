import React from "react";
import Header from "./Components/Header/Header.js";
import HomePage from "./Components/HomePage/HomePage.js";
import Footer from "./Components/Footer/Footer.js";
import "./App.scss";

const App = () => {
  return (
    <div className="App">
      <Header />
      <HomePage />
      <Footer />
    </div>
  );
};

export default App;
