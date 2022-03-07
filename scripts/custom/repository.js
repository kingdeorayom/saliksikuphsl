// code to cache sidebar checkbox values
var searchbarValue = sessionStorage.getItem("searchbarValue");
$("#repository-search-bar").on("input", function () {
  searchbarValue = this.value;
  sessionStorage.setItem("searchbarValue", searchbarValue);
});

$("#repository-search-bar").val(sessionStorage.searchbarValue);
$("#hidden-sidebar-query").val(sessionStorage.searchbarValue);
$("#hidden-modal-query").val(sessionStorage.searchbarValue);

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
var modalRadio = JSON.parse(sessionStorage.getItem("modalRadio")) || {};
var $modalRadio = $("#advanced-search :radio");
$modalRadio.on("change", function () {
  $modalRadio.each(function () {
    modalRadio[this.id] = this.checked;
  });
  sessionStorage.setItem("modalRadio", JSON.stringify(modalRadio));
});

$.each(modalRadio, function (key, value) {
  $("#" + key).prop("checked", value);
});

var modalInputs = JSON.parse(sessionStorage.getItem("modalInputs")) || {};
var $modalInputs = $("#advanced-search :text");
$modalInputs.on("change", function () {
  $modalInputs.each(function () {
    modalInputs[this.id] = this.value;
  });
  sessionStorage.setItem("modalInputs", JSON.stringify(modalInputs));
});

$.each(modalInputs, function (key, value) {
  $("#" + key).prop("value", value);
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

$("form[name='sidebar-filters']")
  .on("change", function () {
    $(this)
      .find(":checkbox")
      .each(function (index) {
        $("form[name='modal-filters']").find(":checkbox")[index].checked =
          this.checked;
      });
  })
  .trigger("change");

$("form[name='modal-filters']")
  .on("change", function () {
    $(this)
      .find(":checkbox")
      .each(function (index) {
        $("form[name='sidebar-filters']").find(":checkbox")[index].checked =
          this.checked;
      });
  })
  .trigger("change");

$("form[name='advanced-filter']").on("submit", function (event) {
  event.preventDefault();
  // document.forms.namedItem("sidebar-filters").reset();
  // document.forms.namedItem("modal-filters").reset();
  // var str = $("form[name='advanced-filter']").serialize();
  // var page = "";
  // var url = new URL(window.location);
  // url.searchParams.has("page")
  //   ? (page = url.searchParams.get("page"))
  //   : (page = 1);
  // $.ajax({
  //   method: "POST",
  //   url: "./repository-ajax.php?page=" + page + "&" + str,
  // }).done(function (data) {
  //   $("#repository-results-container").html(data);
  //   $("#search-modal").modal("hide");
  //   sessionStorage.removeItem("searchbarValue");
  //   sessionStorage.removeItem("checkboxValues");
  // });
});
$("form[name='advanced-filter']").on("change", getResults);
$("#repository-search-bar").on("change", getResults);
$("form[name='sidebar-filters']").on("change", getResults);
$("form[name='modal-filters']").on("change", getResults);

$(document).ready(getResults);

function getResults() {
  var str = $("#sidebar-search-filters,#advanced-search").serialize();
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
}
