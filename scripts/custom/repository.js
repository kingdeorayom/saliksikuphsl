document.addEventListener("DOMContentLoaded", function () {
  const repositorySearchBar = document.querySelector("#repository-search-bar");
  const repositorySearchButton = document.querySelector(
    "#repository-search-button"
  );
  repositorySearchButton.addEventListener("click", function () {
    var query = repositorySearchBar.value;
    var url = new URL(window.location);
    url.searchParams.has("query")
      ? url.searchParams.set("query", query)
      : url.searchParams.append("query", query);
    url.searchParams.delete("page");
    window.location = url;
  });
});
