document.addEventListener("DOMContentLoaded", function () {
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
});
