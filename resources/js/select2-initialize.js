export function initializeSelect2() {
    $(".form-select2-sm").select2({
        theme: "bootstrap-5",
        containerCssClass: "select2--small",
        selectionCssClass: "select2--small",
        dropdownCssClass: "select2--small",
    });
}
