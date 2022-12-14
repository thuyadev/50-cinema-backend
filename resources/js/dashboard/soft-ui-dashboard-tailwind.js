/*!

=========================================================
* Soft UI Dashboard Tailwind - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-tailwind
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (site.license)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/
var page = window.location.pathname.split("/").pop().split(".")[0];
var aux = window.location.pathname.split("/");
// var to_build = (aux.includes('pages')?'../':'./');
var to_build = "http://127.0.0.1:3000/";
var root = window.location.pathname.split("/")
if (!aux.includes("pages")) {
  page = "dashboard";
}

loadStylesheet(to_build + "resources/css/perfect-scrollbar.css");
loadJS(to_build + "resources/js/dashboard/perfect-scrollbar.js", true);

if (document.querySelector("nav [navbar-trigger]")) {
  loadJS(to_build + "resources/js/dashboard/navbar-collapse.js", true);
}

if (document.querySelector("[data-target='tooltip']")) {
  loadJS(to_build + "resources/js/dashboard/tooltips.js", true);
  loadStylesheet(to_build + "resources/css/tooltips.css");
}

if (document.querySelector("[nav-pills]")) {
  loadJS(to_build + "resources/js/dashboard/nav-pills.js", true);
}

if (document.querySelector("[dropdown-trigger]")) {
  loadJS(to_build + "resources/js/dashboard/dropdown.js", true);

}

if (document.querySelector("[fixed-plugin]")) {
  loadJS(to_build + "resources/js/dashboard/fixed-plugin.js", true);
}

if (document.querySelector("[navbar-main]")) {
  loadJS(to_build + "resources/js/dashboard/sidenav-burger.js", true);
  loadJS(to_build + "resources/js/dashboard/navbar-sticky.js", true);
}

if (document.querySelector("canvas")) {
  loadJS(to_build + "resources/js/dashboard/chart-1.js", true);
  loadJS(to_build + "resources/js/dashboard/chart-2.js", true);
}

function loadJS(FILE_URL, async) {
  let dynamicScript = document.createElement("script");

  dynamicScript.setAttribute("src", FILE_URL);
  dynamicScript.setAttribute("type", "text/javascript");
  dynamicScript.setAttribute("async", async);

  document.head.appendChild(dynamicScript);
}

function loadStylesheet(FILE_URL) {
  let dynamicStylesheet = document.createElement("link");

  dynamicStylesheet.setAttribute("href", FILE_URL);
  dynamicStylesheet.setAttribute("type", "text/css");
  dynamicStylesheet.setAttribute("rel", "stylesheet");

  document.head.appendChild(dynamicStylesheet);
}
