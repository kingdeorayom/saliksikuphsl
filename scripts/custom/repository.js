document.addEventListener("DOMContentLoaded", function () {
  const repositorySearchBar = document.querySelector("#repository-search-bar");
  const repositorySearchButton = document.querySelector(
    "#repository-search-button"
  );
  const hiddenSideBarQuery = document.querySelector("#hidden-sidebar-query");
  repositorySearchBar.addEventListener("input", function () {
    hiddenSideBarQuery.value = repositorySearchBar.value;
  });
  repositorySearchButton.addEventListener("click", function () {
    const sidebarForm = document.forms.namedItem("sidebar-filters");
    sidebarForm.submit();
    var query = repositorySearchBar.value;
    var url = new URL(window.location);
    url.searchParams.has("query")
      ? url.searchParams.set("query", query)
      : url.searchParams.append("query", query);
    url.searchParams.delete("page");
    // window.location = url;
  });
});
