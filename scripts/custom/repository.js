// code to cache sidebar checkbox values
var checkboxValues = JSON.parse(sessionStorage.getItem("checkboxValues")) || {};
var $checkboxes = $("#sidebar-search-filters :checkbox");
$checkboxes.on("change", function () {
  $checkboxes.each(function () {
    checkboxValues[this.id] = this.checked;
  });
  sessionStorage.setItem("checkboxValues", JSON.stringify(checkboxValues));
});

$.each(checkboxValues, function (key, value) {
  $("#" + key).prop("checked", value);
});

const repositorySearchBar = document.querySelector("#repository-search-bar");
const repositorySearchButton = document.querySelector(
  "#repository-search-button"
);
const hiddenSideBarQuery = document.querySelector("#hidden-sidebar-query");
const hiddenModalQuery = document.querySelector("#hidden-modal-query");

repositorySearchBar.addEventListener("input", function () {
  hiddenSideBarQuery.value = repositorySearchBar.value;
  hiddenModalQuery.value = repositorySearchBar.value;
});

repositorySearchButton.addEventListener("click", function () {
  const sidebarForm = document.forms.namedItem("sidebar-filters");
  const modalForm = document.forms.namedItem("modal-filters");

  if (screen.width <= 991) {
    modalForm.submit();
  } else if (screen.width > 991) {
    sidebarForm.submit();
  }
});
$("#repository-search-bar").on("input", function () {
  var str = $("form[name='sidebar-filters']").serialize();
  var page = "";
  var url = new URL(window.location);
  url.searchParams.has("page")
    ? (page = url.searchParams.get("page"))
    : (page = 1);
  $.ajax({
    method: "POST",
    url: "./repository-ajax.php?page=" + page + "&" + str,
  }).done(function (data) {
    $("#repository-results-container").html(data);
  });
});

$("form[name='sidebar-filters']").on("change", function () {
  var str = $(this).serialize();
  var page = "";
  var url = new URL(window.location);
  url.searchParams.has("page")
    ? (page = url.searchParams.get("page"))
    : (page = 1);
  $.ajax({
    method: "POST",
    url: "./repository-ajax.php?page=" + page + "&" + str,
  }).done(function (data) {
    $("#repository-results-container").html(data);
  });
});

$(document).ready(function () {
  var str = $("form[name='sidebar-filters']").serialize();
  var page = "";
  var url = new URL(window.location);
  url.searchParams.has("page")
    ? (page = url.searchParams.get("page"))
    : (page = 1);
  $.ajax({
    method: "POST",
    url: "./repository-ajax.php?page=" + page + "&" + str,
  }).done(function (data) {
    $("#repository-results-container").html(data);
  });
});
