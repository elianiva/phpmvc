<div class="row">
    <div class="col-6">
        <h3>Daftar Mahasiswa</h3>

        <ul class="list-group">
            <?php foreach($data["mahasiswa"] as $m) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $m["nama"]; ?>
                    <a
                        href="<?= BASE_URL ?>/mahasiswa/detail/<?= $m["id"] ?>"
                        class="badge bg-primary text-decoration-none link-light"
                    >
                        detail
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
