<nav aria-label="Page navigation">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="patient-encounter">Patient</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="patient-encounter-page-2">Visual Acuity</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="patient-encounter-page-3">Other Findings</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="patient-encounter-page-4">Right Eye Drawing</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="patient-encounter-page-5">Left Eye Drawing</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="patient-encounter-page-6">Refraction</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="patient-encounter-page-7">Diagnosis</a>
        </li>
    </ul>
</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Add 'active' class to clicked link and remove from others
        $('.pagination li').click(function() {
            $(this).addClass('active').siblings().removeClass('active');
        });
    });
</script>
