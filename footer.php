<?php
// week03/footer.php
?>
<footer class="footer mt-auto py-3 custom-bg">
    <div class="container text-center">
        <h4 class="mb-3">聯絡方式</h4>
        <p class="mb-1">如果對系學會有任何問題，請隨時與我聯繫：</p>
        <ul class="list-unstyled mb-0">
            <li>Email：413401247@m365.fju.edu.tw</li>
            <li>電話：02-29053938</li>
        </ul>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<script>
$(document).ready(function() {
    // 這個腳本會尋找 id 為 "jobTable" 的表格，並啟用 DataTable 功能
    $('#jobTable').DataTable({
        // 將 DataTable 的語言設定為繁體中文
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.0.8/i18n/zh-HANT.json'
        }
    });
});
</script>

</body>
</html>