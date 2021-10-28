<div class="p-5 mb-4 bg-light rounded-3">
    <div class="d-flex container-fluid" style="gap: 1rem;">
        <div>
            <h3 class="display-5 fw-bold">Selamat datang di website saya.</h3>
            <p class="col-md-8 fs-4 text-secondary">Nama saya <?= $data["nama"] ?></p>
            <hr />
            <p class="col-md-8 fs-5 text-secondary">
                This is some random placeholder text that isn't
                supposed to be read by anyone because, like I said, this text is just a
                placeholder without any meaning whatsoever.
            </p>
            <button class="btn btn-primary btn-lg" type="button">About Me</button>
        </div>
        <div>
            <img class="rounded-3" src="<?= BASE_URL ?>/img/pepe.jpeg" style="transform: scaleX(-1);" />
        </div>
    </div>
</div>
