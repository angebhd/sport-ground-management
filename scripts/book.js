document.addEventListener('DOMContentLoaded', () => {
    const startDateInput = document.getElementById('start-date');
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1);

    // Format the date as YYYY-MM-DD
    const formattedDate = tomorrow.toISOString().split('T')[0];
    startDateInput.min = formattedDate;
});