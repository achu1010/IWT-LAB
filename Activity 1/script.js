function showDetails(tagId) {
    const detailsRow = document.getElementById(`${tagId}-details`);
    if (detailsRow.style.display === 'none' || detailsRow.style.display === '') {
        detailsRow.style.display = 'table-row';
    } else {
        detailsRow.style.display = 'none';
    }
}
