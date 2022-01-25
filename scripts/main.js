import React from "react";
import ReactDOM from "react-dom";
import FormListing from "./FormListing";
import './options.js';
import './slick.min';
import '../styles/main.scss';
window.addEventListener("load", function() {
  ReactDOM.render(<FormListing />, document.getElementById("formsubmission"));
});
