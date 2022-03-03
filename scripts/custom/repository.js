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
