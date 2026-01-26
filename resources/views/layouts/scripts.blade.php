
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.getElementById('sidebarToggle');

    if (!toggleBtn) {
        console.error('sidebarToggle TIDAK DITEMUKAN');
        return;
    }

    toggleBtn.addEventListener('click', function () {
        document.body.classList.toggle('sidebar-collapsed');
        console.log('Sidebar toggled');
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('table tbody tr').forEach(row => {
        row.addEventListener('click', () => {
            document.querySelectorAll('table tbody tr')
                .forEach(r => r.classList.remove('table-active'));
            row.classList.add('table-active');
        });
    });
});
</script>
